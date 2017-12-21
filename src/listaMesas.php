<?php
	include 'sessionAction.php';
	SessionAction::comprobarID('1');
    include 'DbAdapter.php';
	include_once 'lib.php';
	View::startCama('Mesas');
	$res=DbAdapter::consultaSql("select mesas.id,mesas.nombre from mesas,comandas where mesas.id = comandas.mesa and comandas.horacierre = 0");
    mesas($res, "Mesas ocupadas");
	$res= DbAdapter::consultaSql("select id,nombre from mesas except select mesas.id,mesas.nombre from mesas,comandas where mesas.id = comandas.mesa and comandas.horacierre = 0");
	mesas($res, "Mesas Libres");
	View::end();
 
	function mesas($res,$text){
$HTML= <<<FIN
<h2>$text</h2>
<div class="listaMesas">
FIN;
		echo $HTML;
		addTable($res);
		echo "</div>";
	}

    function addTable($res){
        foreach($res as $value){
			$id = $value['id'];
			$nombre = $value['nombre'];
$HTML= <<<FIN
<div class="mesasList">
<div class="mesasImg">
<a href="mesa.php?id=$id"">
<img src="mesascomedor.jpg">
</a>
</div>
<div class="mesasText">
<p>$nombre</p>
</div>
</div>
FIN;
			echo $HTML;
        }
    }
?> 