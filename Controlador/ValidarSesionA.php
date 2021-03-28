<?php //Valida que los usuarios entren al inicio correcto
	if ($_SESSION['tipouser'] == ""){
		header( 'Location:../Vista/UsuarioNoEncontrado.html');
				
		}else if ($_SESSION['tipouser'] != 1){
					header ('Location:../Vista/InicioProfesor.php');
		 		}
?>