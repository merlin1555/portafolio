<section id="contact">
<form action="procesar_contacto.php" method="post" class="fade-in-section contact_form">
    <h2>contact us!</h2>
    <label for="nombre">Name:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>
        
    <label for="correo">Email:</label><br>
    <input type="email" id="correo" name="correo" required><br><br>
        
    <label for="mensaje">Message:</label><br>
    <textarea id="mensaje" name="mensaje" required></textarea><br><br>
        
    <!--<input id="contact_btn" type="submit" value="Send">-->
    <button id="contact_btn">Send</button>
</form>
</section>