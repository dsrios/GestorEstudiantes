<?php
/**
 * @author sebas
 *
 */
class registroEst{
	
	private $idestudiante;
	private $identificacion;
	private $nombres;
	private $apellidos;
	private $edad;
	private $nota1;
	private $nota2;
	private $tipoGuardado;

	function __construct() {
		$this->_File=new File("../Modelo/plano_Taller2.txt");
	}

	public function get_idestudiante() {
		return $this->_idestudiante;
	}

	public function set_idestudiante($_idestudiante) {
		$this->_idestudiante = $_idestudiante;
	}


	/*Get y Set Nom_Empresa*/
	public function get_identificacion(){
		return $this->_identificacion;
	}

	public function set_identificacion($_identificacion){
		$this->_identificacion=$_identificacion;
	}


	public function get_nombres(){
		return $this->_nombres;
	}

	public function set_nombres($_nombres){
		$this->_nombres=$_nombres;
	}

	public function get_apelidos(){
		return $this->_apellidos;
	}

	public function set_apellidos($_apellidos){
		$this->_apellidos=$_apellidos;
	}

	public function get_edad(){
		return $this->_edad;
	}

	public function set_edad($_edad){
		$this->_edad=$_edad;
	}

	public function get_nota1(){
		return $this->_nota1;
	}

	public function set_nota1($_nota1){
		$this->_nota1=$_nota1;
	}

	public function get_nota2(){
		return $this->_nota2;
	}

	public function set_nota2($_nota2){
		$this->_nota2=$_nota2;
	}

	public function get_tipoGuardado(){
		return $this->_tipoGuardado;
	}

	public function set_tipoGuardado($_tipoGuardado){
		$this->_tipoGuardado=$_tipoGuardado;
	}


/*
private mi_variable

public function get_mi_variable(){
	return $this->_mi_variable;
}

public function set_mi_variable($_mi_nueva_varaible){
	$this->_mi_variable=$_mi_nueva_variable;
} 


*/
		
	public function Registrar(){

		if ($this->_tipoGuardado == 'AP'){

			$this->_File->Open('a');
			$msg='';
			$msg.=$this->_idestudiante.';';
			$msg.=$this->_identificacion.';';
			$msg.=$this->_nombres.';';
			$msg.=$this->_apellidos.';';
			$msg.=$this->_edad.';';
			$msg.=$this->_nota1.';';
			$msg.=$this->_nota2;
			$this->_File->set_msg($msg);
			if (filesize('../Modelo/plano_Taller2.txt')!=0){
				$this->_File->Write();
			}else{
				$this->_File->Write2();
			}
			$this->_File->Close();
			header('Location: ../Vista/ListarArchivoPlano.php');//Cuando almacena va al listar
		}
		else if ($this->_tipoGuardado == 'BD'){

			require_once '../Conexion/conexion.php';

				try{
				
					//La consulta 
					$query = "INSERT INTO estudiantes SET idestudiante = ?, identificacion = ?, nombres = ?, apellidos = ?, edad = ?, nota1 = ?, nota2 = ?";
					$stmt = $con->prepare($query);

					// vincular los parámetros

					$stmt->bindParam(1, $this->_idestudiante);
					$stmt->bindParam(2, $this->_identificacion);
					$stmt->bindParam(3, $this->_nombres);
					$stmt->bindParam(4, $this->_apellidos);
					$stmt->bindParam(5, $this->_edad);
					$stmt->bindParam(6, $this->_nota1);
					$stmt->bindParam(7, $this->_nota2);
					//$stmt->execute();

					if($stmt->execute()){
									echo "<script>";
									echo "var ans = confirm('REGISTRO INSERTADO EXITOSAMENTE!!!');";
									echo "if (ans) {window.location = '../Vista/ListarDB.php';}";
									echo "</script>";
									//header('Location: ../Vista/ListarDB.php');//Cuando almacena va al listar
						
					}else{
						//echo '<h2><img class="msg" src="../Vista/img/nook.png">No Se guardo el registro.</h2>';
									echo "<script>";
									echo "var ans = confirm('REGISTRO NO INSERTADO !!!');";
									echo "if (ans) {window.location = '../Controlador/registrar.php';}";
									echo "</script>";
									//header('Location: ../Controlador/registrar.php');//Cuando almacena va al listar
						}
					
				}catch(PDOException $exception){ 
				// para manejar error
				
					
				}

		}
	}
}

?>






