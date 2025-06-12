<div id="modalRedactar" style="display:none; position:fixed; top:10%; left:25%; width:50%; background:#fff; padding:20px; border:1px solid black; z-index:1000;">
  <form id="formRedactar">
    <h3>Redactar Correo</h3>
    <input type="email" name="destinatario" placeholder="Para" required><br>
    <input type="text" name="asunto" placeholder="Asunto" required><br>
    <textarea name="cuerpo" placeholder="Mensaje" required></textarea><br>
    <button type="button" name="accion" value="borrador">Guardar</button>
    <button type="button" name="accion" value="enviar">Enviar</button>
    <button type="button" onclick="cerrarModalRedactar()">Cancelar</button>
  </form>
  <div id="respuestaRedactar"></div>
</div>

