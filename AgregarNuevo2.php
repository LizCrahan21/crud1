<?php
session_start();
include_once('dbconect2.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO empleados (Nombre, Apellidos, Correo, Direccion, Telefono) VALUES (:Nombre, :Apellidos, :Correo, :Direccion, :Telefono)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':Nombre' => $_POST['Nombre'] , ':Apellidos' => $_POST['Apellidos'] , ':Correo' => $_POST['Correo'], ':Direccion' => $_POST['Direccion'], ':Telefono' => $_POST['Telefono'])) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: index2.php');
	
?>