<?php include("verificarsesion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Administrador</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <h2>Panel de Administración</h2>

  <?php include("forminsertar_usuario.php"); ?>

  <h3>Listado de Usuarios</h3>
  <table border="1">
    <thead>
      <tr><th>Correo</th><th>Rol</th><th>Estado</th><th>Acciones</th></tr>
    </thead>
    <tbody id="tablaUsuarios"></tbody>
  </table>

  <h3>Correos Existentes</h3>
  <table border="1">
    <thead>
      <tr><th>Remitente</th><th>Destinatario</th><th>Asunto</th><th>Estado</th><th>Fecha</th></tr>
    </thead>
    <tbody id="tablaCorreos"></tbody>
  </table>

  <h3>Enviar aviso a todos</h3>
  <?php include("form_aviso.php"); ?>

  <script src="script.js"></script>
</body>
</html>
