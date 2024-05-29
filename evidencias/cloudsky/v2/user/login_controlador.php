<?php require_once('../header/conexion.php'); ?>
<?php if(!isset($_SESSION))session_start();?>
<?php
if(isset($_POST['registrarse']) && $_POST['registrarse']=="registrarse"){
	$query="INSERT INTO `clientes` (id,nombre,email,numero,pais,direccion,usuario,contrasenia) VALUES (NULL,'$_POST[nombre]','$_POST[email]','$_POST[numero]','$_POST[pais]','$_POST[direccion]','$_POST[usuario]','$_POST[contrasenia]')";
	$conn->query($query); 
	$ID=$conn->insert_id;
	$volver=($_SESSION['volver'])?$_SESSION['volver']:"index.php";
	header("Location: ".$volver);
	}
else if((isset($_POST['usuario']) && $_POST['usuario']<>"") && (isset($_POST['contrasenia']) && $_POST['contrasenia']<>"") ){
		$query="SELECT * FROM clientes WHERE 1 AND usuario='$_POST[usuario]' AND contrasenia='$_POST[contrasenia]'";
		$resource=$conn->query($query);
		if($t=$resource->num_rows){
		$row=$resource->fetch_assoc();
		$_SESSION['user_id']=$row['id'];
		$_SESSION['nombre']=$row['nombre'];
		$_SESSION['email']=$row['email'];
		$_SESSION['numero']=$row['numero'];
		$_SESSION['pais']=$row['pais'];
		$_SESSION['direccion']=$row['direccion'];

		$volver=($_SESSION['volver'])?$_SESSION['volver']:"../index.php";
	header("Location: ".$volver);
 ?>
<?php } else { ;?>
<?php include("header.php");?>
<div>
<h1>Usuario/Clave Incorrectos.</h1>
<a href="index.php">←Volver</a>
</div>
<?php } } ?>