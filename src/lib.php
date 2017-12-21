<?php
class View{
    public static function startCliente($title){
		$HTML= <<<FIN
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilos.css">
<title>$title</title>
</head>
<body>
<header>
<div class="container">
<nav>
<ul>
<li><a href="index.php">Inicio</a></li>
<li><a href="productos.php">Nuestros Productos</a></li>
<li><a href="localizacion.php">¿Dónde estamos?</a></li>
<li id="sesion"><a href="login.php">Sección privada</a></li>
</ul>
</nav>
</div>
</header>
<div class="cuerpo">
<div class="container">
FIN;
		echo $HTML;
    }
	
	public static function startCama($title){
		$HTML= <<<FIN
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilos.css">
<title>$title</title>
</head>
<body>
<header>
<div class="container">
<nav>
<ul>
<li><a href="index.php">Inicio</a></li>
<li><a href="productos.php">Nuestros Productos</a></li>
<li><a href="localizacion.php">¿Dónde estamos?</a></li>
<li><a href="listaMesas.php">Mesas</a></li>
<li id="sesion"><a href="cerrarSesion.php">{$_SESSION['nombre']} <br>(Cerrar sesion)</a>
</ul>
</nav>
</div>
</header>
<div class="cuerpo">
<div class="container">
FIN;
		echo $HTML;
    }
	
	public static function startCoci($title){
		$HTML= <<<FIN
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilos.css">
<title>$title</title>
</head>
<body>
<header>
<div class="container">
<nav>
<ul>
<li><a href="index.php">Inicio</a></li>
<li><a href="productos.php">Nuestros Productos</a></li>
<li><a href="localizacion.php">¿Dónde estamos?</a></li>
<li><a href="chef.php">Cocina</a></li>
<li id="sesion"><a href="cerrarSesion.php">{$_SESSION['nombre']} <br>(Cerrar sesion)</a>
</ul>
</nav>
</div>
</header>
<div class="cuerpo">
<div class="container">
FIN;
		echo $HTML;
    }
	
	public static function startLogIn($title){
		$HTML= <<<FIN
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilos.css">
<title>$title</title>
</head>
<body>
<header>
<div class="container">
<nav>
<ul>
<li><a href="index.php">Inicio</a></li>
<li><a href="productos.php">Nuestros Productos</a></li>
<li><a href="localizacion.php">¿Dónde estamos?</a></li>
</ul>
</nav>
</div>
</header>
<div class="cuerpo">
<div class="container">
FIN;
		echo $HTML;
    }
    
    public static function startIndex($title){
		$HTML= <<<FIN
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilos.css">
<title>$title</title>
</head>
<body>
<body>
<div class="jumbotron">
<header>
<div class="container">
<nav>
<ul>
<li><a href="index.php">Inicio</a></li>
<li><a href="productos.php">Nuestros Productos</a></li>
<li><a href="localizacion.php">¿Dónde estamos?</a></li>
<li id="sesion"><a href="login.php">Sección privada</a></li>
</ul>
</nav>
</div>
</header>
</div>
<div class="main">
<div class="container">
FIN;
		echo $HTML;
    }
	
    public static function end(){
		$HTML= <<<FIN
</div>
</div>
</body>
</html>
FIN;
		echo $HTML;
    }
}