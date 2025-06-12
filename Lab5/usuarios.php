<?php
include ("auth.php");
include ("conexion.php");
verificarLogin();
if (!esAdmin()) {
  header("Location: login.php");
  exit;
}
?>

<h2>Gestión de Usuarios</h2>

<button onclick="abrirModal()">Agregar Usuario</button>
<div id="usuarios-container" class="grid"></div>

<div id="modal" class="modal" style="display:none;">
  <div class="modal-contenido">
    <h3 id="modal-titulo">Agregar Usuario</h3>
    <form id="form-usuario" action="javascript:crearUser()" method="POST">
      <input type="hidden" name="id" id="id">
      <input type="text" name="usuario" id="usuario" placeholder="Usuario" required><br>
      <input type="password" name="password" id="password" placeholder="Contraseña"><br>
      <select name="rol" id="rol">
        <option value="admin">Administrador</option>
        <option value="cliente">Cliente</option>
      </select><br>
      <button type="submit">Guardar</button>
      <button type="button" onclick="cerrarModal()">Cancelar</button>
    </form>
  </div>
</div>
