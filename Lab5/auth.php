<?php
session_start();

function verificarLogin() {
  if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
  }
}

function esAdmin() {
  return isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
}

function esCliente() {
  return isset($_SESSION['rol']) && $_SESSION['rol'] === 'cliente';
}
