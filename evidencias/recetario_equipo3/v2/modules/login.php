<form method="post" action="login_controlador.php">
    <h2>Inicie Sesión :</h2>
    <!-- USUARIO -->
    <label for="usuario">Nombre de Usuario</label>
    <input name="usuario" type="text" id="usuario" placeholder="Ingrese su nombre de usuario" required />
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>
    
    <!-- CONTRASEÑA -->
    <label for="contrasenia">Contraseña</label>
    <input name="contrasenia" type="text" id="contrasenia" placeholder="Ingrese su contraseña" required />
    <span class="obligatorio"><i>* Campo Obligatorio</i></span>
    
    <input type="submit" name="login" id="login" value="login" />
</form>