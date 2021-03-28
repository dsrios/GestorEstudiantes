<!DOCTYPE html>
<?php session_start();//trae la variable de sesion que se tomo en el inicio
include '../Controlador/ValidarSesionA.php';
?>

<html>
<head>
	<title>Gestionar Usuarios</title>
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

<header><h1>Gestion de Usuarios</h1></header>
<section>
	<body bgcolor="black">
	 <form class="loguin_form" action="" method="POST" name="loguin_form">
		 <li>
		 <h1 class="loguin_form"><img class="user" src="../Vista/img/Gestiondeusuario.png">Gestion de Usuarios</h1>
		
		 
		 <?php
			//incluir la conexión de base de datos
			include '../Conexion/conexion.php';
			$action = isset($_GET['action']) ? $_GET['action'] : "";

			// se redirige desde delete.php
			if($action=='deleted'){
				echo '<h2><img class="msg" src="../Vista/img/ok.png">Registro Eliminado.</h2>';
				}else if ($action=='admin'){
					echo '<h2><img class="msg" src="../Vista/img/nook.png">No se puede eliminar el Administrador.</h2>';
					}else if ($action=='aadmin'){
						echo '<h2><img class="msg" src="../Vista/img/nook.png">No se puede Actualizar el Administrador.</h2>';
						}else if ($action=='nodeleted'){
							echo '<h2><img class="msg" src="../Vista/img/nook.png">No se elimino el registro.</h2>';
							}
			echo '</li>';				
			//seleccionar todos los datos
			$query = "SELECT * FROM usuarios";
			$stmt = $con->prepare( $query );
			$stmt->execute();

			// esta es la forma de obtener el número de filas devueltas
			$num = $stmt->rowCount();

			if($num>0){ //comprobar si encuentra más de 0 ficha
   			echo '<div class="Cargartablebd" id="Layer1" style="width:76%; height:200px; overflow: scroll;">';
			    echo '<table border=1 class="tableu">';//start table
			    // crear nuestra cabecera de la tabla
			        echo '<tr>';
			        	echo "<th>ID</th>";
			            echo "<th>Nombre_Usuario</th>";
			            echo "<th>Password</th>";
			            echo "<th>Tipo_Usuario</th>";
						echo "<th>Acción</th>";
			        echo "</tr>";
			        
			        // Recuperar nuestros contenidos de la tabla
			        // fetch() es más rápido que fetchAll()
			        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			            // extraer las filas 

			            extract($row);
			            
			            //crear nueva fila de la tabla por cada registro
			            echo '<tr>';
			            	echo "<td>{$id}</td>";
			                echo "<td>{$username}</td>";
			                echo "<td>{$password}</td>";
			                switch ("{$idtipouser}") {//Cambia la forma de presentar el tipo de usuario
			                	case '1':
			                		$tuser="Administrador";
			                		break;
			                	case '2':
			                		$tuser="Profesor";
			                		break;
			                	
			                	default:
			                		echo'No se encotro nada';
			                		break;
			                }
			                echo "<td>".$tuser."</td>";
							echo "<td>";
								// vamos a utilizar estos enlaces para la edicion
								echo "<a href='../Controlador/EditarUsuarios.php?id={$id}'>☰ ✍</a>";
								echo " ◄ ► ";
								//vamos a utilizar estos enlaces en la opcion de borrado
								echo "<a href='#' onclick='delete_user( {$id} );'>✘☠</a>";
							echo "</td>";
			            echo "</tr>";
			        }
				
				//Final de la tabla
			    echo "</table>";
			 echo'</div>';	    
			}

			//si no encuentra ningun registro
			else{
			    echo "No se encontraron registros.";
			}

			?>
			<script type='text/javascript'>
			function delete_user( id ){
				
				var answer = confirm('Estás seguro?');
				if ( answer ){
				
					//si el usuario hace clic en Aceptar , pasa el id para delete.php y ejecutar la consulta de eliminación
					window.location = '../Controlador/EliminarUsuario.php?id=' + id;
				} 
			}
			</script>


			<?php include '../Controlador/VariableSesion.php' ?>
			<table>
		 		<tr>
		  			<td><button class="submit" type="button" name="NuevoRegistro" value="NuevoRegistro" onClick="location.href = '../Controlador/addUser.php' " >Crear Usuario</button></td>
		  			<td><button class="submit2" type="button" name="Regresar" value="Regresar" onClick="location.href = '<?php echo $buttonre;?>' ">Regresar</button></td>
		 		</tr>
	 		</table>

	 </form>
	
	</body>
</section>
<footer>

</footer>
</html>