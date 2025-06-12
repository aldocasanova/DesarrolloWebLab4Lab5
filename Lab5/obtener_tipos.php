<?php
include ("conexion.php");

$res = mysqli_query($conn, "SELECT * FROM tipos_habitacion");
$datos = [];

while ($row = mysqli_fetch_assoc($res)) {
  $datos[] = $row;
}

echo json_encode($datos);
