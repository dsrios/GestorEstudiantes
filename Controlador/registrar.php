<?php
session_start();//trae la variable de sesion que se tomo en el inicio
include '../Controlador/VariableSesion.php';
include '../Modelo/File.php';
include '../Modelo/registrar.php';

if (isset($_POST['guardar'])!='' )
{
	
	$Guardar=new registroEst();
	$Guardar->set_idestudiante($_POST['id']);
	$Guardar->set_identificacion($_POST['Identificacion']);
	$Guardar->set_nombres($_POST['Nombre']);
	$Guardar->set_apellidos($_POST['Apellidos']);
	$Guardar->set_edad($_POST['Edad']);
	$Guardar->set_nota1($_POST['n1']);
	$Guardar->set_nota2($_POST['n2']);
	$Guardar->set_tipoGuardado($_POST['tguardar']);
	$Guardar->Registrar();
}

require_once '../Vista/Registrar.php';
?>