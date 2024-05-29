<?php 
if(!isset($_SESSION))session_start();
if(!$_SESSION['user_id']){
$_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: login.php");
}

include("main/cabecera.php");
require_once('main/conexion.php');
//
//	Consulta ID máxima en la tabla "productos"
$query = "SELECT MAX(id) as max_id FROM productos";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$max_id = $row['max_id'];
if(isset($_GET['id']) && !empty($_GET['id'])) {
$id = $_GET['id'];
//
//	Verificación que la ID sea un número válido
if (!filter_var($id, FILTER_VALIDATE_INT)) {
	echo '<div class="col-full"><a href="index.php">← Volver a la tienda</a><p class="pt-5"><b>El ID proporcionado no es válido o el producto no existe.</b></p></div>';
	exit;
	}
//
//	Comparacion ID proporcionada con la ID máxima existente
if($id > $max_id) {
	echo '<div class="col-full"><a href="index.php">← Volver a la tienda</a><p class="pt-5"><b>El ID proporcionado no es válido o el producto no existe.</b></p></div>';
	exit;
	}
//
//	Consulta original
$query = "SELECT * FROM productos WHERE id = $id";
$resource = $conn->query($query);
$total = $resource->num_rows;
$row = $resource->fetch_assoc();

include('main/menu.php'); ?>
<div class="col-full">
	<a href="index.php">← Volver a la tienda</a>
	<!-- detalle de producto -->
	<div class="container-fluid detalle">
		<div class="row">
		<div class="col-lg-5 col-4">
		<img src="assets/img/<?php echo $row['codigo']?>.png" alt="imagen de producto ''rayitas''" class="img-producto"></div>
		<div class="contenedor-1 col-lg-7 col-8">
			<div class="contenedor-3">
					<div>
						<h3><?php echo $row['nombre']?> - <small><?php echo $row['codigo']?></small></h3>
						<span><?php echo $row['frase_promocional']?></span>
					</div>
					<div class="contenedor-2">
					<ul>
						<li><?php  echo lafecha($row['fecha']); ?></li>
						<li><?php echo $row['categoria']?></li>
						<li><?php echo $row['colores']?></li>
					</ul>
					<?php if($row['promocion']=="1"){?>
					<img src="assets/img/descuento.png" alt="imagen descuento" class="descuento">
					<?php }?>
					<?php if($row['promocion']=="0"){?>
					<div class="descuento"></div>
					<?php }?>
					</div>
			</div>
			<p><?php echo $row['descripcion']?></p>
			<form id="compra" name="compra" method="post" action="boleta.php">
				<strong>Precio : <?php echo "\$" . number_format($row['precio'])?></strong><br/>
				<label for="cantidad">cantidad</label>
				<input name="cantidad" type="number" id="cantidad" value="1" size="3" maxlength="3" />
				<input name="precio" type="hidden" id="precio" value="<?php echo $row['precio']; ?>" />
				<input name="codigo" type="hidden" id="codigo" value="<?php echo $row['codigo']; ?>" />
				<input name="nombre" type="hidden" id="nombre" value="<?php echo $row['nombre']; ?>" />
				<input name="cliente" type="hidden" id="cliente" value="<?php echo $_SESSION['user_id'];?>" />
				<input type="submit" name="comprar" id="comprar" value="comprar" class="btn-custom" />
			</form>
		</div>
		</div>
	</div>
	<!-- fin detalle de producto -->
</div>
<?php }
//
//	En caso que la ID proporcionada sea 0
else {?>
<div class="col-full">
	<a href="index.php">← Volver a la tienda</a>
	<p class="pt-5"><b>El ID proporcionado no es válido.</b></p>
</div>
<?php } ?>
<?php include("main/pie.php")?>