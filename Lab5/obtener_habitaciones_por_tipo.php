<?php
include ("conexion.php");

$sql = "SELECT h.id, h.numero, h.piso, h.tipo_id, t.nombre AS tipo_nombre, t.superficie, t.camas
        FROM habitaciones h
        JOIN tipos_habitacion t ON h.tipo_id = t.id
        WHERE h.id NOT IN (
            SELECT habitacion_id FROM reservas
            WHERE estado IN ('pendiente', 'confirmada')
        )";

$res = mysqli_query($conn, $sql);
$datos = [];

while ($row = mysqli_fetch_assoc($res)) {
  $datos[] = $row;
}

echo json_encode($datos);
?>
