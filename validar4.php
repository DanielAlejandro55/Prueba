<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


require_once('clases/conexion.php');
require_once('crud.php');

//Obtenemos las variables 
$nivel_de_ingles= $_POST['nivel_de_ingles'];
$grupo= $_POST['grupo'];
$codigo_grupo= $_POST['codigo_grupo'];
$profesor= $_POST['profesor'];
$horario= $_POST['horario'];
$salon= $_POST['salon'];


$conexion=new conexion();
$crud = new crud($conexion);
$gestionar= new gestionar();
$gestionar->setnivel_de_ingles($nivel_de_ingles);
$gestionar->setgrupo($grupo);
$gestionar->setcodigo_grupo($codigo_grupo);
$gestionar->setprofesor($profesor);
$gestionar->sethorario($horario);
$gestionar->setsalon($salon);
$res=$crud->modificarGestionar($gestionar);

if(!$res){
    header('location:consultar.php');
}else{
     echo '<script language="javascript">alert("Error de Actualizacion");window.location.href="actualizar.php"</script>';

}

?>