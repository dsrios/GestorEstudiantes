<!DOCTYPE html>
<?php session_start();//trae la variable de sesion que se tomo en el inicio?>
<html>	
<head>
	<title>Exportar Archivo Plano</title>
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
		<h1 class="loguin_form"><img class="user" src="../Vista/img/exportararchivoplano.png">Exportar Información</h1>
		</li>
		<?php
			/*Este metodo se encarga de llevar el archivo plano a la base de datos*/
			try{
			include'../Conexion/conexion.php';

			$lineas = file('../Modelo/plano_Taller2.txt');
			$c=0;
			foreach ($lineas as $linea_num => $linea)
			{
			
			       	$datos = explode(";",$linea);//Separamos el archivo en filas
			        $id =trim($datos[0]);
			        $identificacion =trim($datos[1]);
			        $nombres =trim($datos[2]);
			        $apellidos =trim($datos[3]);
			        $edad =trim($datos[4]);
			        $nota1 =trim($datos[5]);
			        $nota2 =trim($datos[6]);

			       
			$query="INSERT INTO estudiantes SET idestudiante = ?, identificacion = ?, nombres = ?, apellidos = ?, edad =?, nota1 = ?, nota2 = ?";
			$stmt=$con->prepare($query);

			$stmt->bindParam(1, $id);
			$stmt->bindParam(2, $identificacion);
			$stmt->bindParam(3, $nombres);
			$stmt->bindParam(4, $apellidos);
			$stmt->bindParam(5, $edad);
			$stmt->bindParam(6, $nota1);
			$stmt->bindParam(7, $nota2);
			//$stmt->execute();
			
			if ($stmt->execute()){
				$c=$c+1;
				}
			
			
			}
			if ($c!=0){				
					echo '<h2>';
					echo '<img src="../Vista/img/siguardo.png" align="left">Exportación Exitosa de '.$c.'  Registros !!'; 
					echo '</h2>';
				}else{
					echo '<h2>';
					echo '<img src="../Vista/img/noguardo.png" align="left">No se exporto el Archivo, Datos repetidos!!'; 
					echo '</h2>';
					}
			echo '<br>';
			echo '<br>';

		}catch (PDOException $e){
			Echo "Error !!!".$e->getMessage();
		}
			/*isset verifica que el campo no este vacio*/
	?>

	<?php include '../Controlador/VariableSesion.php' ?>

		 	<table>
		 		<tr>
		  			<td><button class="submit2" type="button" name="Regresar" value="Regresar" onClick="location.href = '<?php echo $buttonre;?>' ">Regresar</button></td>
		 		</tr>
	 		</table>

		 
	</form>
	</section>
	</body>

<footer>

</footer>
</html>









