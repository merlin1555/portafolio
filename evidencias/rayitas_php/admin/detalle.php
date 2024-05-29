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
include("../main/conexion.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
$id = $_GET['id'];
//
//	Verificación que la ID sea un número entero válido
//
if (!filter_var($id, FILTER_VALIDATE_INT)) {
	echo '<div class="col-full"><a href="index.php">← Volver a la tienda</a><p class="pt-5"><b>El ID proporcionado no es válido o el producto no existe.</b></p></div>';
	exit;
	}
//
//	Consulta ID máxima en la tabla "productos"
//
$query = "SELECT MAX(id) as max_id FROM productos";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$max_id = $row['max_id'];
//
//	Comparacion ID proporcionada con la ID máxima existente
//
if ($id > $max_id) {
	echo '<div class="col-full"><a href="index.php">← Volver a la tienda</a><p class="pt-5"><b>El ID proporcionado no es válido o el producto no existe.</b></p></div>';
	exit;
	}
//
//	Consulta original
//
$query = "SELECT * FROM productos WHERE id = $id";
$resource = $conn->query($query);
$total = $resource->num_rows;
$row = $resource->fetch_assoc();
?>
<?php if(($datos_de_usuario['lvl'] ?? null) == 99) { ?>
<?php require_once('admin-menu.php'); ?>

<div class="col-full mt-3">
	<a href="index.php">← Volver</a>
	<!-- detalle de producto -->
	<div class="detalle mb-5">
		<div class="contenedor-1">
			<div>
				<h2>Editar Producto:</h2>
				<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table table-hover table-dark table-striped">
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
							<td>Nombre</td>
							<td><?php echo $row['nombre']?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="text" name="nombre" class="form-control" placeholder="Nuevo Nombre de la Rayita."/>
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_nombre" id="btn_nombre" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						<!-- Codigo -->
						<tr>
							<td>Código</td>
							<td><?php echo $row['codigo']?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
								<input name="codigo" type="text" class="form-control" id="codigo" placeholder="Nuevo Código de la Rayita"/>
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_codigo" id="btn_codigo" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						<!-- Categoría -->
						<tr>
							<td>Categoría</td>
							<td><?php echo $row['categoria']?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
								<input name="categoria" type="text" class="form-control" id="categoria" placeholder="Nueva Categoría de la Rayita"/>
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_categoria" id="btn_categoria" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						<!-- Frase Promocional -->
						<tr>
							<td>Frase Promocional</td>
							<td><?php echo $row['frase_promocional']?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
								<input name="frase_promocional" type="text" class="form-control" id="frase_promocional" placeholder="Nueva Frase Promocional de la Rayita"/>
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_frase_promocional" id="btn_frase_promocional" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						<!-- Descripción -->
						<tr>
							<td>Descripción</td>
							<td><?php echo $row['descripcion']?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
								<textarea name="descripcion" rows="4" cols="20" type="text" class="form-control" id="descripcion" placeholder="Nueva Descripción de la Rayita"></textarea>
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_descripcion" id="btn_descripcion" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						<!-- Colores -->
						<tr>
							<td>Colores</td>
							<td><?php echo $row['colores']?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
								<input name="colores" type="text" class="form-control" id="colores" placeholder="Nuevo(s) Colore(s) de la Rayita"/>
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_colores" id="btn_colores" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						<!-- Precio -->
						<tr>
							<td>Precio</td>
							<td><?php echo "$".number_format ($row['precio'])?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
								<input name="precio" type="number" class="form-control" id="precio" placeholder="Nuevo Precio de la Rayita"/>
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_precio" id="btn_precio" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						<!-- Stock -->
						<tr>
							<td>Stock</td>
							<td><?php echo $row['stok']?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
								<select style="width:100%" name="stok" type="text" id="stok">
									<option value="0">No Disponible</option>
									<option value="1">Disponible</option>
								</select>
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_stok" id="btn_stok" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						<!-- Promoción -->
						<tr>
							<td>Promoción</td>
							<td><?php echo $row['promocion']?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
								<select style="width:100%" name="promocion" type="text" id="promocion">
									<option value="0">No Descuento</option>
									<option value="1">Descuento</option>
								</select>
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_promocion" id="btn_promocion" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						<!-- Fecha -->
						<tr>
							<td>Fecha</td>
							<td><?php echo $row['fecha']?></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
								<input type="date" id="fecha" name="fecha">
							</td>
							<td class="text-center">
								<input type="hidden" name="ID" value="<?php echo $row['id'] ?>"/>
								<input type="submit" name="btn_fecha" id="btn_fecha" value="Actualizar" class="btn-custom"/>
							</td>
						</tr>
						</form>
					</tbody>
				</table>
			</div>
			<form method="post" action="success.php">
				<div class="text-end">
					<button name="volver" id="volver" value="volver"><a href="index.php" class="text-black">Cancelar</a></button>
					<input type="reset" name="vaciar" id="vaciar" value="Vaciar Campos"/>
					<input type="hidden" name="idElm" value="idElm">
					<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
					<input type="submit" value="[Eliminar Producto]" onclick="return confirm('¿Está seguro que desea ELIMINAR PERMANENTEMENTE este producto? Esta acción no se puede revertir.')">
				</div>
			</form>
		</div>
		<div class="col-4">
			<h2>Imágen del Producto</h2>
			<img src="../assets/img/<?php echo $row['codigo']?>.png" alt="imagen de producto ''rayitas''" class="img-producto mb-auto">
		</div>
	</div>
	
					
	<!-- fin detalle de producto -->
</div>
<?php }
//
//	En caso que la ID proporcionada sea 0
//
else {?>
<div class="col-full">
	<a href="index.php">← Volver</a>
	<p class="pt-5"><b>El ID proporcionado no es válido.</b></p>
</div>
<?php }?>
<?php } else{ ?>
<?php include('admin-menu.php'); ?>
<?php } ?>
<?php include("../main/pie.php")?>