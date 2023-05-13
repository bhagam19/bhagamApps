<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Proyecto MVC</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<div class="jarvis">
		<h1 class="jarvis-title">Proyecto MVC</h1>
		<nav>
			<ul>
				<li><a href="index.php?controller=user&action=index">Usuarios</a></li>
				<li><a href="index.php?controller=task&action=index">Tareas</a></li>
			</ul>
		</nav>
		<main>
			<?php
				// Obtener el controlador y la acción de la URL
				$controller = isset($_GET['controller']) ? $_GET['controller'] : 'user';
				$action = isset($_GET['action']) ? $_GET['action'] : 'index';
				// Cargar el archivo del controlador y llamar a la acción correspondiente
				require_once('controllers/' . ucfirst($controller) . 'Controller.php');
				$controllerClass = ucfirst($controller) . 'Controller';
				$controllerInstance = new $controllerClass();
				$controllerInstance->$action();
			?>
		</main>
	</div>
</body>
</html>
