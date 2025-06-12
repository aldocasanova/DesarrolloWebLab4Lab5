<?php
include("conexion.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}

$asunto = $_POST['asunto'];
$cuerpo = $_POST['cuerpo'];
$remitente = $_SESSION['correo'];

$sql = "SELECT correo FROM usuarios WHERE estado = 'activo' AND correo != '$remitente'";
$res = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($res)) {
  $destino = $row['correo'];
  $query = "INSERT INTO correos (remitente, destinatario, asunto, cuerpo, estado, leido)
            VALUES ('$remitente', '$destino', '$asunto', '$cuerpo', 'enviado', 0)";
  mysqli_query($conexion, $query);
}

echo "Aviso enviado a todos los usuarios activos.";
?>
