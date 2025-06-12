<?php
include ("conexion.php");

$id = $_POST['id'];
$estado = $_POST['estado'];

if ($estado === 'cancelada') {
    // si es 'cancelada', eliminamos la reserva completamente
    $sql = "DELETE FROM reservas WHERE id = $id";
} else {
    // sino lo actualizo
    $sql = "UPDATE reservas SET estado = '$estado' WHERE id = $id";
}

mysqli_query($conn, $sql);
?>
