<?php include("main/cabecera.php")?>
<?php
$max = 6;
$pag = 0;

if (isset($_GET['pag']) && $_GET['pag'] <> "") {
    $pag = $_GET['pag'];
	}
$inicio = $pag * $max;
if (isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];
    $query = "SELECT id, nombre, frase_promocional, precio, codigo FROM productos WHERE categoria LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' ORDER BY nombre DESC";
} else {
    $query = "SELECT id, nombre, frase_promocional, precio, codigo FROM productos ORDER BY nombre DESC LIMIT $inicio,$max";
}
$resource = $conn->query($query);
if (isset($_GET['total'])) {
    $total = $_GET['total'];
} else {
    $resource_total = $conn -> query("SELECT * FROM productos");
    $total = $resource_total->num_rows;
}
$total_pag = ceil($total/$max)-1;

?>

<?php include("main/menu.php");?>
<div id="pagination" class="col-full">
		<!-- PAAGINACION DE PRODUCTOS -->
	<ul class="pagination col my-3 justify-content-center">
		<!-- anterior -->
		<?php if($pag+1 >= 2){?> 
			<li class="page-item">
				<a href="index.php?pag=<?php echo $pag -1?>&total=<?php echo $total?>" class="page-link">← Anterior</a>
			</li>
		<?php }?>
		<?php if($pag == 0){?>
			<li class="page-item disabled">
				<a href="#"class="page-link disabled">← Anterior</a>
			</li>
		<?php }?>
		<!-- enumeracion de productos -->
			<li class="page-item disabled">
				<a class="page-link"><?php echo ($inicio+1)?> a <?php echo min($inicio+$max,$total)?> de <?php echo $total?></a>
			</li>
		<!-- siguiente -->
		<?php if($pag +1 <= $total_pag ){?>
			<li class="page-item next">
				<a href="index.php?pag=<?php echo $pag +1?>&total=<?php echo $total?>" class="page-link">Siguiente →</a>
			</li>
		<?php }?>
		<?php if($pag == $total_pag){?>
			<li class="page-item disabled">
				<a href="#"class="page-link disabled">Siguiente →</a>
			</li>
		<?php }?>
	</ul>
	<div id="listado_productos" class="row mb-5">
		<!-- PRODUCTO -->
		<?php if($total){?>
		<?php  while ($row = $resource->fetch_assoc()){?>
			<div class="producto">
			<a class="ver_producto" href="producto.php?id=<?php echo $row['id']?>"><img src="assets/img/<?php echo $row['codigo']?>.png" alt="imagen de producto ''rayitas''" class="img-producto ver_producto"></a>
				<h2><a class="nav-link ver_producto" href="producto.php?id=<?php echo $row['id']?>"><?php echo $row['nombre']?></a></h2>
				<span><?php echo $row['frase_promocional']?></span>
				<p><?php echo "\$" . number_format($row['precio'])?></p>
				<a href="producto.php?id=<?php echo $row['id']?>" class="btn-custom ver_producto">ver producto</a>
			</div>
		<?php }?>
		<?php  }else{?>
		<p class="error"> No hay resultados para su consulta </p>
		<?php }?>
	</div>

</div>
<?php include("main/pie.php")?>