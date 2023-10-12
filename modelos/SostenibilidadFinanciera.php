<?php

require_once "config/Connection.php";

class SostenibilidadFinanciera extends Connection{
    
	public $id_Sostenibilidad_Social;
    public $descripcion_sostenibilidad_financiera;
    public $tiene_fines_lucro;
	public $crecimiento_economico;
	public $destino_fondo;
	public $archivo;
	public $id_fase_ejecucion;
	public $tiene_experiencia_leventamiento_fondos;
	public $ha_levantado_capital_riesgo;
	public $ha_obtenido_prestamos;
    public $ha_obtenido_fondos_no_reembolsables;
    public $intereses_participar;
    public $capacitaciones;
    public $netWorkings;
    public $listaCompuestosIngresos ;
    public $fuentesCapital;
    public $prestamos ;
    public $fondos_no_reembolsables;


    public function inicializar(){

        $idSostenibilidadFinanciera='289';
    
    $query= "select * from sostenibilidad_financiera a where a.id_sostenibilidad_financiera = $idSostenibilidadFinanciera;";
    $result = $this->conn->query($query);
    if ($row = $result->fetch_array()) {
        $this->descripcion_sostenibilidad_financiera = $row["descripcion_sostenibilidad_financiera"];
        $this->fines_lucro = $row["fines_lucro"];
        $this->crecimiento_economico = $row["crecimiento_economico"];
        $this->rango_monto_financiamiento = $row["rango_monto_financiamiento"];
        $this->destino_fondo = $row["destino_fondo"];
        $this->archivo = $row["archivo"];
        $this->id_fase_ejecucion = $row["id_fase_ejecucion"];
        $this->tiene_experiencia_leventamiento_fondos = $row["tiene_experiencia_leventamiento_fondos"];
        $this->ha_levantado_capital_riesgo = $row["ha_levantado_capital_riesgo"];
        $this->ha_obtenido_prestamos = $row["ha_obtenido_prestamos"];
        $this->ha_obtenido_fondos_no_reembolsables = $row["ha_obtenido_fondos_no_reembolsables"];
                
/*        
        $respuesta->intereses_participar = getArraySQL("select a.id_interes_participar id, '' descripcion from soste_finan_interes_participar a where a.id_sostenibilidad_financiera = $idSostenibilidadFinanciera",$con);
        $respuesta->capacitaciones = getArraySQL("select a.id_tipo_capacitacion id, a.descripcion from sostenibilidad_financiera_tipo_capacitacion a where a.id_sostenibilidad_financiera = $idSostenibilidadFinanciera",$con);
        $respuesta->netWorkings = getArraySQL("select a.id_tipo_networking id, '' descripcion from sostenibilidad_financiera_networking a where a.id_sostenibilidad_financiera = $idSostenibilidadFinanciera",$con);
        $respuesta->listaCompuestosIngresos = getArraySQL("select a.id_composicion_ingreso id , $variables->nombre nombre, b.valor, b.descripcion 
            from composicion_ingreso a
          LEFT OUTER JOIN sostenibilidad_financiera_composicion_ingreso b 
                on b.id_composicion_ingreso = a.id_composicion_ingreso
           and b.id_sostenibilidad_financiera = $idSostenibilidadFinanciera
         where estado = 'A'",$con);

        //Fuentes de capital
        $respuesta->fuentesCapital = getArraySQL("
                SELECT 
                    a.id_fuente_capital id,
                    f.nombre nombre, 
                    a.otro_descripcion descripcion, 
                    a.monto valor1 
                    FROM sostenibilidad_financiera_fuente_capital a 
                    INNER JOIN fuente_capital f ON f.id = a.id_fuente_capital
                    where a.id_sostenibilidad_financiera = $idSostenibilidadFinanciera"
        ,$con);
    
        //Prestamos
        $respuesta->prestamos = getArraySQL("SELECT a.valor, a.duracion, a.interes FROM sostenibilidad_financiera_prestamo a where a.id_sostenibilidad_financiera = $idSostenibilidadFinanciera",$con);
    
        //FondosNoReembolsables
        $respuesta->fondos_no_reembolsables = getArraySQL("SELECT a.fuente, a.monto FROM sostenibilidad_financiera_fondo_no_reembolsable a where a.id_sostenibilidad_financiera = $idSostenibilidadFinanciera",$con);
    }
}
*/



/*
        $this->id_Proyecto_Finanzas='';

        $this->intereses_participar='1';
        $this->capacitaciones='3';
        $this->netWorkings ='2';
        $this->listaCompuestosIngresos='xxxx';
        $this->fuentesCapital='xxxx';
        $this->prestamos='xxxx';
        $this->fondos_no_reembolsables='no';
        $this->destino_de_fondo='xxx';
    */
    
    }
}
}
?>