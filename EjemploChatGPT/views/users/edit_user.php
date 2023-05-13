<?php
// Obtener el usuario a editar del controlador
$user = $controller->getUserById($id);

// Mostrar un formulario para editar el usuario
echo "<h1>Editar usuario</h1>";
echo "<form action=\"index.php?controller=user&action=update&id=" . $user->getId() . "\" method=\"post\">";
echo "<label for=\"name\">Nombre:</label>";
echo "<input type=\"text\" id=\"name\" name=\"name\" value=\"" . $user->getName() . "\"><br>";
echo "<label for=\"email\">Correo electrónico:</label>";
echo "<input type=\"email\" id=\"email\" name=\"email\" value=\"" . $user->getEmail() . "\"><br>";
echo "<input type=\"submit\" value=\"Actualizar\">";
echo "</form>";
