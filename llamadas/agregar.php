<?php 
session_start();
 include_once('conexion.php');
if (isset($_POST['add'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$stmt = $db->prepare("INSERT INTO llamadas (llamar, telefono, fecha, motivo) VALUES (:llamar, :telefono, :fecha, :motivo)");
		$_SESSION['message']=($stmt->execute(array(':llamar' => $_POST['llamar'], ':telefono' => $_POST['telefono'], ':fecha' => $_POST['fecha'], ':motivo' => $_POST['motivo']))) ? 'Contacto agregado correctamente' : 'Algo Salio mal, No se pudo agregar el contacto';

	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Rellene el Formulario';

}
header('location: index.php');

?>