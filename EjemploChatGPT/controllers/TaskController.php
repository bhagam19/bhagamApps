<?php



class TaskController {
	
	public function index() {
		// Aquí se mostrarían todas las tareas
		echo "<h2>Listado de tareas</h2>";
		echo "<p>En esta sección se mostrarían todas las tareas del sistema.</p>";
	}

	public function create() {
		// Aquí se mostraría el formulario para crear una nueva tarea
		echo "<h2>Nueva tarea</h2>";
		echo "<p>En esta sección se mostraría el formulario para crear una nueva tarea.</p>";
	}

	public function edit() {
		// Aquí se mostraría el formulario para editar una tarea existente
		echo "<h2>Editar tarea</h2>";
		echo "<p>En esta sección se mostraría el formulario para editar una tarea existente.</p>";
	}

	public function delete() {
		// Aquí se eliminaría una tarea existente
		echo "<h2>Eliminar tarea</h2>";
		echo "<p>En esta sección se eliminaría una tarea existente del sistema.</p>";
	}

}