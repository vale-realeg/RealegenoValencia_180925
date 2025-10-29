<?php
require("classes/estudiante.class.php");
$Estudiante = new Estudiante();

$resultado = [];

if($_SERVER["REQUEST_METHOD"]=="GET"){
    $tipo_peticion = ( (isset($_GET["t"])) ? ($_GET["t"]) : null );
    
    if($tipo_peticion == "selectAll"){
    $resultado = $Estudiante->obtenerEstudiantes();
    }else{
        $resultado = [];
    }

}elseif($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["fecha_nac"]) and isset($_POST["id_genero"])){
        $resultado = $Estudiante->nuevoEstudiante($_POST["fecha_nac"], $_POST["id_genero"]);
    }else{
        header('HTTP/1.1 400 Bad Request');
        $resultado = array("mensaje"=>"Parametros no enviados");
    }
}




header("Content-Type: Application/json");
echo(json_encode($resultado));

?>
