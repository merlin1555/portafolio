<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div id="contacto" class="modal-content">
        

      <div class="modal-header">
        <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
        <form action="enviar_correo.php" method="POST">

            <div class="modal-body">
                <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>

                <label for="mensaje">Mensaje:</label><br>
                    <textarea id="mensaje" name="mensaje" rows="4" cols="50" required></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
  </div>
</div>