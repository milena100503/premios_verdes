<?php
require_once "config/Connection.php";

class Inscripcion extends Connection{


    public $tipo_participante;
	public $persona_inscribe;
    public $email;
    public $cargo;
    public $telefono_celular;
    public $direccion;
    public $sitio_web;
    public $pais;
    public $ciudad;
	public $facebook;
    public $instagram;
    public $linkedin;
    public $twitter;
    public $Tiktok;
    public $otra;
	public $id_canal_comunicacion;
	public $id_medio_difusion;
	public $id_tipo_estructura_jurídica;
	public $id_estructura_jurídica;
	public $sector_proyecto;


    public function inicializar(){


    $idProyecto ='18014';

    $query= "
            SELECT 
                id_tipo_innovacion,
                propuesta_innovadora,
                patente,
                tiene_registro_marca,
                cual_registro_marca,
                tiene_registro_sanitario,
                cuales_registro_sanitario,
                tiene_otro_registro,
                cuales_otro_registro,
                fondo_innovacion,
                porcentaje_venta_anual,
                desarrolla_tecnologia_aporta_sostenibilidad,
                cual_tecnologia,
                utiliza_blockchain,
                id_tipo_blockchain,
                planea_utilizar_blockchain,
                cadena_blockchain,
                ha_realizado_cuestionario_blockchain
            FROM proyecto  
            WHERE id_proyecto = $idProyecto;
    ";
    
    $result = $this->conn->query($query);
    if ($row = $result->fetch_array()) {
            $this->id_tipo_innovacion = $row["id_tipo_innovacion"];
            $this->propuesta_innovadora = $row["propuesta_innovadora"];
            $this->patente = $row["patente"];
            $this->tiene_registro_marca = $row["tiene_registro_marca"];
            $this->cual_registro_marca = $row["cual_registro_marca"];
            $this->tiene_registro_sanitario = $row["tiene_registro_sanitario"];
            $this->cuales_registro_sanitario = $row["cuales_registro_sanitario"];
            $this->tiene_otro_registro = $row["tiene_otro_registro"];
            $this->cuales_otro_registro = $row["cuales_otro_registro"];
            $this->fondo_innovacion = $row["fondo_innovacion"];
            $this->porcentaje_venta_anual = $row["porcentaje_venta_anual"];
            $this->desarrolla_tecnologia_aporta_sostenibilidad = $row["desarrolla_tecnologia_aporta_sostenibilidad"];
            $this->cual_tecnologia = $row["cual_tecnologia"];
            $this->utiliza_blockchain = $row["utiliza_blockchain"];
            $this->id_tipo_blockchain = $row["id_tipo_blockchain"];
            $this->planea_utilizar_blockchain = $row["planea_utilizar_blockchain"];
            $this->cadena_blockchain = $row["cadena_blockchain"];
            $this->ha_realizado_cuestionario_blockchain = $row["ha_realizado_cuestionario_blockchain"];
    }

   // $respuesta->listaPatentes =getArraySQL("select a.id_tipo_patente id, a.descripcion from proyecto_tipo_patente a where a.id_proyecto = $idProyecto",$con);
    

  //  $respuesta->tiposTecnologia =getArraySQL("select a.id_tipo_tecnologia id, a.descripcion from proyecto_tipo_tecnologia a where a.id_proyecto = $idProyecto",$con);

      }    
}



?>  