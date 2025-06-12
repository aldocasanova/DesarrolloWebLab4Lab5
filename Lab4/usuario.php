<?php include("verificarsesion.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Usuario</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <h2>Bienvenido, <?php echo $_SESSION['correo']; ?></h2>

  <h3>Bandeja de Entrada</h3>
  <table border="1">
    <thead><tr><th>Remitente</th><th>Asunto</th><th>Estado</th><th>Operación</th></tr></thead>
    <tbody id="tablaEntrada"></tbody>
  </table>

  <h3>Bandeja de Salida</h3>
  <table border="1">
    <thead><tr><th>Destinatario</th><th>Asunto</th><th>Estado</th><th>Operación</th></tr></thead>
    <tbody id="tablaSalida"></tbody>
  </table>

  <h3>Borradores</h3>
  <table border="1">
    <thead><tr><th>Destinatario</th><th>Asunto</th><th>Estado</th><th>Operación</th></tr></thead>
    <tbody id="tablaBorradores"></tbody>
  </table>

  <h3>Redactar</h3>
  <button onclick="abrirModalRedactar()">Redactar Correo</button>
  <?php include("form_redactar.php"); ?>
  <?php include("modal_ver.php"); ?>

  <script src="usuario_script.js"></script>
</body>
</html>
