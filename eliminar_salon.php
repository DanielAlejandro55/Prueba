<?php
require_once('clases/conexion.php');
require_once('crud.php');
$conexion=new conexion();
$crud=new crud($conexion);
$salonGestion=new salonGestion();
$salonGestion->setid_salon($_POST['id_salon']);
$res=$crud->eliminarSalon($salonGestion);
if(!$res){
    
    header('location:salones.php');
    
}else{
    echo '<script language="javascript">alert("Error de eliminacion!");window.location.href="salones.php"</script>';

}
?>
