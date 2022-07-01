<?php

require_once('clases/conexion.php');
require_once('crud.php');
require_once('profesor_gestion.php');

//Obtenemos las variables 
$codigo_profesor= $_POST['codigo_profesor'];
$documento_profesor= $_POST['documento_profesor'];
$nombre_profesor= $_POST['nombre_profesor'];
$celular_profesor= $_POST['celular_profesor'];

$conexion=new conexion();
$crud = new crud($conexion);
$profesorGestion = new profesorGestion();
$profesorGestion->setcodigo_profesor($codigo_profesor);
$profesorGestion->setdocumento_profesor($documento_profesor);
$profesorGestion->setnombre_profesor($nombre_profesor);
$profesorGestion->setcelular_profesor($celular_profesor);
$res=$crud->insertarProfesor($profesorGestion);


if(!$res){
    
   header('location:profesores.php');
    
}else{
     echo '<script language="javascript">alert("Error al crear grupo");window.location.href="profesores.php"</script>';

}

?>