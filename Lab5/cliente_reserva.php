<?php
include ("auth.php");
include ("conexion.php");
verificarLogin();
if (!esCliente()) {
  header("Location: login.php");
  exit;
}
?>

<h2>Reservar Habitación</h2>


<form id="form-reserva" method="POST" action="javascript:enviarReserva()">
    <label>Tipo de Habitación:</label>
    <select id="tipo_id" name="tipo_id" required></select><br>
    
    <label>Habitación:</label>
    <select id="habitacion_id" name="habitacion_id" required></select><br>

    <label>Fecha Ingreso:</label>
    <input type="date" name="fecha_ingreso" required><br>

    <label>Fecha Salida:</label>
    <input type="date" name="fecha_salida" required><br>

    <button type="submit">Reservar</button>
</form>

<div id="mensaje"></div>