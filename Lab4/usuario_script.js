document.querySelectorAll("#formRedactar button[name='accion']").forEach(btn => {
  btn.addEventListener("click", function() {
    const datos = new FormData(document.getElementById("formRedactar"));
    datos.append("accion", this.value);

    fetch("redactar.php", {
      method: "POST",
      body: datos
    })
    .then(res => res.text())
    .then(msg => {
      document.getElementById("respuestaRedactar").innerText = msg;
      cargarBorradores();
      cargarSalida();
      cerrarModalRedactar();
    });
  });
});

// bandejas
function cargarEntrada() {
  fetch("bandeja_entrada.php", {
    method: "POST"
  })
  .then(res => res.text())
  .then(data => document.getElementById("tablaEntrada").innerHTML = data);
}

function cargarSalida() {
  fetch("bandeja_salida.php", {
    method: "POST"
  })
  .then(res => res.text())
  .then(data => document.getElementById("tablaSalida").innerHTML = data);
}

function cargarBorradores() {
  fetch("bandeja_borradores.php", {
    method: "POST"
  })
  .then(res => res.text())
  .then(data => document.getElementById("tablaBorradores").innerHTML = data);
}

// ver correo (modal)
function verCorreo(id) {
  const datos = new FormData();
  datos.append("id", id);

  fetch("ver_correo.php", {
    method: "POST",
    body: datos
  })
  .then(res => res.json())
  .then(correo => {
    document.getElementById("modalContenido").innerHTML =
      `<h4>Asunto: ${correo.asunto}</h4><p>${correo.cuerpo}</p>`;
    document.getElementById("modalVer").style.display = "block";
    cargarEntrada();
    cargarSalida();
  });
}

// Eliminar correo
function eliminarCorreo(id) {
  const datos = new FormData();
  datos.append("id", id);

  fetch("eliminar_correo.php", {
    method: "POST",
    body: datos
  })
  .then(() => {
    cargarEntrada();
    cargarSalida();
    cargarBorradores();
  });
}

// Enviar borrador
function enviarBorrador(id) {
  const datos = new FormData();
  datos.append("id", id);

  fetch("enviar_borrador.php", {
    method: "POST",
    body: datos
  })
  .then(() => {
    cargarSalida();
    cargarBorradores();
  });
}

// modal redactar
function abrirModalRedactar() {
  document.getElementById("modalRedactar").style.display = "block";
}

function cerrarModalRedactar() {
  document.getElementById("modalRedactar").style.display = "none";
}

function cerrarModal() {
  document.getElementById("modalVer").style.display = "none";
}


// cargar bandejas al cargar la página
window.onload = function() {
  cargarEntrada();
  cargarSalida();
  cargarBorradores();
};
