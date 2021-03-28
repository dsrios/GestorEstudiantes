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
		 <h1 class="loguin_form"><img class="user" src="../Vista/img/EditarUsuario.png">Editar Usuario</h1>
		 </li>
<?php
			$action = isset($_POST['action']) ? $_POST['action'] : "";
			include '../Conexion/conexion.php';
		
			if($action=='Actualizar'){
				//incluir la conexión de base de datos
				
				try{
				
					if ($_POST['id'] == 1){
					header('Location: ../Controlador/GestionarUsuarios.php?action=aadmin');
					}else{	

					//La consulta 
					$query = "UPDATE usuarios
								SET username = :username, password = :password, idtipouser = :idtipouser
								WHERE id = :id	
								";
					$stmt = $con->prepare($query);

					// vincular los parámetros

					$stmt->bindParam(':username', $_POST['UserName']);
					$stmt->bindParam(':password', $_POST['Password']);
					$stmt->bindParam(':idtipouser', $_POST['TipoUser']);
					$stmt->bindParam(':id', $_POST['id']);
					if($stmt->execute()){
						echo '<h2><img class="msg" src="../Vista/img/ok.png">El registro se actualizo.</h2>';
					}else{
						echo '<h2><img class="msg" src="../Vista/img/nook.png">El registro No se Actualizo.</h2>';

						}
					}
				}catch(PDOException $exception){ 
				// para manejar error
					echo "Error: " . $exception->getMessage();
				}
			}


			try{
				$query = "SELECT * FROM usuarios WHERE id = ? limit 0,1";
				$stmt=$con->prepare($query);
				$stmt->bindParam(1, $_REQUEST['id']);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				//valores del formulario
				$id = $row['id'];
				$username = $row['username'];
				$password = $row['password'];
				$tuser = $row ['idtipouser'];
				 /*switch ($row['idtipouser']) 
				 			{//Cambia la forma de presentar el tipo de usuario
			                	case '1':
			                		$tuser="Administrador";
			                		break;
			                	case '2':
			                		$tuser="Profesor";
			                		break;
			                	
			                	default:
			                		echo'No se encotro nada';
			                		break;
			                }*/

			}catch (PDOException $e){
				echo "Error: " . $e->getMessage();
			}
	
?>
		<form action='#' method='post' border='0'>
			    <table border=1 class="tableu">
			    	 <tr>
			            <td>ID: </td>
			            <td><input type='text' name='id' value='<?php echo $id ?>' readonly="readonly"/></td>
			        </tr>
			        <tr>
			            <td>Nombre Usuario: </td>
			            <td><input type='text' name='UserName' value='<?php echo $username ?>'/></td>
			        </tr>
			        <tr>
			            <td>Contraseña: </td>
			            <td><input type='password' name='Password' value='<?php echo $password ?>'/></td>
			        </tr>
			        <tr>
			            <td>Tipo de Usuario</td>
			            <td>
			            <select name='TipoUser' size="1">
								<option value="1" <?php if($tuser==1) echo "selected";?> >Administrador</option>
  								<option value="2" <?php if($tuser==2) echo "selected";?> >Profesor</option>
  						</select>
			            </td>
			        </tr>
			        </table>
			        <?php include '../Controlador/VariableSesion.php' ?>
			     
			      <table>	
			      	<tr>
			     	  	<td><button class="submit" type="hidden" name='action' value='Actualizar'>Actualizar</button></td>
		  				<td><button class="submit2" type="button" name="Regresar" value="Regresar" onClick="location.href = '<?php echo $buttonre;?>' ">Regresar</button></td>
		 		    </tr>
		 		  </table>			    
			</form>
		 </form>
		 <br>
		 <br>
	</body>
</section>
<footer>

</footer>
</html>