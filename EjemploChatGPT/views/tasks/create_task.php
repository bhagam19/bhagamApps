<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $title = $_POST["title"];
    $description = $_POST["description"];
    $assigned_to = $_POST["assigned_to"];

    // Crear una nueva tarea con los datos del formulario
    $task = new Task();
    $task->setTitle($title);
    $task->setDescription($description);
    $task->setAssignedTo($assigned_to);

    // Agregar la tarea a la base de datos a través del controlador
    $controller->addTask($task);

    // Redireccionar al índice de tareas
    header("Location: index.php?controller=task&action=index");
    exit();
}

// Mostrar el formulario para crear una nueva tarea
echo "<h1>Crear nueva tarea</h1>";
echo "<form method=\"post\">";
echo "<label>Título:</label><br>";
echo "<input type=\"text\" name=\"title\"><br>";
echo "<label>Descripción:</label><br>";
echo "<textarea name=\"description\"></textarea><br>";
echo "<label>Asignada a:</label><br>";
echo "<input type=\"text\" name=\"assigned_to\"><br>";
echo "<br>";
echo "<input type=\"submit\" value=\"Guardar\">";
echo "</form>";
echo "<a href=\"index.php?controller=task&action=index\">Volver al índice de tareas</a>";
