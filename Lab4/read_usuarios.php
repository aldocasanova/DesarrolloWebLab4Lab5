<?php
session_start();
include("conexion.php");
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}

$sql = "SELECT * FROM usuarios";
$res = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($res)) {
  echo "<tr>";
  echo "<td>".$row['correo']."</td>";
  echo "<td>".$row['rol']."</td>";
  echo "<td>".$row['estado']."</td>";
  echo "<td>
          <button onclick=\"eliminarUsuario(".$row['id'].")\">Eliminar</button>
          <button onclick=\"toggleEstado(".$row['id'].", '".$row['estado']."')\">".
               ($row['estado'] == 'activo' ? 'Suspender' : 'Habilitar').
          "</button>
        </td>";
  echo "</tr>";
}
?>
