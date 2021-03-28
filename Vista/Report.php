<!DOCTYPE html>
<?php session_start();//trae la variable de sesion que se tomo en el inicio
?>
<?php include '../Controlador/VariableSesion.php' ?>
<html>
<head>
	<title>Gesnerar Reporte</title>
	<link rel="stylesheet" type="text/css" href="../Vista/css/style.css">
	<link rel="stylesheet" type="text/css" href="../Vista/css/Styles_formulario.css">
	<link rel="stylesheet" type="text/css" href="../Vista/css/estilotabla.css">

</head>
<meta charset="UTF-8">
<meta http-equiv="Expires" content="0" />
<meta http-equiv="Pragma" content="no-cache" />
<script type="text/javascript">
{
if(history.forward(1))
location.replace(history.forward(1))
}
</script>

<header><h1>Gestion de Estudiantes</h1></header>

<section>
<body bgcolor="black">
<form class="contact_form" action="" method="post" name="contact_form">
	<ul>
	<li>
	<h1 class="contact_form"><img class="user" src="../Vista/img/reporte.png">Generar Reporte</h1>
	</li>
			<li>
				<label>Edad Superior o Igual a: </label>
				<input Class="ipt" name="Edad" type="number" required id="Edad" placeholder="Digite Edad"/>
			</li>

			<li>
				<label>Definitiva Superior o Igual a: </label>
				<input Class="ipt" name="Def" type="number" required id="Def" min="0" max="5" step="0.01" placeholder="Digite definitiva a filtrar"/><br>
				<span>*Los decimales son con "," </span>
			</li>

			<li>
				<label>Generar reporte de: </label>
				<input  name="tbuscar" type="radio" value="BD" checked/>Base de Datos
				<input  name="tbuscar" type="radio" value="AP" />Archivo Plano
			</li>
			<br>
		<table>
		 	<tr>
		 	<td><button class="submit" type="submit" name="Generar" value="Generar">Generar</button></td>
		  	<td><button class="submit2" type="button" name="Regresar" value="Regresar" onClick="location.href = '<?php echo $buttonre;?>' ">Regresar</button></td>
		 	</tr>
		</table>
		<br>
	 </ul>
		<li>
			<h1 class="contact_form"><img class="user" src="../Vista/img/generareport.ico">Resultado del Reporte</h1>
		</li>
<?php
echo '<div class="Cargartablebd" id="Layer1" style="width:90%; height:200px; overflow: scroll;">';
echo '<table border=1 class="Cargartablebd">';//inicio table
		echo '<tr class="filasbd">';//INICIO ENCABEZADO
		echo "<th>ID</th>";
		echo "<th>Identificaión</th>";
		echo "<th>Nombres</th>";
		echo "<th>Apellidos</th>";
		echo "<th>Edad</th>";
		echo "<th>Nota 1</th>";
		echo "<th>Nota 2</th>";
		echo "<th>Defi.</th>";
		echo "<th>Acción</th>";
		echo "</tr>";//FIN ENCABEZADO
		
if (isset($_POST['Generar'])!=''){
		$edad= ($_POST['Edad']);
		$Defi=($_POST['Def']);
		$action = ($_POST['tbuscar']);

	if ($action == 'AP'){
		$filas=file('../Modelo/plano_Taller2.txt');//Se carga el archivo

	   foreach($filas as $v){
	   		echo'<tr class="filasbd">';
       		$datos=explode(";",$v);
       		$Def=(floatval($datos[5])+floatval($datos[6]))/2;
          	
       		if ($datos[4]>=$edad && $Def>=$Defi)
        	{
        		 foreach($datos as $dato){
            		echo '<td>'.$dato.'</td>';
            		}
            		echo '<td>'.$Def.'</td>';
            		echo "<td>";
					echo "<a href='../Controlador/EditarArchivoPlano.php'>☰ ✍</a>";
					echo "</td>";
			}          
        }//cierre foreach filas
        echo'</tr>';//fin table
    }else if ($action == 'BD'){	
    	include '../Conexion/conexion.php';

    try{
    	$query = "SELECT * FROM  estudiantes WHERE edad>= :ed and ((nota1+nota2)/2)>= :def
			ORDER BY nombres
			";	
			$stmt = $con->prepare( $query );
			$stmt->bindParam(':ed', $edad);
			$stmt->bindParam(':def', $Defi);  
			$stmt->execute();
			$num = $stmt->rowCount();

			if ($num>0){
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			            // extraer las filas 
			            extract($row);
			        
			            //crear nueva fila de la tabla por cada registro
			            	echo '<tr class="filasbd">';
			            	echo "<td>{$idestudiante}</td>";
			                echo "<td>{$identificacion}</td>";
			                echo "<td>{$nombres}</td>";
			               	echo "<td>{$apellidos}</td>";
			               	echo "<td>{$edad}</td>";
			               	echo "<td>{$nota1}</td>";
			               	echo "<td>{$nota2}</td>";
							$Def=($nota1+$nota2)/2;//Calcula el Promedio
			               	echo "<td>".$Def."</td>";
			                echo "<td>";
								// vamos a utilizar estos enlaces para la edicion
								echo "<a href='../Controlador/EditarEstudiante.php?id={$idestudiante}'>☰ ✍</a>";
								echo " ◄ ► ";
								//vamos a utilizar estos enlaces en la opcion de borrado
								echo "<a href='#' onclick='delete_est( {$idestudiante} );'>✘☠</a>";
							echo "</td>";
						
						echo "</tr>";
			        }//wile
			}

		}catch (PDOException $e){}
    }//cierre del bd

}//cierre isset


echo "</table>";
echo '</div>'; 
?>
<br>
<script type='text/javascript'>
			function delete_est( id ){
				
				var answer = confirm('Estás seguro?');
				if ( answer ){
				
					//si el usuario hace clic en Aceptar , pasa el id para delete.php y ejecutar la consulta de eliminación
					window.location = '../Controlador/EliminarEstudiante.php?id=' + id;
				} 
			}
</script>
</form>
</body>
</section>
<footer>

</footer>
</html>