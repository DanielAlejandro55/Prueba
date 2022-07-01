<?php
require_once('clases/conexion.php');
require_once('crud.php');
require_once('gestionar.php');



//Obtenemos las variables 
$nivel_de_ingles= $_POST['nivel_de_ingles'];
$grupo= $_POST['grupo'];
$codigo_grupo= $_POST['codigo_grupo'];
$horario= $_POST['horario'];
$profesor= $_POST['profesor'];
$salon= $_POST['salon'];


$conexion=new conexion();
$crud = new crud($conexion);
$gestionar = new gestionar();
$gestionar->setnivel_de_ingles($nivel_de_ingles);
$gestionar->setgrupo($grupo);
$gestionar->setcodigo_grupo($codigo_grupo);
$gestionar->sethorario($horario);
$gestionar->setprofesor($profesor);
$gestionar->setsalon($salon);
$res=$crud->insertarGestionar($gestionar);


if(!$res){
    
   header('location:consultar.php');
    
}else{
     echo '<script language="javascript">alert("Error al crear grupo");window.location.href="crear_grupo.php"</script>';

}

?>