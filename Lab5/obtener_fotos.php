<?php
include ("conexion.php");
$id = $_GET['habitacion_id'];

$sql = "SELECT * FROM fotos WHERE habitacion_id = $id ORDER BY orden";
$res = mysqli_query($conn, $sql);

$fotos = [];
while ($row = mysqli_fetch_assoc($res)) {
  $fotos[] = $row;
}

echo json_encode($fotos);
