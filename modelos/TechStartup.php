<?php
require_once "config/Connection.php";
class TechStartup extends Connection{


    public $id_proyecto_tech_startup;
	public $fecha_inicion;
	public $cantidad_empleados;
	public $distribucion_equipo_ejecutivo;
	public $estrategia_escalabilidad ;
	public $id_tipo_crecimiento;
	public $ventaja_competitiva;
	public $ha_participado_rondas_inversion;
	public $resultado_rondas_inversion;
    public $mide_impacto_huella_co2;
    public $medidas_para_compensar_emisiones;
    public $hace_reportes_asg;
    public $tiene_subsidio_gobierno;
    public $motivo_subsidio_gobierno;//
    public $enfoques_startup;
    public $productos_servicios;
    
    public function inicializar(){

        $id_proyecto_tech_startup = '690';


    $query = "SELECT * FROM proyecto_tech_startup a WHERE a.id_proyecto_tech_startup = $id_proyecto_tech_startup;";
    $result = $this->conn->query($query);
    
    if ($row = $result->fetch_array()) {
        $this->fecha_inicio = $row["fecha_inicio"];
        $this->cantidad_empleados = $row["cantidad_empleados"];
        $this->distribucion_equipo_ejecutivo = $row["distribucion_equipo_ejecutivo"];
        $this->estrategia_escalabilidad = $row["estrategia_escalabilidad"];
        $this->id_tipo_crecimiento = $row["id_tipo_crecimiento"];
        $this->ventaja_competitiva = $row["ventaja_competitiva"];
        $this->ha_participado_rondas_inversion = $row["ha_participado_rondas_inversion"];
        $this->resultado_rondas_inversion = $row["resultado_rondas_inversion"];
        $this->mide_impacto_huella_co2 = $row["mide_impacto_huella_co2"];
        $this->medidas_para_compensar_emisiones = $row["medidas_para_compensar_emisiones"];
        $this->hace_reportes_asg = $row["hace_reportes_asg"];
        $this->tiene_subsidio_gobierno = $row["tiene_subsidio_gobierno"];
        $this->motivo_subsidio_gobierno = $row["motivo_subsidio_gobierno"];
    
     //   $this->enfoques_startup = getArraySQL("SELECT id_enfoque id, descripcion FROM tech_startup_enfoque where id_proyecto_tech_startup = $id_proyecto_tech_startup",$con);

     //   $this->productos_servicios = getArraySQL("SELECT id_producto_servicio id, descripcion FROM tech_startup_producto_servicio where id_proyecto_tech_startup = $id_proyecto_tech_startup",$con);
    }   
}






/*

        $this->enfoques_startup='xxxx';
        $this->productos_servicios='xxxx';
*/


    }

?>