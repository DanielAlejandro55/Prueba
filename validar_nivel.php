<?php

require_once('clases/conexion.php');
require_once('crud.php');
require_once('nivel_gestion.php');

//Obtenemos las variables 
$id_nivel= $_POST['id_nivel'];
$nivel= $_POST['nivel'];
$desc_nivel= $_POST['desc_nivel'];

$conexion=new conexion();
$crud = new crud($conexion);
$nivelGestion = new nivelGestion();
$nivelGestion->setid_nivel($id_nivel);
$nivelGestion->setnivel($nivel);
$nivelGestion->setdesc_nivel($desc_nivel);
$res=$crud->insertarNivel($nivelGestion);


if(!$res){
    
   header('location:niveles.php');
    
}else{
     echo '<script language="javascript">alert("Error al crear grupo");window.location.href="niveles.php"</script>';

}

?>