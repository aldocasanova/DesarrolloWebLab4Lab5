<?php
include("conexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}

$id = $_POST['id'];
$sql = "UPDATE correos SET estado = 'enviado' WHERE id = $id";
mysqli_query($conexion, $sql);
?>
