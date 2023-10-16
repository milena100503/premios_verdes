<?php
require_once "config/Connection.php";
class SustainableFarming extends Connection{


    public $id_proyecto_Sustainable_Farming;
	public $filosofia_proyecto;
	public $sistema_tecnologia_utilizada;
	public $tiene_estrategia_optimizacion_recursos;
	public $maxima_vida_util_produccion;
	public $como_maxima_vida_util_produccion;
	public $integra_procesos_biologicos_ecologicos;
	public $minimiza_fuentes_no_renovables;
	public $cuales_fuentes_no_renovables;
    public $aprovecha_conocimientos_tradiciones;
    public $como_aprovecha_conocimientos_tradiciones;
    public $fomenta_rotacion_cultivos;
    public $cuales_cultivos_rotacion;
    public $implementa_practicas_evitar_erosion;
    public $cuales_practicas_evitar_erosion;
    public $utiliza_manejo_integrado_plagas;
    public $implementa_sistemas_agroforestales;
    public $no_contribuye_deforestacion_bosques;
    public $optimiza_perdida_alimentos;
    public $como_optimiza_perdida_alimentos;
    public $busca_proveedores_proximidad_cercana;
    public $compra_insumos_productores_locales;
    public $tiene_menu_rotativo;
    public $tiene_menu_alimentos_vegetarianos;
    public $como_previene_perdida_alimentos;
    public $separa_residuos_para_gestores;
    public $cuenta_con_cultivos_propios;
    public $tiene_cadena_distribucion_inversa;
    public $cual_cadena_distribucion_inversa;
    public $optimiza_infraestructura_transporte;
    public $como_optimiza_infraestructura_transporte;
    public $vehiculos_utilizan_energias_renovables;
    public $optimiza_energia_bodegas;
    public $como_optimiza_energia_bodegas;
    public $busca_mejorar_seguridad_alimentaria;
    public $como_busca_mejorar_seguridad_alimentaria;
    public $promueve_comercio_local;
    public $como_promueve_comercio_local ;
    public $busca_minimizar_emisiones_carbono;
    public $como_busca_minimizar_emisiones_carbono;
    public $impulsa_modelo_finca;
    public $como_impulsa_modelo_finca;
    public $estrategias_personal_sustentabilidad;
    public $involucra_comunidades_locales;//
    public $funciones_dentro_del_proyecto;
    public $enfoques_produccion;
    public $elementos_ambientales;
    public $empaques_ambientales;




    public function inicializar(){


    $id_proyecto_sustainable_farming = '158' ;

    $query = "SELECT * FROM proyecto_sustainable_farming a WHERE a.id_proyecto_sustainable_farming = $id_proyecto_sustainable_farming;";
    $result = $this->conn->query($query);
    
    if ($row = $result->fetch_array()) {

        $this->id_proyecto = $row["id_proyecto"];
        $this->filosofia_proyecto = $row["filosofia_proyecto"];
        $this->sistema_tecnologia_utilizada = $row["sistema_tecnologia_utilizada"];
        $this->tiene_estrategia_optimizacion_recursos  = $row["tiene_estrategia_optimizacion_recursos"];
        $this->maxima_vida_util_produccion = $row["maxima_vida_util_produccion"];
        $this->como_maxima_vida_util_produccion = $row["como_maxima_vida_util_produccion"];
        $this->integra_procesos_biologicos_ecologicos = $row["integra_procesos_biologicos_ecologicos"];
        $this->minimiza_fuentes_no_renovables = $row["minimiza_fuentes_no_renovables"];
        $this->cuales_fuentes_no_renovables = $row["cuales_fuentes_no_renovables"];
        $this->aprovecha_conocimientos_tradiciones = $row["aprovecha_conocimientos_tradiciones"];
        $this->como_aprovecha_conocimientos_tradiciones = $row["como_aprovecha_conocimientos_tradiciones"];
        $this->fomenta_rotacion_cultivos = $row["fomenta_rotacion_cultivos"];
        $this->cuales_cultivos_rotacion = $row["cuales_cultivos_rotacion"];
        $this->implementa_practicas_evitar_erosion = $row["implementa_practicas_evitar_erosion"];
        $this->cuales_practicas_evitar_erosion = $row["cuales_practicas_evitar_erosion"];
        $this->utiliza_manejo_integrado_plagas = $row["utiliza_manejo_integrado_plagas"];
        $this->implementa_sistemas_agroforestales = $row["implementa_sistemas_agroforestales"];
        $this->no_contribuye_deforestacion_bosques = $row["no_contribuye_deforestacion_bosques"];
        $this->optimiza_perdida_alimentos = $row["optimiza_perdida_alimentos"];
        $this->como_optimiza_perdida_alimentos = $row["como_optimiza_perdida_alimentos"];
        $this->busca_proveedores_proximidad_cercana = $row["busca_proveedores_proximidad_cercana"];
        $this->compra_insumos_productores_locales = $row["compra_insumos_productores_locales"];
        $this->tiene_menu_rotativo = $row["tiene_menu_rotativo"];
        $this->tiene_menu_alimentos_vegetarianos = $row["tiene_menu_alimentos_vegetarianos"];
        $this->como_previene_perdida_alimentos = $row["como_previene_perdida_alimentos"];
        $this->separa_residuos_para_gestores = $row["separa_residuos_para_gestores"];
        $this->cuenta_con_cultivos_propios = $row["cuenta_con_cultivos_propios"];
        $this->tiene_cadena_distribucion_inversa = $row["tiene_cadena_distribucion_inversa"];
        $this->cual_cadena_distribucion_inversa = $row["cual_cadena_distribucion_inversa"];
        $this->optimiza_infraestructura_transporte= $row["optimiza_infraestructura_transporte"];
        $this->como_optimiza_infraestructura_transporte = $row["como_optimiza_infraestructura_transporte"];
        $this->vehiculos_utilizan_energias_renovables = $row["vehiculos_utilizan_energias_renovables"];
        $this->como_vehiculos_utilizan_energias_renovables = $row["como_vehiculos_utilizan_energias_renovables"];
        $this->optimiza_energia_bodegas = $row["optimiza_energia_bodegas"];
        $this->como_optimiza_energia_bodegas = $row["como_optimiza_energia_bodegas"];
        $this->busca_mejorar_seguridad_alimentaria = $row["busca_mejorar_seguridad_alimentaria"];
        $this->como_busca_mejorar_seguridad_alimentaria = $row["como_busca_mejorar_seguridad_alimentaria"];
        $this->promueve_comercio_local = $row["promueve_comercio_local"];
        $this->como_promueve_comercio_local = $row["como_promueve_comercio_local"];
        $this->busca_minimizar_emisiones_carbono = $row["busca_minimizar_emisiones_carbono"];
        $this->como_busca_minimizar_emisiones_carbono = $row["como_busca_minimizar_emisiones_carbono"];
        $this->impulsa_modelo_finca = $row["impulsa_modelo_finca"];
        $this->como_impulsa_modelo_finca = $row["como_impulsa_modelo_finca"];
        $this->estrategias_personal_sustentabilidad = $row["estrategias_personal_sustentabilidad"];
        $this->involucra_comunidades_locales = $row["involucra_comunidades_locales"];
        $this->funciones_dentro_del_proyecto = $row["funciones_dentro_del_proyecto"];
     /*   
        $respuesta->enfoques_produccion = getArraySQL("SELECT id_enfoque id FROM sustainable_farming_enfoque_produccion where id_proyecto_sustainable_farming = $id_proyecto_sustainable_farming",$con);
        
        $respuesta->elementos_ambientales = getArraySQL("SELECT id_elemento id FROM sustainable_farming_elemento_ambiental where id_proyecto_sustainable_farming = $id_proyecto_sustainable_farming",$con);

        $respuesta->empaques_ambientales = getArraySQL("SELECT id_empaque id FROM sustainable_farming_empaque_ambiental where id_proyecto_sustainable_farming = $id_proyecto_sustainable_farming",$con);
       */ 
    }   
}

/*
        $this->id_proyecto_Sustainable_Farming='';
        $this->enfoques_produccion ='xxxx';
        $this->elementos_ambientales ='xxxx';
        $this->empaques_ambientales='xxxx';
*/


    }
?>