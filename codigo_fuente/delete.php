<?php 
session_start();
 include_once('conexion.php');
if (isset($_GET['id'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$sql = "DELETE FROM personas WHERE idPersona = '".$_GET['id']." ' ";

		$_SESSION['message']= ($db->exec($sql)) ? 'Contacto Eliminado Corrctamente' : 'Algo Salio mal, No se pudo eliminar el contacto';
	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Seleccione un contacto para eliminar';

}
header('location: index.php');

?>