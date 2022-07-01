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
                <center>
                <img src="img/mision.png" width="75%">
                </center>
                <p class="txt1">
                  El Centro de Idiomas de la Universidad Francisco de Paula Santander seccional Ocaña, es responsable de la enseñanza de idiomas modernos, en el ámbito de la comunidad universitaria y de la sociedad en general, proporciona a sus estudiantes los conocimientos lingüísticos imprescindibles para una mejor formación personal, académica y profesional,  potenciando así la consolidación de la interculturalidad.


                </p>
            </div>
            <div class="containerb2">
                <center>
                <img src="img/vision.png"  width="100%">
                </center>
                <br>
                <p class="txt1">
                    Ser un centro líder y competitivo en la enseñanza de idiomas modernos, comprometido con la excelencia académica y la calidad en el servicio, destacando por su afán de mejora continua y por su papel relevante como parte de una universidad que sea referente de calidad a nivel nacional e internacional.
                </p>
            </div>
        </div>
        <script>
            window.addEventListener("load", function(){
            document.getElementById("loader").classList.toggle("loader2")
            });   
		</script>
    </body>
</html>