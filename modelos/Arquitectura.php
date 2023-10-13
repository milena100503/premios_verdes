<?php
require_once "config/Connection.php";
class Arquitectura extends Connection{


    public $id_Proyecto_Gestion;
	public $regeneracion_preservacion_espacio_natural;
	public $regeneracion_preservacion_espacio_publicos;
	public $planificacion_construccion_sostenible;
	public $infraestructura_verde;
	public $comunidades_ciudades_sostenibles;
	public $diseno_interiores;
	public $optimiza_uso_energia;
	public $porcentaje_ahorro_energia;
    public $promueve_acceso_vivienda_digna;
    public $descripcion_condiciones_sost_vivienda;
    public $condicion_sost_vivienda1 ;
    public $condicion_sost_vivienda2;
    public $condicion_sost_vivienda3;
    public $basado_en_naturaleza;
    public $como_basado_en_naturaleza;
	public $ha_potenciado_serv_ambientales;
    public $recursosArquitectura;
    public $serviciosAmbientales;


    public function inicializar(){

        $idProyectoGestion = '1483';



    $query= "select * from proyecto_gestion_urbana a where a.id_proyecto_gestion_urbana = $idProyectoGestion;";
    $result = $this->conn->query($query);
    if ($row = $result->fetch_array()) {
        $this->regeneracion_preservacion_espacio_natural = $row["regeneracion_preservacion_espacio_natural"]; 
        $this->regeneracion_preservacion_espacio_publicos = $row["regeneracion_preservacion_espacio_publicos"];
        $this->planificacion_construccion_sostenible = $row["planificacion_construccion_sostenible"];
        $this->infraestructura_verde = $row["infraestructura_verde"]; 
        $this->comunidades_ciudades_sostenibles = $row["comunidades_ciudades_sostenibles"]; 
        $this->diseno_interiores = $row["diseno_interiores"]; 
        $this->optimiza_uso_energia = $row["optimiza_uso_energia"]; 
        $this->porcentaje_ahorro_energia = $row["porcentaje_ahorro_energia"]; 
        $this->promueve_acceso_vivienda_digna = $row["promueve_acceso_vivienda_digna"];
        $this->descripcion_condiciones_sost_vivienda = $row["descripcion_condiciones_sost_vivienda"];
        $this->condicion_sost_vivienda1 = $row["condicion_sost_vivienda1"];
        $this->condicion_sost_vivienda2 = $row["condicion_sost_vivienda2"];
        $this->condicion_sost_vivienda3 = $row["condicion_sost_vivienda3"];
        $this->basado_en_naturaleza = $row["basado_en_naturaleza"];
        $this->como_basado_en_naturaleza = $row["como_basado_en_naturaleza"];
        $this->ha_potenciado_serv_ambientales = $row["ha_potenciado_serv_ambientales"];
/*
        $respuesta->opcionesEnfoques = getArraySQL("SELECT a.id_gestion_urbana_opcion id, a.descripcion valor1, a.valor valor2 FROM proyecto_gestion_urbana_opcion_urbana a where a.    id_proyecto_gestion_urbana = $idProyectoGestion",$con);

        $respuesta->recursosArquitectura = getArraySQL("SELECT a.id_recurso_arquitectura id FROM gestion_urbana_recurso_arquitectura a where a. id_proyecto_gestion_urbana = $idProyectoGestion",$con);

        $respuesta->serviciosAmbientales = getArraySQL("SELECT a.id_servicio_ambiental id, a.descripcion valor FROM gestion_urbana_servicio_ambiental a where a.    id_proyecto_gestion_urbana = $idProyectoGestion",$con);
*/
    }
}
/*
        $this->id_Proyecto_Gestion='';        
        $this->especie_a_erradicar='xxxx';
        $this->recursosArquitectura='xxxx';        
        $this->serviciosAmbientales='xxxx';
*/
    }
?>