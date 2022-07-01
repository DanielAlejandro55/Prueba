<?php
require_once('clases/conexion.php');
require_once('crud.php');
$conexion=new conexion();
$crud=new crud($conexion);
$horarioGestion=new horarioGestion();
$horarioGestion->setid_horario($_POST['id_horario']);
$res=$crud->eliminarHorario($horarioGestion);
if(!$res){
    
    header('location:horarios.php');
    
}else{
    echo '<script language="javascript">alert("Error de eliminacion!");window.location.href="horarios.php"</script>';

}
?>