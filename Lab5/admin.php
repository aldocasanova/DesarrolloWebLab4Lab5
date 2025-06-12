<?php
include ("auth.php");
include ("conexion.php");
verificarLogin();
if (!esAdmin()) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body onload="cargarInterfazU()">
  <div class="navegacion">
      <a href="javascript:cargarInterfazU()">Usuarios</a>
      <a href="javascript:cargarInterfazH()">Habitaciones</a>
      <a href="javascript:cargarInterfazTH()">Tipo Habitaciones</a>
      <a href="javascript:cargarInterfazR()">Reservas</a>
      <a href="javascript:cargarInterfazF()">Fotografias</a>
  </div>

  <div id="contenido" class="contenido">

  </div>
  

  <script src="scriptAdmin.js"></script>
</body>
</html>
