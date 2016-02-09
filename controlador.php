

<?php
// Incluir la lógica del modelo
require_once('modelo.php');
// Obtener la lista de artículos
$articulos = getTodosLosArticulos();
 // Incluir la lógica de la vista
require('vista.php');
?>
