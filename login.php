<?php
	session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
 	 	$_SESSION['usuario'] = NULL;
 	 	$_SESSION['password'] = NULL;
	session_destroy(); // Se destruye la session existente de esta forma no permite el duplicado.
?>
<!doctype html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<title>Ingreso AlCec</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
	<link rel="stylesheet" href="css/login.css">
	<script src="scripts/jquery-1.11.2.min.js" type="text/javascript"></script>
	<script>

	var sessionData = [];

	function loadUser(user,pass)
	{
		dataToPush = user+'/--/'+pass;
		sessionData.push(dataToPush);
	}

	function checkUser()
	{
		var userName,passUser,userToCheck;
		userName = $('#username').val();
		passUser = $('#password').val();

		userToCheck = userName+'/--/'+passUser;

		if($.inArray(userToCheck,sessionData) != -1)
		{
			alert("Ingreso concedido.");
			return true;
		}
		else
		{
			alert("Ingreso denegado.");
			return false;
		}
	}

	</script>
</head>
<?php
	while($rowUsers = )
	{
		echo "<script>loadUser('".$rowUsers['username']."','".$rowUsers['password']."');</script>";
	}
?>
<body>
	<div id="login">
		<h2>Ingreso</h2>
		<form action="checkLogin.php" onsubmit="return checkUser()" method="post">
				<table width="100%" align="center">
					<tr>
						<td>
							<label for="username">Usuario:</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" id="username" name="username" value="" placeholder="Usuario" autofocus required/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="password">Contrase&ntilde;a:</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" id="password" name="password" value="" placeholder="Contrase&ntilde;a" required/>
						</td>
					</tr>
					<tr>
						<td>
							<hr width="100%">
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" id="btn_enviar" value="Acceder">
						</td>
					</tr>
					<tr>
						<td>
							<input type="button" id="btn_olvpass" value="Olvid&eacute; mi contrase&ntilde;a">
						</td>
					</tr>
				</table>
		</form>
	</div>
</body>	
</html>