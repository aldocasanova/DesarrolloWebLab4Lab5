<?php
include ("conexion.php");

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$rol = $_POST['rol'];

if (!empty($_POST['password'])) {
  $password = sha1($_POST['password']);
  if ($id == "") {
    $sql = "INSERT INTO usuarios (usuario, password, rol) VALUES ('$usuario', '$password', '$rol')";
  } else {
    $sql = "UPDATE usuarios SET usuario='$usuario', password='$password', rol='$rol' WHERE id=$id";
  }
} else {
  $sql = "UPDATE usuarios SET usuario='$usuario', rol='$rol' WHERE id=$id";
}

mysqli_query($conn, $sql);
