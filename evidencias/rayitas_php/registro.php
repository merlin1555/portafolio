<?php include("main/cabecera.php")?>
<?php include("main/menu.php")?>
<form class="container-fluid col-full" id="registro" name="registro" method="post" action="login_controlador.php">
	<!-- NOMBRE -->
	<div class="row mb-4">
		<div class="col-sm-12 col-lg-4">
		<label for="nombre" class="form-label">Nombre </label>
		</div>
		<div class="col-sm-12 col-lg-6">
		<input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre Completo" required />
		<span class="obligatorio"><i>* Campo Obligatorio</i></span>
		</div>
	</div>
	<!-- EMAIL -->
	<div class="row mb-4">
		<div class="col-sm-12 col-lg-4">
		<label for="email" class="form-label">Email</label>
		</div>
		<div class="col-sm-12 col-lg-6">
		<input name="email" type="text" class="form-control" id="email" placeholder="Ingrese su Email" required />
		<span class="obligatorio"><i>* Campo Obligatorio</i></span>
		</div>
	</div>
	<!-- NUMERO -->
	<div class="row mb-4">
		<div class="col-sm-12 col-lg-4">
		<label for="numero">Teléfono/Celular</label>
		</div>
		<div class="col-sm-12 col-lg-6">
		<input name="numero" type="numero" class="form-control" id="numero" placeholder="Ingrese su teléfono fijo o celular" required />
		<span class="obligatorio"><i>* Campo Obligatorio</i></span>
		</div>
	</div>
	<!-- PAIS -->
	<div class="row mb-4">
		<div class="col-sm-12 col-lg-4">
			<label for="pais">Seleccione su País</label>
		</div>
		<div class="col-sm-12 col-lg-6">
			<select style="width:100%" name="pais" type="text" id="pais" required />
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
		</div>
	</div>
	<!-- DIRECCION -->
	<div class="row mb-4">
		<div class="col-sm-12 col-lg-4">
		<label for="direccion">Dirección</label>
		</div>
		<div class="col-sm-12 col-lg-6">
		<textarea name="direccion" rows="4" cols="50" type="text" class="form-control" id="direccion" placeholder="Ingrese la dirección de su Domicilio" required ></textarea>
		<span class="obligatorio"><i>* Campo Obligatorio</i></span>
		</div>
	</div>
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
		<div class="col-sm-12 col-lg-6">
			<input name="lvl" type="hidden" id="lvl" value="0" />
			<input type="submit" name="registrarse" id="registrarse" value="registrarse" class="btn-custom"/>
		</div>
	</div>
	
</form>
<?php include("main/pie.php")?>