<?php
class salonGestion{
	private $id_salon;
    private $aula;
    private $desc_salon;
	
	function setid_salon($id_salon){
		$this->id_salon=$id_salon;
	}
	function getid_salon(){
		return $this->id_salon;
    }
    function setaula($aula){
		$this->aula=$aula;
	}
	function getaula(){
		return $this->aula;
    }
	
	function setdesc_salon($desc_salon){
		$this->desc_salon=$desc_salon;
	}
	function getdesc_salon(){
		return $this->desc_salon;
    }
}
?>