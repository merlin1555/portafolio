<?php 
if(!isset($_SESSION))session_start();

if(!$_SESSION['user_id']){
$_SESSION['volver']=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
header("Location: login.php");
}
include("main/cabecera.php");
include("main/menu.php");

if(isset($_POST['comprar']) && $_POST['comprar']=="comprar"){
	$query="INSERT INTO compras (id,cliente,codigo,nombre, precio,cantidad,fecha) VALUES (NULL,'$_POST[cliente]','$_POST[codigo]','$_POST[nombre]','$_POST[precio]', '$_POST[cantidad]',NOW())";
	$conn->query($query); 
	$ID=$conn->insert_id;
	}

	$query=" SELECT * FROM compras WHERE 1 AND cliente='$_SESSION[user_id]' ORDER BY fecha DESC";
	$resource = $conn->query($query); 
	$total = $resource->num_rows;
	$descuento = 0;
    $subtotal = 0;
	?>
<div class="col-full">
<a class="mb-3" href="index.php">← Volver a la tienda</a>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table table-hover table-dark table-striped mt-3">
<thead>
<tr class="table-dark">
<th>Producto</th>
<th>Precio</th>
<th>Cantidad</th>
<th>Total</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<?php  while ($row = $resource->fetch_assoc()){?>
	<tr>
		<td><?php echo $row['nombre']?></td>
		<td><?php echo "\$" . number_format ($precio=$row['precio']);?></td>
		<td><?php echo $cantidad=$row['cantidad']?></td>
		<td><?php echo "\$" . number_format ($sub=$precio*$cantidad); $subtotal+=$sub?></td>
		<td style="width: 10em;">
			<form method="post" action="success.php">
				<input type="hidden" name="idElm" value="idElm">
				<input type="hidden" name="ID" value="<?php echo $row['id'] ?>">
				<input class="eliminar" type="submit" value="[ Eliminar X ]" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede revertir.')">
			</form>
		</td>
	</tr>
<?php }?>
<!-- ! -->
<!-- -- Envío -- -->
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Envío</td>
<td><?php $envio=5000; echo "\$" . number_format ($envio);?></td>
<td>&nbsp;</td>
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
<td>&nbsp;</td>
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
<td>&nbsp;</td>
</tr>
<!-- -- fin Subtotal -- -->
<!-- ! -->
<!-- -- Iva -- -->
<tr class="text-info">
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>IVA (19%)</td>
<td><?php echo "\$" . number_format ($iva=$subb*0.19);?></td>
<td>&nbsp;</td>
</tr>
<!-- -- fin Iva -- -->
<!-- ! -->
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>TOTAL</td>
<td><?php echo "\$" . number_format ($total=$iva+$subb);?></td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
<form method="post" action="success.php" class="text-end me-5">
	<input type="submit" name="comprar" id="comprar" value="Comprar"/>
</form>
</div>
<?php include("main/pie.php")?>