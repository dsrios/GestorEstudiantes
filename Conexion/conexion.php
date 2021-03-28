<?php
require_once '../Conexion/config.php';//Este archivo llama la configuracion.

//**************************************************************************
//*                  FORMA DE CONEXION CON MYSQL PDO                 *
//**************************************************************************
try{
	$con = new PDO("mysql:host={$hostname};dbname={$database}", $username, $password);
  //$con=new PDO('mysql:host=localhost; dbname=BD_name', 'usuario', 'contraseña')
	//print "Conexion Exitosa!";
}catch(PDOException $e){
	print ("Error!: ".$e->getMessage()."");
	die();
}


?>