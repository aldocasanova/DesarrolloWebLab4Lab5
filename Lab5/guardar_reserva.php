<?php
include ("conexion.php");
session_start();

$usuario_id = $_SESSION['usuario_id'];
$habitacion_id = $_POST['habitacion_id'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$fecha_salida = $_POST['fecha_salida'];

$sql = "INSERT INTO reservas (usuario_id, habitacion_id, fecha_ingreso, fecha_salida, estado)
        VALUES ($usuario_id, $habitacion_id, '$fecha_ingreso', '$fecha_salida', 'pendiente')";

if (mysqli_query($conn, $sql)) {
  echo "Reserva registrada con éxito.";
} else {
  echo "Error al registrar la reserva.";
}
