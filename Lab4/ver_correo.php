<?php
include("conexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}

$id = $_POST['id'];
$sql = "SELECT * FROM correos WHERE id = $id";
$res = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($res);
mysqli_query($conexion, "UPDATE correos SET leido = 1 WHERE id = $id");
echo json_encode($row);
?>
