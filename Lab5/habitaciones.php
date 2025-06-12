<?php
include ("auth.php");
include ("conexion.php");
verificarLogin();
if (!esAdmin()) {
  header("Location: login.php");
  exit;
}

$sql = "SELECT id,nombre from tipos_habitacion order by nombre";
$result = mysqli_query($conn, $sql);
?>

<h2>Gestión de Habitaciones</h2>

<button onclick="abrirModalHabitacion()">Agregar Habitación</button>
<div id="habitaciones-container" class="grid"></div>

<div id="modal-habitacion" class="modal" style="display:none;">
  <div class="modal-contenido">
    <h3 id="modal-titulo-hab">Agregar Habitación</h3>
    <form id="form-habitacion" method="POST" action="javascript:crearHabitacion()">
      <input type="hidden" name="id" id="id">
      <input type="text" name="numero" id="numero" placeholder="Número" required><br>
      <input type="number" name="piso" id="piso" placeholder="Piso" required><br>
      <select name="tipo_id" id="tipo_id" required>
        <?php 
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
        <?php } ?>
      </select><br>
      <button type="submit">Guardar</button>
      <button type="button" onclick="cerrarModalHabitacion()">Cancelar</button>
    </form>
  </div>
</div>
<script src="scriptAdmin.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    cargarHabitaciones();
  });
</script>
