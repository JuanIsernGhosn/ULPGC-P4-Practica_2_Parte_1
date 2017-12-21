<?php
	include 'sessionAction.php';
	SessionAction::comprobarID('1');
    include 'DbAdapter.php';
	include_once 'lib.php';
	View::startCama('Mesa');
	$precio = 0;
	$numeroCom = DbAdapter::consultaUnica("SELECT count(*) FROM comandas where mesa = '".$_GET['id']."' and horacierre = 0;")['count(*)'];
    
	if ($numeroCom==0){
		newComand();
	}

	function newComand(){
		$time = time();
		DbAdapter::consultaSql("INSERT INTO [comandas] ([mesa], [camareroapertura], [horaapertura]) VALUES (".$_GET['id'].", 2, ".$time.");");
	}

	$comanda = DbAdapter::consultaUnica("SELECT * FROM comandas where mesa = '".$_GET['id']."' and horacierre = 0;");

	$res=DbAdapter::consultaSql("SELECT lineascomanda.id as id, articulos.nombre as articulo from lineascomanda, articulos where (lineascomanda.articulo = articulos.id) and (comanda = '".$comanda['id']."') and (horaservicio = 0) and ((lineascomanda.tipo = 0) or ((horafinalizacion != 0) and (lineascomanda.tipo=1)));");
	tablaServDel($res);

	$res= DbAdapter::consultaSql("SELECT articulos.nombre as articulo FROM lineascomanda,articulos WHERE (lineascomanda.comanda='".$comanda['id']."') AND (articulos.id = lineascomanda.articulo) AND (lineascomanda.horafinalizacion='0') AND (articulos.tipo = '1');");
	tablaEnCoci($res);

	$res= DbAdapter::consultaSql("SELECT * from articulos;");
	addProd($res);

	$res = DbAdapter::consultaSql("SELECT articulos.nombre as articulo, PVP FROM lineascomanda, articulos WHERE (lineascomanda.articulo = articulos.id) and (lineascomanda.comanda='".$comanda['id']."') and (lineascomanda.horaservicio!='0')");
	
	tablaFinal($res);

	View::end();

	function tablaFinal($res){
		global $comanda, $precio;
		$idComan = $comanda['id'];
		echo "<div class=\"tablaComan\" id=\"tablaComanBottom\">";
		echo "<h2>Desglose</h2>";
		foreach($res as $value){
			$precio += $value['PVP'];
$HTML= <<<FIN
<div class="tablaFinRow">
<div class="filaTabFin">
<p>{$value['articulo']}</p>
</div>
<div class="filaTabFin">
<p>{$value['PVP']}</p>
</div>
</div>
FIN;
			echo $HTML;
        }
$HTML= <<<FIN
<div class="tablaFinRow">
<div class="filaTabFinTot">
<p>Total</p>
</div>
<div class="filaTabFinTot">
<p>$precio</p>
</div>
</div>
<form action="comandAction.php" method="post">
<input type="hidden" name="nombre" value="cobrar">
<input type="hidden" name="comanda" value="$idComan">
<input type="hidden" name="precio" value="$precio">
<input type="submit" class="btn-style" value="Cerrar y cobrar"/>
</form>
FIN;
		echo $HTML;
		echo "</div>";
	}

	function addProd($res){
		echo "<div class=\"tablaComanMed\">";
		echo "<h2>Añadir producto</h2>";
		global $comanda;
		$idComan = $comanda['id'];
$HTML= <<<FIN
<form action="comandAction.php" method="post">
<input type="hidden" name="nombre" value="addProd">
<input type="hidden" name="comanda" value="$idComan">
<div id="addProdTab">
<div class="addProdTabCol">
<div class="styled-select">
<select name="addProductSelect">
FIN;
        echo $HTML;
        foreach($res as $value){
$HTML= <<<FIN
<option value="{$value['id']}">
<p>{$value['nombre']}</p>
</option>
FIN;
            echo $HTML;
        }
$HTML= <<<FIN
</select>
</div>
</div>
<div class="addProdTabCol">
<input type="submit" class="btn-style" value="Add"/>
</div>
</div>
</form>
</div>
</div>
FIN;
        echo $HTML;
	}
                     
	function tablaEnCoci($res){
$HTML= <<<FIN
<div id="tablasMedComand">
<div class="tablaComanMed">
<h2>En cocina...</h2>
FIN;
		echo $HTML;
		foreach($res as $value){
            echo "<div class=\"filaProd\">";
            echo "<p>{$value['articulo']}</p>";
            echo "</div>";
        }
		echo "</div>";
	}

	function tablaServDel($res){
		echo "<div class=\"tablaComan\" id=\"tablaComanTop\">";
		$count1 = 1;
		echo "<h2>Servir y eliminar</h2>";
        echo "<form action=\"comandAction.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"nombre\" value=\"delAndServ\">";
        foreach($res as $value){
            $id = $value['id'];
$HTML= <<<FIN
<div class ="PrimTabProdCom">
<div class="nombreProdCom">
<p>{$value['articulo']}</p>
</div>
<div class="servirProdCom">
<input type="radio" id="com1.$count1" name="$id" value="0" class="radio"/>
<label class="radioLabel" for="com1.$count1">Servir</label>
</div>
<div class="elimProdCom">
<input type="radio" id="com2.$count1" name="$id" value="1" class="radio"/>
<label class="radioLabel" for="com2.$count1">Eliminar</label>
</div>
</div>
FIN;
            echo $HTML;
            $count1++;
        }
$HTML= <<<FIN
<div class ="PrimTabProdCom">
<input type="submit" class="btn-style" value="Enviar"/>
</div>
</form>
FIN;
        echo $HTML;		
		echo "</div>";
	}
?> 