<?php
require_once "config/Connection.php";

class SostenibilidadSocial extends Connection{
    
    public $id_Sostenibilidad_Social;
    public $impacto_social_genera_el_proyecto;

    public $desc_mejora_calidad_beneficiario;
    public $id_grupo_objetivos;
    public $cant_individuos;
    public $impacta_grupo_vulnerable;
    public $impacta_grupo_etnico;
    public $porcentaje_hombres_impactados;
    public $porcentaje_mujeres_impactadas;
    public $porcentaje_LGBTI_impactadas;
    public $forma_lideres_comunitarios;
    public $indicador_lideres;
    public $gruposVulnerables;
    public $gruposEtnicos;
    public $indicadores;



    public function inicializar(){


        $idSostenibilidadSocial = '14369';



        $query= "select * from sostenibilidad_social a where a.id_sostenibilidad_social = $idSostenibilidadSocial;";
        $result = $this->conn->query($query);
        if ($row = $result->fetch_array()) {
            
            $this->desc_mejora_calidad_beneficiario = $row["desc_mejora_calidad_beneficiario"];
            $this->id_grupo_objetivos = $row["id_grupo_objetivo"];
            $this->cant_individuos = $row["cant_individuos"];
            $this->impacta_grupo_vulnerable = $row["grupo_vulnerable"];
            $this->impacta_grupo_etnico = $row["impacta_grupo_etnico"];
            $this->porcentaje_hombres_impactados = $row["porcentaje_hombres_impactados"];
            $this->porcentaje_mujeres_impactadas = $row["porcentaje_mujeres_impactadas"];
            $this->porcentaje_LGBTI_impactadas = $row["porcentaje_LGBTI_impactadas"];      
            $this->forma_lideres_comunitarios = $row["forma_lideres_comunitarios"];
            $this->indicador_lideres = $row["indicador_lideres"];

/*
            $respuesta->gruposVulnerables = getArraySQL("select a.id_grupo_vulnerable id, a.descripcion valor from sostenibilidad_social_grupos_vulnerables a where a.id_sostenibilidad_social =  $idSostenibilidadSocial",$con);
            
            $respuesta->gruposEtnicos = getArraySQL("select a.id_etnia id, a.descripcion valor from sostenibilidad_social_etnia a where a.id_sostenibilidad_social =  $idSostenibilidadSocial",$con);
            
            $respuesta->indicadores = getArraySQL("select a.indicador, a.impacto_social, a.numero_personas from sostenibilidad_social_indicadores a where a.id_sostenibilidad_social =  $idSostenibilidadSocial",$con);     
*/
        }
     
    }


/* 
        $this->id_Sostenibilidad_Social='';
        $this->cant_individuos = '1000';
        $this->indicador_lideres ='180';
        $this->indicadores =' Aliados por la reducción del plástico - Número de aliados';
        $this->impacto ='El Pacto Aliados por la reducción del plástico busca comercios, empresas y/o emprendimientos del distrito quienes se comprometen de manera voluntaria a optar por lineamientos sostenibles ';
        $this->persona_impactadas ='156';
        $this->desc_mejora_calidad_beneficiario ='xxxx';
        $this->descripcion_normativa_local ='1';
        $this->gruposVulnerables ='xxxx';


        $this->$impacto_social_genera_el_proyecto ='En la difusión de los contenidos recopilados, y todo se puede revisar con analytics. Además de las mismas reacciones de las personas en RRSS. Estamos muy felices de ser apoyados y seguidos por influencers de la tecnología en Twitter. Además de campañas internacionales y emblemáticas. https://vitrinanorte.net/twitter/';
        $this->forma_lideres_comunitarios ='no';
        $this->porcentaje_hombres_impactados ='%67';
        $this->porcentaje_mujeres_impactadas ='%80';
        $this->porcentaje_LGBTI_impactadas ='%90';
        $this->impacta_grupo_vulnerable='si';
        $this->impacta_grupo_etnico ='no';    
        $this->impacta_grupo_vulnerable='si';
        $this->impacta_grupo_etnico ='no';
        $this->porcentaje_hombres_impactados ='%67';
        $this->porcentaje_mujeres_impactadas ='%80';
        $this->porcentaje_LGBTI_impactadas ='%90';
        */
    }
?>