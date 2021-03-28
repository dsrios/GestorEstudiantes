<?php //Captura la variable de sesion  ya iniciada
	if ($_SESSION['tipouser'] == ""){
		header( 'Location:../Vista/UsuarioNoEncontrado.html');
		
		}else if ($_SESSION['tipouser'] == 1){
		 		$buttonre='../Vista/InicioAdministrador.php';
		 		}else{
		 		$buttonre='../Vista/InicioProfesor.php';
		 		}
?>