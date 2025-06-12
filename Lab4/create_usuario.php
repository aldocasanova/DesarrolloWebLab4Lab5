<?php
include("conexion.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}

$correo = $_POST['correo'];
$password = sha1($_POST['password']);
$rol = $_POST['rol'];

$sql = "INSERT INTO usuarios (correo, password, rol) VALUES ('$correo', '$password', '$rol')";
if (mysqli_query($conexion, $sql)) {
  echo "Usuario registrado correctamente";
} else {
  echo "Error al registrar usuario";
}
?>
