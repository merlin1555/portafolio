<?php 
if(!isset($_SESSION))session_start();

if (isset($_SESSION['user_id'])){
	$ID=$_SESSION['user_id'];
	$query = "SELECT `lvl` FROM `clientes` WHERE `id` LIKE $ID";
	$lvl = $conn->query($query);
	$datos_de_usuario = $lvl->fetch_assoc();
}
?>
<header>
    <div class="header_top">
        <ul class="contacto">
            <li><i class="fa-solid fa-phone"></i>Mesa Central (+56 2) 1111 1111</li>
            <li><i class="fa-solid fa-phone"></i>Mesa Central (+56 2) 1111 1111</li>
        </ul>
        <ul class="links">
            <li><a href="#footer">Contacto</a></li>
            <li>|</li>
            <li><a href="index.php#alianzas">Novedades</a></li>
            <li>|</li>
            <li><a href="quienes_somos.php">Quiénes somos</a></li>
        </ul>
        <ul class="usuario">
            <?php if (isset($_SESSION['user_id'])){?>
                <li><button><a href="cuenta.php">Mi Cuenta<i class="fa-solid fa-user"></i></a></button></li>
                <li><button><a href="user/logout.php" onclick="return confirm('¿Desea cerrar la sesión actual?')">Cerrar Sesión</a><i class="fa-solid fa-right-from-bracket"></i></button></li>
			<?php }else{ ?>
                <li><button id="iniciar_sesion">Iniciar sesión<i class="fa-solid fa-user"></i></button></li>
                <li><button id="registrarse"><a href="cuenta.php">Registrate</a><i class="fa-solid fa-user"></i></button></li>
                <?php include("modals/iniciar_sesion.php"); ?>
            <?php }?>
        </ul>
        <ul class="rrss">
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
        </ul>
    </div>
    <nav class="navbar navbar-expand-lg menu_principal">
        <div class="container-fluid">
            <a class="navbar-brand site_logo" href="#">CloudSky</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav menu_navbar">
                    <a class="nav-link" href="index.php">Inicio</a>
                    <a class="nav-link" href="index.php#destinos">Paquetes</a>
                    <a class="nav-link" href="#">Cruceros</a>
                    <a class="nav-link" href="asistencia_viaje.php">Asistencia <br>en viaje</a>
                    <a class="nav-link" href="#">Viajes para <br>empresas</a>
                    <a class="nav-link" href="#">Reuniones <br>y eventos</a>
                    <a class="nav-link" href="#reviews">Viajes de <br>Experiencias</a>
                </div>
            </div>
        </div>
    </nav>
    <!--<form class="d-flex" method="GET" action="">
		<input class="form-control me-2" type="text" name="busqueda" id="busqueda">
		<button class="btn btn-custom" type="submit">Buscar</button>
		</form>-->
</header>