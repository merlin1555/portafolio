<form id="registro" name="registro" method="post" action="./login_controlador.php">
	<h2>¡Regístrese para guardar sus recetas favoritas!</h2>
    <!-- NOMBRE -->
    <label for="nombre">Nombre </label>
    <input name="nombre" type="text" id="nombre" placeholder="Ingrese su Nombre Completo" required />
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>

    <!-- EMAIL -->
    <label for="email">Email</label>
    <input name="email" type="text" id="email" placeholder="Ingrese su Email" required />
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