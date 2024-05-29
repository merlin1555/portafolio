<?php include("header/header.php")?>
<?php 
if(!isset($_SESSION))session_start();

if (isset($_SESSION['user_id'])){
	$ID=$_SESSION['user_id'];
	$query = "SELECT `lvl` FROM `clientes` WHERE `id` LIKE $ID";
	$lvl = $conn->query($query);
	$datos_de_usuario = $lvl->fetch_assoc();
}
?>

<section  id="crear_cuenta">
<?php if (isset($_SESSION['user_id'])){
$ID=$_SESSION['user_id'];
$query="SELECT * FROM `clientes` WHERE `id` LIKE $ID";
//$query=" SELECT * FROM compras WHERE 1 AND cliente='$_SESSION[user_id]' ORDER BY fecha DESC";
$resource = $conn->query($query);
$row = $resource->fetch_assoc();?>
<div id="mi_cuenta">
	<h1>Mi cuenta</h1>
	
	<table width="100%" cellspacing="0" cellpadding="2" class="table table-hover table-striped-columns">
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
<?php }else{ ?>
<form id="registro" name="registro" method="post" action="login_controlador.php">
	<h2>Registrate para comenzar a viajar</h2>
    <!-- NOMBRE -->
    <label for="nombre">Nombre </label>
    <input name="nombre" type="text" id="nombre" placeholder="Ingrese su Nombre Completo" required />
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>
    
    <!-- EMAIL -->
    <label for="email">Email</label>
    <input name="email" type="text" id="email" placeholder="Ingrese su Email" required />
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>
    
    <!-- NUMERO -->
    <label for="numero">Teléfono/Celular</label>
    <input name="numero" type="numero" id="numero" placeholder="Ingrese su teléfono fijo o celular" required />
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>
    
    <!-- PAIS -->
    <label for="pais">Seleccione su País</label>
    <select name="pais" id="pais" required>
        <option value="1">Chile</option>
        <option value="2">España</option>
        <option value="3">México</option>
        <option value="4">Guatemala</option>
        <option value="5">Honduras</option>
        <option value="7">El Salvador</option>
        <option value="8">Venezuela</option>
        <option value="9">Colombia</option>
        <option value="10">Cuba</option>
        <option value="11">Bolivia</option>
        <option value="13">Perú</option>
        <option value="14">Ecuador</option>
        <option value="15">Paraguay</option>
        <option value="16">Uruguay</option>
        <option value="17">Argentina</option>
    </select>
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>
    
    <!-- DIRECCION -->
    <label for="direccion">Dirección</label>
    <textarea name="direccion" rows="4" id="direccion" placeholder="Ingrese la dirección de su Domicilio" required></textarea>
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>
    
    <!-- USUARIO -->
    <label for="usuario">Nombre de Usuario</label>
    <input name="usuario" type="text" id="usuario" placeholder="Ingrese su nombre de usuario" required />
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>
    
    <!-- CONTRASEÑA -->
    <label for="contrasenia">Contraseña</label>
    <input name="contrasenia" type="text" id="contrasenia" placeholder="Ingrese su contraseña" required />
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>
    
    <!-- SUBMIT -->
    <input name="lvl" type="hidden" id="lvl" value="0" />
    <input type="submit" name="registrarse" id="registrarse" value="registrarse" />
</form>
</section>
<?php }?>
<?php include("footer/footer.php")?>
