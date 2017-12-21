<?php
include_once 'lib.php';
View::startCliente('Localizacion');
    $HTML= <<<FIN
                <div id="locaText">
                    <h1>¿Dónde nos encontramos?</h1>
                </div>
                <div id="map">
                    <img alt="Plano de nuestro establecimiento" src="localizacion.jpg"/>
                </div>
                <div id="cuadroLocal">
                    <p>Calle San Juan 69</p>
                    <br>
                    <h2>¿Cómo llegar?</h2>
                    <br>
                    <p>Entre en Vallecas desde Carabanchel, luego gire a la derecha, no tiene pérdida.</p>
                </div>
FIN;
    echo $HTML;
View::end();
?>