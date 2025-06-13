// Redactar correo: detectar botón (Guardar o Enviar) y procesar envío
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
      //cargarSalida();
      cerrarModalRedactar();
    });
  });
});

// Bandejas
function cargarEntrada() {
  fetch("bandeja_entrada.php", {
    method: "POST"
  })
  .then(res => res.text())
  .then(data => {
    document.querySelector("#TTable").innerHTML="Bandeja de Entrada";
    document.getElementById("tablaBorradores").innerHTML = data});
}

function cargarSalida() {
  fetch("bandeja_salida.php", {
    method: "POST"
  })
  .then(res => res.text())
  .then(data => {
    document.querySelector("#TTable").innerHTML="Bandeja de Salida";
    document.getElementById("tablaBorradores").innerHTML = data});
}

function cargarBorradores() {
  fetch("bandeja_borradores.php", {
    method: "POST"
  })
  .then(res => res.text())
  .then(data => {
    document.querySelector("#TTable").innerHTML="Bandeja de Borradores";
    document.getElementById("tablaBorradores").innerHTML = data});
}

// Ver correo (modal)
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
    //cargarEntrada();
    //cargarSalida();
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
    
    if (document.querySelector("#TTable").textContent === "Bandeja de Salida") {
      cargarSalida();
    }
    if (document.querySelector("#TTable").textContent === "Bandeja de Entrada") {
      cargarEntrada();
    }
    if (document.querySelector("#TTable").textContent === "Bandeja de Borradores") {
      cargarBorradores();
    }
    //cargarEntrada();
    //cargarSalida();
    //cargarBorradores();
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
    //cargarSalida();
    cargarBorradores();
  });
}

// Control del modal redactar
function abrirModalRedactar() {
  document.getElementById("modalRedactar").style.display = "block";
}

function cerrarModalRedactar() {
  document.getElementById("modalRedactar").style.display = "none";
}

function cerrarModal() {
  document.getElementById("modalVer").style.display = "none";
}


// Cargar todo al iniciar
window.onload = function() {
  //cargarEntrada();
  cargarSalida();
  //cargarBorradores();
};

function cerrarSesion() {
  fetch("cerrar.php", { method: "POST" })
    .then(() => {
      window.location.href = "formlogin.html";
    });
}
