<?php
class profesorGestion{
	private $codigo_profesor;
    private $documento_profesor;
    private $nombre_profesor;
	private $celular_profesor;
	
	function setcodigo_profesor($codigo_profesor){
		$this->codigo_profesor=$codigo_profesor;
	}
	function getcodigo_profesor(){
		return $this->codigo_profesor;
    }
	
	
    function setdocumento_profesor($documento_profesor){
		$this->documento_profesor=$documento_profesor;
	}
	function getdocumento_profesor(){
		return $this->documento_profesor;
    }
	
	
	function setnombre_profesor($nombre_profesor){
		$this->nombre_profesor=$nombre_profesor;
	}
	function getnombre_profesor(){
		return $this->nombre_profesor;
    }
	
		function setcelular_profesor($celular_profesor){
		$this->celular_profesor=$celular_profesor;
	}
	function getcelular_profesor(){
		return $this->celular_profesor;
    }
}
?>