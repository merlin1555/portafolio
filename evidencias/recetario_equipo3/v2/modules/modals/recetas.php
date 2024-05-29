<?php
$max = 12;
$pag = 0;

if (isset($_GET['pag']) && $_GET['pag'] <> "") {
    $pag = $_GET['pag'];
	}
$inicio = $pag * $max;
if (isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];
    $query = "SELECT id, nombre, dificultad, fecha, codigo FROM recetas WHERE categoria LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' ORDER BY nombre DESC";
} else {
    $query = "SELECT id, nombre, dificultad, fecha, codigo FROM recetas ORDER BY nombre DESC LIMIT $inicio,$max";
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
<div class="listado_recetas">
    <!-- RECETAS -->
    <?php if ($resource->num_rows > 0) { ?>
        <?php while ($row = $resource->fetch_assoc()) { ?>
            <div class="receta_card">
                <article>
                    <div class="contenedor_receta_card_img">
                        <img src="assets/img/recetas/<?php echo htmlspecialchars($row['codigo']); ?>.png" alt="foto de '<?php echo htmlspecialchars($row['nombre']); ?>'">
                        <div class="ver_receta">
                            <div class="contenedor_ver_receta">
                                <a href="receta.php?id=<?php echo htmlspecialchars($row['id']); ?>">ver receta</a>
                            </div>
                        </div>
                    </div>
                    <h3><a href="receta.php?id=<?php echo $row['id']?>"><?php echo $row['nombre']?></a></h3>    
                </article>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="error">No hay resultados para su consulta</p>
    <?php } ?>
</div>
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
