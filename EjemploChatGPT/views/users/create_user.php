<?php
// Mostrar un formulario para crear un nuevo usuario
echo "<h1>Crear nuevo usuario</h1>";
echo "<form action=\"index.php?controller=user&action=store\" method=\"post\">";
echo "<label for=\"name\">Nombre:</label>";
echo "<input type=\"text\" id=\"name\" name=\"name\"><br>";
echo "<label for=\"email\">Correo electrónico:</label>";
echo "<input type=\"email\" id=\"email\" name=\"email\"><br>";
echo "<input type=\"submit\" value=\"Crear\">";
echo "</form>";
