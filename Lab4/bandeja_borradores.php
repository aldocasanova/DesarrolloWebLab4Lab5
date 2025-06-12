<?php
include("conexion.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}
$yo = $_SESSION['correo'];

$sql = "SELECT * FROM correos WHERE remitente = '$yo' AND estado = 'borrador' ORDER BY fecha DESC";
$res = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($res)) {
  echo "<tr>";
  echo "<td>".$row['destinatario']."</td>";
  echo "<td>".$row['asunto']."</td>";
  echo "<td>".$row['estado']."</td>";
  echo "<td>
          <button onclick=\"enviarBorrador(".$row['id'].")\">Enviar</button>
          <button onclick=\"eliminarCorreo(".$row['id'].")\">Eliminar</button>
        </td>";
  echo "</tr>";
}
?>
