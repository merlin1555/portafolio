<form class="iniciar_sesion" method="post" action="user/login_controlador.php">
    <button class="close_button"><i class="fa-solid fa-x"></i></button>
    <h5>Inicio de Sesión :</h5><br>
    <!-- USUARIO -->
    <label for="usuario">Nombre de Usuario</label><br>
    <input name="usuario" type="text" id="usuario" placeholder="Ingrese su nombre de usuario" required /><br>
    <span class="obligatorio"><i>* Campo Obligatorio</i></span><br>
    
    <!-- CONTRASEÑA -->
    <label for="contrasenia">Contraseña</label><br>
    <input name="contrasenia" type="text" id="contrasenia" placeholder="Ingrese su contraseña" required /><br>
    <span class="obligatorio"><i>* Campo Obligatorio</i></span><br>
    
    <!-- SUBMIT -->
    <div>
        <p>No tiene cuenta?<a href="cuenta.php"> Regístrese Aquí</a></p>
    </div>
    <input type="submit" name="login" id="login" value="login" />
</form>
