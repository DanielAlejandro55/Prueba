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
        <div class="containerb">
            <div class="containerb1">
					<br>
                <center>
                <img src="img/13.jpg" width="100%">

                </center>
            </div>
            <div class="containerb2">
			<form action="enviado.php" method="post" onSubmit="return validarfor5();" id="myform">	
			<center>
			<strong><center><label>Contáctanos</label></center></strong>
			<br>
			<label>Primer Nombre:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="nombre" id="nombre" placeholder="Escribe tu primer nombre..."   class="ingreso5" pattern="^[A-z]+">
			<br>
				<br>
			<label>Primer Apellido:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="apellido" id="apellido" placeholder="Escribe tu primer apellido..."   class="ingreso5" pattern="^[A-z]+">
			<br>
				<br>
			<label>Correo electronico:</label>&nbsp;&nbsp;
            <input type="email" name="correo" id="correo" placeholder="example@gmail.com"   class="ingreso5"> 
			<br>		
				<br>
		<label>Selecciona tu tipo de solicitud:</label>
				&nbsp;
				&nbsp;
            <select name="solicitud" id="solicitud" class="ingresoselec">

				<option>Escoger....</option>
				
                <option>Queja</option>
                
                <option>Reclamo</option>

                <option>Peticion</option>

                <option>Sugerencia </option>
				
				<option>Otros	 </option>

            </select>
					 <br>
				<br>
		<strong><label>Escribe tu solicitud:</label></strong>
		<br>
		<textarea id="mensaje" name="mensaje" placeholder="Escribenos..."  class="txt3"></textarea>
				
			<br>
			<center>
			<input type="submit" value="Enviar" class="enviar_button2">
            <input type="button" value="Limpiar formulario" onclick="limpiarFormulario()" class="enviar_button2">
           	<input type="button" value="Volver" onclick="location.href='home.php'" class="enviar_button2">
			</center>
				</center>
		</form>
        </div>
        </div>
        <script>
            window.addEventListener("load", function(){
            document.getElementById("loader").classList.toggle("loader2")
            });   
			   function limpiarFormulario(){
             document.getElementById("myform").reset();
			   }
			
			  function validarfor5(){
            var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var co1 = document.getElementById("nombre").value; 
            var co2 = document.getElementById("apellido").value; 
            var co3 = document.getElementById("correo").value;
            var co4 = document.getElementById("solicitud").value;
			var co5 = document.getElementById("mensaje").value;
            if (co1 == "" && co2 == "" && co3 == "" && co4 == "Seleccionar...."){
                alert("Los campos obligatorios estan vacios!");
                return false;
                }
				if (co1 == ""){
                alert("Debe escribir un nombre");
                return false;
                }
			if (co2 == ""){
                alert("Debe escribir un apellido");
                return false;
                }
			 if ((co3 == "") || !expr.test(co3) ){
                alert("El campo correo electronico esta vacio o es incorrecto");
                return false;
                }
            if (co4 == "Seleccionar...."){
                alert("Debe seleccionar un tipo de solicitud");
                return false;
                }	
			if (co5 == ""){
                alert("Deja la pena!!!! escribenos algo.");
                return false;
                }	
			  }
        </script>
    </body>
</html>