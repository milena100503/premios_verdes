<?php
require_once "config/Connection.php";
class SustainableMobility extends Connection{


    public $id_proyecto_sustainable_mobility;
	public $porcentaje_crecimiento_flota;
	public $transporte_vehiculos_energias_renovables;
	public $detalle_transporte_vehiculos_energias_renovables;
	public $tiene_propia_flota;
	public $vehiculos_flota_utilizan_energias_renovables;
	public $detalle_vehiculos_flota_energias_renovables;
	public $ofrece_logistica_retorno;
	public $detalle_logistica_retorno;
    public $acciones_reduccion_huella_carbono;
    public $plataforma_digital_permite_acceso_informacion ;
    public $como_plataforma_digital_permite_acceso_informacion;
    public $como_aporta_infraestrutura;
    public $busca_minimizar_emisiones_carbono;
    public $porcentaje_reduccion_emisiones_carbono;//
    public $enfoques_transporte;
    public $tipos_transporte;
    public $objetivos_proy_transporte;
    public $transporte_tipos_vehiculo;
    public $flota_tipos_vehiculo;
    public $zonas_operativas_transporte;
    public $enfoques_logistica;
    public $plataformas_digitales;
    public $tipos_infraestructura;
    public $vehículos_tipo_energía;




    public function inicializar(){

        $id_proyecto_sustainable_mobility ='25';

    $query = "SELECT * FROM proyecto_sustainable_mobility a WHERE a.id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility;";
    $result = $this->conn->query($query);
    
        
    if ($row = $result->fetch_array()) {
        $this->procentaje_crecimiento_flota = $row["procentaje_crecimiento_flota"];
        $this->transporte_vehiculos_energias_renovables = $row["transporte_vehiculos_energias_renovables"];
        $this->detalle_transporte_vehiculos_energias_renovables = $row["detalle_transporte_vehiculos_energias_renovables"];
        $this->tiene_propia_flota = $row["tiene_propia_flota"];
        $this->vehiculos_flota_utilizan_energias_renovables = $row["vehiculos_flota_utilizan_energias_renovables"];
        $this->detalle_vehiculos_flota_energias_renovables = $row["detalle_vehiculos_flota_energias_renovables"];
        $this->ofrece_logistica_retorno = $row["ofrece_logistica_retorno"];
        $this->detalle_logistica_retorno = $row["detalle_logistica_retorno"];
        $this->acciones_reduccion_huella_carbono = $row["acciones_reduccion_huella_carbono"];
        $this->plataforma_digital_permite_acceso_informacion = $row["plataforma_digital_permite_acceso_informacion"];
        $this->como_plataforma_digital_permite_acceso_informacion = $row["como_plataforma_digital_permite_acceso_informacion"];
        $this->como_aporta_infraestrutura = $row["como_aporta_infraestrutura"];
        $this->busca_minimizar_emisiones_carbono = $row["busca_minimizar_emisiones_carbono"];
        $this->porcentaje_reduccion_emisiones_carbono = $row["porcentaje_reduccion_emisiones_carbono"];
        
    /*
        $respuesta->enfoques_transporte = getArraySQL("SELECT id_enfoque id FROM sustainable_mobility_enfoque where id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility",$con);
        
        $respuesta->tipos_transporte = getArraySQL("SELECT id_tipo_transporte id FROM sustainable_mobility_tipo_transporte where id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility",$con);
        
        $respuesta->objetivos_proy_transporte = getArraySQL("SELECT id_objetivo id, descripcion as valor1 FROM sustainable_mobility_objetivo_proyecto where id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility",$con);

        $respuesta->transporte_tipos_vehiculo = getArraySQL("SELECT id_tipo_vehiculo id, descripcion as valor1, cantidad as valor2 FROM sustainable_mobility_vehiculo_transporte where id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility",$con);

        $respuesta->flota_tipos_vehiculo = getArraySQL("SELECT id_tipo_vehiculo id, descripcion as valor1, cantidad as valor2 FROM sustainable_mobility_vehiculo_flota where id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility",$con);

        $respuesta->zonas_operativas_transporte = getArraySQL("SELECT id_zona_operativa id FROM sustainable_mobility_zona_operativa where id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility",$con);
        
        $respuesta->enfoques_logistica = getArraySQL("SELECT id_enfoque id FROM sustainable_mobility_enfoque_logistica where id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility",$con);
        
        $respuesta->plataformas_digitales = getArraySQL("SELECT id_plataforma_digital id, descripcion as valor1 FROM sustainable_mobility_plataforma_digital where id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility",$con);

        $respuesta->tipos_infraestructura = getArraySQL("SELECT id_tipo_infraestructura id, descripcion as valor1 FROM sustainable_mobility_infraestructura where id_proyecto_sustainable_mobility = $id_proyecto_sustainable_mobility",$con);
*/
    }   
}
/*
        $this->id_proyecto_sustainable_mobility='';           
        $this->enfoques_transporte='xxxx';
        $this->tipos_transporte='xxxx';
        $this->objetivos_proy_transporte='xxxx';
        $this->transporte_tipos_vehiculo='xxxx';
        $this->flota_tipos_vehiculo='xxxx';
        $this->zonas_operativas_transporte='xxxx';
        $this->enfoques_logistica='xxxx';
        $this->detalle_cadena_distribucion='xxxx';
        $this->plataformas_digitales='xxxx';
        $this->tipos_infraestructura='xxxx';


         $this->vehículos_tipo_energía='xxxx';

*/


    }
?>