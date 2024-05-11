// obtener_usuario_actual.php
$user = wp_get_current_user();
$user_id = $user->ID;

header('Content-Type: application/json');
echo json_encode(['id' => $user_id]);