<?php 
session_start();
 include_once('conexion.php');
if (isset($_POST['edit'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$id= $_GET['id'];
		$llamarc=$_POST['llamar'];
		$telefonoc=$_POST['telefono'];
		$fechac=$_POST['fecha'];
		$motivoc=$_POST['motivo'];

		$sql = "UPDATE llamadas SET llamar = '$llamarc', telefono = '$telefonoc', fecha='$fechac', motivo='$motivoc' WHERE idllamadas = '$id' ";

		$_SESSION['message']= ($db->exec($sql)) ? 'Registro de la llamada actualizado Correctamente' : 'Algo Salio mal, No se pudo actualizar el contacto';
	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Rellene el Formulario';

}
header('location: index.php');

?>