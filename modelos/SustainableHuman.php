<?php

require_once "config/Connection.php";

class SustainableHuman extends Connection{


    public $id_proyecto_sustainable_human;
	public $tiene_enfoque_temas_especificos;
	public $tiene_aval_instituciones;
	public $detalle_aval_institucion;
	public $erradica_violencia_genero;
	public $como_erradica_violencia_genero;
	public $conocimientos_ancestrales;
	public $como_satisface_necesidades_humanas;//
	public $enfoques_desarrollo_humano;
    public $niveles_educacion;
    public $enfoques_educativos;
    public $temas_educacion;
    public $grupos_minoritarios;
    public $enfoques_igualdad;
    public $enfoques_mujer;
    public $enfoques_salud;
    public $enfoques_hambre;
    public $enfoques_pobreza;
    public $enfoques_vivienda;
    public $enfoques_trabajo_decente;
    public $enfoques_trabajo_verde;
    public $enfoques_justicia;
    public $enfoques_agua;
    public $practicas_ancestrales;


    public function inicializar(){

    $id_proyecto_sustainable_human = '260';


    $query= "SELECT * FROM proyecto_sustainable_human a WHERE a.id_proyecto_sustainable_human = $id_proyecto_sustainable_human;";
    $result = $this->conn->query($query);
            
    if ($row = $result->fetch_array()) {
        $this->tiene_enfoque_temas_especificos = $row["tiene_enfoque_temas_especificos"];
        $this->tiene_aval_instituciones = $row["tiene_aval_instituciones"];
        $this->detalle_aval_institucion = $row["detalle_aval_institucion"];
        $this->erradica_violencia_genero = $row["erradica_violencia_genero"];
        $this->como_erradica_violencia_genero = $row["como_erradica_violencia_genero"];
        $this->conocimientos_ancestrales = $row["conocimientos_ancestrales"];
        $this->como_satisface_necesidades_humanas = $row["como_satisface_necesidades_humanas"];


/*
        $respuesta->enfoques_desarrollo_humano = getArraySQL("SELECT id_enfoque id FROM sustainable_human_enfoque_proyecto where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);
    
        $respuesta->niveles_educacion = getArraySQL("SELECT id_nivel_educacion id, descripcion as valor1 FROM sustainable_human_nivel_educacion where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);
        
        $respuesta->enfoques_educativos = getArraySQL("SELECT id_enfoque_educacion id, descripcion as valor1 FROM sustainable_human_enfoque_educacion where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);

        $respuesta->temas_educacion = getArraySQL("SELECT id_tema_educacion id, descripcion as valor1 FROM sustainable_human_tema_educacion where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);

        $respuesta->grupos_minoritarios = getArraySQL("SELECT id_grupo_minoritario id, descripcion as valor1 FROM sustainable_human_grupo_minoritario where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);
    
        $respuesta->enfoques_igualdad = getArraySQL("SELECT id_enfoque_igualdad id, descripcion as valor1 FROM sustainable_human_enfoque_igualdad where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);

        $respuesta->enfoques_mujer = getArraySQL("SELECT id_enfoque_mujer id, descripcion as valor1 FROM sustainable_human_enfoque_mujer where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);
        
        $respuesta->enfoques_salud = getArraySQL("SELECT id_enfoque_salud id, descripcion as valor1 FROM sustainable_human_enfoque_salud where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);

        $respuesta->enfoques_hambre = getArraySQL("SELECT id_enfoque_hambre id, descripcion as valor1 FROM sustainable_human_enfoque_hambre where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);


        $respuesta->enfoques_pobreza = getArraySQL("SELECT id_enfoque_pobreza id, descripcion as valor1 FROM sustainable_human_enfoque_pobreza where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);

        $respuesta->enfoques_vivienda = getArraySQL("SELECT id_enfoque_vivienda id, descripcion as valor1 FROM sustainable_human_enfoque_vivienda where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);
        
        $respuesta->enfoques_trabajo_decente = getArraySQL("SELECT id_enfoque_trabajo_decente id, descripcion as valor1 FROM sustainable_human_trabajo_decente where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);

        $respuesta->enfoques_trabajo_verde = getArraySQL("SELECT id_enfoque_trabajo_verde id, descripcion as valor1 FROM sustainable_human_trabajo_verde where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);

        $respuesta->enfoques_justicia = getArraySQL("SELECT id_enfoque_justicia id, descripcion as valor1 FROM sustainable_human_enfoque_justicia where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);

        $respuesta->enfoques_agua = getArraySQL("SELECT id_enfoque_agua id, descripcion as valor1 FROM sustainable_human_enfoque_agua where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);

        $respuesta->practicas_ancestrales = getArraySQL("SELECT id_practica_ancestral id, descripcion as valor1 FROM sustainable_human_practica_ancestral where id_proyecto_sustainable_human = $id_proyecto_sustainable_human",$con);
      */  
    }   


    }
/*
        
        $this->id_proyecto_sustainable_human='';       
        $this->enfoques_desarrollo_humano='xxxx';
        $this->niveles_educacion='1';
        $this->enfoques_educativos ='xxxx';
        $this->temas_educacion ='xxxx';
        $this->grupos_minoritarios ='3';
        $this->enfoques_igualdad  ='2';
        $this->enfoques_mujer='1';
        $this->enfoques_salud='1' ;
        $this->enfoques_hambre='1';
        $this->enfoques_pobreza='1';
        $this->enfoques_vivienda='1';
        $this->enfoques_trabajo_decente='4';
        $this->enfoques_trabajo_verde='1';
        $this->enfoques_justicia='1';        
        $this->enfoques_agua='3';
        $this->practicas_ancestrales='4';   
*/
}

?>