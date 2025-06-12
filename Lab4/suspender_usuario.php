<?php
include("conexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}

$id = $_POST['id'];
$estado = $_POST['estado'] === 'activo' ? 'suspendido' : 'activo';
$sql = "UPDATE usuarios SET estado = '$estado' WHERE id = $id";
mysqli_query($conexion, $sql);
?>
