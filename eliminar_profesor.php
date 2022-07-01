<?php
require_once('clases/conexion.php');
require_once('crud.php');
$conexion=new conexion();
$crud=new crud($conexion);
$profesorGestion=new profesorGestion();
$profesorGestion->setcodigo_profesor($_POST['codigo_profesor']);
$res=$crud->eliminarProfesor($profesorGestion);
if(!$res){
    
    header('location:profesores.php');
    
}else{
    echo '<script language="javascript">alert("Error de eliminacion!");window.location.href="profesores.php"</script>';

}
?>
