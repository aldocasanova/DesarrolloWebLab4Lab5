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
  <div class="container" id="container">
        <nav class="menu">
            <a href="#">LOGO</a>
            <a href="javascript:cerrarSesion()">Cerrar Sesion</a>
        </nav>

        <div class="redactar">
            <a class="btn" href="javascript:abrirModalRedactar()">Redactar</a>
        </div>

        <div class="principal">
            <div class="botones">
                <button class="btn-e" onclick="cargarEntrada()">Bandeja de Entrada</button>
                <button class="btn-s" onclick="cargarSalida()">Bandeja de Salida</button>
                <button class="btn-s" onclick="cargarBorradores()">Borradores</button>
            </div>
            <div id="contenido" class="contenido">
                <h3 id="TTable">Bandeja de Salida</h3>
                <table border="1">
                  <thead><tr><th>Destinatario</th><th>Asunto</th><th>Estado</th><th>Operación</th></tr></thead>
                  <tbody id="tablaBorradores"></tbody>
                </table>
            </div>
        </div>
  </div>

  <?php include("form_redactar.php"); ?>
  <?php include("modal_ver.php"); ?>

  <script src="usuario_script.js"></script>

</body>
</html>
