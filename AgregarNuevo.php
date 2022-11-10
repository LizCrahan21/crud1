<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO libros (Titulo, Autor, Editorial, Tipo_de_libro, Numero_de_paginas) VALUES (:Titulo, :Autor, :Editorial, :Tipo_de_libro, :Numero_de_paginas)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':Titulo' => $_POST['Titulo'] , ':Autor' => $_POST['Autor'] , ':Editorial' => $_POST['Editorial'], ':Tipo_de_libro' => $_POST['Tipo_de_libro'], ':Numero_de_paginas' => $_POST['Numero_de_paginas'])) ) ? 'Libro guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
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

header('location: index.php');
	
?>