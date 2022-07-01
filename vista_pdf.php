
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos2.css">
    </head>
    <body class="bodypdf">
    <center>
	<img src="img/8.jpg" width="100%" height="130px" class="banner">
		<br>
		<br>
		<br>
		<br>
   <table class="table">
			<thead>
				<tr>
                    <th>Nivel</th>                                                          
                     <th>Grupo</th>
                     <th>Codigo</th>
                     <th>Docente</th>
                     <th>Horario</th>
                     <th>Salon</th>                  
				</tr>
			</thead>        
       <?php 
         require_once('clases/conexion.php');
         require_once('crud.php');         
         $conexion=new conexion();
         $crud=new crud($conexion);
         $res=$crud->listarGestionar();
         if(count($res)){
             for($i=0;$i<count($res);$i++){
                 $gestionar=$res[$i];
             echo 
             "<tr>
             <td class='tdpdf'>".$gestionar->getnivel_de_ingles()."</td>
             <td class='tdpdf'>".$gestionar->getgrupo()."</td>  
             <td class='tdpdf'>".$gestionar->getcodigo_grupo()."</td>
             <td class='tdpdf'>".$gestionar->getprofesor()."</td> 
             <td class='tdpdf'>".$gestionar->gethorario()."</td>               
             <td class='tdpdf'>".$gestionar->getsalon()."</td>            
             </tr>";	
             }
         }else{
          echo "<td>NO HAY REGISTROS EN EL SISTEMA</td>'";
         }
         ?>   
	</table>
		
    </center>
    </body>
</html>