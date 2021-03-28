<!DOCTYPE html>
<?php session_start();//trae la variable de sesion que se tomo en el inicio
include '../Controlador/ValidarSesionA.php';
?>

<html>
<head>
	<title>Bienvenido</title>
</head>
<meta charset="utf-8">

<meta http-equiv="Refresh" content="300;url=../Vista/CerrarSesion.php"><--- Destruye la sesion y devuelve al incio---/>
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
<header><h1>Gestion de Estudiantes</h1></header>
<body bgcolor="black">
	 <section>
	 	<table>
	 		<thead>
	 		<h1 class="Bienvenida"><img class="ImgAdmin" src="../Vista/img/login_admin.png" width="100px" height="100px">Bienvenido Administrador</h1>
	 		</thead>
	 		<tbody>
	 			<tr>
	 			<td><img class="icon" src="../Vista/img/Gestiondeusuario.png"></td>
	 			<td class="nav"><a href="../Controlador/GestionarUsuarios.php" class="navegar"> Gestionar Usuarios</a></td>
	 			</tr>

	 			<tr>
	 			<td><img class="icon" src="../Vista/img/listararchivoplano.png"></td>	
	 			<td class="nav"><a href="../Vista/ListarArchivoPlano.php" class="navegar"> Listar Archivo Plano</a></td>
	 			</tr>

	 			<tr>
	 			<td><img class="icon" src="../Vista/img/listarbd.png"></td>
	 			<td class="nav"><a href="../Vista/ListarDB.php" class="navegar"> Listar Base de Datos</a></td>
	 			</tr>

	 			<tr>
	 			<td><img class="icon" src="../Vista/img/search.png"></td>
	 			<td class="nav"><a href="../Vista/Consultar.php" class="navegar"> Consultar</a></td>
	 			</tr>

	 			<tr>
	 			<td><img class="icon" src="../Vista/img/registrarestudiantes.png"></td>
	 			<td class="nav"><a href="../Controlador/registrar.php" class="navegar"> Registrar Estudiante</a></td>
	 			</tr>

	 			<tr>
	 			<td><img class="icon" src="../Vista/img/report.png"></td>
	 			<td class="nav"><a href="../Vista/Report.php" class="navegar"> Reporte</a></td>
	 			</tr>

	 			<tr>
	 			<td><img class="icon" src="../Vista/img/off.png"></td>
	 			<td class="nav"><a href="../Vista/CerrarSesion.php" class="navegar"> Cerrar Sesión</a></td>
	 			</tr>
	 									
	 		</tbody>

	 	</table>

	 	<?php include '../Controlador/VariableSesion.php' ?>
	 </section>
</body>
<footer>

</footer>
</html>