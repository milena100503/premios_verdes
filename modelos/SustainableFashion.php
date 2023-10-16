<?php
require_once "config/Connection.php";
class SustainableFashion extends Connection{


    public $id_proyecto_sustainable_fashion;
	public $filosofia_proyecto;
	public $cuales_materiales_reciclaje;
	public $cantidad_produccion_anual_textiles;
	public $descripcion_tipo_diseno;
	public $tiene_segundo_uso_tela_muestreo;
	public $ha_utilizado_tecnologia_3d;
	public $ha_utilizado_virtual_sampling;
	public $utiliza_material_reciclado_indumentaria;
    public $cual_material_reciclado_indumentaria;
    public $utiliza_biotextiles_en_produccion;
    public $cual_biotextiles_en_produccion;
    public $detalle_indumentarias_proposito ;
    public $material_confeccion_comprado_localmente;
    public $utiliza_energia_renovable;
    public $utiliza_colorantes_naturales;
    public $utiliza_just_in_time;
    public $utiliza_empaques_sostenibles;
    public $cuales_empaques_sostenibles;
    public $id_zona_envio;
    public $tiene_cadena_distribucion;
    public $detalle_cadena_distribucion;
    public $optimiza_infraestructura_transporte;
    public $detalle_optimizacion_infraestrutura_transporte;
    public $vehiculos_utilizan_energias_renovables;
    public $detalle_vehiculos_distribucion;
    public $optimiza_energia_bodegas;
    public $produce_accesorios_digitales;
    public $herramientas_piezas_digitales ;
    public $tiene_utilizacion_fisica_piezas_digitales;
    public $tiene_comunidad_online;
    public $ha_participado_pasarelas_digitales;
    public $cuales_pasarelas_digitales ;
    public $detalle_caracteristicas_slow_fashion;
    public $promueve_comercio_local;
    public $como_promueve_comercio_local;
    public $estrategias_personal_sustentabilidad;
    public $involucra_comunidades_locales;
    public $funciones_dentro_del_proyecto;
    public $tipos_materiales_insumos;//
    public $enfoques_moda;
    public $tipos_textil;
    public $normativas_textiles;
    public $patrones_corte;
    public $empaques_sostenibles;
    public $distribuciones_producto;
    public $canales_comunidad;


    public function inicializar(){
    
    //98

    $id_proyecto_sustainable_fashion = '83';

        $query= "SELECT * FROM proyecto_sustainable_fashion a WHERE a.id_proyecto_sustainable_fashion = $id_proyecto_sustainable_fashion;";
    $result = $this->conn->query($query);
    
    if ($row = $result->fetch_array()) {
        $this->filosofia_proyecto = $row["filosofia_proyecto"];
        $this->cuales_materiales_reciclaje = $row["cuales_materiales_reciclaje"];
        $this->cantidad_produccion_anual_textiles= $row["cantidad_produccion_anual_textiles"];
        $this->descripcion_tipo_diseno = $row["descripcion_tipo_diseno"];
        $this->tiene_segundo_uso_tela_muestreo = $row["tiene_segundo_uso_tela_muestreo"];
        $this->ha_utilizado_tecnologia_3d = $row["ha_utilizado_tecnologia_3d"];
        $this->ha_utilizado_virtual_sampling = $row["ha_utilizado_virtual_sampling"];
        $this->utiliza_material_reciclado_indumentaria = $row["utiliza_material_reciclado_indumentaria"];
        $this->cual_material_reciclado_indumentaria = $row["cual_material_reciclado_indumentaria"];
        $this->utiliza_biotextiles_en_produccion = $row["utiliza_biotextiles_en_produccion"];

        $this->cuales_biotextiles = $row["cuales_biotextiles"];
        $this->produce_indumentaria_proposito = $row["produce_indumentaria_proposito"];

        $this->detalle_indumentarias_proposito = $row["detalle_indumentarias_proposito"];
        $this->material_confeccion_comprado_localmente = $row["material_confeccion_comprado_localmente"];
        $this->utiliza_energia_renovable = $row["utiliza_energia_renovable"];
        $this->utiliza_colorantes_naturales = $row["utiliza_colorantes_naturales"];
        $this->utiliza_just_in_time = $row["utiliza_just_in_time"];
        $this->utiliza_empaques_sostenibles = $row["utiliza_empaques_sostenibles"];
        $this->id_zona_envio = $row["id_zona_envio"];
        $this->tiene_cadena_distribucion = $row["tiene_cadena_distribucion"];
        $this->detalle_cadena_distribucion = $row["detalle_cadena_distribucion"];
        $this->optimiza_infraestructura_transporte = $row["optimiza_infraestructura_transporte"];
        $this->detalle_optimizacion_infraestrutura_transporte = $row["detalle_optimizacion_infraestrutura_transporte"];
        $this->vehiculos_utilizan_energias_renovables = $row["vehiculos_utilizan_energias_renovables"];
        $this->detalle_vehiculos_distribucion = $row["detalle_vehiculos_distribucion"];
        $this->optimiza_energia_bodegas = $row["optimiza_energia_bodegas"];
        $this->produce_accesorios_digitales = $row["produce_accesorios_digitales"];
        $this->herramientas_piezas_digitales = $row["herramientas_piezas_digitales"];
        $this->tiene_utilizacion_fisica_piezas_digitales = $row["tiene_utilizacion_fisica_piezas_digitales"];
        $this->tiene_comunidad_online = $row["tiene_comunidad_online"];
        $this->ha_participado_pasarelas_digitales = $row["ha_participado_pasarelas_digitales"];
        $this->cuales_pasarelas_digitales = $row["cuales_pasarelas_digitales"];
        $this->detalle_caracteristicas_slow_fashion = $row["detalle_caracteristicas_slow_fashion"];
        $this->promueve_comercio_local = $row["promueve_comercio_local"];
        $this->como_promueve_comercio_local = $row["como_promueve_comercio_local"];
        $this->estrategias_personal_sustentabilidad = $row["estrategias_personal_sustentabilidad"];
        $this->involucra_comunidades_locales = $row["involucra_comunidades_locales"];
        $this->funciones_dentro_del_proyecto = $row["funciones_dentro_del_proyecto"];
        $this->tipos_materiales_insumos = $row["tipos_materiales_insumos"];
 
/*   
        $respuesta->enfoques_moda = getArraySQL("SELECT id_enfoque id FROM sustainable_fashion_enfoque where id_proyecto_sustainable_fashion = $id_proyecto_sustainable_fashion",$con);
        
        $respuesta->tipos_textil = getArraySQL("SELECT id_tipo_textil id, descripcion as valor1 FROM sustainable_fashion_tipo_textil where id_proyecto_sustainable_fashion = $id_proyecto_sustainable_fashion",$con);
        
        $respuesta->normativas_textiles = getArraySQL("SELECT id_normativa id FROM sustainable_fashion_normativa_textil where id_proyecto_sustainable_fashion = $id_proyecto_sustainable_fashion",$con);

        $respuesta->patrones_corte = getArraySQL("SELECT id_patron_corte id FROM sustainable_fashion_patron_corte where id_proyecto_sustainable_fashion = $id_proyecto_sustainable_fashion",$con);

        $respuesta->empaques_sostenibles = getArraySQL("SELECT id_empaque_sostenible id, descripcion as valor1 FROM sustainable_fashion_empaque_sostenible where id_proyecto_sustainable_fashion = $id_proyecto_sustainable_fashion",$con);
    
        $respuesta->distribuciones_producto = getArraySQL("SELECT id_distribucion_producto id, descripcion as valor1 FROM sustainable_fashion_distribucion_producto where id_proyecto_sustainable_fashion = $id_proyecto_sustainable_fashion",$con);

        $respuesta->canales_comunidad = getArraySQL("SELECT id_canal_comunidad id, descripcion FROM sustainable_fashion_canal_comunidad where id_proyecto_sustainable_fashion = $id_proyecto_sustainable_fashion",$con);
        */ 
    }   
}


/*
        $this->id_proyecto_sustainable_fashion='';
        $this->cual_biotextiles_en_produccion='xxx';
        $this->indumentarias_proposito ='si';
        $this->cuales_empaques_sostenibles='1';
        $this->distribución_del_producto='1';       
        $this->enfoques_moda='xxxx';
        $this->tipos_textil='xxxx';   
        $this->enfoques_agua='xxxx';
        $this->practicas_ancestrales='xxxx';  
        $this->normativas_textiles='xxxx';
        $this->patrones_corte='1';  
        $this->empaques_sostenibles='xxxx';
        $this->distribuciones_producto='xxxx';
        $this->canales_comunidad='xxxx';
*/ 






    }

?>