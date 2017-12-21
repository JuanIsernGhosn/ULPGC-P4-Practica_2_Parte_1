<?php
	include 'DbAdapter.php';
	include 'sessionAction.php';
 
	$myusername = $_POST['user'];
	$mypassword = $_POST['pass'];;

	$passEncrypt = md5($mypassword);

	$numeroUsu = DbAdapter::consultaUnica("SELECT count(*) FROM usuarios where usuario='".$myusername."' and clave = '".$passEncrypt."';")['count(*)'];

	if ($numeroUsu == 1){
		$res=DbAdapter::consultaUnica("SELECT * FROM usuarios where usuario='".$myusername."' and clave = '".$passEncrypt."';");
		if($res){
			session_start();
			$_SESSION['tipo'] = $res['tipo'];
			$_SESSION['nombre'] = $res['nombre'];
			$_SESSION['id'] = $res['id'];
			SessionAction::redirect($res['tipo']);
		}
	} else {
		header("Location:".$_SERVER['HTTP_REFERER']);  
	}
?> 