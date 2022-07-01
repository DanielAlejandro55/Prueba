<!DOCTYPE html> 
<html lang="es">
<head>
    <title>Crear Grupos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="fonts.css">
    </head>
    <body class="body3">
		
		<?php
		include("clases/conexion.php");
		$conexion = pg_connect ("host=localhost port=5433 password=12345678 user=development dbname=ingles");
		$query = "select nivel from central.niveles";
		$resultado = pg_query ($conexion, $query);
		$numReg = pg_num_rows($resultado);
		
		
		$query2 = "select aula from central.salones";
		$resultado2 = pg_query ($conexion, $query2);
		$numReg2 = pg_num_rows($resultado2);
		
		$query3 = "select nombre_profesor from central.profesores";
		$resultado3 = pg_query ($conexion, $query3);
		$numReg3 = pg_num_rows($resultado3);
		
		$query4 = "select jornada from central.horarios";
		$resultado4 = pg_query ($conexion, $query4);
		$numReg4 = pg_num_rows($resultado4);
		
		?>
		
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
        <form action="validar3.php" method="post" onSubmit="return validarfor3();" id="myform">
        <div class="containers"> 
			<br>
            <div class="containers1">
            <label>Nivel de inglés:</label>
            <br>
			<?php
			if ($numReg>0){
				?>		
            <select name="nivel_de_ingles" id="nivel_de_ingles" class="ingreso3"> 
				<option value='0'>Ningun nivel seleccionado</option>
					
				<?php
				while ($fila=pg_fetch_array($resultado)){
					echo "<option>".$fila['nivel']."</option>";
				}
				
				?>
            </select>
			<?php
			}else{
				
				
			echo "		
			<div class='tooltip2'> 
			<select class='ingreso6' id='nivel_de_ingles'> 
			<option>No se han creado niveles</option>
			 </select>

			<span class='tooltiptext2'>
			Debe dirigirse a Gestionar Elementos y crear un nivel.
			</span>
			</div>
			
			";
				
				
			}
			?>
            <br>
            <br>
            <br>

            <label>Seleccionar salon:</label>
					 <br>
				<?php
			if ($numReg2>0){
				?>		
            <select name="salon" id="salon" class="ingreso3">
				<option value='0'>Ningun salon seleccionado</option>
					
				<?php
				while ($fila=pg_fetch_array($resultado2)){
					echo "<option>".$fila['aula']."</option>";
				}
				
				?>
            </select>
			<?php
			}else{
			echo "
			<div class='tooltip3'> 
			<select class='ingreso6' id='salon'> 
			<option>No se han creado salones</option>
			 </select>
			<span class='tooltiptext3'>
			Debe dirigirse a Gestionar Elementos y crear un salon.
			</span>
			</div>
						
			
			";
			}
			?>
            <br> 
            <br> 
            <br>
            <label>Codigo del grupo:</label>
            <br>
            <input type="text" name="codigo_grupo" id="codigo_grupo" placeholder="ejemplo 123456"   class="ingreso3" minlength="6" maxlength="6" pattern="^[0-9]+">
            <br>
            <br>
    
            </div>
            <div class="containers2">
            <label>Seleccionar docente:</label>
			<br>
       		<?php
			if ($numReg3>0){
				?>		
            <select name="profesor" id="profesor" class="ingreso3">
				<option value='0'>Ningun docente seleccionado</option>
					
				<?php
				while ($fila=pg_fetch_array($resultado3)){
					echo "<option>".$fila['nombre_profesor']."</option>";
				}
				
				?>
            </select>
			<?php
			}else{
			echo "
			
			
			<div class='tooltip4'> 
			<select class='ingreso6' id='profesor'> 
			<option>No se han creado docentes</option>
			 </select>
			<span class='tooltiptext4'>
			Debe dirigirse a Gestionar Elementos y crear un docente.
			</span>
			</div>
			
			
			";
			}
			?>
            <br>  
            <br> 
			<br> 
            <label>Seleccionar horario:</label>
            <br>
         	<?php
			if ($numReg4>0){
				?>		
            <select name="horario" id="horario" class="ingreso3"> 
				<option value='0'>Ningun horario seleccionado</option>
					
				<?php
				while ($fila=pg_fetch_array($resultado4)){
					echo "<option>".$fila['jornada']."</option>";
				}
				
				?>
            </select>
			<?php
			}else{
				
				
			echo "		
			<div class='tooltip5'> 
			<select class='ingreso6' id='horario'> 
			<option>No se han creado horarios</option>
			</select>
			<span class='tooltiptext5'>
			Debe dirigirse a Gestionar Elementos y crear un horario.
			</span>
			</div>
			
			";
				
				
			}
			?>
            <br>
            <br> 
            <br> 
            <label>Crear grupo:</label>
            <br>
            <input type="text" name="grupo" id="grupo" placeholder="ejemplo A, B, C..." class="ingreso3" pattern="[A-Z]+" minlength="1" maxlength="1" onkeyup = "this.value=this.value.toUpperCase()">
            </div>  
        </div>
            <br>
            <br> 
            <br> 
            <br>
            <br> 
            <br> 
            <br>
            <br>
            <br> 
            <br> 
            <br>
            <br>
            <br> 
            <center>
            <input type="submit" value="Guardar" class="enviar_button">
            <input type="button" value="Limpiar formato" onclick="limpiarFormulario()" class="enviar_button">
            <input type="button" value="Volver" onclick="location.href='home.php'" class="enviar_button">
            </center>
        </form>
		<br> 
        <script>
                        
             function limpiarFormulario(){
             document.getElementById("myform").reset();
				 	document.ready = document.getElementById("opciones").value = '0';
            }
            window.addEventListener("load", function(){
            document.getElementById("loader").classList.toggle("loader2")
            }); 
            function validarfor3(){
            var co1 = document.getElementById("grupo").value;
            var co2 = document.getElementById("codigo_grupo").value;
            var co3 = document.getElementById("nivel_de_ingles").value;
            var co4 = document.getElementById("salon").value;
            var co5 = document.getElementById("profesor").value;
            var co6 = document.getElementById("horario").value;
				
				
            if (co1 == "" && co2 == "" && co3 == 0 && co4 == 0 && co5 == 0 && co6 == 0){
                alert("Debes llenar todos los campos para crear un grupo!!!");
                return false;
                }
				
				 if (co1 == "" && co2 == "" && co3 == "No se han creado niveles" && co4 ==  "No se han creado salones" && co5 == "No se han creado docentes" && co6 == "No se han creado horarios"){
                alert("Faltan elementos importantes para crear un grupo!!!");
                return false;
                }
				
				
            if (co3 == 0){
                alert("Debe seleccionar un nivel de ingles!");
                return false;
                }
			if (co3 == "No se han creado niveles"){
                alert("No se han creado NIVELES para conformar un grupo!!!");
                return false;
                }
				
				
             if (co4 == 0){
                alert("Debe seleccionar un salon!");
                return false;
                }
			if ( co4 == "No se han creado salones"){
                alert("No se han creado SALONES para conformar un grupo!!!");
                return false;
                }
				
				
            if (co2 == ""){
                alert("Para crear un grupo nesesitas generar un codigo!");
                return false;
                }
				
							
            if (co5 == 0){
                alert("Debe seleccionar un docente!");
                return false;
                }
			if (co5 == "No se han creado docentes"){
                alert("No se han creado DOCENTES para conformar un grupo!!!");
                return false;
                }
				
				
            if (co6 == 0 ){
                alert("Debe seleccionar un horario!");
                return false;
                }
			 if (co6 == "No se han creado horarios" ){
                alert("No se han creado HORARIOS para conformar un grupo!!!");
                return false;
                }				
				
				
            if (co1 == ""){
                alert("Debes generar un indicativo de grupo (A, B, C)!");
                return false;
                }
				
				
            }
        </script>
    </body>
</html>