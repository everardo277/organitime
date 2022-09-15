<?php 
session_start();
 include_once('conexion.php');
if (isset($_POST['add'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$stmt = $db->prepare("INSERT INTO reunion (reunion, lugar, fecha, asunto) VALUES (:reunion, :lugar, :fecha, :asunto)");
		$_SESSION['message']=($stmt->execute(array(':reunion' => $_POST['reunion'], ':lugar' => $_POST['lugar'], ':fecha' => $_POST['fecha'], ':asunto' => $_POST['asunto']))) ? 'Registro de reunion agregado correctamente' : 'Algo Salio mal, No se pudo agregar el contacto';

	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Rellene el Formulario';

}
header('location: index.php');

?>