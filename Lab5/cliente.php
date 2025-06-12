<?php
include ("auth.php");
include ("conexion.php");
verificarLogin();
if (!esCliente()) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cliente</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body onload="cargarInterfazH()">
  <div class="navegacion">
      <a href="javascript:cargarInterfazH()">Habitaciones</a>
      <a href="javascript:cargarInterfazR()">Reservas</a>
  </div>

  <div id="contenidoU" class="contenido">

  </div>
  

  <script src="scriptUser.js"></script>
</body>
</html>
