<?php include_once("../modules/conexion.php");

if (!isset($_SESSION)) session_start();

if (isset($_SESSION['user_id'])) {
    $ID = $_SESSION['user_id'];
    $ID = $conn->real_escape_string($ID);
    $query = "SELECT `lvl`, `nombre` FROM `usuarios` WHERE `id` = '$ID'";
    $result = $conn->query($query);
    if ($result) {
        $datos_de_usuario = $result->fetch_assoc();
    } else {
        echo "Error en la consulta: " . $conn->error;	// Manejo de error en caso de que la consulta falle
    }
}

include("header.php");

$query = "SELECT * FROM `recetas` WHERE `id` = 1";
$resource = $conn->query($query);
$row = $resource->fetch_assoc();
?>
<main id="agregar_receta">
<?php if (($datos_de_usuario['lvl'] ?? null) == 99) { ?>
    <article>
        <div class="agregar_receta_contenido">
        <h1>Agregando una nueva receta:</h1>
        <p><i>*Todos los campos son requeridos</i></p>
        <form id="registro" name="registro" method="post" action="success.php">
            <section>
                <div>
                    <!-- NOMBRE -->
                    <label for="nombre">Nombre <i class="fa-solid fa-pen-to-square"></i></label>
                    <input name="nombre" type="text" id="nombre" placeholder="Ejemplo: <?php echo htmlspecialchars($row['nombre']); ?>" required />
                </div>
                <div>
                    <!-- CODIGO -->
                    <label for="codigo">Codigo <i class="fa-solid fa-code"></i></label>
                    <input name="codigo" type="text" id="codigo" placeholder="Ejemplo: <?php echo htmlspecialchars($row['codigo']); ?>" required />
                </div>
            </section>

            <!-- DESCRIPCION -->
            <label for="descripcion">Descripción <i class="fa-solid fa-file-lines"></i></label>
            <textarea name="descripcion" id="descripcion" placeholder="Ejemplo: <?php echo htmlspecialchars($row['descripcion']); ?>" required></textarea>
            
            <section>
                <div>
                    <!-- Instrucciones -->
                    <label for="instrucciones">Instrucciones <i class="fa-regular fa-file-lines"></i></label>
                    <textarea name="instrucciones" id="instrucciones" placeholder="Ejemplo: <?php echo htmlspecialchars($row['instrucciones']); ?>" required></textarea>
               </div>
                 <div>
                    <!-- Ingredientes -->
                    <label for="ingredientes">Ingredientes <i class="fa-solid fa-list"></i></label>
                    <textarea name="ingredientes" id="ingredientes" placeholder="Ejemplo: <?php echo htmlspecialchars($row['ingredientes']); ?>" required></textarea>
               </div>
            </section>

            <section>
                <div>
                    <!-- Instrucciones -->
                    <label for="tiempo">Tiempo (en minutos) <i class="fa-regular fa-clock"></i></label>
                    <input name="tiempo" type="number" id="tiempo" placeholder="Ejemplo (en minutos): <?php echo htmlspecialchars($row['tiempo']); ?>" required />
               </div>
                 <div>
                    <!-- Ingredientes -->
                    <label for="dificultad">Dificultad <i class="fa-solid fa-percent"></i></label>
                    <input name="dificultad" type="text" id="dificultad" placeholder="Ejemplo: <?php echo htmlspecialchars($row['dificultad']); ?>" required />
               </div>
            </section>

            <section>
                <div>
                    <!-- Instrucciones -->
                    <label for="categoria">Categoría <i class="fa-solid fa-bowl-food"></i></label>
                    <input name="categoria" type="text" id="categoria" placeholder="Ejemplo: <?php echo htmlspecialchars($row['categoria']); ?>" required />
               </div>
                 <div>
                    <!-- Ingredientes -->
                    <label for="porciones">Porciones <i class="fa-solid fa-users"></i></label>
                    <input name="porciones" type="text" id="porciones" placeholder="Ejemplo: <?php echo htmlspecialchars($row['porciones']); ?>" required />
               </div>
            </section>

            <section>
                <div>
                    <!-- FECHA -->
                    <label for="fecha">Fecha de Subida <i class="fa-solid fa-calendar-days"></i></label>
                    <input type="date" id="fecha" name="fecha">
                </div>
                <div>
                    <!-- Editado -->
                    <label for="editado">Última vez editado: <i class="fa-regular fa-calendar-days"></i></label>
                    <input type="date" id="editado" name="editado">
               </div>
            </section>

            <!-- SUBMIT -->
            <div>
                <button name="volver" id="volver" value="volver"><a href="index.php">Volver</a></button>
                <input type="reset" name="cancelar" id="cancelar" value="cancelar" required />
                <input type="submit" name="agregar" id="agregar" value="agregar" required />
            </div>
        </form>
        </div>
    </article>
    <script>
		// Establece la fecha actual en los campos de fecha
		const today = new Date().toISOString().split('T')[0];
		document.getElementById('fecha').value = today;
		document.getElementById('editado').value = today;
	</script>
<?php } else { ?>
    
<?php } ?>
</main>
<?php include("../modules/footer.php") ?>