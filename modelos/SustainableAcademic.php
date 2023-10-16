<?php
require_once "config/Connection.php";
class SustainableAcademic extends Connection{


    public $id_proyecto_sustainable_academic;
    public $facultad_apoyo_investigacion;
    public $id_forma_investigacion;
    public $id_etapa_investigacion;
    public $tiene_apoyo_org_externa ;
    public $ha_creado_protipos;
    public $detalle_prototipos;
    public $ha_implementado_plan_piloto;
    public $detalle_plan_piloto;
    public $ha_creado_compania_spin;
    public $detalle_compania_spin;
    public $tiene_conflictos_interes;
    public $cuales_conflictos_interes;
    public $tiene_aprobacion_comite_etica;
    public $id_estado_publicacion;
    public $meses_investigacion;
    public $fecha_inicio ;
    public $fecha_fin;
    public $resumen_paper;
    public $paper_aprobado_homologo;
    public $revista_publicacion_paper;
    public $descripcion_solucion_cambio_climatico;
    public $descripcion_cumplimiento_agenda_2030;
    public $resultados_recomendaciones;
    public $ha_obtenido_fondos_trabajo;
    public $ha_obtenido_prestamos;
    public $ha_obtenido_fondos_no_reembolsables;
    public $descripcion_sostenibilidad_financiera;
    public $monto_financiamiento;
    public $destino_fondos;
    public $enfoques_investigacion ;
    public $apoyos_investigacion;
    public $ongs_investigacion;
    public $prestamos;
    public $fondos_no_reembolsables;
    public $intereses_participacion ;
    public $tipos_capacitaciones;
    public $tipos_networking;


    public function inicializar(){

    $id_proyecto_sustainable_academic ='112';

    $query = "SELECT * FROM proyecto_sustainable_academic a WHERE a.id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic;";
    $result = $this->conn->query($query);
            
         if ($row = $result->fetch_array()) {
                $this->facultad_apoyo_investigacion = $row["facultad_apoyo_investigacion"];
                $this->id_forma_investigacion = $row["id_forma_investigacion"];
                $this->id_etapa_investigacion = $row["id_etapa_investigacion"];
                $this->tiene_apoyo_org_externa = $row["tiene_apoyo_org_externa"];
                $this->ha_creado_protipos = $row["ha_creado_protipos"];
                $this->detalle_prototipos = $row["detalle_prototipos"];
                $this->ha_implementado_plan_piloto = $row["ha_implementado_plan_piloto"];
                $this->detalle_plan_piloto = $row["detalle_plan_piloto"];
                $this->ha_creado_compania_spin = $row["ha_creado_compania_spin"];
                $this->detalle_compania_spin = $row["detalle_compania_spin"];
                $this->tiene_conflictos_interes = $row["tiene_conflictos_interes"];
                $this->cuales_conflictos_interes = $row["cuales_conflictos_interes"];
                $this->tiene_aprobacion_comite_etica = $row["tiene_aprobacion_comite_etica"];
                $this->id_estado_publicacion = $row["id_estado_publicacion"];
                $this->meses_investigacion = $row["meses_investigacion"];
                $this->fecha_inicio = $row["fecha_inicio"];
                $this->fecha_fin = $row["fecha_fin"];
                $this->resumen_paper = $row["resumen_paper"];
                $this->paper_aprobado_homologo = $row["paper_aprobado_homologo"];
                $this->revista_publicacion_paper = $row["revista_publicacion_paper"];
                $this->descripcion_solucion_cambio_climatico = $row["descripcion_solucion_cambio_climatico"];
                $this->descripcion_cumplimiento_agenda_2030 = $row["descripcion_cumplimiento_agenda_2030"];
                $this->resultados_recomendaciones = $row["resultados_recomendaciones"];
                $this->ha_obtenido_fondos_trabajo = $row["ha_obtenido_fondos_trabajo"];
                $this->ha_obtenido_prestamos = $row["ha_obtenido_prestamos"];
                $this->ha_obtenido_fondos_no_reembolsables = $row["ha_obtenido_fondos_no_reembolsables"];

                $this->descripcion_sostenibilidad_financiera = $row["descripcion_sostenibilidad_financiera"];
                $this->monto_financiamiento = $row["monto_financiamiento"];
                $this->destino_fondos = $row["destino_fondos"];
                


/*
                $respuesta->enfoques_investigacion = getArraySQL("SELECT id_enfoque_investigacion id FROM sustainable_academic_enfoque_investigacion where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);
        
                $respuesta->apoyos_investigacion = getArraySQL("SELECT id_apoyo_investigacion id, descripcion as valor1 FROM sustainable_academic_apoyo_investigacion where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

                $respuesta->ongs_investigacion = getArraySQL("SELECT id_ong_investigacion id, descripcion as valor1 FROM sustainable_academic_ong_investigacion where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

                $respuesta->fuentes_capital = getArraySQL("SELECT id_fuente_capital id, descripcion as valor1, monto as valor2 FROM sustainable_academic_fuente_capital where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

                $respuesta->prestamos = getArraySQL("SELECT valor,duracion, interes FROM sustainable_academic_prestamo where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

                $respuesta->fondos_no_reembolsables = getArraySQL("SELECT fuente,monto FROM sustainable_academic_fuente_no_reembolsable where id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

                $respuesta->intereses_participacion = getArraySQL("SELECT a.id_interes id FROM sustainable_academic_interes_participacion a where a.id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

                $respuesta->tipos_capacitaciones = getArraySQL("SELECT a.id_tipo_capacitacion id, descripcion as valor1 FROM sustainable_academic_capacitacion a where a.id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);

                $respuesta->tipos_networking = getArraySQL("SELECT a.id_tipo_networking id FROM sustainable_academic_networking a where a.id_proyecto_sustainable_academic = $id_proyecto_sustainable_academic",$con);
           */     
        }       
}
/*
        $this->id_proyecto_sustainable_academic='';
        $this->enfoques_investigacion='2';
        
        $this->apoyos_investigacion='xxxx';
        $this->ongs_investigacion='xxxx';
        $this->prestamos='xxxx';    
        $this->fondos_no_reembolsables='xxxx';
        $this->intereses_participacion='xxxx';
        $this->tipos_capacitaciones='xxxx';
        $this->tipos_networking='xxxx';
*/
    }

?>