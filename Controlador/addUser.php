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
		 <h1 class="loguin_form"><img class="user" src="../Vista/img/adduser.png">Registrar Nuevo Usuario</h1>
		 </li>
		 	<?php
			$action = isset($_POST['action']) ? $_POST['action'] : "";

			if($action=='Guardar'){
				//incluir la conexión de base de datos
				include '../Conexion/conexion.php';

				try{
				
					//La consulta 
					$query = "INSERT INTO usuarios SET username = ?, password = ?, idtipouser = ?";
					$stmt = $con->prepare($query);

					// vincular los parámetros

					$stmt->bindParam(1, $_POST['UserName']);
					$stmt->bindParam(2, $_POST['Password']);
					$stmt->bindParam(3, $_POST['TipoUser']);
					if($stmt->execute()){
						echo '<h2><img class="msg" src="../Vista/img/ok.png">Se guardo el registro.</h2>';
					}else{
						echo '<h2><img class="msg" src="../Vista/img/nook.png">No Se guardo el registro.</h2>';

						}
					
				}catch(PDOException $exception){ 
				// para manejar error
					echo "Error: " . $exception->getMessage();
				}
			}

			?>
			
			
			<form action='#' method='post' border='0'>
			    <table>
			        <tr>
			            <td>Nombre Usuario: </td>
			            <td><input type='text' name='UserName' /></td>
			        </tr>
			        <tr>
			            <td>Contraseña: </td>
			            <td><input type='password' name='Password' /></td>
			        </tr>
			        <tr>
			            <td>Tipo de Usuario</td>
			            <td>
			            <select name='TipoUser' size="1">
								<option value="1" >Administrador</option>
  								<option value="2" >Profesor</option>
  						</select>
			            </td>
			        </tr>
			        <?php include '../Controlador/VariableSesion.php' ?>
			        <tr>
			        <td> </td>
			        <td> </td>
			        </tr>
			      	<tr>
			       	<td><button class="submit" type="hidden" name='action' value='Guardar'>Guardar</button></td>
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