<?php
class gestionar{
    private $nivel_de_ingles;
    private $grupo;
    private $codigo_grupo;
    private $horario;
	private $profesor;
    private $salon;

    function setnivel_de_ingles($nivel_de_ingles){
		$this->nivel_de_ingles=$nivel_de_ingles;
	}
	function getnivel_de_ingles(){
		return $this->nivel_de_ingles;
    }
    function setgrupo($grupo){
		$this->grupo=$grupo;
	}
	function getgrupo(){
		return $this->grupo;
    }
    function setcodigo_grupo($codigo_grupo){
		$this->codigo_grupo=$codigo_grupo;
	}
	function getcodigo_grupo(){
		return $this->codigo_grupo;
    }
    function sethorario($horario){
		$this->horario=$horario;
	}
	function gethorario(){
		return $this->horario;
    }
	    function setprofesor($profesor){
		$this->profesor=$profesor;
	}
	function getprofesor(){
		return $this->profesor;
    }
     function setsalon($salon){
		$this->salon=$salon;
	}
	function getsalon(){
		return $this->salon;
    }
    }
?>