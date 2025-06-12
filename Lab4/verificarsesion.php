<?php
session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: formlogin.html");
    exit;
}
?>