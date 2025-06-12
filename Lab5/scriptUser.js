function cargarInterfazH(){
    fetch('cliente_habitaciones.php')
        .then(response => response.text())
        .then(data => {
            document.querySelector("#contenidoU").innerHTML = data;
            cargarHabitacionesCliente(); 
        });
}


function cargarHabitacionesCliente() {
  fetch("obtener_habitaciones_con_fotos.php")
    .then(function (res) {
      return res.json();
    })
    .then(function (data) {
      const contenedor = document.getElementById("habitaciones-cliente");
      contenedor.innerHTML = "";
      window.__habitaciones = data;

      data.forEach(function (hab) {
        const div = document.createElement("div");
        div.classList.add("usuario-card");
        
        let galeria = `
        <div id="galeria-${hab.id}">
          <img src="fotos/${hab.fotos[0]}" width="200" id="foto-activa-${hab.id}">
          <br>
          <button onclick="cambiarFoto(${hab.id}, -1)">«</button>
          <button onclick="cambiarFoto(${hab.id}, 1)">»</button>
        </div>
        `;

        div.innerHTML = `
          <p><strong>Número:</strong> ${hab.numero} (Piso ${hab.piso})</p>
          <p><strong>Tipo:</strong> ${hab.tipo_nombre}</p>
          <p><strong>Superficie:</strong> ${hab.superficie} m²</p>
          <p><strong>Camas:</strong> ${hab.camas}</p>
          ${galeria}
        `;

        contenedor.appendChild(div);
      });
    });
}



function cargarInterfazR(){
    fetch('cliente_reserva.php')
        .then(response => response.text())
        .then(data => {
            //cargarReservas();
            document.querySelector("#contenidoU").innerHTML = data;
            cargarTipos();
            document.getElementById("tipo_id").addEventListener("change", cargarHabitaciones);
        });
}



function cargarTipos() {
  fetch("obtener_tipos.php")
    .then(res => res.json())
    .then(data => {
      const tipoSelect = document.getElementById("tipo_id");
      tipoSelect.innerHTML = "";
      data.forEach(t => {
        const opt = document.createElement("option");
        opt.value = t.id;
        opt.textContent = t.nombre;
        tipoSelect.appendChild(opt);
      });
      cargarHabitaciones();
      // reegistrar el evento justo después de que el combo exista
      tipoSelect.addEventListener("change", cargarHabitaciones);
    });
}


function cargarHabitaciones() {
  const tipo_id = document.getElementById("tipo_id").value;

  fetch("obtener_habitaciones_por_tipo.php")
    .then(res => res.json())
    .then(data => {
      const habSelect = document.getElementById("habitacion_id");
      habSelect.innerHTML = "";

      // filtro por tipo_id directamente en JS
      const filtradas = data.filter(function (h) {
        return h.tipo_id == tipo_id;
      });

      filtradas.forEach(function (h) {
        const opt = document.createElement("option");
        opt.value = h.id;
        opt.textContent = `#${h.numero} - Piso ${h.piso}`;
        habSelect.appendChild(opt);
      });
    });
}


function enviarReserva(){
  let formData = new FormData(document.querySelector("#form-reserva"));
  fetch("guardar_reserva.php", {
    method: "POST",
    body: formData
    })
      .then(res => res.text())
      .then((data) => {
        //cargarHabitaciones();
        document.querySelector("#mensaje").innerHTML = data;
  });
}


function cambiarFoto(idHab, direccion) {
  const imagen = document.getElementById(`foto-activa-${idHab}`);
  const habitacion = window.__habitaciones.find(function (h) {
    return h.id == idHab;
  });

  const actual = habitacion._indice || 0;
  let nuevo = actual + direccion;

  if (nuevo >= habitacion.fotos.length) nuevo = 0;
  if (nuevo < 0) nuevo = habitacion.fotos.length - 1;

  imagen.src = "fotos/" + habitacion.fotos[nuevo];
  habitacion._indice = nuevo;
}
