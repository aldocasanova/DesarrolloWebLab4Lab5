<?php
include ("conexion.php");

$habitacion_id = $_POST['habitacion_id'];

// obtener el orden actual más alto para esa habitación
$sql = "SELECT MAX(orden) AS max_orden FROM fotos WHERE habitacion_id = $habitacion_id";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_assoc($res);
$orden = ($fila['max_orden'] ?? 0) + 1;

$carpeta = "fotos/";

foreach ($_FILES['fotos']['tmp_name'] as $i => $tmp) {
  $nombre = basename($_FILES['fotos']['name'][$i]);
  $ruta = $carpeta . $nombre;

  if (move_uploaded_file($tmp, $ruta)) {
    $sql = "INSERT INTO fotos (habitacion_id, fotografia, orden)
            VALUES ($habitacion_id, '$nombre', $orden)";
    mysqli_query($conn, $sql);
    $orden++;
  }
}
?>
