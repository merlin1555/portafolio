<?php 
require_once("../modules/conexion.php");
if(!isset($_SESSION))session_start();

if (isset($_SESSION['user_id'])){
	$ID=$_SESSION['user_id'];
	$query = "SELECT `lvl` FROM `usuarios` WHERE `id` LIKE $ID";
	$lvl = $conn->query($query);
	$datos_de_usuario = $lvl->fetch_assoc();	
}

include("header.php"); ?>

<main>
<?php
if(isset($_GET['id']) && !empty($_GET['id'])) {
$id = $_GET['id'];
//
//	Verificación que la ID sea un número entero válido
if (!filter_var($id, FILTER_VALIDATE_INT)) {
	echo '<div class="col-full"><a href="index.php">← Volver a la tienda</a><p class="pt-5"><b>El ID proporcionado no es válido o el producto no existe.</b></p></div>';
	exit; }
//
//	Consulta ID máxima en la tabla "recetas"
$query = "SELECT MAX(id) as max_id FROM recetas";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$max_id = $row['max_id'];
//
//	Comparacion ID proporcionada con la ID máxima existent
if ($id > $max_id) {
	echo '<a href="index.php">← Volver a la tienda</a><p>El ID proporcionado no es válido o el producto no existe.</p>';
	exit;
	}
//
//	Consulta original
$query = "SELECT * FROM recetas WHERE id = $id";
$resource = $conn->query($query);
$total = $resource->num_rows;
$row = $resource->fetch_assoc();
?>
<?php if(($datos_de_usuario['lvl'] ?? null) == 99) { ?>

	<a href="index.php">← Volver</a>

<!-- detalle de producto -->
	<h1>Editando la Receta: <?php echo $row['nombre']?></h1>
	<table cellspacing="0" cellpadding="2" class="table table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th><?php echo $row['id']?></th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<!-- Nombre -->
			<form id="nombre" name="nombre" method="post" action="success.php">
				<tr>
					<td>Nombre:</td>
					<td><?php echo $row['nombre']?></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="text" name="nombre" class="form-control" placeholder="Ejemplo: <?php echo $row['nombre']?>"/>
					</td>
					<td class="text-center">
						<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
						<input type="submit" name="btn_nombre" id="btn_nombre" value="Actualizar" class="btn-custom"/>
					</td>
				</tr>
				<tr>
					
				</tr>
			</form>
		</tbody>
	</table>

	<form method="post" action="success.php">
		<div class="text-end">
			<button name="volver" id="volver" value="volver"><a href="index.php" class="text-black">Cancelar</a></button>
			<input type="reset" name="vaciar" id="vaciar" value="Vaciar Campos"/>
			<input type="hidden" name="idElm" value="idElm">
			<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
			<input type="submit" value="[Eliminar Producto]" onclick="return confirm('¿Está seguro que desea ELIMINAR PERMANENTEMENTE este producto? Esta acción no se puede revertir.')">
		</div>
	</form>

	<h2>Imágen del Producto</h2>
	<img src="../assets/img/<?php echo $row['id']?>.png" alt="imagen de la receta ''<?php echo $row['nombre']?>''">

<?php }
//
//	En caso que la ID proporcionada sea 
else {?>
	<a href="index.php">← Volver</a>
	<p>El ID proporcionado no es válido.</p>
<?php }?>
<?php } else{ ?>
	
<?php } ?>
</main>
<?php include("../modules/footer.php")?>