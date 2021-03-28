<?php
session_start();//trae la variable de sesion que se tomo en el inicio
include '../Controlador/ValidarSesionA.php';
include '../Controlador/VariableSesion.php'; 	
include '../Conexion/conexion.php';
		
		try {		
			// consulta de eliminación
					$query = "DELETE FROM estudiantes WHERE idestudiante = ?";
					$stmt = $con->prepare($query);
					$stmt->bindParam(1, $_GET['id']);
					
					if($result = $stmt->execute()){
						// redirigir a la página índice
						header('Location: ../Vista/ListarDB.php?action=deleted');
					}else{
						header('Location: ../Vista/ListarDB.php?action=nodeleted');
						}
				
			}// para manejar los errores
				catch(PDOException $exception){
					echo "Error: " . $exception->getMessage();
					}
		
?>