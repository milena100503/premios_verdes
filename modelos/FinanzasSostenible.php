<?php
require_once "config/Connection.php";

class FinanzasSostenible extends Connection{
    
	public $id_Proyecto_Finanzas;
	public $ident_riesgos_ambientales;
	public $ident_riesgos_sociales;
	public $creacion_producto_servicio;
	public $monto_portafolio;
	public $porcentaje_cartera;
	public $rango_operacion_valor1;
	public $rango_operacion_valor2;
    public $financiamiento_corto_plazo;
    public $financiamiento_largo_plazo;
    public $tipo_institucion_financiera;
    public $otra_tipo_institucion;
    public $prod_serv_facilita_transicion_ecologica;
    public $como_facilita_transicion_ecologica;
    public $prod_serv_facilita_descarbonización;
    public $como_facilita_descarbonización;
    public $prod_serv_acelera_modelos_circulares;
    public $como_acelera_modelos_circulares;//
    public $prod_serv_acelera_creacion_empleo;
    public $como_acelera_creacion_empleo;
    public $prod_serv_acelera_aprov_sostenible;
    public $como_acelera_aprov_sostenible;
    public $prod_serv_acelera_reduccion_desigualdad;
    public $como_acelera_reduccion_desigualdad;
    public $descripcion_sostenibilidad_financiera;
    public $tiene_fines_lucro;
    public $monto_financiamiento;
    public $destino_fondos;
    public $enfoques;
    public $tiposFinanciamientos;
    public $tiposOrganizaciones;
    public $instrumentosFinancieros;
    public $riesgos;
    public $intereses_participacion;
    public $tipos_capacitaciones;
    public $tipos_networking;


    public function inicializar(){

        $idProyectoFinanzas = '265';


        $query= "select * from proyecto_finanzas_sostenibles a where a.id_proyecto_finanzas_sostenibles = $idProyectoFinanzas;";
        $result = $this->conn->query($query);
        if ($row = $result->fetch_array()) {
            $this->ident_riesgos_ambientales = $row["ident_riesgos_ambientales"];
            $this->ident_riesgos_sociales = $row["ident_riesgos_sociales"];
            $this->creacion_producto_servicio = $row["creacion_producto_servicio"];
            $this->monto_portafolio = $row["monto_portafolio"];
            $this->porcentaje_cartera = $row["porcentaje_cartera"];
            $this->rango_operacion_valor1 = $row["rango_operacion_valor1"];
            $this->rango_operacion_valor2 = $row["rango_operacion_valor2"];
            $this->financiamiento_corto_plazo = $row["financiamiento_corto_plazo"];
            $this->financiamiento_largo_plazo = $row["financiamiento_largo_plazo"];
            $this->tipo_institucion_financiera = $row["tipo_institucion_financiera"];
            $this->otra_tipo_institucion = $row["otra_tipo_institucion"];
            
            $this->prod_serv_facilita_transicion_ecologica=$row["prod_serv_facilita_transicion_ecologica"]; 
            $this->como_facilita_transicion_ecologica = $row["como_facilita_transicion_ecologica"];
            $this->prod_serv_facilita_descarbonización = $row["prod_serv_facilita_descarbonización"];
            $this->como_facilita_descarbonización = $row["como_facilita_descarbonización"];
            $this->prod_serv_acelera_modelos_circulares = $row["prod_serv_acelera_modelos_circulares"];
            $this->como_acelera_modelos_circulares = $row["como_acelera_modelos_circulares"];
            $this->prod_serv_acelera_creacion_empleo = $row["prod_serv_acelera_creacion_empleo"];
            $this->como_acelera_creacion_empleo = $row["como_acelera_creacion_empleo"];
            $this->prod_serv_acelera_aprov_sostenible = $row["prod_serv_acelera_aprov_sostenible"];
            $this->como_acelera_aprov_sostenible = $row["como_acelera_aprov_sostenible"];
            $this->prod_serv_acelera_reduccion_desigualdad=$row["prod_serv_acelera_reduccion_desigualdad"];
            $this->como_acelera_reduccion_desigualdad = $row["como_acelera_reduccion_desigualdad"];

            $this->descripcion_sostenibilidad_financiera = $row["descripcion_sostenibilidad_financiera"];
            $this->tiene_fines_lucro = $row["tiene_fines_lucro"];
            $this->monto_financiamiento = $row["monto_financiamiento"];
            $this->destino_fondos = $row["destino_fondos"];
            
            
            
/*
            $respuesta->enfoques = getArraySQL("SELECT a.id_opciones_finanzas_sostenibles id, a.descripcion valor FROM proyecto_finanzas_sostenibles_opciones a where a.id_proyecto_finanzas_sostenibles = $idProyectoFinanzas",$con);
            
            $respuesta->tiposFinanciamientos = getArraySQL("SELECT a.id_tipo_financiamiento id, a.descripcion valor FROM proyecto_finanzas_sostenibles_tipo_financiamiento a where a.id_proyecto_finanzas_sostenibles = $idProyectoFinanzas",$con);
            
            $respuesta->tiposOrganizaciones = getArraySQL("SELECT a.id_tipo_org id, '' valor FROM proyecto_finanzas_sostenibles_tipo_org a where a.id_proyecto_finanzas_sostenibles = $idProyectoFinanzas",$con);
            
            $respuesta->instrumentosFinancieros = getArraySQL("SELECT a.id_instrumento_financiero id, '' valor FROM proyecto_finanzas_sostenibles_instrumento_financiero a where a.id_proyecto_finanzas_sostenibles = $idProyectoFinanzas",$con);

            $respuesta->riesgos = getArraySQL("SELECT a.riesgo, a.gestion FROM proyecto_finanzas_sostenibles_riesgo_financiero a where a.id_proyecto_finanzas_sostenibles = $idProyectoFinanzas",$con);

            $respuesta->intereses_participacion = getArraySQL("SELECT a.id_interes id FROM proyecto_finanzas_sostenibles_interes_participacion a where a.id_proyecto_finanzas_sostenibles = $idProyectoFinanzas",$con);

            $respuesta->tipos_capacitaciones = getArraySQL("SELECT a.id_tipo_capacitacion id, descripcion as valor1 FROM proyecto_finanzas_sostenibles_capacitacion a where a.id_proyecto_finanzas_sostenibles = $idProyectoFinanzas",$con);

            $respuesta->tipos_networking = getArraySQL("SELECT a.id_tipo_networking id FROM proyecto_finanzas_sostenibles_networking a where a.id_proyecto_finanzas_sostenibles = $idProyectoFinanzas",$con);
*/
        
    }

        
/*
        $this->id_Proyecto_Finanzas='';
        $this->enfoques ='xxxx';
        $this->tiposFinanciamientos ='xxxx';
        $this->tiposOrganizaciones ='xxxx';
        $this->instrumentosFinancieros ='xxxx';
        $this->riesgos ='xxxx';
        $this->intereses_participacion ='xxxx';
        $this->tipos_capacitaciones ='xxxx';
        $this->tipos_networking ='xxxx';
  */      
    }
}
?>