<?php
include("conexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}

$remitente = $_SESSION['correo'];
$destinatario = $_POST['destinatario'];
$asunto = $_POST['asunto'];
$cuerpo = $_POST['cuerpo'];
$estado = $_POST['accion'] == 'enviar' ? 'enviado' : 'borrador';

$sql = "INSERT INTO correos (remitente, destinatario, asunto, cuerpo, estado, leido)
        VALUES ('$remitente', '$destinatario', '$asunto', '$cuerpo', '$estado', 0)";

if (mysqli_query($conexion, $sql)) {
  echo "Correo guardado";
} else {
  echo "Error";
}
?>
