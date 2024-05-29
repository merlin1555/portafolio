<?php include("modules/header.php");
if(!isset($_SESSION))session_start();
if (isset($_SESSION['user_id'])){
	$ID=$_SESSION['user_id'];
	$query = "SELECT `lvl` FROM `usuarios` WHERE `id` LIKE $ID";
	$lvl = $conn->query($query);
	$datos_de_usuario = $lvl->fetch_assoc();}?>
<main id="cuenta_de_usuario">
	<?php if (isset($_SESSION['user_id'])){
		include("modules/datos_usuario.php");
	}else { ;?>
	<section>
		<article id="crear_cuenta">
			<div>
				<?php	include("modules/registrarse.php");?>
			</div>
		</article>
		<article id="login">
			<div>
				<h5>o si ya tiene una cuenta,</h5>
				<?php	include("modules/login.php"); ?>
			</div>
		</article>
	</section>
<?php }?>
</main>
<?php include("modules/footer.php")?>
