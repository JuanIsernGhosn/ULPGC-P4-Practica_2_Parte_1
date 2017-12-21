<?php
	include 'sessionAction.php';
	SessionAction::comprobarID('2');
	$id = $_SESSION['id'];
    include 'DbAdapter.php';
	include_once 'lib.php';
	View::startCoci('Cocina');

	$res=DbAdapter::consultaSql("SELECT articulos.nombre as articulo,lineascomanda.id as id, mesa FROM comandas,lineascomanda,articulos WHERE (lineascomanda.comanda=comandas.id) AND (horacierre='0') AND (articulos.id = lineascomanda.articulo) AND (lineascomanda.horainicio='0') AND (articulos.tipo = '1')");
	
	addTable($res, "tablaPorElaborar", "Pedidos Pendientes de Elaboración");

	$res=DbAdapter::consultaSql("SELECT articulos.nombre as articulo,lineascomanda.id as id, mesa FROM comandas,lineascomanda,articulos WHERE (lineascomanda.comanda=comandas.id) AND (horacierre='0') AND (articulos.id = lineascomanda.articulo) AND (lineascomanda.horainicio!='0') AND (articulos.tipo = '1')AND (lineascomanda.horafinalizacion='0') AND (cocinero='".$id."')");

	addTable($res, "tablaElaborando", "Pedidos en Curso");

	View::end();

    function addTable ($res,$action,$title){
		echo "<div id=\"$action\" class=\"tablasChef\">";
		echo "<h2>$title</h2>";
        echo "<form action=\"chefAction.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"nombre\" value=\"".$action."\">";
        foreach($res as $value){
            $id = $value['id'];
$HTML= <<<FIN
<div class ="PrimTabProdCom">
<div class="nombreProdChef">
<p>{$value['articulo']}</p>
</div>
<div class="mesaProdChef">
<p>Mesa {$value['mesa']}</p>
</div>
<div class="colCheckElab">
<input type="checkbox" name="$id" class="check"/>
</div>
</div>
FIN;
            echo $HTML;
        }
        echo "<input type=\"submit\" value=\"enviar\" class=\"btn-style\"/>";
        echo "</form>";
		echo "</div>";
    }
?> 