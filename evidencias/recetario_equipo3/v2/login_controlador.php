<?php require_once('modules/conexion.php'); ?>
<?php if(!isset($_SESSION))session_start();?>
<?php
if(isset($_POST['registrarse']) && $_POST['registrarse']=="registrarse"){
	$query="INSERT INTO `usuarios` (id,lvl,nombre,email,usuario,contrasenia) VALUES (NULL,'$_POST[lvl]','$_POST[nombre]','$_POST[email]','$_POST[usuario]','$_POST[contrasenia]')";
	$conn->query($query); 
	$ID=$conn->insert_id;
	$volver=($_SESSION['volver'])?$_SESSION['volver']:"index.php";
	header("Location: ".$volver);
	}
else if((isset($_POST['usuario']) && $_POST['usuario']<>"") && (isset($_POST['contrasenia']) && $_POST['contrasenia']<>"") ){
		$query="SELECT * FROM usuarios WHERE 1 AND usuario='$_POST[usuario]' AND contrasenia='$_POST[contrasenia]'";
		$resource=$conn->query($query);
		if($t=$resource->num_rows){
		$row=$resource->fetch_assoc();
		$_SESSION['user_id']=$row['id'];
		$_SESSION['nombre']=$row['nombre'];
		$_SESSION['email']=$row['email'];

		$volver=($_SESSION['volver'])?$_SESSION['volver']:"cuenta.php";
	header("Location: ".$volver);
 ?>
<?php } else { ?>
<?php require_once('modules/header.php'); ?>
<div class="col-full">
<h1>Usuario/Clave Incorrectos.</h1>
<a href="login.php">←Volver</a>
</div>
<?php require_once('modules/footer.php'); ?>
<?php } } ?>