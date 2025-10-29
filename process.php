<?php
require("classes/estudiante.class.php");
$Estudiantes = new Estudiante();

//VARIABLE ESTUDIANTE
$resultado = [];

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $tipo_peticion = ((isset($_GET["t"])) ?($_GET["t"]) : null);

    if($tipo_peticion=="selectAll"){
        $resultado = $Estudiantes->obtenerEstudiantes();
    }else{
        $resultado = [];
    }
}elseif ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_POST["fecha_nac"]) and isset($_POST["id_genero"])){
        $resultado = $Estudiantes->nuevoEstudiante($_POST["fnac"],$_POST["idg"]);
    }else{
        header('HTTP/1.1 400 Bad Request');
        $resultado = array("mensaje"=>"Parametros no Enviados");
    }
}

//$resultado = $Estudiantes->obtenerEstudiantes();

header("Content-Type: Application/json");
echo(json_encode($resultado));
?>
