<!DOCTYPE html>

<html>
<head>
	<title>Iniciar Sesión</title>
</head>
<meta charset="utf-8">
<meta http-equiv="Expires" content="0" />
<meta http-equiv="Pragma" content="no-cache" />
<script type="text/javascript">
{
if(history.forward(1))
location.replace(history.forward(1))
}
</script>

<link rel="stylesheet" type="text/css" href="../Vista/css/style.css">
<link rel="stylesheet" type="text/css" href="../Vista/css/Styles_formulario.css">
<link rel="stylesheet" type="text/css" href="../Vista/css/estilotabla.css">
<header><h1>Gestion de Estudiantes</h1></header>
<section>
	<body bgcolor="black">
	 <form class="loguin_form" action="" method="POST" name="loguin_form">
		 <ul>
		 <li>
		 <h1 class="loguin_form"><img class="user" src="../Vista/img/user.png">Inicio de Sesión</h1>
		 </li>
		 <li>
		 	<label>Nombre de Usuario:</label><br>
		 	<input name="nom_usuario" type="text" required id="nom_usuario" placeholder="Digite su nombre de Usuario" />
		 </li>
		 <li>
		 	<label>Contraseña:</label><br>
		 	<input name="password" type="Password" required id="contraseña" placeholder="Digite la contraseña" />
		 </li>
		 <br>
		<table>
			<tr>
			<td><button class="submit" type="submit" name="Iniciar" value="Iniciar_Sesion">Iniciar Sesión</button></td>
			</tr>
		</table>

		 </ul>
	 </form>
	 <?php
	 include '../Controlador/IniciarSesion.php';
	 //<button class="submit2" type="button" name="Registrarse" value="Registrarse" onClick="location.href = '../Vista/Mostrar_Tabla.php' ">Registrarse</button>

	 ?>
	</body>
</section>
<footer>

</footer>
</html>