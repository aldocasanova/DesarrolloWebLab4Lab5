<?php
include ("conexion.php");

$sql = "SELECT h.id, h.numero, h.piso, t.nombre AS tipo_nombre, t.superficie, t.camas
        FROM habitaciones h
        JOIN tipos_habitacion t ON h.tipo_id = t.id
        WHERE h.id NOT IN (
          SELECT r.habitacion_id FROM reservas r
           WHERE r.estado IN ('pendiente', 'confirmada')
         )";

$res = mysqli_query($conn, $sql);
$habitaciones = [];

while ($row = mysqli_fetch_assoc($res)) {
  $row['fotos'] = [];

  $id = $row['id'];
  $sqlFotos = "SELECT fotografia FROM fotos WHERE habitacion_id = $id ORDER BY orden";
  $resFotos = mysqli_query($conn, $sqlFotos);
  while ($foto = mysqli_fetch_assoc($resFotos)) {
    $row['fotos'][] = $foto['fotografia'];
  }

  $habitaciones[] = $row;
}

echo json_encode($habitaciones);
