<?php
class SessionAction{
	public static function comprobarIfLogged(){
		session_start();
		if (isset($_SESSION['tipo'])){
			SessionAction::redirect($_SESSION['tipo']);
		}
	}
	
	public static function comprobarID($tipo){
		session_start();
		if (!isset($_SESSION['tipo'])){
			header("Location: index.php");
		} else if ($_SESSION['tipo']!=$tipo){
			echo $_SESSION['tipo'];
			SessionAction::redirect($_SESSION['tipo']);
		}
	}
	
	public static function redirect($tipo){
		if($tipo == 1){
			header("Location: listaMesas.php");
		} else if($tipo == 2){
			header("Location: chef.php");
		}
	}
}
?>