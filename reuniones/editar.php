<?php 
session_start();
 include_once('conexion.php');
if (isset($_POST['edit'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$id= $_GET['id'];
		$reunionc=$_POST['reunion'];
		$lugarc=$_POST['lugar'];
		$fechac=$_POST['fecha'];
		$asuntoc=$_POST['asunto'];

		$sql = "UPDATE reunion SET reunion = '$reunionc', lugar = '$lugarc', fecha='$fechac', asunto='$asuntoc' WHERE idReunion = '$id' ";

		$_SESSION['message']= ($db->exec($sql)) ? 'Registro de reunion actualizado Correctamente' : 'Algo Salio mal, No se pudo actualizar el contacto';
	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Rellene el Formulario';

}
header('location: index.php');

?>