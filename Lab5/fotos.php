<?php
include ("auth.php");
include ("conexion.php");
verificarLogin();
if (!esAdmin()) {
  header("Location: login.php");
  exit;
}
?>

<h2>Gestión de Fotografías</h2>

<form id="form-foto" enctype="multipart/form-data" method="POST" action="javascript:crearFotografia()">
    <label>Habitación:</label>
    <select name="habitacion_id" id="habitacion_id" required></select><br>
    <label>Fotos:</label>
    <input type="file" name="fotos[]" multiple required><br>
    <button type="submit">Subir Fotos</button>
</form>

<div id="galeria" class="grid"></div>