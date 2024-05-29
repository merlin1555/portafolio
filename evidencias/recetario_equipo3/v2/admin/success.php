<?php 
include_once("../modules/conexion.php");

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
if(($datos_de_usuario['lvl'] ?? null) == 99) {
?>

	<?php
	if(isset($_POST['agregar']) && $_POST['agregar']=="agregar"){
		$query="INSERT INTO recetas (id,nombre,codigo,descripcion,ingredientes,instrucciones,tiempo,dificultad,categoria,porciones,fecha,editado) VALUES (NULL,'$_POST[nombre]','$_POST[codigo]','$_POST[descripcion]','$_POST[ingredientes]','$_POST[instrucciones]','$_POST[tiempo]','$_POST[dificultad]','$_POST[categoria]','$_POST[porciones]','$_POST[fecha]','$_POST[editado]')";
		$conn->query($query); 
		$ID=$conn->insert_id; ?>
	<div>
		<h1>¡Producto Agregado Correctamente!</h1>
		<a href="index.php">← Volver Productos</a>
	</div>

	<?php } 
	else if(isset($_POST['idElm']) && $_POST['idElm']=="idElm"){
	$ID = $_POST['ID'];
	$query = "DELETE FROM `recetas` WHERE `id` LIKE '$ID'";
	$result = $conn->query($query); 
	?>
	<div>
		<h1>¡Producto Eliminado Correctamente!</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_nombre'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `nombre`='$_POST[nombre]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); ?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_codigo'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `codigo`='$_POST[codigo]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); ?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_categoria'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `categoria`='$_POST[categoria]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); 
	?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_frase_promocional'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `frase_promocional`='$_POST[frase_promocional]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); 
	?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_descripcion'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `descripcion`='$_POST[descripcion]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); 
	?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_colores'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `colores`='$_POST[colores]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); 
	?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_precio'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `precio`='$_POST[precio]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); 
	?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_stok'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `stok`='$_POST[stok]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); 
	?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_promocion'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `promocion`='$_POST[promocion]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); 
	?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else if(isset($_POST['btn_fecha'])) {
	$ID = $_POST['ID'];
	$query = "UPDATE `recetas` SET `fecha`='$_POST[fecha]' WHERE `id` LIKE '$ID';";
	$result = $conn->query($query); 
	?>
	<div class="col-full">
		<h1>El Producto se actualizó correctamente.</h1>
		<a href="index.php">← Volver a Productos</a>
	</div>

	<?php } else{ ?>
	<div>
		<h1>¡Ups! Algo salió mal</h1>
		<a href="agregar.php">← Ir a Agregar Producto</a><br/>
		<a href="index.php">← Ir a Productos</a>
	</div>
	<?php }?>

<?php } else{ ?>
<?php } ?>
</main>
<?php include("../modules/footer.php")?>