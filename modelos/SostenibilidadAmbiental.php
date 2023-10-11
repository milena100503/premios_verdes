<?php
require_once "config/Connection.php";

class SostenibilidadAmbiental extends Connection{
    
	public $id_sostenibilidad_ambiental;
	public $impacto_ambiental;
	public $cuantifico_riesgos_impactos;
	public $obtenido_certificacion_ambiental;
	public $descripcion_certificacion_ambiental;
	public $obedece_regularizacion_normativa_local;
	public $descripcion_normativa_local;
	public $acciones_adaptacion_cambio_climatico;
    public $proyecto_cuenta_los_riesgos;
	


    public function inicializar(){

        $idSostenibilidadAmbiental = '14019';



    $query= "select a.* from sostenibilidad_ambiental a where a.id_sostenibilidad_ambiental = $idSostenibilidadAmbiental;";
    $result = $this->conn->query($query);
    if ($row = $result->fetch_array()) {
        $this->id_sostenibilidad_ambiental = $row["id_sostenibilidad_ambiental"];
        $this->impacto_ambiental= $row["impacto_ambiental"];
        $this->cuantifico_riesgos_impactos = $row["cuantifico_riesgos_impactos"];
        $this->obtenido_certificacion_ambiental = $row["obtenido_certificacion_ambiental"];
        $this->descripcion_certificacion_ambiental  = $row["descripcion_certificacion_ambiental"];
        $this->obedece_regularizacion_normativa_local = $row["obedece_regularizacion_normativa_local"];
        $this->descripcion_normativa_local = $row["descripcion_normativa_local"];
        $this->acciones_adaptacion_cambio_climatico = $row["acciones_adaptacion_cambio_climatico"];
        
     //   $respuesta->listaConsumos = getArraySQL("select a.id_tipo_servicio_consumo id, '' valor from soste_ambient_serv_consum a where a.id_sostenibilidad_ambiental = $idSostenibilidadAmbiental",$con);
       // $respuesta->riesgos = getArraySQL("select * from sostenibilidad_ambiental_riesgo a where a.id_sostenibilidad_ambiental = $idSostenibilidadAmbiental",$con);
    }

    }
}
?>

