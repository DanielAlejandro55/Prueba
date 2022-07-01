<!DOCTYPE html> 
<html lang="es">
	<head>
    <title>Cursos de Ingles || Inicio</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="fonts.css">
    </head>	
    <body class="body3"> 
        <div class="lds-dual-ring loader" id="loader"></div>
		
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
		  			<?php
                    require_once('clases/conexion.php');
                    require_once('crud.php');
                    $conexion=new conexion();
                    $crud=new crud($conexion);
                    $gestionar=new gestionar();
                    $gestionar->setcodigo_grupo($_POST['codigo_grupo']);
                    $res=$crud->seleccionarGestionar($gestionar);
                    $nivel_de_ingles='';
                    $grupo='';
                    $codigo_grupo='';
                    $profesor='';
                    $horario='';
                    $salon='';             
                    if(count($res)){
                        $gestionar=$res[0];
                        $nivel_de_ingles=$gestionar->getnivel_de_ingles();
		                    $grupo=$gestionar->getgrupo();
		                    $codigo_grupo=$gestionar->getcodigo_grupo();
		                    $profesor=$gestionar->getprofesor();
		                    $horario=$gestionar->gethorario();
		                    $salon=$gestionar->getsalon();
                
                    	}
                    ?>
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
        <form action="validar4.php" method="post" onSubmit="return validarfor4();" id="myform">
        <div class="containers"> 
            <div class="containers1">
            <p class="formtext">
            <label>Nivel de inglés:</label>
            <br>
			<input type="text" class="ingresomd" value="<?php echo $nivel_de_ingles;?>" readonly>
			<br>					
			<?php
			if ($numReg>0){
				?>		
            <select name="nivel_de_ingles" id="nivel_de_ingles" class="ingreso3"> 
				<option value="0">Ningun nivel seleccionado</option>
					
				<?php
				while ($fila=pg_fetch_array($resultado)){
					echo "<option>".$fila['nivel']."</option>";
				}
				
				?>
            </select>
			<?php
			}else{	
				
			echo "
	
			<select class='ingreso7' id='nivel_de_ingles'> 
			<option>No se han creado niveles</option>
			 </select>

			";
				
			}
			?>
				
            <br>
            <br>
            <label>Seleccionar salon:</label>
		<input type="text" class="ingresomd" value="<?php echo $salon;?>" readonly>
			
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
			
			<select class='ingreso7' id='salon'> 
			<option>No se han creado salones</option>
			 </select>
						
			
			";
			}
			?> 
            <br> 
            <br> 
			<label>Codigo del grupo?</label>
			</p>
			<div class="tooltip"> 
			<input type="text" name="codigo_grupo" id="codigo_grupo" class="ingresosapn" minlength="6" maxlength="6" pattern="^[0-9]+" value="<?php echo $codigo_grupo;?>" readonly>
  			<span class="tooltiptext">
			No puedes modificar el codigo del grupo, puedes optar por eliminar este y crear otro.
			</span>
			</div>
            </div>
			
            <div class="containers2">
            <p class="formtext">
            <label>Seleccionar docente:</label>
            <br>
		<input type="text" class="ingresomd" value="<?php echo $profesor;?>" readonly>
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
			
			<select class='ingreso7' id='profesor'> 
			<option>No se han creado docentes</option>
			 </select>
			
			
			";
			}
			?>
            <br>
            <br>  
            <label>Seleccionar horario:</label>
            <br>
		<input type="text" class="ingresomd"  value="<?php echo $horario;?>" readonly>
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
			<select class='ingreso7' id='horario'> 
			<option>No se han creado horarios</option>
			</select>
			
			";	
				
			}
			?>
            <br>
            <br> 
            <label>Modificar grupo:</label>
            <br>
            <input type="text" name="grupo" id="grupo" class="ingreso3" 
            pattern="[A-Z]+" minlength="1" maxlength="1" value="<?php echo $grupo;?>" onkeyup = "this.value=this.value.toUpperCase()">
            </p>
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
            <br> 
            <center>
            <input type="submit" value="Actualizar" class="enviar_button">
            <input type="button" value="Volver" onclick="location.href='consultar.php'" class="enviar_button">
            </center>
        </form>
		<br>
        <script>
             function limpiarFormulario(){
             document.getElementById("myform").reset();
            }
            window.addEventListener("load", function(){
            document.getElementById("loader").classList.toggle("loader2")
            }); 
            function validarfor4(){
            var co1 = document.getElementById("grupo").value;
            var co3 = document.getElementById("nivel_de_ingles").value;
            var co4 = document.getElementById("salon").value;
            var co5 = document.getElementById("profesor").value;
            var co6 = document.getElementById("horario").value;
				    	
			if (co1 == "" && co3 == 0 && co4 == 0 && co5 == 0 && co6 == 0){
                alert("Debes confirmar todos los campos para modificar un grupo!!!");
                return false;
                }
				
				
             if (co3 == 0){
                alert("Debe seleccionar un nivel de ingles!");
                return false;
                }
			if (co3 == "No se han creado niveles"){
                alert("No se han creado NIVELES para modificar un grupo!!!");
                return false;
                }
				
				
             if (co4 == 0){
                alert("Debe seleccionar un salon!");
                return false;
                }
			if ( co4 == "No se han creado salones"){
                alert("No se han creado SALONES para modificar un grupo!!!");
                return false;
                }
							
							
            if (co5 == 0){
                alert("Debe seleccionar un docente!");
                return false;
                }
			if (co5 == "No se han creado docentes"){
                alert("No se han creado DOCENTES para modificar un grupo!!!");
                return false;
                }
				
				
            if (co6 == 0 ){
                alert("Debe seleccionar un horario!");
                return false;
                }
			 if (co6 == "No se han creado horarios" ){
                alert("No se han creado HORARIOS para modificar un grupo!!!");
                return false;
                }				
				
				
            if (co1 == ""){
                alert("Debes confirmar el indicativo de grupo (A, B, C)!");
                return false;
                }
				
				
            }
        </script>
    </body>
</html>