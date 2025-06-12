<?php
include ("auth.php");
include ("conexion.php");
verificarLogin();
if (!esAdmin()) {
  header("Location: login.php");
  exit;
}
?>

<h2>Tipos de Habitación</h2>

<button onclick="abrirModalTipo()">Agregar Tipo</button>
<div id="tipos-container" class="grid"></div>

<div id="modal-tipo" class="modal" style="display:none;">
  <div class="modal-contenido">
    <h3 id="modal-titulo-tipo">Agregar Tipo</h3>
    <form id="form-tipo" method="POST" action="javascript:crearTipoHabitacion()">
      <input type="hidden" name="id" id="id">
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" required><br>
      <input type="number" name="superficie" id="superficie" placeholder="Superficie (m²)" required><br>
      <input type="number" name="camas" id="camas" placeholder="Número de camas" required><br>
      <button type="submit">Guardar</button>
      <button type="button" onclick="cerrarModalTipo()">Cancelar</button>
    </form>
  </div>
</div>


  <script src="../js/modales.js"></script>
  <script src="../js/tipos.js"></script>
</body>
</html>
