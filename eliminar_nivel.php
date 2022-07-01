<?php
require_once('clases/conexion.php');
require_once('crud.php');
$conexion=new conexion();
$crud=new crud($conexion);
$nivelGestion=new nivelGestion();
$nivelGestion->setid_nivel($_POST['id_nivel']);
$res=$crud->eliminarNivel($nivelGestion);
if(!$res){
    
    header('location:niveles.php');
    
}else{
    echo '<script language="javascript">alert("Error de eliminacion!");window.location.href="niveles.php"</script>';

}
?>
