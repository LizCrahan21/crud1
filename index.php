<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alianza Literaria</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<!----======== CSS ======== -->
	<link rel="stylesheet" href="style.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    

</head>
<body>

<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="x.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Alianza</span>
                    <span class="profession">Literaria</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Libros</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="index1.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Clientes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="index2.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Empleados</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="index3.php">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Proveedor</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="index4.php">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Repartidor</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="index5.php">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Preguntas frecuentes</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>
    <script src="script.js"></script>

<div class="container">
	<h1 class="page-header text-center">Altas, Bajas y consultas de libros</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Nuevo Registro</a>

<?php 
	
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-info text-center" style="margin-top:20px;">
			<?php echo $_SESSION['message']; ?>
		</div>
		<?php

		unset($_SESSION['message']);
	}
?>
<table class="table table-bordered table-striped" style="margin-top:20px;">
	<thead>
		<th>ID</th>
		<th>Titulo</th>
		<th>Autor</th>
		<th>Editorial</th>
		<th>Tipo de libro</th>
		<th># de páginas</th>
		<th>Acción</th>
	</thead>
	<tbody>
		<?php
			//incluimos el fichero de conexion
			include_once('dbconect.php');

			$database = new Connection();
			$db = $database->open();
			try{	
				$sql = 'SELECT * FROM libros';
				foreach ($db->query($sql) as $row) {
					?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['Titulo']; ?></td>
						<td><?php echo $row['Autor']; ?></td>
						<td><?php echo $row['Editorial']; ?></td>
						<td><?php echo $row['Tipo_de_libro']; ?></td>
						<td><?php echo $row['Numero_de_paginas']; ?></td>
						<td>
							<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
							<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
						</td>
						<?php include('BorrarEditarModal.php'); ?>
					</tr>
					<?php 
				}
			}
			catch(PDOException $e){
				echo "Hubo un problema en la conexión: " . $e->getMessage();
			}

			//Cerrar la Conexion
			$database->close();

		?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('AgregarModal.php'); ?>
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>