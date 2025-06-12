<?php
include ("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$superficie = $_POST['superficie'];
$camas = $_POST['camas'];

if ($id == "") {
  $sql = "INSERT INTO tipos_habitacion (nombre, superficie, camas)
          VALUES ('$nombre', $superficie, $camas)";
} else {
  $sql = "UPDATE tipos_habitacion
          SET nombre='$nombre', superficie=$superficie, camas=$camas
          WHERE id=$id";
}

mysqli_query($conn, $sql);
