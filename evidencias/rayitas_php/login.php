<?php include("main/cabecera.php")?>
<?php include("main/menu.php")?>
<form class="container-fluid col-full" method="post" action="login_controlador.php">
	<h1>Inicio de Sesión :</h1>
	<!-- USUARIO -->
	<div class="row mb-4">
		<div class="col-sm-12 col-lg-4">
		<label for="usuario" class="form-label">Nombre de Usuario</label>
		</div>
		<div class="col-sm-12 col-lg-6">
		<input name="usuario" type="text" class="form-control" id="usuario" placeholder="Ingrese su nombre de usuario" required />
		<span class="obligatorio"><i>* Campo Obligatorio</i></span>
		</div>
	</div>
	<!-- CONTRASEÑA -->
	<div class="row mb-4">
		<div class="col-sm-12 col-lg-4">
		<label for="contrasenia" class="form-label">Contraseña</label>
		</div>
		<div class="col-sm-12 col-lg-6">
		<input name="contrasenia" type="text" class="form-control" id="contrasenia" placeholder="Ingrese su contraseña" required />
		<span class="obligatorio"><i>* Campo Obligatorio</i></span>
		</div>
	</div>
	<!-- SUBMIT -->
	<div class="row mb-4">
		<div class="col-sm-12 col-lg-4">
		</div>
		<div class="col-sm-12 col-lg-6 fs-6">
			<div class="d-flex"><span class="me-2">No tiene cuenta?</span><a class="nav-link" href="registro.php"> Regístrese Aquí</a></div>
			<input type="submit" name="login" id="login" value="login" class="btn-custom"/>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-sm-12 col-lg-4">
		</div>
		<div class="col-sm-12 col-lg-6 d-flex">
			
		</div>
	</div>
	
	
</form>
<?php include("main/pie.php")?>