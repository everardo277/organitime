<?php 
session_start();
 include_once('conexion.php');
if (isset($_POST['edit'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$id= $_GET['id'];
		$actividadc=$_POST['actividad'];
		$finalidadc=$_POST['finalidad'];
		$observacionesc=$_POST['observaciones'];
		$fechac=$_POST['fecha'];

		$sql = "UPDATE actividades SET actividad = '$actividadc', finalidad = '$finalidadc', observaciones='$observacionesc', fecha='$fechac' WHERE id = '$id' ";

		$_SESSION['message']= ($db->exec($sql)) ? 'Actividad actualizada Correctamente' : 'Algo Salio mal, No se pudo actualizar el contacto';
	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Rellene el Formulario';

}
header('location: index.php');

?>