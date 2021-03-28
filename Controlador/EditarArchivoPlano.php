<!DOCTYPE html>
<?php session_start();//trae la variable de sesion que se tomo en el inicio?>
<html>	
<head>
	<title>Editar Archivo Plano</title>
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

	<body bgcolor="black">
	<section>
	<form class="loguin_form" action="" method="POST" name="loguin_form">
		<li>
		<h1 class="loguin_form"><img class="user" src="../Vista/img/editararchivo.png">Editar Archivo Plano</h1>
		<span>*Recuerde borrar los espacios en blanco, antes de guardar...</span>
		</li>
		<?php
		$fin="../Modelo/plano_Taller2.txt";
		if(isset($_POST['content']))
		{
			$content=stripslashes($_POST['content']);
			$fp=fopen($fin,"w") or die ("Error al abrir el archivo");//"a+" adiciona muchas veces lo que hay
			fputs($fp,$content);
			fclose($fp) or die ("Error al cerrar el archivo");
		}
		?>
		
		<form class="contact_form" action="" method="post">
		<center>
		<textarea id="textera" rows="15" cols="100" name="content">

		<?php 
		readfile($fin); 
		?>

		<?php include '../Controlador/VariableSesion.php' ?>
		</textarea>

		<table align="center">
			<tr>
				<td><button class="submit" type="submit" value"Guardar los Cambios">Guardar los Cambios</button></td>
				<td><button class="submit" type="button" name="ListarArchivo" value="ListarArchivo" onclick="location.href='../Vista/ListarArchivoPlano.php'">Listar Archivo Plano</button></td>
				<td><button class="submit" type="button" name="Regresar" value="Regresar" onClick="location.href = '<?php echo $buttonre;?>' ">Regresar</button></td>
			</tr>
		</table>
		</form>
		</center>
			
	</form>
	</section>
	</body>

<footer>

</footer>
</html>