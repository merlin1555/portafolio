<?php
$ID=$_SESSION['user_id'];
$query="SELECT * FROM `usuarios` WHERE `id` LIKE $ID";
//$query=" SELECT * FROM compras WHERE 1 AND cliente='$_SESSION[user_id]' ORDER BY fecha DESC";
$resource = $conn->query($query);
$row = $resource->fetch_assoc(); ?>
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
			<td>Nombre de Usuario</td>
			<td><?php echo $row['usuario']?></td>
		</tr>
		<tr>
			<td>Contraseña</td>
			<td><?php echo $row['contrasenia']?></td>
		</tr>
        <?php if(($datos_de_usuario['lvl'] ?? null) == 99) { ?>
        <tr>
			<td>Nivel de Cuenta</td>
			<td>
                <?php if(($datos_de_usuario['lvl'] ?? null) == 99) { ?>
                    Admin 
                <?php }elseif(($datos_de_usuario['lvl'] ?? null) == 2) { ?>
                    Editor
                <?php }elseif(($datos_de_usuario['lvl'] ?? null) == 1) { ?>
                    Colaborador
                <?php } else{ /*nada*/ } ?> (<?php echo $row['lvl'];?>)
            </td>
		</tr>
        <?php } else{ /*nada*/ } ?>
	</tbody>
	</table>
    <a class="nav-link" href="modules/logout.php" onclick="return confirm('¿Desea cerrar la sesión actual?')">Cerrar Sesion</a>
</div>