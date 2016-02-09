<?php
 
function crear_conexion($servidor, $usuario, $contrasena)
{
  return mysql_connect($servidor, $usuario, $contrasena);
}
 
function cerrar_conexion($conexion)
{
  mysql_close($conexion);
}
 
function consulta_base_de_datos($consulta, $base_datos, $conexion)
{
  mysql_select_db($base_datos, $conexion);
 
  return mysql_query($consulta, $conexion);
}
 
function obtener_resultados($resultado)
{
  return mysql_fetch_array($resultado, MYSQL_ASSOC);
}

function getTodosLosArticulos()
{
  // Conectar con la base de datos
  $conexion = crear_conexion('localhost', 'miusuario', 'micontrasena');
 
  // Ejecutar la consulta SQL
  $resultado = consulta_base_de_datos('SELECT fecha, titulo FROM articulo', 'blog_db', $conexion);
 
  // Crear el array de elementos para la capa de la vista
  $articulos = array();
  while ($fila = obtener_resultados($resultado))
  {
     $articulos[] = $fila;
  }
 
  // Cerrar la conexión
  cerrar_conexion($conexion);
 
  return $articulos;
}