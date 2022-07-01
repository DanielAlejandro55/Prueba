<?php

require_once('clases/conexion.php');
require_once('crud.php');
require_once('horario_gestion.php');

//Obtenemos las variables 
$id_horario= $_POST['id_horario'];
$jornada= $_POST['jornada'];
$desc_horario= $_POST['desc_horario'];

$conexion=new conexion();
$crud = new crud($conexion);
$horarioGestion = new horarioGestion();
$horarioGestion->setid_horario($id_horario);
$horarioGestion->setjornada($jornada);
$horarioGestion->setdesc_horario($desc_horario);
$res=$crud->insertarHorario($horarioGestion);


if(!$res){
    
   header('location:horarios.php');
    
}else{
     echo '<script language="javascript">alert("Error al crear grupo");window.location.href="horarios.php"</script>';

}

?>