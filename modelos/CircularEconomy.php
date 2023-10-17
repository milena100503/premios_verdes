<?php
require_once "config/Connection.php";
class CircularEconomy extends Connection {


    public $id_proyecto_circular_economy;
	public $cantidad_utilizada_materia_prima;
	public $unidad_cantidad_utilizada_materia_prima;
	public $cantidad_vuelve_naturaleza;
	public $unidad_cantidad_vuelve_naturaleza;
	public $id_aprovechamiento_residuo;
	public $cantidad_reciclable;
	public $unidad_cantidad_reciclable;
	public $estrategias_reduccion_contaminacion;//
    public $producto_es_reparable;
    public $es_opcion_modelo_negocio;
    public $participa_gestion_residuos;
    public $id_producto_final;
    public $permite_generacion_energia;
    public $cantidad_generacion_energia;
    public $incluye_experimentacion_reciclaje;
    public $tiene_enfoque_producto_reusable;
    public $numero_veces_reusar_producto;
    public $ha_determinado_impacto_ambiental;
    public $id_impacto_medido;
    public $detalle_impacto;
    public $producto_es_reciclable;
    public $incluye_capacitacion_economia_circular;



    public function inicializar(){

        $id_proyecto_circular_economy ='401';

    $query = "SELECT * FROM proyecto_circular_economy a WHERE a.id_proyecto_circular_economy = $id_proyecto_circular_economy;";
    $result = $this->conn->query($query);
            
    if ($row = $result->fetch_array()) {
        
        $this->cantidad_utilizada_materia_prima = $row["cantidad_utilizada_materia_prima"];
       // $respuesta->id_unidad_cantidad_utilizada_materia_prima = $row["id_unidad_cantidad_utilizada_materia_prima"];
        $this->cantidad_vuelve_naturaleza = $row["cantidad_vuelve_naturaleza"];
       // $respuesta->id_unidad_cantidad_vuelve_naturaleza = $row["id_unidad_cantidad_vuelve_naturaleza"];
        $this->id_aprovechamiento_residuo = $row["id_aprovechamiento_residuo"];
        $this->cantidad_reciclable = $row["cantidad_reciclable"];
        //$respuesta->id_unidad_cantidad_reciclable = $row["id_unidad_cantidad_reciclable"];
        $this->estrategias_reduccion_contaminacion = $row["estrategias_reduccion_contaminacion"];
        $this->producto_es_reparable = $row["producto_es_reparable"];
        $this->es_opcion_modelo_negocio = $row["es_opcion_modelo_negocio"];
        $this->participa_gestion_residuos = $row["participa_gestion_residuos"];
        $this->id_producto_final = $row["id_producto_final"];
        $this->permite_generacion_energia = $row["permite_generacion_energia"];
        $this->cantidad_generacion_energia = $row["cantidad_generacion_energia"];
        $this->incluye_experimentacion_reciclaje = $row["incluye_experimentacion_reciclaje"];
        $this->tiene_enfoque_producto_reusable = $row["tiene_enfoque_producto_reusable"];
        $this->numero_veces_reusar_producto = $row["numero_veces_reusar_producto"];
        $this->ha_determinado_impacto_ambiental = $row["ha_determinado_impacto_ambiental"];
        $this->id_impacto_medido = $row["id_impacto_medido"];
        $this->detalle_impacto = $row["detalle_impacto"];
        $this->producto_es_reciclable = $row["producto_es_reciclable"];
        $this->incluye_capacitacion_economia_circular = $row["incluye_capacitacion_economia_circular"];

        /*
        $respuesta->enfoques_economia = getArraySQL("SELECT id_enfoque id FROM circular_economy_enfoque where id_proyecto_circular_economy = $id_proyecto_circular_economy",$con);
    
        $respuesta->actividades_proy_economia = getArraySQL("SELECT id_actividad id FROM circular_economy_actividad where id_proyecto_circular_economy = $id_proyecto_circular_economy",$con);
    
        $respuesta->enfoques_fabricacion = getArraySQL("SELECT id_enfoque id FROM circular_economy_enfoque_fabricacion where id_proyecto_circular_economy = $id_proyecto_circular_economy",$con);

        $respuesta->enfoques_regeneracion = getArraySQL("SELECT id_enfoque id FROM circular_economy_enfoque_regeneracion where id_proyecto_circular_economy = $id_proyecto_circular_economy",$con);
    
        $respuesta->tipos_gestion_residuos = getArraySQL("SELECT t.id_gestion_residuo id, t.descripcion valor1, tg.id_padre as id_padre FROM circular_economy_gestion_residuo t LEFT JOIN tipo_gestion_residuo tg ON t.id_gestion_residuo = tg.id where id_proyecto_circular_economy = $id_proyecto_circular_economy",$con);

        $respuesta->procesos_reciclaje = getArraySQL("SELECT id_proceso id FROM circular_economy_proceso_reciclaje where id_proyecto_circular_economy = $id_proyecto_circular_economy",$con);

        $respuesta->actores_proyecto = getArraySQL("SELECT id_actor id FROM circular_economy_actor_proyecto where id_proyecto_circular_economy = $id_proyecto_circular_economy",$con);
    
        $respuesta->origenes_residuos = getArraySQL("SELECT id_origen id, cantidad as valor1, id_unidad as valor2 FROM circular_economy_origen_residuo where id_proyecto_circular_economy = $id_proyecto_circular_economy",$con);

        $respuesta->compuestos_residuos = getArraySQL("SELECT id_compuesto id, descripcion as valor1, cantidad as valor2, id_unidad as valor3 FROM circular_economy_compuesto_residuo where id_proyecto_circular_economy = $id_proyecto_circular_economy",$con);

//
        $respuesta->apoyos_investigacion = getArraySQL("SELECT id_apoyo_investigacion id, descripcion as valor1 FROM sustainable_academic_apoyo_investigacion where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

        $respuesta->ongs_investigacion = getArraySQL("SELECT id_ong_investigacion id, descripcion as valor1 FROM sustainable_academic_ong_investigacion where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

        $respuesta->fuentes_capital = getArraySQL("SELECT id_fuente_capital id, descripcion as valor1, monto as valor2 FROM sustainable_academic_fuente_capital where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

        $respuesta->prestamos = getArraySQL("SELECT valor,duracion, interes FROM sustainable_academic_prestamo where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

        $respuesta->fondos_no_reembolsables = getArraySQL("SELECT fuente,monto FROM sustainable_academic_fuente_no_reembolsable where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);*/
    }   
}
/*

        $this->id_proyecto_circular_economy='';
        
        $this->unidad_cantidad_utilizada_materia_prima ='xxxx';
        
        $this->unidad_cantidad_vuelve_naturaleza='xxxx';

        $this->unidad_cantidad_reciclable='xxxx';        
*/
    }

?>