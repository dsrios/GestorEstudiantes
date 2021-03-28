<!DOCTYPE html>
<?php session_start();//trae la variable de sesion que se tomo en el inicio?>
<?php include '../Controlador/VariableSesion.php' ?>
<html>	
<head>
	<title>Listar Archivo Plano</title>

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
<header><h1>Gestion de Estudiantes</h1></header>

	<body bgcolor="black">
	<section>
	<form class="loguin_form" action="" method="POST" name="loguin_form">
		<li>
		<h1 class="loguin_form"><img class="user" src="../Vista/img/listararchivoplano.png">Contenido Archivo Plano</h1>
		</li>
			
		 <?php

		if (filesize('../Modelo/plano_Taller2.txt')!=0){
		  
        	$filas=file('../Modelo/plano_Taller2.txt');
            echo '<center>';
			echo '<div class="Cargartablebd" id="Layer1" style="width:76%; height:300px; overflow: scroll;">';
	        echo '<table border=1 class="Cargartable">';
	       //ID;Identificación;Nombres;Apellidos;Edad;Nota1;Nota2
	        echo '<tr class="filas"><td>ID</td><td>Identificación</td><td>Nombres</td><td>Apellidos</td><td>Edad</td><td>Nota1</td><td>Nota2</td><td>Def</td></tr>';
	        foreach($filas as $v){
	        echo'<tr class="filas">';   
	          $datos=explode(";",$v);
	          foreach($datos as $dato){
	           echo '<td>'.$dato.'</td>';
	           }
	           $Def=(floatval($datos[5])+floatval($datos[6]))/2;
	           echo '<td>'.$Def.'</td>'; 
	        }
	        echo '</tr></table>';//otraprueba
	        echo '</div>'; 
	        echo '</center>';//prueba
	    }else{
			echo '<meta http-equiv="Refresh" content="3;url='.$buttonre.'">';
			echo '<h2><img class="msg" src="../Vista/img/noregistroplano.png">No hay Registros.</h2><br><br>';

			}
	     ?>
		 
      	
		 	<table>
		 		<tr>
		  			<td><button class="submit" type="button" name="Exportar" value="Exportar" onClick="location.href = '../Controlador/ExportarArchivoPlano.php' " >Exportar a BD</button><td>
		  			<td><button class="submit" type="button" name="NuevoRegistro" value="NuevoRegistro" onClick="location.href = '../Controlador/registrar.php' " >Crear Estudiante</button></td>
		  			<td><button class="submit2" type="button" name="Editar" value="Editar" onClick="location.href = '../Controlador/EditarArchivoPlano.php' ">Editar</button></td>
		 			<td><button class="submit2" type="button" name="Regresar" value="Regresar" onClick="location.href = '<?php echo $buttonre;?>' ">Regresar</button></td>
		 			
	 			</tr>
	 		</table>
	 </form>
	</section>
	</body>

<footer>

</footer>
</html>