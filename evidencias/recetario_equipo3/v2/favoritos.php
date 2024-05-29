<?php 
include_once("modules/conexion.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    $_SESSION['volver'] = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
    header("Location: login.php");
    exit();
}

if (isset($_POST['favorito']) && $_POST['favorito'] == "favorito") {
    $usuario = $conn->real_escape_string($_POST['usuario']);
    $codigo = $conn->real_escape_string($_POST['codigo']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $query = "INSERT INTO favoritos (id, usuario, codigo, nombre, fecha) VALUES (NULL, '$usuario', '$codigo', '$nombre', NOW())";
    if ($conn->query($query)) {
        $ID = $conn->insert_id;
    } else {
        // Manejar el error si la consulta falla
        echo "Error: " . $conn->error;
    }
}

$query = "SELECT * FROM favoritos WHERE usuario='" . $conn->real_escape_string($_SESSION['user_id']) . "' ORDER BY fecha DESC";
$resource = $conn->query($query);

if ($resource) {
    $total = $resource->num_rows;
} else {
    // Manejar el error si la consulta falla
    echo "Error: " . $conn->error;
    $total = 0;
}

$descuento = 0;
$subtotal = 0;
?>

<?php include_once("modules/header.php"); ?>
<main>
<?php if (isset($_SESSION['user_id'])) { ?>
    <?php while ($row = $resource->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
            <td><?php echo "$" . number_format($precio = $row['precio']); ?></td>
            <td><?php echo $cantidad = $row['cantidad']; ?></td>
            <td><?php echo "$" . number_format($sub = $precio * $cantidad); $subtotal += $sub; ?></td>
            <td style="width: 10em;">
                <form method="post" action="success.php">
                    <input type="hidden" name="idElm" value="idElm">
                    <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
                    <input class="eliminar" type="submit" value="[ Eliminar X ]" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede revertir.')">
                </form>
            </td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <h1>Inicie Sesión para guardar recetas en favoritos.</h1>
<?php } ?>
</main>
<?php include_once("modules/footer.php"); ?>
