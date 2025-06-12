<?php
include ("auth.php");
include ("conexion.php");
verificarLogin();
if (!esCliente()) {
  header("Location: login.php");
  exit;
}
?>


<h2>Habitaciones Disponibles</h2>
<div id="habitaciones-cliente" class="grid"></div>