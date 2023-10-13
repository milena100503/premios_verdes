<?php
require_once "config/Connection.php";
class HabitatEcosystem extends Connection{


    public $id_proyecto_habitat_ecosystem;
	public $id_tipo_ecosistema;
	public $area_influencia_proyecto;
	public $porcentaje_reduccion_carbono;
	public $captura_dioxido_carbono ;
	public $considera_adicionalidades_carbono;
	public $dinamiza_economia_local;
	public $como_dinamiza_economia_local;
	public $maneja_area_protegida;
    public $como_maneja_area_protegida;
    public $hace_parte_ecosistema_fragil;
    public $cual_ecosistema_fragil;
    public $principales_especies_protegidas;
    public $realiza_monitoreo_especies;
    public $tiene_plan_area_conservacion;
    public $id_tipo_bosque;
	public $id_clase_bosque;
    public $especie_a_erradicar;
    public $id_estrategia_incendio_forestal;
    public $disminucion_eventos_incendio_forestal;
    public $id_recurso_hidrico;
    public $involucra_comunidades_locales;
    public $funciones_dentro_del_proyecto;
    public $ecosistemas;
    public $fuentes_agua_dulce;
    public $objetivos_agua;
	public $objetivos_proyecto_habitat;
    public $enfoques_habitat;
    public $tipos_especie;
    public $tipos_fauna;
    public $agentes_contaminacion;
    public $amenzas_ecosistema;
    public $accesos_informacion;


    public function inicializar(){

        $id_proyecto_habitat_ecosystem ='679';

    $query = "SELECT * FROM proyecto_habitat_ecosystem a WHERE a.id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem;";
    $result = $this->conn->query($query);
    
    if ($row = $result->fetch_array()) {
        $this->id_tipo_ecosistema = $row["id_tipo_ecosistema"];
        $this->area_influencia_proyecto = $row["area_influencia_proyecto"];
        $this->porcentaje_reduccion_carbono = $row["porcentaje_reduccion_carbono"];
        $this->captura_dioxido_carbono = $row["captura_dioxido_carbono"];
        $this->considera_adicionalidades_carbono = $row["considera_adicionalidades_carbono"];
        $this->dinamiza_economia_local = $row["dinamiza_economia_local"];
        $this->como_dinamiza_economia_local = $row["como_dinamiza_economia_local"];
        $this->maneja_area_protegida = $row["maneja_area_protegida"];
        $this->como_maneja_area_protegida = $row["como_maneja_area_protegida"];
        $this->hace_parte_ecosistema_fragil = $row["hace_parte_ecosistema_fragil"];
        $this->cual_ecosistema_fragil = $row["cual_ecosistema_fragil"];
        $this->principales_especies_protegidas = $row["principales_especies_protegidas"];
        $this->realiza_monitoreo_especies = $row["realiza_monitoreo_especies"];
        $this->tiene_plan_area_conservacion = $row["tiene_plan_area_conservacion"];
        $this->id_tipo_bosque = $row["id_tipo_bosque"];
        $this->id_clase_bosque = $row["id_clase_bosque"];
        $this->especie_a_erradicar = $row["especie_a_erradicar"];
        $this->id_estrategia_incendio_forestal = $row["id_estrategia_incendio_forestal"];
        $this->disminucion_eventos_incendio_forestal = $row["disminucion_eventos_incendio_forestal"];
        $this->id_recurso_hidrico = $row["id_recurso_hidrico"];
        $this->involucra_comunidades_locales = $row["involucra_comunidades_locales"];
        $this->funciones_dentro_del_proyecto = $row["funciones_dentro_del_proyecto"];
    
    /*
        $respuesta->ecosistemas = getArraySQL("SELECT ph.id_tipo_ecosistema id, te.id_padre FROM habitat_ecosystem_ecosistema ph LEFT JOIN tipos_ecosistemas te ON te.id = ph.id_tipo_ecosistema  WHERE ph.id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);

        $respuesta->fuentes_agua_dulce = getArraySQL("SELECT id_fuente_agua_dulce id FROM habitat_ecosystem_fuentes_agua_dulce where id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);
        
        $respuesta->objetivos_agua = getArraySQL("SELECT id_objetivo_agua id FROM habitat_ecosystem_objetivo_agua where id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);

        $respuesta->objetivos_proyecto_habitat = getArraySQL("SELECT id_objetivo_proyecto id FROM habitat_ecosystem_objetivo_proyecto where id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);

        $respuesta->enfoques_habitat = getArraySQL("SELECT id_enfoque_proyecto id FROM habitat_ecosystem_enfoque_proyecto where id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);

        $respuesta->tipos_especie = getArraySQL("SELECT id_especie id FROM habitat_ecosystem_especies where id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);
        
        $respuesta->tipos_fauna = getArraySQL("SELECT id_fauna id FROM habitat_ecosystem_fauna where id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);
        
        $respuesta->agentes_contaminacion = getArraySQL("SELECT id_agente_contaminacion id FROM habitat_ecosystem_agente_contaminacion where id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);

        $respuesta->amenzas_ecosistema = getArraySQL("SELECT id_amenaza id FROM habitat_ecosystem_amenaza where id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);

        $respuesta->accesos_informacion = getArraySQL("SELECT id_acceso_informacion id FROM habitat_ecosystem_acceso_informacion where id_proyecto_habitat_ecosystem = $id_proyecto_habitat_ecosystem",$con);
    */
    }   
}






/* 
        $this->id_proyecto_habitat_ecosystem='';
        $this->id_tipo_ecosistema='xxxx';
        $this->area_influencia_proyecto='xxxx';
        $this->captura_dioxido_carbono='si';
        $this->considera_adicionalidades_carbono='xxxx';
        $this->dinamiza_economia_local='si';
        $this->como_dinamiza_economia_local='xxxx';
        $this->maneja_area_protegida='si';        
        $this->como_maneja_area_protegida='xxxx';
        $this->hace_parte_ecosistema_fragil='si';
        $this->cual_ecosistema_fragil='xxxx';
        $this->principales_especies_protegidas='si';
        $this->realiza_monitoreo_especies ='si';
        $this->tiene_plan_area_conservacion='xxxx';
        $this->id_tipo_bosque='xxxx';
        $this->id_clase_bosque='xxxx';
        $this->especie_a_erradicar='xxxx';
        $this->id_estrategia_incendio_forestal='xxxx';
        $this->disminucion_eventos_incendio_forestal='xxxx';        
        $this->id_recurso_hidrico='xxxx';
        $this->involucra_comunidades_locales='si';
        $this->funciones_dentro_del_proyecto='xxxx';
        $this->ecosistemas='xxxx';
        $this->fuentes_agua_dulce ='xxxx';
        $this->objetivos_agua='xxxx';
        $this->objetivos_proyecto_habitat='xxxx';
        $this->enfoques_habitat='xxxx';
        $this->tipos_especie='xxxx';
        $this->tipos_fauna='xxxx';
        $this->agentes_contaminacion='xxxx';
        $this->amenzas_ecosistema='xxxx';
        $this->accesos_informacion='xxxx';
       */
    }

?>