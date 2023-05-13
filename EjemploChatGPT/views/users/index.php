<?php
// Asegurarse de que la variable $controller esté definida
if (!isset($controller)) {
    exit("Error: El controlador no está definido");
}

// Mostrar los usuarios en una tabla
echo "<h1>Usuarios</h1>";
echo "<table>";
echo "<thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr></thead>";
echo "<tbody>";
foreach ($users as $user) {
    echo "<tr>";
    echo "<td>" . $user->getId() . "</td>";
    echo "<td>" . $user->getName() . "</td>";
    echo "<td>" . $user->getEmail() . "</td>";
    echo "<td><a href=\"index.php?controller=user&action=edit&id=" . $user->getId() . "\">Editar</a></td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

// Enlace para crear un nuevo usuario
echo "<a href=\"index.php?controller=user&action=create\">Crear nuevo usuario</a>";

