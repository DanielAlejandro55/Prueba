<!DOCTYPE html> 
<html lang="es">
<head>
    <title>Crear niveles</title>
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
         <form action="validar_salon.php" method="post" onSubmit="return validarfor6();" id="myform">
			 <label>ID Salon:</label>
            <br>
            <input type="text" name="id_salon" id="id_salon"  placeholder="example 01, 02"   class="ingresonn" pattern="^[0-9]+">
            <br>
            <br>
            <label>Nombre del salon:</label>
            <br>
            <input type="text" name="aula" id="aula"  placeholder="example EDIFICIO INGENIERIA I204"   class="ingresonn" onkeyup = "this.value=this.value.toUpperCase()">
            <br>
            <br>
            <label>Descripcion del salon:</label>
			<br>
			<textarea id="desc_salon" name="desc_salon" placeholder="Descripcion(opcional)"  class="txt4"></textarea>
            <br>
            <br> 
			 <center>
            <input type="submit" value="Crear salon" class="enviar_button2">
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
					<th>ID Salon</th> 
                    <th>Salon</th>                                                          
                     <th>Descripcion</th>
                     <th>Eliminar</th>
				</tr>
			</thead>        
       <?php 
         require_once('clases/conexion.php');
         require_once('crud.php');         
         $conexion=new conexion();
         $crud=new crud($conexion);
         $res=$crud->listarSalonGestion();
         if(count($res)){
             for($i=0;$i<count($res);$i++){
                 $salonGestion=$res[$i];
             echo 
             "<tr>
			 <td>".$salonGestion->getid_salon()."</td>
             <td>".$salonGestion->getaula()."</td>
             <td>".$salonGestion->getdesc_salon()."</td>           
             <td>
			 
                              <form action='eliminar_salon.php' method='post' onSubmit='return confirmar();'>
                                <div class='form-group'>
                                  <input type='text' name='id_salon' value=".$salonGestion->getid_salon()." style='display:none'>
                                </div>
                                <button type='submit' class='enviar_button1'><span class='icon-cross'></span></button>
                              </form>
                            </td></tr>";	
             }
         }else{
          echo "<td>NO HAY SALONES EN EL SISTEMA</td>'";
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
            function validarfor6(){
            var co2 = document.getElementById("id_salon").value;
			var co1 = document.getElementById("aula").value;
			if (co2 == ""){
            alert("Nesesitas un ID salon!");
            return false;
            }
            if (co1 == ""){
             alert("El nombre del salon es obligatorio!");
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