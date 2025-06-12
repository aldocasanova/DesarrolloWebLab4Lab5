<?php
include ("conexion.php");

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM habitaciones WHERE id=$id");
