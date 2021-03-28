<!DOCTYPE html>
<?php session_start();//trae la variable de sesion que se tomo en el inicio
?>
<html>
<head>
	<title>Gestionar Estudiantes</title>
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
	  
		
<?php
			$action = isset($_POST['action']) ? $_POST['action'] : "";
			include '../Conexion/conexion.php';
		
			if($action=='Actualizar'){
				//incluir la conexión de base de datos
				
				try{
					//La consulta 
					$query = "UPDATE estudiantes
								SET identificacion = :identificacion, nombres = :nombres, apellidos = :apellidos, edad = :edad, nota1 = :n1, nota2 = :n2
								WHERE idestudiante = :id
								"	
								;
					$stmt = $con->prepare($query);

					// vincular los parámetros
					
					$stmt->bindParam(':identificacion', $_POST['Identificacion']);
					$stmt->bindParam(':nombres', $_POST['Nombre']);
					$stmt->bindParam(':apellidos', $_POST['Apellidos']);
					$stmt->bindParam(':edad', $_POST['Edad']);
					$stmt->bindParam(':n1', $_POST['n1']);
					$stmt->bindParam(':n2', $_POST['n2']);
					$stmt->bindParam(':id', $_POST['id']);

					if($stmt->execute()){
						echo '<h2><img class="msg" src="../Vista/img/ok.png">El registro se actualizo.</h2>';
						echo '<meta http-equiv="Refresh" content="3;url=../Vista/ListarDB.php">';
					}else{
						echo '<h2><img class="msg" src="../Vista/img/nook.png">El registro No se Actualizo.</h2>';
						echo '<meta http-equiv="Refresh" content="3;url=../Vista/ListarDB.php">';

						}
					
				}catch(PDOException $exception){ 
				// para manejar error
					echo "Error: " . $exception->getMessage();
				}
			}


			try{
				$query = "SELECT * FROM estudiantes WHERE idestudiante = ? limit 0,1";
				$stmt=$con->prepare($query);
				$stmt->bindParam(1, $_REQUEST['id']);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				//valores del formulario
				$idestudiante = $row['idestudiante'];
				$identificacion = $row['identificacion'];
				$nombres = $row['nombres'];
				$apellidos = $row ['apellidos'];
				$edad = $row ['edad'];
				$nota1 = $row ['nota1'];
				$nota2 = $row ['nota2'];
	
			}catch (PDOException $e){
				echo "Error: " . $e->getMessage();
			}
	
?>


<form class="contact_form" action="#" method="POST" name="contact_form">
	<ul>
	<li>
	<h1 class="contact_form"><img class="user" src="../Vista/img/editarest.png">Editar Estudiante</h1>
	</li>
			<li>
				<label>Id Estudiante:</label>
				<input Class="ipt" name="id" type="text" required id="id" value='<?php echo $idestudiante ?>' readonly="readonly"/>
			</li>

			<li>
				<label>Identificacion: </label>
				<input Class="ipt" name="Identificacion" type="text" required id="Identificacion" value='<?php echo $identificacion ?>'/>
			</li>

			<li>
				<label>Nombres: </label>
				<input Class="ipt" name="Nombre" type="text" required id="Nombre" value='<?php echo $nombres ?>' />
			</li>

			<li>
				<label>Apellidos: </label>
				<input Class="ipt" name="Apellidos" type="text" required id="Apellido" value='<?php echo $apellidos ?>' />
			</li>

			<li>
				<label>Edad: </label>
				<input Class="ipt" name="Edad" type="number" required id="Edad" value='<?php echo $edad ?>' />
			</li>

			<li>
				<label>Nota 1: </label>
				<input Class="ipt" name="n1" type="number" required id="n1" min="0" max="5" step="0.01" value='<?php echo $nota1 ?>'/><br>
				<span>*Los decimales son con "," </span>
			</li>

			<li>
				<label>Nota 2: </label>
				<input Class="ipt" name="n2" type="number" required id="n2" min="0" max="5" step="0.01" value='<?php echo $nota2 ?>'/><br>
				<span>*Los decimales son con "," </span>
			</li>
			
		    <?php include '../Controlador/VariableSesion.php' ?>
			       <table>	
			      	<tr>
			     	  	<td><button class="submit" type="hidden" name='action' value='Actualizar'>Actualizar</button></td>
		  				<td><button class="submit2" type="button" name="Regresar" value="Regresar" onClick="location.href = '<?php echo $buttonre;?>' ">Regresar</button></td>
		 		    </tr>
		 		  </table>
	 	</ul>
	 
</form>
 

<br/>
</body>
</section>
<footer>

</footer>
</html>