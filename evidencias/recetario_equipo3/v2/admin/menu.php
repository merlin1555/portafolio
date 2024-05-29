<?php 
if(!isset($_SESSION))session_start();

if (isset($_SESSION['user_id'])){
	$ID=$_SESSION['user_id'];
	$query = "SELECT `lvl` FROM `usuarios` WHERE `id` LIKE $ID";
	$lvl = $conn->query($query);
	$datos_de_usuario = $lvl->fetch_assoc();}?>
<header>
    <a class="navbar-brand site_logo fade-in-section" href="index.php">LOGO</a>
    <nav class="navbar navbar-expand-lg menu_principal">

        <button class="navbar-toggler fade-in-section" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav menu_navbar">
                <a class="nav-link" href="../index.php">Home</a>
                <a class="nav-link" href="../recetas.php">Categorías</a>
                <?php if (isset($_SESSION['user_id'])){?>
                    <a class="nav-link" href="./favoritos.php">Favoritos</a>
                    <?php if(($datos_de_usuario['lvl'] ?? null) == 99) { ?>
                        <a class="nav-link" href="editar.php">Editar Recetas</a>
                        <a class="nav-link" href="agregar.php">Agregar Recetas</a>
                    <?php } else{ /*nada*/ } ?>
                    <a class="nav-link" href="../cuenta.php">Mi Cuenta</a>
                    <a class="nav-link" href="../modules/logout.php" onclick="return confirm('¿Desea cerrar la sesión actual?')">Salir</a>
                <?php }else{ ?>
                    <a class="nav-link" href="#" id="iniciar_sesion">Iniciar sesión</a>
                    <a class="nav-link" href="./cuenta.php" id="registrarse">Registrate</a>
                    <?php include("../modules/modals/iniciar_sesion.php"); ?>
                <?php }?>
            </div>
        </div>
    </nav>
</header>