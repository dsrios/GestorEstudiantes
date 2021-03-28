<?php
session_start();//trae la variable de sesion que se tomo en el inicio
include '../Controlador/ValidarSesionA.php';
include '../Controlador/VariableSesion.php'; 	
include '../Conexion/conexion.php';
if ($_GET['id'] == 1){//valida que no se elimine el administrador
		
	header('Location: ../Controlador/GestionarUsuarios.php?action=admin');

	}else{

		try {		
			// consulta de eliminación
					$query = "DELETE FROM usuarios WHERE id = ?";
					$stmt = $con->prepare($query);
					$stmt->bindParam(1, $_GET['id']);
					
					if($result = $stmt->execute()){
						// redirigir a la página índice
						header('Location: ../Controlador/GestionarUsuarios.php?action=deleted');
					}else{
						header('Location: ../Controlador/GestionarUsuarios.php?action=nodeleted');
					}
				
			}// para manejar los errores
				catch(PDOException $exception){
					
					echo "Error: " . $exception->getMessage();
					}
		}
?>