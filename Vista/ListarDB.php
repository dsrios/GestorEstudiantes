<!DOCTYPE html>
<?php session_start();//trae la variable de sesion que se tomo en el inicio

?>
<?php include '../Controlador/VariableSesion.php' ?>

<html>
<head>
	<title>Listar Base de Datos</title>
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

<header><h1>Gestionar Estudiantes</h1></header>
<section>
	<body bgcolor="black">
	 <form class="loguin_form" action="" method="POST" name="loguin_form">
		 <li>
		 <h1 class="loguin_form"><img class="user" src="../Vista/img/cargarDB.png">Cargar Base de Datos</h1>
		 
		 
		 <?php
			//incluir la conexión de base de datos
			include '../Conexion/conexion.php';
			$action = isset($_GET['action']) ? $_GET['action'] : "";

			// se redirige desde delete.php
			if($action=='deleted'){
				echo '<h2><img class="msg" src="../Vista/img/ok.png">Registro Eliminado.</h2>';
					}else if ($action=='nodeleted'){
					echo '<h2><img class="msg" src="../Vista/img/nook.png">No se elimino el registro.</h2>';
					}
			echo '</li>';		
			//seleccionar todos los datos
			$query = "SELECT * FROM estudiantes";
			$stmt = $con->prepare( $query );
			$stmt->execute();

			// esta es la forma de obtener el número de filas devueltas
			$num = $stmt->rowCount();

			if($num>0){ //comprobar si encuentra más de 0 ficha
			    echo '<div class="Cargartablebd" id="Layer1" style="width:90%; height:300px; overflow: scroll;">';
			    
			    		echo '<table border=1 class="Cargartablebd">';//start table
			    		// crear nuestra cabecera de la tabla
			        	echo '<tr class="filasbd">';
			        	echo "<th>ID</th>";
			            echo "<th>Identificaión</th>";
			            echo "<th>Nombres</th>";
			            echo "<th>Apellidos</th>";
			            echo "<th>Edad</th>";
			            echo "<th>Nota 1</th>";
			            echo "<th>Nota 2</th>";
			            echo "<th>Defi.</th>";
						echo "<th>Acción</th>";
						echo "</tr>";
			        
			        // Recuperar nuestros contenidos de la tabla
			        // fetch() es más rápido que fetchAll()
			        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			            // extraer las filas 

			            extract($row);
			            
			            //crear nueva fila de la tabla por cada registro
			            echo '<tr class="filasbd">';
			            	echo "<td>{$idestudiante}</td>";
			                echo "<td>{$identificacion}</td>";
			                echo "<td>{$nombres}</td>";
			               	echo "<td>{$apellidos}</td>";
			               	echo "<td>{$edad}</td>";
			               	echo "<td>{$nota1}</td>";
			               	echo "<td>{$nota2}</td>";
$Def=($nota1+$nota2)/2;//Calcula el Promedio
			               	echo "<td>".$Def."</td>";
			                echo "<td>";
								// vamos a utilizar estos enlaces para la edicion
								echo "<a href='../Controlador/EditarEstudiante.php?id={$idestudiante}'>☰ ✍</a>";
								echo " ◄ ► ";
								//vamos a utilizar estos enlaces en la opcion de borrado
								echo "<a href='#' onclick='delete_est( {$idestudiante} );'>✘☠</a>";
							echo "</td>";
						
						echo "</tr>";
			        }
				
				//Final de la tabla
			    echo "</table>";
			    echo '</div>';//final del scroll
			    echo "<br>";
			    		    
			}

			//si no encuentra ningun registro
			else{
				echo '<meta http-equiv="Refresh" content="3;url='.$buttonre.'">';
			   echo '<h2><img class="msg" src="../Vista/img/noregistro.png">No hay Registros.</h2><br><br>';
			}

			?>
			<script type='text/javascript'>
			function delete_est( id ){
				
				var answer = confirm('Estás seguro?');
				if ( answer ){
				
					//si el usuario hace clic en Aceptar , pasa el id para delete.php y ejecutar la consulta de eliminación
					window.location = '../Controlador/EliminarEstudiante.php?id=' + id;
				} 
			}
			</script>

					
			<table>
		 		<tr>
		  			<td><button class="submit" type="button" name="NuevoRegistro" value="NuevoRegistro" onClick="location.href = '../Controlador/registrar.php' " >Crear Estudiante</button></td>
		  			<td><button class="submit2" type="button" name="Regresar" value="Regresar" onClick="location.href = '<?php echo $buttonre;?>' ">Regresar</button></td>
		 		</tr>
	 		</table>

	 </form>
	
	</body>
</section>
<footer>

</footer>
</html>