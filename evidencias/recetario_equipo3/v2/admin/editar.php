<?php
require_once("../modules/conexion.php");
if (!isset($_SESSION)) session_start();

if (isset($_SESSION['user_id'])) {
    $ID = $conn->real_escape_string($_SESSION['user_id']);
    $query = "SELECT `lvl`, `nombre` FROM `usuarios` WHERE `id` = '$ID'";
    $result = $conn->query($query);
    if ($result) {
        $datos_de_usuario = $result->fetch_assoc();
    }
}
require_once("header.php");
$max = 10;
$pag = 0;
if (isset($_GET['pag']) && $_GET['pag'] !== "") {
    $pag = $_GET['pag'];
}
$inicio = $pag * $max;

if (isset($_GET['busqueda'])) {
    $busqueda = $conn->real_escape_string($_GET['busqueda']);
    $query = "SELECT * FROM recetas WHERE categoria LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' ORDER BY nombre DESC";
} else {
    $query = "SELECT * FROM recetas ORDER BY id ASC";
}

$resource = $conn->query($query);

if (isset($_GET['total'])) {
    $total = $_GET['total'];
} else {
    $resource_total = $conn->query("SELECT * FROM recetas ORDER BY id DESC");
    $total = $resource_total->num_rows;
}

$total_pag = ceil($total / $max) - 1;
?>
<main>
    <?php if (($datos_de_usuario['lvl'] ?? null) == 99) { ?>
        <div>
            <h1>Recetas del Recetario Indispensable :</h1>
            <table class="recetas">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>img</th>
                        <th>Codigo</th>
                        <th>Receta</th>
                        <th>Categoría</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($total) { ?>
                    <?php while ($row = $resource->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><img src="../assets/img/recetas/<?php echo $row['codigo']?>.png" alt="foto de ''<?php echo $row['nombre']?>''"></td>
                            <td><?php echo $row['codigo'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['categoria'] ?></td>
                            <th>&nbsp;</th>
                            <td><a href="detalle.php?id=<?php echo $row['id'] ?>">Editar producto</a></td>
                            <td>
                                <form method="post" action="success.php">
                                    <input type="hidden" name="idElm" value="idElm">
                                    <input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
                                    <input type="submit" value="[ Eliminar X ]" onclick="return confirm('¿Está seguro que desea ELIMINAR PERMANENTEMENTE este producto? Esta acción no se puede revertir.')">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <p>No hay resultados para mostrar.</p>
                <?php } ?>
                </tbody>
            </table>
            <button><a href="agregar.php">+ Agregar Nueva Receta</a></button>
        </div>
    <?php } else { ?>

    <?php } ?>
</main>
<?php include("../modules/footer.php")?>