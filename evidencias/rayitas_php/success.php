<?php 
if(!isset($_SESSION))session_start();
include("main/cabecera.php");
include("main/menu.php");

if(isset($_POST['idElm']) && $_POST['idElm']=="idElm"){
  $ID = $_POST['ID'];
  $query = "DELETE FROM `compras` WHERE `id` LIKE '$ID'";
  $result = $conn->query($query); 
?>
<div class="col-full">
	<h1>¡Producto Eliminado Correctamente!</h1>
	<a href="boleta.php">← Volver al Carrito</a>
</div>
<?php }
else if(isset($_POST['comprar'])) {
/*
$ID=$_SESSION['user_id'];
$query="SELECT * FROM `clientes` WHERE `id` LIKE '$ID'";
$resource=$conn->query($query);
$row=$resource->fetch_assoc();
*/
//=============================================================================
//	CONSTRUIR EL CORREO :
//=============================================================================
//	DESTINATARIO :
$destinatario="orellanallanquileo@gmail.com";
//=============================================================================
//	ASUNUTO :
$asunto="Venta de rayitas desde el sitio WEB";
//=============================================================================
//	CUERPO :
/*
$cuerpo="El usuario ".$row['nombre']." ha realizado una compra en el sitio web:
Nombre: ".$row['nombre']."
Email: ".$row['email']."
Teléfono: ".$row['numero']."
Dirección de entrega: ".$row['direccion']."
Pais: ".$row['pais']."
_______________________________________________
";
*/
$cuerpo="Texto de prueba";
//============================================================================= 
//	CABECERA :
//$cabecera = "From: orellanallanquileo@gmail.com";
//=============================================================================
//	ENVIAR EL CORREO :
mail("$destinatario", "$asunto", "$cuerpo"/*, "$cabecera"*/);
//=============================================================================
//=============================================================================
?>
<div class="col-full">
	<h1 class="mb-3 text-warning">¡Compra Realizada con Éxito!</h1>
	<a href="index.php">← Volver a la tienda</a>
</div>
<?php } else{ ?>
<div class="col-full">
	<h1>¡Ups! Algo salió mal</h1>
	<a href="boleta.php">← Volver al Carrito</a>
</div>
<?php }?>
<?php include("main/pie.php")?>