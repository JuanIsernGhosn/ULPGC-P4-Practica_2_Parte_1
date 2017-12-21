<?php
include_once 'lib.php';
include 'DbAdapter.php';
View::startCliente('Productos');
function buscador(){
	$nombre = trim("{$_POST['producto']}");
	if($nombre==""){
		return;
	}
	$res = DbAdapter::consultaSql("SELECT articulos.nombre as nombre FROM articulos WHERE articulos.nombre like '%$nombre%' COLLATE NOCASE;");
	echo "<div id=\"busqRes\">";
	foreach($res as $value){
    	$nombre = $value['nombre'];
		echo "<div class=\"busRow\">";
		echo "<p>$nombre</p>";
		echo "</div>";
	}
	echo "</div>";
}
$HTML = <<<FIN
<div id="busqueda">
	<form action="{$_SERVER['PHP_SELF']}" method="POST">
		<div id="busquedaFields">
			<div id="busquedaText">
			<input type="text" name="producto"/>
			</div>
			<div id="busquedaButton">
			<input type="submit" value="Buscar" class="btn-style"/>
			</div>
		</div>
	</form>
</div>
FIN;
echo $HTML;
if (isset($_POST['producto'])){
	buscador();	
}
View::end();
?>