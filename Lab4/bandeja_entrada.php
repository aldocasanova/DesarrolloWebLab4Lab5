<?php
include("conexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}
$yo = $_SESSION['correo'];

$sql = "SELECT * FROM correos WHERE destinatario = '$yo' AND estado = 'enviado' ORDER BY fecha DESC";
$res = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($res)) {
  $estilo = $row['leido'] ? '' : 'style="background-color: #ddd"';
  echo "<tr $estilo>";
  echo "<td>".$row['remitente']."</td>";
  echo "<td>".$row['asunto']."</td>";
  echo "<td>".($row['leido'] ? "Leído" : "Pendiente")."</td>";
  echo "<td>
          <button onclick=\"verCorreo(".$row['id'].")\">Ver</button>
          <button onclick=\"eliminarCorreo(".$row['id'].")\">Eliminar</button>
        </td>";
  echo "</tr>";
}
?>
