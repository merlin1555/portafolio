<?php if(!isset($_SESSION))session_start();
if(!$_SESSION['user_id']){
$_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: login.php"); }

include("main/cabecera.php");
include("main/menu.php"); ?>

<?php
if(isset($_POST['comprar'])) {
/*
$query="SELECT * FROM clientes WHERE 1 AND id='$_SESSION[user_id]'";
$resource=$conn->query($query);
$row=$resource->fetch_assoc();

$cuerpo="El usuario ".$row['nombre']." ha realizado una compra en el sitio web:
Nombre: ".$row['nombre']."
Email: ".$row['email']."
Teléfono: ".$row['numero']."
Dirección de entrega: ".$row['direccion']."
Pais: ".$row['pais']."
_______________________________________________
";

$cabecera = "From: ".$row['nombre']."<".$row['email'].">\n";
$cabecera .= "Reply-To: ".$row['email']."\n";
$cabecera .= "Cc: orellanallanquileo@gmail.com\n";

//n.orellana@duocuc.cl
//orellanallanquileo@gmail.com

$destinatario="n.orellana@duocuc.cl";
$asunto="Venta de rayitas desde el sitio WEB";
mail("$destinatario", "$asunto", "$cuerpo", "$cabecera");
*/
$query=" SELECT * FROM compras WHERE 1 AND cliente='$_SESSION[user_id]' ORDER BY fecha DESC";
$resource = $conn->query($query); 
$total = $resource->num_rows;
$descuento = 0;
$subtotal = 0;
?>
<div class="col-full">
<h1 class="mb-3 text-warning">¡Compra Realizada con Éxito!</h1>
<a href="index.php">← Volver a la tienda</a>
<h3 class="mt-5">Detalles de la compra:</h3>
<table style="color:white" width="100%" border="0" cellspacing="0" cellpadding="2" class="table table-dark table-bordered">
<thead>
<tr>
<th>Producto</th>
<th>Precio</th>
<th>Cantidad</th>
<th>Total</th>
</tr>
</thead>
<tbody>
<?php  while ($row = $resource->fetch_assoc()){?>
	<tr>
		<td><?php echo $row['nombre']?></td>
		<td><?php echo "\$" . number_format ($precio=$row['precio']);?></td>
		<td><?php echo $cantidad=$row['cantidad']?></td>
		<td><?php echo "\$" . number_format ($sub=$precio*$cantidad); $subtotal+=$sub?></td>
	</tr>
<?php }?>
<!-- ! -->
<!-- -- Envío -- -->
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Envío</td>
<td><?php $envio=5000; echo "\$" . number_format ($envio);?></td>
</tr>
<!-- -- fin Envío -- -->
<!-- ! -->
<!-- -- Descuento -- -->
<?php if ($subtotal >= 50000){ ?>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Descuento (10%)</td>
<td><?php echo "\$-".number_format ($descuento=($subtotal+$envio)*0.10);?></td>
</tr>
<?php } ?>
<!-- -- fin Descuento -- -->
<!-- ! -->
<!-- -- Subtotal -- -->
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Subtotal</td>
<td><?php echo "\$" . number_format ($subb=$subtotal+$envio-$descuento);?></td>
</tr>
<!-- -- fin Subtotal -- -->
<!-- ! -->
<!-- -- Iva -- -->
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>IVA (19%)</td>
<td><?php echo "\$" . number_format ($iva=$subb*0.19);?></td>
</tr>
<!-- -- fin Iva -- -->
<!-- ! -->
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>TOTAL</td>
<td><?php echo "\$" . number_format ($total=$iva+$subb);?></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<a class="my-5" href="index.php">← Volver a la tienda</a>
</div>
<?php } else{?>
<div class="col-full">
	<h1>¡Ups! Algo salió mal</h1>
	<a class="my-5" href="index.php">← Volver a la tienda</a>
</div>
<?php }?>
<?php include("main/pie.php")?>