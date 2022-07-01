<?php
class horarioGestion{
	private $id_horario;
    private $jornada;
    private $desc_horario;
	
	function setid_horario($id_horario){
		$this->id_horario=$id_horario;
	}
	function getid_horario(){
		return $this->id_horario;
    }
	
    function setjornada($jornada){
		$this->jornada=$jornada;
	}
	function getjornada(){
		return $this->jornada;
    }
	
	function setdesc_horario($desc_horario){
		$this->desc_horario=$desc_horario;
	}
	function getdesc_horario(){
		return $this->desc_horario;
    }
}
?>