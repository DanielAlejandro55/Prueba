<!DOCTYPE html> 
<html lang="es">
<head>
    <title>Crear profesores</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="fonts.css">
    </head>
    <body class="body3">
		<div class="lds-dual-ring loader" id="loader"></div>
        <img src="img/8.jpg" width="100%" height="130px" class="banner">
        <header class="header">
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="home.php"><span class="icon-home"></span> Home</a></li>     
                <li class="menu2"><a class="cur" href="#"><span class="icon-folder-open"></span>  Gestionar Grupos <span class="caret icon-cheveron-down"></span></a>
                    <ul class="submenu">
						<li><a href="crear_grupo.php"><span class="icon-users"></span>  Crear un grupo</a></li>
						<li><a href="consultar.php"><span class="icon-eye"></span>  Consultar grupos</a></li>
					</ul>
                </li>
			  <li class="menu2"><a class="cur" href="#"><span class="icon-stack"></span>  Gestionar Elementos <span class="caret icon-cheveron-down"></span></a>
                    <ul class="submenu">
						<li><a href="niveles.php"><span class="icon-plus"></span>  Crear un nivel</a></li>
						<li><a href="profesores.php"><span class="icon-user-tie"></span>  Crear un docente</a></li>
						<li><a href="horarios.php"><span class="icon-alarm"></span>  Crear un horario</a></li>
						<li><a href="salones.php"><span class="icon-bookmarks"></span>  Crear un salon</a></li>
					</ul>
					 
                </li>
                <li class="menu2"><a class="cur" href="#"><span class="icon-download3"></span>  Generar reporte <span class="caret icon-cheveron-down"></span></a>
                    <ul class="submenu">
						<li><a href="crearPdf.php"><span class="icon-file-pdf"></span>   Grupos .pdf </a></li>
					</ul>
				</li>
                <li class="menu2"><a class="cur" href="help.php"><span class="icon-aid-kit"></span>  Help </a>

				</li>
                <li><a href="exit.php"><span class="icon-exit"></span>  Exit</a></li>
			</ul>
		</nav>
	</header>
   
        <div class="containern">
        <br>
		<div class="containern1">
         <form action="validar_profesor.php" method="post" onSubmit="return validarfor7();" id="myform">
			 <label>Codigo profesor:</label>
            <br>
            <input type="text" name="codigo_profesor" id="codigo_profesor"  placeholder="example 000000"   class="ingresonn" minlength="6" maxlength="6" pattern="^[0-9]+">
            <br>
            <br>
            <label>Documento profesor:</label>
            <br>
            <input type="text" name="documento_profesor" id="documento_profesor"  placeholder="C.C."   class="ingresonn" minlength="1" maxlength="10" pattern="^[0-9]+">
            <br>
            <br>
            <label>Nombre del docente:</label>
			<br>
			<input type="text" name="nombre_profesor" id="nombre_profesor"  placeholder="example Maria Teresa Gomez Trujillo"   class="ingresonn" pattern="^[a-zA-Z\s]{5,254}" title="No puede conter caracteres especiales como la (ñ) o tildes (ó)">
            <br>
            <br> 
			 <label>Celular docente:</label>
			<br>
			<input type="text" name="celular_profesor" id="celular_profesor"  placeholder="+57"   class="ingresonn" minlength="10" maxlength="10"
            pattern="^[0-9]+">
            <br>
			 <br>
			<center>
            <input type="submit" value="Crear profesor" class="enviar_button2">
            <input type="button" value="Limpiar formato" onclick="limpiarFormulario()" class="enviar_button2">
            <input type="button" value="Volver" onclick="location.href='crear_grupo.php'" class="enviar_button2">
            </center>
        </form>
		
		   <br>
		   <br>
		   <br>
		   </div> 
			<div class="containern2">
		<table class="table1">
			<thead>
				<tr>
                    <th>Codigo</th>      
					 <th>Documento</th> 
                     <th>Nombre</th>
					 <th>Celular</th> 
                     <th>Eliminar</th>
				</tr>
			</thead>        
       <?php 
         require_once('clases/conexion.php');
         require_once('crud.php');         
         $conexion=new conexion();
         $crud=new crud($conexion);
         $res=$crud->listarProfesorGestion();
         if(count($res)){
             for($i=0;$i<count($res);$i++){
                 $profesorGestion=$res[$i];
             echo 
             "<tr>
             <td>".$profesorGestion->getcodigo_profesor()."</td>
             <td>".$profesorGestion->getdocumento_profesor()."</td>   
			 <td>".$profesorGestion->getnombre_profesor()."</td>   
			 <td>".$profesorGestion->getcelular_profesor()."</td>   
             <td>
			 
                              <form action='eliminar_profesor.php' method='post' onSubmit='return confirmar();'>
                                <div class='form-group'>
                                  <input type='text' name='codigo_profesor' value=".$profesorGestion->getcodigo_profesor()." style='display:none'>
                                </div>
                                <button type='submit' class='enviar_button1'><span class='icon-cross'></span></button>
                              </form>
                            </td></tr>";	
             }
         }else{
          echo "<td>NO HAY PROFESORES EN EL SISTEMA</td>'";
         }	
         ?>                
	</table>
	</div>
     </div>
        <script>
                        
             function limpiarFormulario(){
             document.getElementById("myform").reset();
            }
            window.addEventListener("load", function(){
            document.getElementById("loader").classList.toggle("loader2")
            }); 
            function validarfor7(){
            var co1 = document.getElementById("codigo_profesor").value;
			var co2 = document.getElementById("documento_profesor").value;
			var co3 = document.getElementById("nombre_profesor").value;
			var co4 = document.getElementById("celular_profesor").value;
			if (co1 == ""){
            alert("El codigo del profesor es Obligatorio!");
            return false;
            }
            if (co2 == ""){
             alert("El documento del profesor es Obligatorio");
             return false;
            }
			if (co3 == ""){
             alert("El nombre completo del profesor es Obligatorio");
             return false;
            }
			if (co4 == ""){
             alert("El celular del profesor es obligatorio!");
             return false;
            }
		
			}
			 function confirmar(){
    var mensaje;
    var opcion = confirm("Desea eliminar este registro permanentemente ?");
    if (opcion == true) {
        
	} else {
	    return false;
	   }
    }
        </script>
    </body>
</html>