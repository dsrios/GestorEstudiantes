<!DOCTYPE html>
<?php session_start();//trae la variable de sesion que se tomo en el inicio
?>
<?php include '../Controlador/VariableSesion.php' ?>
<html>
<head>
	<title>Registro de Estudiantes</title>
	<link rel="stylesheet" type="text/css" href="../Vista/css/style.css">
	<link rel="stylesheet" type="text/css" href="../Vista/css/Styles_formulario.css">
	<link rel="stylesheet" type="text/css" href="../Vista/css/estilotabla.css">

</head>
<meta charset="UTF-8">
<meta http-equiv="Expires" content="0" />
<meta http-equiv="Pragma" content="no-cache" />
<script type="text/javascript">
{
if(history.forward(1))
location.replace(history.forward(1))
}
</script>

<header><h1>Gestion de Estudiantes</h1></header>

<section>
<body bgcolor="black">
<form class="contact_form" action="" method="post" name="contact_form">
	<ul>
	<li>
	<h1 class="contact_form"><img class="user" src="../Vista/img/add.png">Registrar Estudiante</h1>
	</li>
			<li>
				<label>Id Estudiante:</label>
				<input Class="ipt" name="id" type="text" required id="id" placeholder="Digite el Id"/>
			</li>

			<li>
				<label>Identificacion: </label>
				<input Class="ipt" name="Identificacion" type="text" required id="Identificacion" placeholder="Digite la Identificación" />
			</li>

			<li>
				<label>Nombres: </label>
				<input Class="ipt" name="Nombre" type="text" required id="Nombre" placeholder="Digite los Nombres" />
			</li>

			<li>
				<label>Apellidos: </label>
				<input Class="ipt" name="Apellidos" type="text" required id="Apellido" placeholder="Digite los Apellidos" />
			</li>

			<li>
				<label>Edad: </label>
				<input Class="ipt" name="Edad" type="number" required id="Edad" placeholder="Digite la Edad" />
			</li>

			<li>
				<label>Nota 1: </label>
				<input Class="ipt" name="n1" type="number" required id="n1" min="0" max="5" step="0.01" placeholder="Digite la Nota 1"/><br>
				<span>*Los decimales son con "," </span>
			</li>

			<li>
				<label>Nota 2: </label>
				<input Class="ipt" name="n2" type="number" required id="n2" min="0" max="5" step="0.01" placeholder="Digite la Nota 2"/><br>
				<span>*Los decimales son con "," </span>
			</li>
			
			<li>
				<label>Guardar en: </label>
				<input  name="tguardar" type="radio" value="BD" checked/>Base de Datos
				<input  name="tguardar" type="radio" value="AP" />Archivo Plano
			</li>			
		<table>
		 	<tr>
		 	<td><button class="submit" type="submit" name="guardar" value="Guardar">Guardar</button></td>
		  	<td><button class="submit2" type="button" name="Regresar" value="Regresar" onClick="location.href = '<?php echo $buttonre;?>' ">Regresar</button></td>
		 	</tr>
		</table>
	 </ul>
	 
</form>
<br>
</body>
</section>
<footer>
</footer>

</html>