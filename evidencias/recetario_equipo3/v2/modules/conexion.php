<?php
$hostname = "localhost";
$username = "norellana_cloudsky";
$password = "norellana_cloudsky";
$database = "norellana_recetario";
$conn = new mysqli($hostname, $username, $password, $database);
if ($conn ->connect_error) {
die('Error de Conexión (' . $conn->connect_errno . ') ' . $conn->connect_error);
}//else{echo $conn ->host_info;}
?>