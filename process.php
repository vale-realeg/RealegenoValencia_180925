<?php
require("classes/estudiante.class.php");
$Estudiantes = new Estudiante();

$resultado = $Estudiantes->obtenerEstudiantes();

header("Content-Type: Application/json");
echo(json_encode($resultado));
?>
