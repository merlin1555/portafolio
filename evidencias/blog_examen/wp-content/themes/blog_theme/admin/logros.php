<?php

include_once('wp-load.php');
global $wpdb;

$action = isset($_POST['action']) ? $_POST['action'] : '';

try {
    switch ($action) {
        case 'obtener_usuario_actual':
            obtenerUsuarioActual();
            break;

        case 'obtener_logros_usuario':
            obtenerLogrosUsuario();
            break;

        case 'obtener_todos_los_logros':
            obtenerTodosLosLogros();
            break;

        default:
            throw new Exception('Acción no válida');
    }
} catch (Exception $e) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => $e->getMessage()]);
}

function obtenerUsuarioActual() {
    $user = wp_get_current_user();
    $user_id = $user->ID;

    header('Content-Type: application/json');
    echo json_encode(['id' => $user_id]);
}

function obtenerLogrosUsuario() {
    if (isset($_POST['userId'])) {
        $user_id = intval($_POST['userId']);

        global $wpdb;

        // Validar y escapar los datos antes de la consulta
        $user_id = $wpdb->prepare('%d', $user_id);

        // Realizar la consulta a la base de datos
        $results = $wpdb->get_results($wpdb->prepare("SELECT * FROM sp_usuario_logros WHERE usuario_id = %d", $user_id), ARRAY_A);

        header('Content-Type: application/json');
        echo json_encode($results);
    } else {
        throw new Exception('Parámetros incorrectos');
    }
}

function obtenerTodosLosLogros() {
    global $wpdb;

    // Realizar la consulta a la base de datos
    $results = $wpdb->get_results("SELECT * FROM sp_logros", ARRAY_A);

    header('Content-Type: application/json');
    echo json_encode($results);
}
?>
