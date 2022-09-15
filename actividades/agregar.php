<?php 
session_start();
 include_once('conexion.php');
if (isset($_POST['add'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$stmt = $db->prepare("INSERT INTO actividades (actividad, finalidad, observaciones, fecha) VALUES (:actividad, :finalidad, :observaciones, :fecha)");
		$_SESSION['message']=($stmt->execute(array(':actividad' => $_POST['actividad'], ':finalidad' => $_POST['finalidad'], ':observaciones' => $_POST['observaciones'], ':fecha' => $_POST['fecha']))) ? 'Actividad agregada correctamente' : 'Algo Salio mal, No se pudo agregar el contacto';

	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Rellene el Formulario';

}
header('location: index.php');

?>