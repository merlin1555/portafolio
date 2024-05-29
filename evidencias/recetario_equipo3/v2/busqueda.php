<?php include_once("modules/header.php");
$max = 12;
$pag = 0;

if (isset($_GET['pag']) && $_GET['pag'] <> "") {
    $pag = $_GET['pag'];
}
$inicio = $pag * $max;
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

if ($busqueda != '') {
    $query = "SELECT id, nombre, fecha, codigo FROM recetas WHERE categoria LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' ORDER BY nombre DESC LIMIT $inicio, $max";
    $count_query = "SELECT COUNT(*) as total FROM recetas WHERE categoria LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%'";
} else {
    //$query = "SELECT id, nombre, fecha, codigo FROM recetas ORDER BY nombre DESC LIMIT $inicio,$max";
    //$count_query = "SELECT COUNT(*) as total FROM recetas";
}

$resource = $conn->query($query);

if (isset($_GET['total'])) {
    $total = $_GET['total'];
} else {
    $resource_total = $conn->query($count_query);
    $total_row = $resource_total->fetch_assoc();
    $total = $total_row['total'];
}

$total_pag = ceil($total / $max) - 1;
?>
<main id="busqueda">
    <?php include("modules/buscador.php");?>
    <div class="titulo_busqueda">
        <h1>Resultados de la búsqueda para: "<span><?php echo htmlspecialchars($busqueda); ?></span>".</h1>
    </div>
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
            <h2>No hay nada por aquí...</h2>
        <?php } ?>
    </div>

    <!-- PAGINACION DE PRODUCTOS -->
    <?php if ($total > $max) { // Mostrar paginación solo si hay más resultados que el máximo por página ?>
        <ul class="pagination col my-3 justify-content-center">
            <!-- anterior -->
            <?php if ($pag + 1 >= 2) { ?>
                <li class="page-item">
                    <a href="index.php?pag=<?php echo $pag - 1 ?>&total=<?php echo $total ?>&busqueda=<?php echo urlencode($busqueda); ?>" class="page-link">← Anterior</a>
                </li>
            <?php } ?>
            <?php if ($pag == 0) { ?>
                <li class="page-item disabled">
                    <a href="#" class="page-link disabled">← Anterior</a>
                </li>
            <?php } ?>
            <!-- enumeracion de productos -->
            <li class="page-item disabled">
                <a class="page-link"><?php echo ($inicio + 1) ?> a <?php echo min($inicio + $max, $total) ?> de <?php echo $total ?></a>
            </li>
            <!-- siguiente -->
            <?php if ($pag + 1 <= $total_pag) { ?>
                <li class="page-item next">
                    <a href="index.php?pag=<?php echo $pag + 1 ?>&total=<?php echo $total ?>&busqueda=<?php echo urlencode($busqueda); ?>" class="page-link">Siguiente →</a>
                </li>
            <?php } ?>
            <?php if ($pag == $total_pag) { ?>
                <li class="page-item disabled">
                    <a href="#" class="page-link disabled">Siguiente →</a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</main>
<?php include_once("modules/footer.php"); ?>
