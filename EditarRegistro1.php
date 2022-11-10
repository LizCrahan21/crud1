<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clientes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
$Nombre = $_POST["Nombre"];
$Apellidos = $_POST["Apellidos"];
$Correo = $_POST["Correo"];
$Direccion = $_POST["Direccion"];
$Telefono = $_POST["Telefono"];





//$sql = "UPDATE libros SET Titulo = '" . $Titulo . "', Autor = '" . $Autor . "', Editorial ='" .$Editorial . "', Tipo_de_libro='" .$Tipo_de_libro. "' .$ WHERE id=2";

$sql = "UPDATE clientes SET Nombre = '$Nombre', Apellidos = '$Apellidos', Correo = '$Correo', Direccion = '$Direccion', Telefono = '$Telefono' WHERE id = '$id'";
header("location: index1.php"); 
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>