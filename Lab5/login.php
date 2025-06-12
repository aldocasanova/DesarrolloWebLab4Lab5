<?php
session_start();
include ("conexion.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST['usuario'];
  $password = sha1($_POST['password']);

  $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
  $res = mysqli_query($conn, $sql);

  if (mysqli_num_rows($res) == 1) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['usuario_id'] = $row['id'];
    $_SESSION['rol'] = $row['rol'];

    if ($row['rol'] == 'admin') {
      header("Location: admin.php");
    } else {
      header("Location: cliente.php");
    }
    exit;
  } else {
    $error = "Usuario o contraseña incorrectos";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <h2>Iniciar Sesión</h2>
  <div class="login-contenedor">
  <form method="POST" action="login.php">
    <input type="text" name="usuario" placeholder="Usuario" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit">Ingresar</button>
  </form>
  </div>
  <?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
  <?php endif; ?>
</body>
</html>
