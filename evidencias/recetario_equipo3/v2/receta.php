<?php 
require_once('modules/conexion.php');
if(!isset($_SESSION))session_start();

require_once("modules/header.php"); ?>
<main>
<?php
//	Consulta ID máxima en la tabla "productos"
$query = "SELECT MAX(id) as max_id FROM recetas";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$max_id = $row['max_id'];
if(isset($_GET['id']) && !empty($_GET['id'])) {
$id = $_GET['id'];
//	Verificación que la ID sea un número válido
if (!filter_var($id, FILTER_VALIDATE_INT)) {
	echo '<div>
			<a href="index.php">← Volver a la tienda</a>
			<p><b>El ID proporcionado no es válido o el producto no existe.</b></p>
			</div>';
	exit; }
//	Comparacion ID proporcionada con la ID máxima existente
if($id > $max_id) {
	echo '<div>
			<a href="index.php">← Volver a la tienda</a>
			<p><b>El ID proporcionado no es válido o el producto no existe.</b></p>
			</div>';
	exit; }
//	Consulta original
$query = "SELECT * FROM recetas WHERE id = $id";
$resource = $conn->query($query);
$total = $resource->num_rows;
$row = $resource->fetch_assoc();
?>
<section class="receta_unica">
	<article>
		<div class="img_receta_contenedor">
			<div class="receta_contenido">
				<img src="assets/img/recetas/<?php echo $row['codigo']?>.png" alt="imagen de la receta ''<?php echo $row['nombre']?>''" class="img-producto"></div>
			</div>
		</div>
		<div class="receta_datos">
			<h1><?php echo $row['nombre']?></h1>
			<hr>
			<div class="porciones">
				<h2><i class="fa-regular fa-clock"></i> <?php echo $row['tiempo']?> minutos</h2>
				<h2><i class="fa-solid fa-users"></i> <?php echo $row['porciones']?> persona(s)</h2>
			</div>
			<h4>categoria</h4>
			<h5><?php echo $row['categoria']?></h5>
			<p><?php echo $row['descripcion']?></p>

			<?php if (isset($_SESSION['user_id'])){?>
				<form id="favorito" name="favorito" method="post" action="favoritos.php">
					<input name="nombre" type="hidden" id="nombre" value="<?php echo $row['nombre']; ?>" />
					<input name="cliente" type="hidden" id="cliente" value="<?php echo $_SESSION['user_id'];?>" />
					<input type="submit" name="favorito" id="favorito" value="favorito" class="btn-custom" />
				</form>
			<?php }else{ ?>
				<p><button><a href="cuenta.php">Inicia sesión</a><i class="fa-solid fa-user"></i></button> o <button><a href="cuenta.php">Registrate</a><i class="fa-solid fa-user"></i></button> para guardar recetas en Favoritos!</p>
			<?php }?>
		</div>
	</article>
	<article>
		<h2>¿Cómo preparar <?php echo $row['nombre']?>?</h2>
	</article>
	<article>
		<div class="receta_contenedor">
			<div class="receta_contenido">
				<h4>instrucciones:</h4>
				<p><?php echo $row['instrucciones']?></p>
			</div>
		</div>
		<div class="receta_contenedor">
			<div class="receta_contenido">
				<h4>ingredientes:</h4>
				<p><?php echo $row['ingredientes']?></p>
			</div>
		</div>
	</article>
</section>
	<!-- fin detalle de producto -->
</div>
<?php }
//
//	En caso que la ID proporcionada sea 0
else {?>
	<p>Error: <b>El ID proporcionado no es válido.</b></p>
	<hr>
	<?php include("modules/404.php")?>
<?php } ?>
</main>
<?php include("modules/footer.php")?>