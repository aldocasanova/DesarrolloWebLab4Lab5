//MODALES
function abrirModal(usuario = null) {
  document.getElementById("modal").style.display = "flex";
  if (usuario) {
    document.getElementById("modal-titulo").textContent = "Editar Usuario";
    document.getElementById("id").value = usuario.id;
    document.getElementById("usuario").value = usuario.usuario;
    document.getElementById("password").value = "";
    document.getElementById("rol").value = usuario.rol;
  } else {
    document.getElementById("modal-titulo").textContent = "Agregar Usuario";
    document.getElementById("form-usuario").reset();
    document.getElementById("id").value = "";
  }
}

function cerrarModal() {
  document.getElementById("modal").style.display = "none";
}

function abrirModalTipo(tipo = null) {
  document.getElementById("modal-tipo").style.display = "flex";
  if (tipo) {
    document.getElementById("modal-titulo-tipo").textContent = "Editar Tipo";
    document.getElementById("id").value = tipo.id;
    document.getElementById("nombre").value = tipo.nombre;
    document.getElementById("superficie").value = tipo.superficie;
    document.getElementById("camas").value = tipo.camas;
  } else {
    document.getElementById("modal-titulo-tipo").textContent = "Agregar Tipo";
    document.getElementById("form-tipo").reset();
    document.getElementById("id").value = "";
  }
}

function cerrarModalTipo() {
  document.getElementById("modal-tipo").style.display = "none";
}

function abrirModalHabitacion(hab = null) {
  document.getElementById("modal-habitacion").style.display = "flex";
  if (hab) {
    document.getElementById("modal-titulo-hab").textContent = "Editar Habitación";
    document.getElementById("id").value = hab.id;
    document.getElementById("numero").value = hab.numero;
    document.getElementById("piso").value = hab.piso;
    document.getElementById("tipo_id").value = hab.tipo_id;
  } else {
    document.getElementById("modal-titulo-hab").textContent = "Agregar Habitación";
    document.getElementById("form-habitacion").reset();
    document.getElementById("id").value = "";
  }
}

function cerrarModalHabitacion() {
  document.getElementById("modal-habitacion").style.display = "none";
}


function cargarInterfazU(){
    fetch('usuarios.php')
        .then(response => response.text())
        .then(data => {
            cargarUsuarios();
            document.querySelector("#contenido").innerHTML = data
        });
}

function cargarUsuarios() {
  fetch("obtener_usuarios.php")
    .then(res => res.json())
    .then(data => {
      const contenedor = document.getElementById("usuarios-container");
      contenedor.innerHTML = "";
      data.forEach(usuario => {
        const div = document.createElement("div");
        div.classList.add("usuario-card");
        div.innerHTML = `
          <p><strong>${usuario.usuario}</strong></p>
          <p>Rol: ${usuario.rol}</p>
          <button onclick='abrirModal(${JSON.stringify(usuario)})'>Editar</button>
          <button onclick='eliminarUsuario(${usuario.id})'>Eliminar</button>
        `;
        contenedor.appendChild(div);
      });
    });
}

function crearUser(){
    let formData = new FormData(document.querySelector("#form-usuario"));
    fetch("guardar_usuario.php", {
        method: "POST",
        body: formData
        })
            .then(res => res.text())
            .then(() => {
                cerrarModal();
                cargarUsuarios();
  });
}

function eliminarUsuario(id) {
  if (confirm("¿Eliminar usuario?")) {
    fetch(`eliminar_usuario.php?id=${id}`)
      .then(res => res.text())
      .then(() => cargarUsuarios());
  }
}

//HABITACIONES
function cargarInterfazH(){
    fetch('habitaciones.php')
        .then(response => response.text())
        .then(data => {
            cargarHabitaciones();
            document.querySelector("#contenido").innerHTML = data
        });
}

function cargarHabitaciones() {
  fetch("obtener_habitaciones.php")
    .then(res => res.json())
    .then(data => {
      const contenedor = document.getElementById("habitaciones-container");
      contenedor.innerHTML = "";
      data.forEach(h => {
        const div = document.createElement("div");
        div.classList.add("usuario-card");
        div.innerHTML = `
          <p><strong>${h.numero}</strong> (Piso ${h.piso})</p>
          <p>Tipo: ${h.tipo_nombre}</p>
          <button onclick='abrirModalHabitacion(${JSON.stringify(h)})'>Editar</button>
          <button onclick='eliminarHabitacion(${h.id})'>Eliminar</button>
        `;
        contenedor.appendChild(div);
      });
    });
}

function crearHabitacion(){
    let formData = new FormData(document.querySelector("#form-habitacion"));
    fetch("guardar_habitacion.php", {
        method: "POST",
        body: formData
        })
            .then(res => res.text())
            .then(() => {
                cerrarModalHabitacion()
                cargarHabitaciones();
  });
}

function eliminarHabitacion(id) {
  if (confirm("¿Eliminar habitación?")) {
    fetch(`eliminar_habitacion.php?id=${id}`)
      .then(() => cargarHabitaciones());
  }
}

//TIPO_HABITACIONES
function cargarInterfazTH(){
    fetch('tipos_habitacion.php')
        .then(response => response.text())
        .then(data => {
            cargarTipos();
            document.querySelector("#contenido").innerHTML = data
        });
}

function cargarTipos() {
  fetch("obtener_tipos.php")
    .then(res => res.json())
    .then(data => {
      const contenedor = document.getElementById("tipos-container");
      contenedor.innerHTML = "";
      data.forEach(tipo => {
        const div = document.createElement("div");
        div.classList.add("usuario-card");
        div.innerHTML = `
          <p><strong>${tipo.nombre}</strong></p>
          <p>Superficie: ${tipo.superficie} m²</p>
          <p>Camas: ${tipo.camas}</p>
          <button onclick='abrirModalTipo(${JSON.stringify(tipo)})'>Editar</button>
          <button onclick='eliminarTipo(${tipo.id})'>Eliminar</button>
        `;
        contenedor.appendChild(div);
      });
    });
}

function crearTipoHabitacion(){
    let formData = new FormData(document.querySelector("#form-tipo"));
    fetch("guardar_tipos.php", {
        method: "POST",
        body: formData
        })
            .then(res => res.text())
            .then(() => {
                cerrarModalTipo();
                cargarTipos();
  });
}

function eliminarTipo(id) {
  if (confirm("¿Eliminar tipo?")) {
    fetch(`eliminar_tipo.php?id=${id}`)
      .then(() => cargarTipos());
  }
}


//RESERVAS
function cargarInterfazR(){
    fetch('reservas.php')
        .then(response => response.text())
        .then(data => {
            cargarReservas();
            document.querySelector("#contenido").innerHTML = data
        });
}

function cargarReservas() {
  fetch("obtener_reservas.php")
    .then(res => res.json())
    .then(data => {
      const contenedor = document.getElementById("reservas-container");
      contenedor.innerHTML = "";
      data.forEach(r => {
        const div = document.createElement("div");
        div.classList.add("usuario-card");
        div.innerHTML = `
          <p><strong>Usuario:</strong> ${r.usuario}</p>
          <p><strong>Habitación:</strong> ${r.habitacion}</p>
          <p><strong>Ingreso:</strong> ${r.fecha_ingreso}</p>
          <p><strong>Salida:</strong> ${r.fecha_salida}</p>
          <p><strong>Estado:</strong> 
            <select onchange="actualizarEstado(${r.id}, this.value)">
              <option value="pendiente" ${r.estado == "pendiente" ? "selected" : ""}>pendiente</option>
              <option value="confirmada" ${r.estado == "confirmada" ? "selected" : ""}>confirmada</option>
              <option value="cancelada" ${r.estado == "cancelada" ? "selected" : ""}>cancelada</option>
            </select>
          </p>
        `;
        contenedor.appendChild(div);
      });
    });
}

function actualizarEstado(id, estado) {
  fetch("actualizar_estado_reserva.php", {
    method: "POST",
    body: new URLSearchParams({ id, estado })
  })
  .then(() => cargarReservas());
}

//FOTOGRAFIAS HABITACION
function cargarInterfazF(){
    fetch('fotos.php')
        .then(response => response.text())
        .then(data => {
            cargarHabitacionesFoto();
            document.querySelector("#contenido").innerHTML = data
        });
}

function cargarHabitacionesFoto() {
  fetch("obtener_habitaciones.php")
    .then(res => res.json())
    .then(data => {
      const select = document.getElementById("habitacion_id");
      select.innerHTML = "";
      data.forEach(h => {
        const opt = document.createElement("option");
        opt.value = h.id;
        opt.textContent = `#${h.numero} - ${h.tipo_nombre}`;
        select.appendChild(opt);
      });

      //"evento change"
      select.addEventListener("change", () => {
        cargarFotos();
      });

      // cargar las fotos de la primera habitación por defecto
      if (data.length > 0) {
        cargarFotos();
      }
    });
}


function cargarFotos() {
  const id = document.getElementById("habitacion_id").value;
  fetch(`obtener_fotos.php?habitacion_id=${id}`)
    .then(res => res.json())
    .then(data => {
      const galeria = document.getElementById("galeria");
      galeria.innerHTML = "";
      data.forEach(f => {
        const div = document.createElement("div");
        div.classList.add("usuario-card");
        div.innerHTML = `
          <img src="fotos/${f.fotografia}" width="100"><br>
          <p>Orden: ${f.orden}</p>
          <button onclick="eliminarFoto(${f.id}, ${id})">Eliminar</button>
        `;
        galeria.appendChild(div);
      });
    });
}

function crearFotografia(){
    let formData = new FormData(document.querySelector("#form-foto"));
    fetch("guardar_fotos.php", {
        method: "POST",
        body: formData
        })
            .then(res => res.text())
            .then(() => {
                cargarFotos();
  });
}

function eliminarFoto(id, habitacion_id) {
  if (confirm("¿Eliminar esta foto?")) {
    fetch(`eliminar_foto.php?id=${id}`)
      .then(() => cargarFotos());
  }
}