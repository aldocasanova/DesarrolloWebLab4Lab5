<?php
include ("conexion.php");

$id = $_GET['id'];

$sql = "SELECT fotografia FROM fotos WHERE id = $id";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$archivo = "fotos/" . $row['fotografia'];

if (file_exists($archivo)) {
  unlink($archivo);
}

mysqli_query($conn, "DELETE FROM fotos WHERE id = $id");
