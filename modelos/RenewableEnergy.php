<?php

require_once "config/Connection.php";

class RenewableEnergy extends Connection{


    public $id_proyecto_energia;
	public $consumo_energia_tradi_antes;
	public $consumo_energia_tradi_despues;
	public $costo_aproximado_anual;
	public $ahorro_alcanzado;
	public $energia_generada_anual;
	public $fomenta_uso_energia_sostenible ;
	public $como_fomenta_uso_energia_sostenible;
	public $fomenta_acceso_sitio_remotos;
    public $emision_gases_invernadero_antes;
    public $emision_gases_invernadero;
    public $insumos_provienen_fuentes_legales;
    public $contempla_reutilizacion_materiales;
    public $como_contempla_reutilizacion_materiales;
    public $enfoques_energia;
    public $fuentes_energia;
    public $tipos_industria;



    public function inicializar(){

        $idProyectoEnergia='579';

    $query= "select * from proyecto_energia a where a.id_proyecto_energia = $idProyectoEnergia;";
    $result = $this->conn->query($query);
    if ($row = $result->fetch_array()) {
        
        $this->consumo_energia_tradi_antes = $row["consumo_energia_tradi_antes"];
        $this->consumo_energia_tradi_despues = $row["consumo_energia_tradi_despues"];
        $this->costo_aproximado_anual  = $row["costo_aproximado_anual"];
        $this->ahorro_alcanzado = $row["ahorro_alcanzado"];
        $this->energia_generada_anual = $row["energia_generada_anual"];
        $this->fomenta_uso_energia_sostenible = $row["fomenta_uso_energia_sostenible"];
        $this->como_fomenta_uso_energia_sostenible = $row["como_fomenta_uso_energia_sostenible"];
        $this->fomenta_acceso_sitio_remotos = $row["fomenta_acceso_sitio_remotos"];
        $this->emision_gases_invernadero_antes = $row["emision_gases_invernadero_antes"];
        $this->emision_gases_invernadero = $row["emision_gases_invernadero"];
        $this->insumos_provienen_fuentes_legales = $row["insumos_provienen_fuentes_legales"];
        $this->contempla_reutilizacion_materiales = $row["contempla_reutilizacion_materiales"];
        $this->como_contempla_reutilizacion_materiales = $row["como_contempla_reutilizacion_materiales"];
/*
        $respuesta->enfoques_energia = getArraySQL("SELECT a.id_enfoque_energia id FROM proyecto_energia_enfoque a where a.id_proyecto_energia = $idProyectoEnergia",$con);

        $respuesta->fuentes_energia = getArraySQL("SELECT a.id_fuente_energia id, a.descripcion FROM proyecto_energia_fuente_energia a where a.id_proyecto_energia = $idProyectoEnergia",$con);

        $respuesta->tipos_industria = getArraySQL("SELECT a.id_tipo_industria id, a.descripcion FROM proyecto_energia_tipo_industria a where a.id_proyecto_energia = $idProyectoEnergia",$con);
      */  
    }
}

/*
        $this->fomenta_acceso_sitio_remotos ='xxxx';
        $this->enfoques_energia='xxxx';
        $this->fuentes_energia='xxxx';
        $this->tipos_industria='xxxx';
*/

    }
?>