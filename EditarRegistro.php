<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "libros";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
$Titulo = $_POST["Titulo"];
$Autor = $_POST["Autor"];
$Editorial = $_POST["Editorial"];
$Tipo_de_libro = $_POST["Tipo_de_libro"];
$Numero_de_paginas = $_POST["Numero_de_paginas"];





//$sql = "UPDATE libros SET Titulo = '" . $Titulo . "', Autor = '" . $Autor . "', Editorial ='" .$Editorial . "', Tipo_de_libro='" .$Tipo_de_libro. "' .$ WHERE id=2";

$sql = "UPDATE libros SET Titulo = '$Titulo', Autor = '$Autor', Editorial = '$Editorial', Tipo_de_libro = '$Tipo_de_libro', Numero_de_paginas = '$Numero_de_paginas' WHERE id = '$id'";
header("location: index.php"); 
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>