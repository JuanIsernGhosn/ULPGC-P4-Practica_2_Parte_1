<?php
	include 'sessionAction.php';
	SessionAction::comprobarIflogged();
	include_once 'lib.php';
	View::startLogIn('LogIn');
	$HTML= <<<FIN
	<form action="logincheck.php" method="POST">
		<fieldset>
			<legend>Usuarios empresa</legend>
			<div id="login">
				<div class="loginRow">
				<div class="loginCol">
					<label for="usuario">Usuario :</label>
				</div>
				<div class="loginCol">
					<input type="text" name="user"/>
				</div>
				</div>
				<div class="loginRow">
				<div class="loginCol">
					<label for="password">Contraseña :</label>
				</div>
				<div class="loginCol">
					<input type="password" name="pass"/>
				</div>
				</div>
				<input type="submit" value="Entrar" class="btn-style"/>
			</div>
		</fieldset>
	</form>
FIN;
	echo $HTML;	
	View::end();
?>