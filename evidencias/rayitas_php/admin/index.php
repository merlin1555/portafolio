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

$max = 10;
$pag = 0;

if (isset($_GET['pag']) && $_GET['pag'] <> "") {
    $pag = $_GET['pag'];
	}
$inicio = $pag * $max;
if (isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];
    $query = "SELECT * FROM productos WHERE categoria LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' ORDER BY nombre DESC";
	} else {
		$query = "SELECT * FROM productos ORDER BY id DESC";
	}
$resource = $conn->query($query);
if (isset($_GET['total'])) {
    $total = $_GET['total'];
} else {
    $resource_total = $conn -> query("SELECT * FROM productos ORDER BY id DESC");
    $total = $resource_total->num_rows;
}
$total_pag = ceil($total/$max)-1;
?>
<?php if(($datos_de_usuario['lvl'] ?? null) == 99) { ?>
<?php require_once('admin-menu.php'); ?>
<!-- LISTADO DE PRODUCTOS -->
<div class="col-full">
<h1 class="mb-4">Productos de Rayitas S.A. :</h1>
<button class="mb-4"><a class="text-black" href="agregar.php">+ Agregar Nuevo Producto</a></button>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table table-hover table-dark table-striped">
<thead>
<tr class="table-dark">
<th>ID</th>
<th>Nombre Producto</th>
<th>Codigo</th>
<th>Categoría</th>
<!--    
<th>Frase Promocional</th>
<th>Descripción</th>
<th>Colores</th>
-->
<th>Precio</th>
<th>Stok</th>
<th>Promoción</th>
<th>Fecha</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<?php if($total){?>
<?php  while ($row = $resource->fetch_assoc()){?>
	<tr>
		<td><?php echo $row['id']?></td>
        <td><?php echo $row['nombre']?></td>
        <td><?php echo $row['codigo']?></td>
        <td><?php echo $row['categoria']?></td>
<!--
        <td><?php //echo $row['frase_promocional']?></td>
        <td><?php //echo $row['descripcion']?></td>
        <td><?php //echo $row['colores']?></td>
-->
        <td><?php echo "$".number_format ($row['precio'])?></td>
        <td><?php echo $row['stok']?></td>
        <td><?php echo $row['promocion']?></td>
        <td><?php  echo lafecha($row['fecha']); ?></td>
        <td><a href="detalle.php?id=<?php echo $row['id']?>"><i class="fa-solid fa-pen-to-square"></i> Editar producto</a></td>
		<td><form method="post" action="success.php">
			<input type="hidden" name="idElm" value="idElm">
			<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
			<input class="eliminar" type="submit" value="[ Eliminar X ]" onclick="return confirm('¿Está seguro que desea ELIMINAR PERMANENTEMENTE este producto? Esta acción no se puede revertir.')">
		</form></td>
	</tr>
<?php }?>
<?php  }else{?>
	<p class="error"> No hay resultados Productos para mostrar. </p>
<?php }?>
</tbody>
</table>
</div>
<?php } else{ ?>
<?php include('admin-menu.php'); ?>
<?php } ?>
<?php include("../main/pie.php")?>