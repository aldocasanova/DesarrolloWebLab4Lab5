<?php
include ("conexion.php");

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM usuarios WHERE id=$id");
