<?php
session_start();
include("conexion.php");
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Acceso inválido";
    exit;
}
$correo = $_POST['correo'];
$pass = sha1($_POST['password']);

$sql = "SELECT * FROM usuarios WHERE correo='$correo' AND password='$pass'";
$res = mysqli_query($conexion, $sql);

if (mysqli_num_rows($res) == 1) {
    $user = mysqli_fetch_assoc($res);
    if ($user['estado'] === 'suspendido') {
        echo "Cuenta suspendida";
        exit;
    }
    $_SESSION['correo'] = $user['correo'];
    $_SESSION['rol'] = $user['rol'];
    echo $user['rol'];
} else {
    echo "Credenciales incorrectas";
}
?>
