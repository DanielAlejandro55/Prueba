<!DOCTYPE html> 
<html lang="es">
<head>
    <title>Cursos de Ingles || Inicio</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="body1">
     <div class="lds-dual-ring loader" id="loader"></div>
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
    <div class="divform">
    <form action="validar.php" method="post" onSubmit="return validarfor();">
        <p class="formtext">
        <label for="correo">Correo:</label>
        <br>
        <input type="email" name="correo" id="correo" placeholder="example@gmail.com" class="ingreso">
        <br>
        <br>
        <label for="contrasena">Contraseña:</label>
        <br>
        <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña" class="ingreso">
        <br>
        <br>
        <center>
        <input type="submit" value="Entrar" class="enviar_button">
        </center>
        </p>
    </form>
    <p>
    <center>
    <input type="submit" value="Registrarse" onclick="location.href='registrarse.php'" class="enviar_button">
    </center>
    </p>
    </div>
    <script>
      window.addEventListener("load", function(){
            document.getElementById("loader").classList.toggle("loader2")
            });  
    function validarfor(){
            var cor = document.getElementById("correo").value; 
            var con = document.getElementsByName("contrasena")[0].value;
            var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if ((cor == "") && (con == "")){
                alert("Los campos correo y contraseña son Obligatorios");
                return false;
            }
            if ((cor == "") || !expr.test(cor) ){ 
                alert("El campo correo esta vacio o es incorrecto");
                return false;
            }
            if ((con == "")){ 
                alert("El campo contraseña está vacio o es incorrecto");
                return false;
            }
        }    
    </script>
</body>
</html>