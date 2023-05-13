<?php
// Obtener todas las tareas del controlador
$tasks = $controller->getAllTasks();

// Mostrar una tabla con todas las tareas
echo "<h1>Lista de tareas</h1>";
echo "<table>";
echo "<tr><th>ID</th><th>Título</th><th>Descripción</th><th>Asignada a</th><th>Estado</th><th>Acciones</th></tr>";
foreach ($tasks as $task) {
    echo "<tr>";
    echo "<td>" . $task->getId() . "</td>";
    echo "<td>" . $task->getTitle() . "</td>";
    echo "<td>" . $task->getDescription() . "</td>";
    echo "<td>" . $task->getAssignedTo() . "</td>";
    echo "<td>" . $task->getStatus() . "</td>";
    echo "<td><a href=\"index.php?controller=task&action=edit&id=" . $task->getId() . "\">Editar</a> | <a href=\"index.php?controller=task&action=delete&id=" . $task->getId() . "\">Eliminar</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href=\"index.php?controller=task&action=create\">Crear nueva tarea</a>";
