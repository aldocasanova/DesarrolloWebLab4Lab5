<?php
session_start();
include("conexion.php");
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}

$sql = "SELECT * FROM correos ORDER BY fecha DESC";
$res = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($res)) {
  echo "<tr>";
  echo "<td>".$row['remitente']."</td>";
  echo "<td>".$row['destinatario']."</td>";
  echo "<td>".$row['asunto']."</td>";
  echo "<td>".$row['estado']."</td>";
  echo "<td>".$row['fecha']."</td>";
  echo "</tr>";
}
?>
