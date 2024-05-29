<?php
$max = 6;
$pag = 0;

if (isset($_GET['pag']) && $_GET['pag'] <> "") {
    $pag = $_GET['pag'];
	}
$inicio = $pag * $max;
if (isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];
    $query = "SELECT * FROM recetas WHERE categoria LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' ORDER BY nombre DESC";
} else {
    $query = "SELECT * FROM recetas ORDER BY nombre DESC LIMIT $inicio,$max";
}
$resource = $conn->query($query);
if (isset($_GET['total'])) {
    $total = $_GET['total'];
} else {
    $resource_total = $conn -> query("SELECT * FROM recetas");
    $total = $resource_total->num_rows;
}
$total_pag = ceil($total/$max)-1;

?>

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
			<a class="ver_producto" href="producto.php?ID=<?php echo $row['ID']?>"><img src="assets/img/<?php echo $row['ID']?>.png" alt="imagen de la Receta <?php echo $row['Nombre']?>" class="img-producto ver_producto"></a>
				<h2><a class="nav-link ver_producto" href="producto.php?ID=<?php echo $row['ID']?>"><?php echo $row['Nombre']?></a></h2>

				<a href="producto.php?ID=<?php echo $row['ID']?>" class="btn-custom ver_producto">ver detalles</a>
			</div>
		<?php }?>
		<?php  }else{?>
		<p class="error"> No hay resultados para su consulta </p>
		<?php }?>
	</div>

</div>