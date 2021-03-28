<?php
session_start();//abre la sesion 
header("Cache-control: private");
include '../Conexion/conexion.php';

//$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{

	if (isset($_POST['Iniciar'])){
		if (!empty($_POST['nom_usuario']) && !empty($_POST['password'])){
			$Usuario=$_POST['nom_usuario'];
			$Password=$_POST['password'];
			$query="SELECT * FROM usuarios WHERE username=? AND password=?";
			$stmt=$con->prepare($query);
			$stmt->bindParam(1, $Usuario);
			$stmt->bindParam(2, $Password);
			$stmt->execute();
			$num=$stmt->rowCount();
			//echo 'Se encontro Usuario'.$num;
				if($num !=0){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);//covierte la consulta en filas
					$dbusername = $row['username'];//lleva la consulta a variables
					$dbpassword = $row['password'];
					$dbtipouser = $row['idtipouser'];
					
					if ($dbusername===$Usuario && $dbpassword===$Password){
						//$_SESSION['usuario_sesion']=$Usuario; //variable de sesion para llamar en cualquier parte del php
						$_SESSION['tipouser']=$dbtipouser;
						
						if ($dbtipouser == 1){
							header("Location: ../Vista/InicioAdministrador.php");
						}else{
							header("Location: ../Vista/InicioProfesor.php");
							}
					}
				}else if ($dbusername!=$Usuario || $dbpassword!=$Password){
					header("Location: ../Vista/UsuarioNoEncontrado.html");
					}

		} 
	}
}catch(PDOException $exception){
	echo "Error: ".$exception->getMessage();
	} 
//http://foros.cristalab.com/redireccion-de-usuarios-segun-perfil-t99680/
?>