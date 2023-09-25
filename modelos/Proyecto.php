<?php
require_once "config/Connection.php";

class Proyecto extends Connection{


    public $id_categoria;
	public $nombre_proyecto;
	public $pais;
	public $ciudad;
	public $alcance_proyecto;
	public $pais;
	public $canal_comunicacion;
	public $fase;
	public $descripcion;
	public $resumen;
	public $objetivo;
	public $principal_actividad_sectorial;
	public $principal_amenza;
	public $explica_amenaza;
	public $principal_debilidad;
	public $explica_debilidad;
	public $imagen_principal;
	public $logo;
	public $link_video;
    

    public function inicializar(){

    	$this->id_categoria=11;
    	$this->nombre_proyecto="Premios";
    
    
   
   // $respuesta->listaPatentes =getArraySQL("select a.id_tipo_patente id, a.descripcion from proyecto_tipo_patente a where a.id_proyecto = $idProyecto",$con);
    

  //  $respuesta->tiposTecnologia =getArraySQL("select a.id_tipo_tecnologia id, a.descripcion from proyecto_tipo_tecnologia a where a.id_proyecto = $idProyecto",$con);

      }    
}



?>  