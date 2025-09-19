<?php
require("classes/estudiante.class.php");
$Estudiantes = new Estudiante();

$resultado = $Estudiantes->obtenerEstudiantes();

echo(json_encode($resultado));
?>