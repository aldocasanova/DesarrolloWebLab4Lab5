<?php
include ("conexion.php");

$id = $_POST['id'];
$numero = $_POST['numero'];
$piso = $_POST['piso'];
$tipo_id = $_POST['tipo_id'];

if ($id == "") {
  $sql = "INSERT INTO habitaciones (numero, piso, tipo_id)
          VALUES ('$numero', $piso, $tipo_id)";
} else {
  $sql = "UPDATE habitaciones
          SET numero='$numero', piso=$piso, tipo_id=$tipo_id
          WHERE id=$id";
}

mysqli_query($conn, $sql);
