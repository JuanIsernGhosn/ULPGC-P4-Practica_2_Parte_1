<?php
    include 'DbAdapter.php';

    $nombre = $_POST['nombre'];

    if(strcmp($nombre,"delAndServ") == 0){
        delAndServ();
		volver();
    } else if(strcmp($nombre,"addProd") == 0){
        addProd();
		volver();
    } else if (strcmp($nombre,"cobrar") == 0){
		cobrar();
	}
    
    function delAndServ(){
        $nComandas = count($_POST)-1;
        $count = 1;
        while($nComandas > 0){
            if(isset($_POST[$count])){
                tratarLineaDelAndServ($count);
                $nComandas--;
                echo $count;

            }
            $count++; 
        }
    }
    
    function tratarLineaDelAndServ($count){
		session_start();
		$id = $_SESSION['id'];
        $time = time();
        if($_POST[$count]==0){
            $time = time();
            DbAdapter::consultaSql("UPDATE lineascomanda SET horaservicio='".$time."', camareroservicio='".$id."' WHERE id='".$count."'");
        } else {
            DbAdapter::consultaSql("DELETE from lineascomanda where id ='".$count."'");
        }
    }

    function addProd(){
		session_start();
		$id = $_SESSION['id'];
        $time = time();
        $idProd = $_POST['addProductSelect'];
        $producto = DbAdapter::consultaUnica("SELECT * FROM articulos where id = '".$idProd."';");
        DbAdapter::consultaSql("INSERT INTO [lineascomanda] ([comanda], [articulo], [camareropeticion], [horapeticion], [tipo]) VALUES (".$_POST['comanda'].", ".$producto['id'].", ".$id.", ".$time.", ".$producto['tipo'].");");
    }

	function cobrar(){
		session_start();
		$id = $_SESSION['id'];
		$comanda = $_POST['comanda']; 
		$precio = $_POST['precio']; 
		$time = time();
        DbAdapter::consultaSql("UPDATE comandas SET camarerocierre='".$id."', horacierre='".$time."', PVP='".$precio."' WHERE id='".$comanda."';");
		header("Location: listaMesas.php");
    }

	function volver(){
    	header("Location:".$_SERVER['HTTP_REFERER']);  
	}
?>