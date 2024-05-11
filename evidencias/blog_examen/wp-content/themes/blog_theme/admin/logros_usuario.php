
// obtener_logros_usuario.php
if (isset($_POST['userId'])) {
    $user_id = intval($_POST['userId']);

    // Realizar la consulta a la base de datos
    $results = $wpdb->get_results("SELECT * FROM sp_usuario_logros WHERE usuario_id = $user_id", ARRAY_A);

    header('Content-Type: application/json');
    echo json_encode($results);
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Parámetros incorrectos']);
}
