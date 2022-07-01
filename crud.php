<?php
error_reporting(E_ALL); 
ini_set('display_errors', '1');

require_once('gestionar.php');
require_once('nivel_gestion.php');
require_once('salon_gestion.php');
require_once('profesor_gestion.php');
require_once('horario_gestion.php');
require_once('usuario.php');

class crud{
	var $miConexion;
	function __construct($conexion){
		$this->miConexion=$conexion;
	}
	function consultarLogin($usuario){
	
		$lista=array(); 
		$correo_user=$usuario->getcorreo_user();
		$contrasena_user=$usuario->contrasena_user();
	    $sql="SELECT * FROM central.usuario WHERE correo_user='$correo_user' and contrasena_user='$contrasena_user' ";
		$this->miConexion->consulta($sql);	
	
if($this->miConexion->cuentaFilas()>0){
    while($row=$this->miConexion->extraerRegistros()){
	   $usuario=new usuario();
	   $usuario->setcodigo($row["codigo_user"]);
	   $usuario->setprimer_nombre($row["primer_nombre"]);
	   $usuario->setsegundo_nombre($row["segundo_nombre"]);
	   $usuario->setprimer_apellido($row["primer_apellido"]);
	   $usuario->setsegundo_apellido($row["segundo_apellido"]);
	   $usuario->settelefono($row["celular"]);
	   $usuario->setcorreo_user($row["correo_user"]);
	   $usuario->setcontrasena_user($row["contrasena_user"]);
	   $lista[]=$usuario;
       }
    }
	return $lista;
}
    
    	function insertarPersona($usuario){
		$sql="INSERT INTO central.usuario(codigo_user,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,celular,correo_user,contrasena_user)
			  VALUES ('".$usuario->getcodigo_user()."','".$usuario->getprimer_nombre()."','".$usuario->getsegundo_nombre()."'
			  ,'".$usuario->getprimer_apellido()."','".$usuario->getsegundo_apellido()."','".$usuario->getcelular()."',
			  '".$usuario->getcorreo_user()."','".$usuario->getcontrasena_user()."')";
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
				return true;
		}else {
			return false;
		}
	}
    
    	function insertarGestionar($gestionar){
			
	$sql="
			INSERT INTO central.codigos(codigo_grupo)
			  VALUES ('".$gestionar->getcodigo_grupo()."');
			  
			INSERT INTO central.nivel_grupo(nivel_de_ingles,grupo,codigo_grupo)
			  VALUES ('".$gestionar->getnivel_de_ingles()."','".$gestionar->getgrupo()."',
			  '".$gestionar->getcodigo_grupo()."');
			  
			  INSERT INTO central.horario_salon(horario,salon,grupo,nivel_de_ingles)
			  VALUES ('".$gestionar->gethorario()."','".$gestionar->getsalon()."','".$gestionar->getgrupo()."','".$gestionar->getnivel_de_ingles()."');
			  
			  INSERT INTO central.profesor_horario(profesor,horario,salon)
			  VALUES ('".$gestionar->getprofesor()."','".$gestionar->gethorario()."','".$gestionar->getsalon()."')
			  
			  ";
	
			
			$this->miConexion->consulta($sql);	
		if($this->miConexion->filasAfectadas()){
				return true;
		}else {
			return false;
		}
	}
	 
    function listarGestionar(){
		$lista=array();
	     $sql="
		 	 
		SELECT  a.codigo_grupo, b.nivel_de_ingles, b.grupo, d.profesor, c.horario, c.salon
 		from central.codigos a inner join central.nivel_grupo b
 		on (a.codigo_grupo=b.codigo_grupo)
		inner join central.horario_salon c
		on (b.nivel_de_ingles = c.nivel_de_ingles)
		and (b.grupo = c.grupo)
		inner join central.profesor_horario d
		on ( c.horario = d.horario)
		and (c.salon = d.salon)
		 
		 ";
		
		$this->miConexion->consulta($sql);	
	
    if($this->miConexion->cuentaFilas()>0){
    while($row=$this->miConexion->extraerRegistros()){
	$gestionar=new gestionar();
	$gestionar->setnivel_de_ingles($row["nivel_de_ingles"]);
	$gestionar->setgrupo($row["grupo"]);
	$gestionar->setcodigo_grupo($row["codigo_grupo"]);
	$gestionar->setprofesor($row["profesor"]);
    $gestionar->sethorario($row["horario"]);
	$gestionar->setsalon($row["salon"]);
    
	$lista[]=$gestionar;
            }
	   }
	return $lista;

    }
    
        function eliminarGestionar($gestionar){
		$nivel_de_ingles=$gestionar->getnivel_de_ingles();
		$grupo=$gestionar->getgrupo();
		$codigo_grupo=$gestionar->getcodigo_grupo();
		$profesor=$gestionar->getprofesor();
		$horario=$gestionar->gethorario();
		$salon=$gestionar->getsalon();
			
		$sql="
		
		DELETE FROM central.codigos where codigo_grupo='$codigo_grupo';
		
		";
			
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
				return true;
			}else {
			return false;
			}
		}
    
    	function modificarGestionar($gestionar){
		$nivel_de_ingles=$gestionar->getnivel_de_ingles();
		$grupo=$gestionar->getgrupo();
		$codigo_grupo=$gestionar->getcodigo_grupo();
		$profesor=$gestionar->getprofesor();
		$horario=$gestionar->gethorario();
		$salon=$gestionar->getsalon();
		
     
	 	$sql= "
		
		
		update central.nivel_grupo set nivel_de_ingles = '$nivel_de_ingles' where codigo_grupo = '$codigo_grupo';
		update central.nivel_grupo set grupo = '$grupo' where codigo_grupo = '$codigo_grupo';
		update central.horario_salon set salon = '$salon' , horario = '$horario' where nivel_de_ingles = '$nivel_de_ingles' and grupo = '$grupo';

		update central.profesor_horario set profesor = '$profesor' where horario = '$horario' and salon = '$salon';

	 	";
			
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
				return true;
		}else {
			return false;
		}
	}
    

    	function seleccionarGestionar($gestionar){
		
		$codigo_grupo=$gestionar->getcodigo_grupo();
		$lista=array();
		
		 $sql="
		 
		SELECT  a.codigo_grupo, b.nivel_de_ingles, b.grupo, d.profesor, c.horario, c.salon
 		from central.codigos a inner join central.nivel_grupo b
 		on (a.codigo_grupo=b.codigo_grupo)
		inner join central.horario_salon c
		on (b.nivel_de_ingles = c.nivel_de_ingles)
		and (b.grupo = c.grupo)
		inner join central.profesor_horario d
		on ( c.horario = d.horario)
		and (c.salon = d.salon)
		
		WHERE a.codigo_grupo='$codigo_grupo'
		  
		 ";
	    
		
		$this->miConexion->consulta($sql);	
	
		if($this->miConexion->cuentaFilas()>0){
			while($row=$this->miConexion->extraerRegistros()){
				$gestionar=new gestionar();
				$gestionar->setnivel_de_ingles($row["nivel_de_ingles"]);
				$gestionar->setgrupo($row["grupo"]);
				$gestionar->setcodigo_grupo($row["codigo_grupo"]);
				$gestionar->setprofesor($row["profesor"]);
				$gestionar->sethorario($row["horario"]);
				$gestionar->setsalon($row["salon"]);
    
		$lista[]=$gestionar;
			}
		}
	return $lista;

	}
    
	///////////////////////////////////////////////////////////////////Niveles de ingles
	
     
	
	
		function insertarNivel($nivelGestion){
		$sql="
			INSERT INTO central.niveles (id_nivel,nivel,desc_nivel) VALUES ('".$nivelGestion->getid_nivel()."','".$nivelGestion->getnivel()."','".$nivelGestion->getdesc_nivel()."')
			  
			  ";
	
			$this->miConexion->consulta($sql);	
		if($this->miConexion->filasAfectadas()){
				return true;
			}else {
			return false;
			}
		}
	
	
	
	  	function eliminarNivel($nivelGestion){
		$id_nivel=$nivelGestion->getid_nivel();
		$sql="
		
		delete from central.niveles where id_nivel = '$id_nivel'
		
		";
			
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
				return true;
		}else {
			return false;
		}
	}
	
	
		
		    function listarNivelGestion(){
		$lista=array();
	     $sql="
		 	 
		SELECT id_nivel,nivel,desc_nivel from central.niveles
		 
		 ";
		
		$this->miConexion->consulta($sql);	
	
    if($this->miConexion->cuentaFilas()>0){
    while($row=$this->miConexion->extraerRegistros()){
	$nivelGestion=new nivelGestion();
	$nivelGestion->setid_nivel($row["id_nivel"]);
	$nivelGestion->setnivel($row["nivel"]);
	$nivelGestion->setdesc_nivel($row["desc_nivel"]);

    
	$lista[]=$nivelGestion;
            }
	   }
	return $lista;

	}
	
	
	///////////////////////////////////////////////////////////////////Salones de ingles
	
	
	
		function insertarSalon($salonGestion){
		$sql="
			INSERT INTO central.salones (id_salon,aula,desc_salon) VALUES ('".$salonGestion->getid_salon()."','".$salonGestion->getaula()."','".$salonGestion->getdesc_salon()."')
			  
			  ";
	
			$this->miConexion->consulta($sql);	
		if($this->miConexion->filasAfectadas()){
				return true;
			}else {
			return false;
			}
		}
	
	
	
	  	function eliminarSalon($salonGestion){
		$id_salon=$salonGestion->getid_salon();			
		$sql="
		
		delete from central.salones where id_salon = '$id_salon'
		
		";
			
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
				return true;
		}else {
			return false;
		}
	}
	
	
		
		    function listarSalonGestion(){
		$lista=array();
	     $sql="
		 	 
		SELECT id_salon,aula,desc_salon from central.salones
		 
		 ";
		
		$this->miConexion->consulta($sql);	
	
    if($this->miConexion->cuentaFilas()>0){
    while($row=$this->miConexion->extraerRegistros()){
	$salonGestion=new salonGestion();
	$salonGestion->setid_salon($row["id_salon"]);
	$salonGestion->setaula($row["aula"]);
	$salonGestion->setdesc_salon($row["desc_salon"]);

    
	$lista[]=$salonGestion;
            }
	   }
	return $lista;

			}
	
	
	
	///////////////////////////////////////////////////////////////////Profesores de ingles
    
	
		function insertarProfesor($profesorGestion){
		$sql="
			INSERT INTO central.profesores (codigo_profesor,documento_profesor,nombre_profesor,celular_profesor) VALUES ('".$profesorGestion->getcodigo_profesor()."','".$profesorGestion->getdocumento_profesor()."','".$profesorGestion->getnombre_profesor()."','".$profesorGestion->getcelular_profesor()."')
			  
			  ";
	
			$this->miConexion->consulta($sql);	
		if($this->miConexion->filasAfectadas()){
				return true;
			}else {
			return false;
			}
		}
	
	
	
	  	function eliminarProfesor($profesorGestion){
		$codigo_profesor=$profesorGestion->getcodigo_profesor();			
		$sql="
		
		delete from central.profesores where codigo_profesor = '$codigo_profesor'
		
		";
			
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
				return true;
		}else {
			return false;
		}
	}
	
	
		
		    function listarProfesorGestion(){
		$lista=array();
	     $sql="
		 	 
		SELECT codigo_profesor,documento_profesor,nombre_profesor,celular_profesor from central.profesores
		 
		 ";
		
		$this->miConexion->consulta($sql);	
	
    if($this->miConexion->cuentaFilas()>0){
    while($row=$this->miConexion->extraerRegistros()){
	$profesorGestion=new profesorGestion();
	$profesorGestion->setcodigo_profesor($row["codigo_profesor"]);
	$profesorGestion->setdocumento_profesor($row["documento_profesor"]);
	$profesorGestion->setnombre_profesor($row["nombre_profesor"]);
	$profesorGestion->setcelular_profesor($row["celular_profesor"]);
    
	$lista[]=$profesorGestion;
            }
	   }
	return $lista;

	}
	
	////////////////////////////////////////////////////// Crear horarios
	
		function insertarHorario($horarioGestion){
		$sql="
			INSERT INTO central.horarios (id_horario,jornada,desc_horario) VALUES ('".$horarioGestion->getid_horario()."','".$horarioGestion->getjornada()."','".$horarioGestion->getdesc_horario()."')
			  
			  ";
	
			$this->miConexion->consulta($sql);	
		if($this->miConexion->filasAfectadas()){
				return true;
			}else {
			return false;
			}
		}
	
	
	
	  	function eliminarHorario($horarioGestion){
		$id_horario=$horarioGestion->getid_horario();			
		$sql="
		
		delete from central.horarios where id_horario = '$id_horario'
		
		";
			
		$this->miConexion->consulta($sql);
		if($this->miConexion->filasAfectadas()){
				return true;
		}else {
			return false;
		}
	}
	
	
		
		    function listarHorarioGestion(){
		$lista=array();
	     $sql="
		 	 
		SELECT id_horario,jornada,desc_horario from central.horarios
		 
		 ";
		
		$this->miConexion->consulta($sql);	
	
    if($this->miConexion->cuentaFilas()>0){
    while($row=$this->miConexion->extraerRegistros()){
	$horarioGestion=new horarioGestion();
	$horarioGestion->setid_horario($row["id_horario"]);
	$horarioGestion->setjornada($row["jornada"]);
	$horarioGestion->setdesc_horario($row["desc_horario"]);
    
	$lista[]=$horarioGestion;
            }
	   }
	return $lista;

	}
	
	
	
}

?>