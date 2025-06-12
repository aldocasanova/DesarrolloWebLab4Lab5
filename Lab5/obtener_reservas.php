<?php
include ("conexion.php");

$sql = "SELECT r.id, u.usuario, h.numero AS habitacion, r.fecha_ingreso, r.fecha_salida, r.estado
        FROM reservas r
        JOIN usuarios u ON r.usuario_id = u.id
        JOIN habitaciones h ON r.habitacion_id = h.id";

$res = mysqli_query($conn, $sql);
$datos = [];

while ($row = mysqli_fetch_assoc($res)) {
  $datos[] = $row;
}

echo json_encode($datos);
