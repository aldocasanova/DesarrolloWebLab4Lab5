<?php
include ("conexion.php");

$sql = "SELECT h.id, h.numero, h.piso, h.tipo_id, t.nombre AS tipo_nombre
        FROM habitaciones h
        JOIN tipos_habitacion t ON h.tipo_id = t.id";

$res = mysqli_query($conn, $sql);
$datos = [];

while ($row = mysqli_fetch_assoc($res)) {
  $datos[] = $row;
}

echo json_encode($datos);
