
<!-- Fecha "chilena" -->
<?php 
function lafecha($fecha){
    $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    $fecha_parts = explode(' ', $fecha);
    $fecha = $fecha_parts[0];
    //$hora = isset($fecha_parts[1]) ? $fecha_parts[1] : '00:00:00';
    list($ano, $mes, $dia) = explode('-', $fecha);
    //return "$dia/".$meses[$mes-1]."/$ano $hora";
	return "$dia/".$meses[$mes-1]."/$ano";
}
?>
