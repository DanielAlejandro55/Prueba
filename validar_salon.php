<?php

require_once('clases/conexion.php');
require_once('crud.php');
require_once('salon_gestion.php');

//Obtenemos las variables 
$id_salon= $_POST['id_salon'];
$aula= $_POST['aula'];
$desc_salon= $_POST['desc_salon'];

$conexion=new conexion();
$crud = new crud($conexion);
$salonGestion = new salonGestion();
$salonGestion->setid_salon($id_salon);
$salonGestion->setaula($aula);
$salonGestion->setdesc_salon($desc_salon);
$res=$crud->insertarSalon($salonGestion);


if(!$res){
    
   header('location:salones.php');
    
}else{
     echo '<script language="javascript">alert("Error al crear grupo");window.location.href="salones.php"</script>';

}

?>