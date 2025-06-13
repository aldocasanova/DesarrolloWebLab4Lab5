document.getElementById("formUsuarios").addEventListener("submit", function(event) {
  event.preventDefault();
  let datos = new FormData(this);

  fetch("create_usuario.php", {
    method: "POST",
    body: datos
  })
  .then(res => res.text())
  .then(data => {
    document.getElementById("respuesta").innerText = data;
    cargarUsuarios();
  });
});

document.getElementById("formAviso").addEventListener("submit", function(event) {
  event.preventDefault();
  let datos = new FormData(this);

  fetch("enviar_aviso.php", {
    method: "POST",
    body: datos
  })
  .then(res => res.text())
  .then(msg => {
    document.getElementById("respuestaAviso").innerText = msg;
    cargarCorreos();
  });
});

function cargarUsuarios() {
  fetch("read_usuarios.php", {
    method: "POST"
    })
    .then(res => res.text())
    .then(data => {
      document.getElementById("tablaUsuarios").innerHTML = data;
    });
}

function eliminarUsuario(id) {
  let datos = new FormData();
  datos.append("id", id);

  fetch("delete_usuario.php", {
    method: "POST",
    body: datos
  }).then(() => cargarUsuarios());
}

function toggleEstado(id, estado) {
  let datos = new FormData();
  datos.append("id", id);
  datos.append("estado", estado);

  fetch("suspender_usuario.php", {
    method: "POST",
    body: datos
  }).then(() => cargarUsuarios());
}

function cargarCorreos() {
  fetch("read_correos.php", {
    method: "POST"
    })
    .then(res => res.text())
    .then(data => {
      document.getElementById("tablaCorreos").innerHTML = data;
    });
}

window.onload = function() {
  cargarUsuarios();
  cargarCorreos();
};

function cerrarSesion() {
  fetch("cerrar.php", { method: "POST" })
    .then(() => {
      window.location.href = "formlogin.html";
    });
}
