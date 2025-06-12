<?php
include ("conexion.php");

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tipos_habitacion WHERE id=$id");
?>