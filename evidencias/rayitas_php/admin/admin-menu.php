<?php 
if(!isset($_SESSION))session_start();

if (isset($_SESSION['user_id'])){
	$ID=$_SESSION['user_id'];
	$query = "SELECT `lvl` FROM `clientes` WHERE `id` LIKE $ID";
	$lvl = $conn->query($query);
	$datos_de_usuario = $lvl->fetch_assoc();	
}
?>
<nav class="navbar navbar-expand-lg mb-5">
	<div class="container-fluid col-full nav-custom">
		<a class="navbar-brand" href="../index.php">Home</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="../index.php">Tienda</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../boleta.php">Boleta</a>
				</li>
				<li class="nav-item">
					<?php if (isset($_SESSION['user_id'])){?>
					<a class="nav-link" href="../cuenta.php">Mi Cuenta</a>
					<?php }else{ ?>
					<a class="nav-link" href="../registro.php">Registrarse</a>
					<?php }?>
				</li>
				<li class="nav-item">
					<?php if (isset($_SESSION['user_id'])){?>
					<a class="nav-link" href="../logout.php" onclick="return confirm('¿Desea cerrar la sesión actual?')">Salir</a>
					<?php }else{ ?>
					<a class="nav-link" href="../login.php">Inciar Sesion</a>
					<?php }?>
				</li>
				<?php if(($datos_de_usuario['lvl'] ?? null) == 99) { ?>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Editar Productos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="agregar.php">Agregar Productos</a>
				</li>
				<?php } else{ /*nada*/ } ?>
			</ul>
		<form class="d-flex" method="GET" action="">
		<?php if(($datos_de_usuario['lvl'] ?? null) == 99) { ?>
		<input class="form-control me-2" type="text" name="busqueda" id="busqueda">
		<button class="btn btn-custom" type="submit">Buscar</button>
		<?php } else{ /*nada*/ } ?>
		</form>
		</div>
	</div>
</nav>