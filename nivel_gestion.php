<?php
class nivelGestion{
	private $id_nivel;
    private $nivel;
    private $desc_nivel;
	
	function setid_nivel($id_nivel){
		$this->id_nivel=$id_nivel;
	}
	function getid_nivel(){
		return $this->id_nivel;
    }
    function setnivel($nivel){
		$this->nivel=$nivel;
	}
	function getnivel(){
		return $this->nivel;
    }
	
	function setdesc_nivel($desc_nivel){
		$this->desc_nivel=$desc_nivel;
	}
	function getdesc_nivel(){
		return $this->desc_nivel;
    }
}
?>