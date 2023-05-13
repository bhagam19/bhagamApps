<?php
// Obtener el ID de la tarea a editar
$id = $_GET["id"];

// Obtener la tarea correspondiente de la base de datos
$task = $controller->getTask($id);

if (!$task) {
    // Si no se encuentra la tarea, mostrar un mensaje de error
    echo "<h1>Error: Tarea no encontrada</h1>";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si se envió un formulario de edición, actualizar la tarea en la base de datos

    // Obtener los datos del formulario
    $title = $_POST["title"];
    $description = $_POST["description"];
    $assigned_to = $_POST["assigned_to"];
    $completed = isset($_POST["completed"]) ? 1 : 0;

    // Actualizar la tarea con los datos del formulario
    $task->setTitle($title);
    $task->setDescription($description);
    $task->setAssignedTo($assigned_to);
    $task->setCompleted($completed);

    // Actualizar la tarea en la base de datos a través del controlador
    $controller->updateTask($task);

    // Redireccionar al índice de tareas
    header("Location: index.php?controller=task&action=index");
    exit();
} else {
    // Si no se envió un formulario de edición, mostrar el formulario con los datos actuales de la tarea

    echo "<h1>Editar tarea</h1>";
    echo "<form method=\"post\">";
    echo "<label>Título:</label><br>";
    echo "<input type=\"text\" name=\"title\" value=\"" . htmlspecialchars($task->getTitle()) . "\"><br>";
    echo "<label>Descripción:</label><br>";
    echo "<textarea name=\"description\">" . htmlspecialchars($task->getDescription()) . "</textarea><br>";
    echo "<label>Asignada a:</label><br>";
    echo "<input type=\"text\" name=\"assigned_to\" value=\"" . htmlspecialchars($task->getAssignedTo()) . "\"><br>";
    echo "<label>Completada:</label>";
    echo "<input type=\"checkbox\" name=\"completed\" value=\"1\"" . ($task->getCompleted() ? " checked" : "") . "><br>";
    echo "<br>";
    echo "<input type=\"submit\" value=\"Guardar\">";
    echo "</form>";
    echo "<a href=\"index.php?controller=task&action=index\">Volver al índice de tareas</a>";
}
