<?php
require_once("../main/conexion.php");
if(!isset($_SESSION))session_start();

if (isset($_SESSION['user_id'])){
	$ID=$_SESSION['user_id'];
	$query = "SELECT `lvl` FROM `clientes` WHERE `id` LIKE $ID";
	$lvl = $conn->query($query);
	$datos_de_usuario = $lvl->fetch_assoc();	
}
include("../main/cabecera.php");
$query="SELECT * FROM `productos` WHERE `id` LIKE 1";
$resource = $conn->query($query);
$row = $resource->fetch_assoc();

if(($datos_de_usuario['lvl'] ?? null) == 99) {
include("../admin/admin-menu.php");
?>
<div class="col-full mb-5">
	<a href="index.php">← Volver</a>
</div>
<div class="col-full">
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table table-hover table-dark table-striped">
<form class="container-fluid" id="registro" name="registro" method="post" action="success.php">
	<thead>
		<tr class="row">
			<th>Editar Producto:</th>
		</tr>
	</thead>
	<!-- NOMBRE -->
	<tr class="row">
		<td class="col-2">
			<label for="nombre" class="form-label">Nombre</label>
		</td>
		<td class="col-3">
			Ejemplo: <?php echo $row['nombre']?>
		</td>
		<td class="col">
			<input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nuevo Nombre de la Rayita."/>
		</td>
	</tr>
	<!-- CODIGO -->
	<tr class="row">
		<td class="col-2">
			<label for="codigo" class="form-label">Código</label>
		</td>
		<td class="col-3">
			Ejemplo: <?php echo $row['codigo']?>
		</td>
		<td class="col">
			<input name="codigo" type="text" class="form-control" id="codigo" placeholder="Nuevo Código de la Rayita"/>
		</td>
	</tr>
	<!-- CATEGORIA -->
	<tr class="row">
		<td class="col-2">
			<label for="categoria">Categoría</label>
		</td>
		<td class="col-3">
			Ejemplo: <?php echo $row['categoria']?>
		</td>
		<td class="col">
			<input name="categoria" type="text" class="form-control" id="categoria" placeholder="Nueva Categoría de la Rayita"/>
		</td>
	</tr>
	<!-- FRASE PROMOCIONAL -->
	<tr class="row">
		<td class="col-2">
			<label for="frase_promocional">Frase Promocional</label>
		</td>
		<td class="col-3">
			Ejemplo: <?php echo $row['frase_promocional']?>
		</td>
		<td class="col">
			<input name="frase_promocional" type="text" class="form-control" id="frase_promocional" placeholder="Nueva Frase Promocional de la Rayita"/>
		</td>
	</tr>
	<!-- DESCRCIPCION -->
	<tr class="row">
		<td class="col-2">
			<label for="descripcion">Descripción</label>
		</td>
		<td class="col-3">
			Ejemplo: <?php echo $row['descripcion']?>
		</td>
		<td class="col">
			<textarea name="descripcion" rows="4" cols="50" type="text" class="form-control" id="descripcion" placeholder="Nueva Descripción de la Rayita"></textarea>
		</td>
	</tr>
	<!-- COLORES -->
	<tr class="row">
		<td class="col-2">
			<label for="colores">Colores</label>
		</td>
		<td class="col-3">
			Ejemplo: <?php echo $row['colores']?>
		</td>
		<td class="col">
			<input name="colores" type="text" class="form-control" id="colores" placeholder="Nuevo(s) Colore(s) de la Rayita"/>
		</td>
	</tr>
	<!-- PRECIO -->
	<tr class="row">
		<td class="col-2">
			<label for="precio">Precio</label>
		</td>
		<td class="col-3">
			Ejemplo: <?php echo "$".number_format ($row['precio'])?>
		</td>
		<td class="col">
			<input name="precio" type="number" class="form-control" id="precio" placeholder="Nuevo Precio de la Rayita"/>
		</td>
	</tr>
	<!-- DISPONIBILIDAD -->
	<tr class="row">
		<td class="col-2">
			<label for="stok">Disponibilidad</label>
		</td>
		<td class="col-3">
			Seleccione:
		</td>
		<td class="col">
			<select style="width:100%" name="stok" type="text" id="stok">
				<option value="0">No Disponible</option>
				<option value="1">Disponible</option>
			</select>
		</td>
	</tr>
	<!-- PROMOCION -->
	<tr class="row">
		<td class="col-2">
			<label for="promocion">Descuento</label>
		</td>
		<td class="col-3">
			Seleccione:
		</td>
		<td class="col">
			<select style="width:100%" name="promocion" type="text" id="promocion">
				<option value="0">No Descuento</option>
				<option value="1">Descuento</option>
			</select>
		</td>
	</tr>
	<!-- FECHA -->
	<tr class="row">
		<td class="col-2">
			<label for="fecha">Fecha</label>
		</td>
		<td class="col-3">
			Seleccione:
		</td>
		<td class="col">
			<input type="date" id="fecha" name="fecha">
		</td>
	</tr>
	
	<!-- SUBMIT -->
	<tr class="row">
		<td class="col">&nbsp;</td>
		<td class="col">&nbsp;</td>
		<td class="col-8 text-end">
			<button name="volver" id="volver" value="volver"><a href="index.php" class="text-black">Volver</a></button>
			<input type="reset" name="cancelar" id="cancelar" value="cancelar"/>
			<input type="submit" name="agregar" id="agregar" value="agregar"/></td>
	</div>
	
</form>
</table>
</div>
<?php } else{ ?>
<?php include('admin-menu.php'); ?>
<?php } ?>
<?php include("../main/pie.php")?>