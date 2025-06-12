<?php
include ("auth.php");
include ("conexion.php");
verificarLogin();
if (!esAdmin()) {
  header("Location: login.php");
  exit;
}
?>

<h2>Reservas Registradas</h2>
<div id="reservas-container" class="grid"></div>
