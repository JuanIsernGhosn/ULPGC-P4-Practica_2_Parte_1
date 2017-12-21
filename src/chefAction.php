<?php
    include 'DbAdapter.php';

    $nombre = $_POST['nombre'];
    
    if(strcmp($nombre,"tablaPorElaborar") == 0){
        pdteElaborar();
    } else if(strcmp($nombre,"tablaElaborando") == 0){
        elaborando();
    }

    function pdteElaborar(){
		session_start();
		$id = $_SESSION['id'];
        $nComandas = count($_POST)-1;
        $count = 1;
        while($nComandas > 0){
            if(isset($_POST[$count])){
                $time = time();
                DbAdapter::consultaSql("UPDATE lineascomanda SET horainicio='".$time."', cocinero='".$id."' WHERE id='".$count."'");
             
                $nComandas--;
            }
            $count++; 
        }
    }

    function elaborando(){
        $nComandas = count($_POST)-1;
        $count = 1;
        while($nComandas > 0){
            if(isset($_POST[$count])){
                $time = time();
                DbAdapter::consultaSql("UPDATE lineascomanda SET horafinalizacion='".$time."' WHERE id='".$count."'");
                $nComandas--;
            }
            $count++; 
        }
    }

    header("Location:".$_SERVER['HTTP_REFERER']);  
?>