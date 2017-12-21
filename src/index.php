<?php
include_once 'lib.php';
View::startIndex('Bar Reinols');
    $HTML= <<<FIN
                <div class="col" id="c1">
                    <div id="b1" class="block" >
                        <a href="index.php"><img alt="foto de nuestro local" src="NuestroLocal.jpg"/></a>
                        <div class="blockText">
                            <h2>Nuestro Local</h2>
                        </div>
                    </div>
                </div>
                <div class="col" id="c2">
                    <div id="b2" class="block">
                        <a href="productos.php"><img alt="foto de uno de nuestros productos" src="Carta.jpg"/></a>
                        <div class="blockText">
                            <h2>Carta</h2>
                        </div>
                    </div>
                </div>
                <div class="col" id="c3">
                    <div id="b3" class="block">
                        <a href="localizacion.php"><img alt="foto de nuestra localización." src="MapIco.jpg"/></a>
                        <div class="blockText">
                            <h2>Localización</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="descript">
            <div class="container">
                <h2>Bar Reinols</h2>
                <div class="descriptText">
                    <p>El bar es característico por su serrín y música de tragaperras. Los trabajadores son: Mauricio Colmenero, Osvaldo Wenceslao Machu Pichu, Néstor Aconcagua, Soraya García y la cocinera.</p><br>
                    <p>Atrévase a entrar en un paraiso de sabores castellanos a la vez que disfruta de un ambiente tradicional.</p>
                </div>
                <div class="descriptImg">
                    <img alt="Foto de nuestro equipo" src="equipo.jpg"/>
                </div>
FIN;
    
    echo $HTML;
View::end();
