<?php
$max = 6;
// Consulta para obtener las recetas de la categoria 'Postre'
$query = "SELECT * FROM recetas WHERE categoria LIKE 'Almuerzo' ORDER BY fecha DESC LIMIT $max";
$resource = $conn->query($query); ?>
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