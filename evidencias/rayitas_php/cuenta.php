<?php require_once ('main/conexion.php');

if(!isset($_SESSION))session_start();

if(isset($_POST['registrarse']) && $_POST['registrarse']=="registrarse"){
	$query="INSERT INTO `clientes` (id,lvl,nombre,email,numero,pais,direccion,usuario,contrasenia) VALUES (NULL,'$_POST[lvl]','$_POST[nombre]','$_POST[email]','$_POST[numero]','$_POST[pais]','$_POST[direccion]','$_POST[usuario]','$_POST[contrasenia]')";
	$conn->query($query); 
	$ID=$conn->insert_id;
	}
else if((isset($_POST['usuario']) && $_POST['usuario']<>"") && (isset($_POST['contrasenia']) && $_POST['contrasenia']<>"") ){
		$query="SELECT * FROM clientes WHERE 1 AND usuario='$_POST[usuario]' AND contrasenia='$_POST[contrasenia]'";
		$resource=$conn->query($query);
		if($t=$resource->num_rows){
		$row=$resource->fetch_assoc();
		$_SESSION['user_id']=$row['id'];
		$_SESSION['lvl']=$row['lvl'];
		$_SESSION['nombre']=$row['nombre'];
		$_SESSION['email']=$row['email'];
		$_SESSION['numero']=$row['numero'];
		$_SESSION['pais']=$row['pais'];
		$_SESSION['direccion']=$row['direccion'];
}}
else{
	$ID=$_SESSION['user_id'];
	//$ID=$_SESSION['user_id'];
	//$ID=1;
}
$query="SELECT * FROM `clientes` WHERE `id` LIKE $ID";
//$query=" SELECT * FROM compras WHERE 1 AND cliente='$_SESSION[user_id]' ORDER BY fecha DESC";
$resource = $conn->query($query);
$row = $resource->fetch_assoc();	

include("main/cabecera.php");
include("main/menu.php"); ?>
<div class="col-full">
	<h1>Mi cuenta</h1>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table table-hover table-dark table-striped-columns">
	<thead>
	<tr>
	<th>Mis Datos</th>
	<th>&nbsp;</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td>Nombre</td>
			<td><?php echo $row['nombre']?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $row['email']?></td>
		</tr>
		<tr>
			<td>Teléfono/Celular</td>
			<td><?php echo $row['numero']?></td>
		</tr>
		<tr>
			<td>País</td>
			<td><?php echo $row['pais']?></td>
		</tr>
		<tr>
			<td>Dirección</td>
			<td><?php echo $row['direccion']?></td>
		</tr>
		<tr>
			<td>Nombre de Usuario</td>
			<td><?php echo $row['usuario']?></td>
		</tr>
		<tr>
			<td>Contraseña</td>
			<td><?php echo $row['contrasenia']?></td>
		</tr>
	</tbody>
	</table>
</div>
<?php include("main/pie.php")?>