<?php
require_once "config/Connection.php";

class Catalogos extends Connection{

    //INSCRIPCION
    public $lista_medios_contactos;
    public $lista_difusion;
    public $lista_perfiles_recomendacion;
    public $lista_sectores;
    public $lista_estructuras;
    public $lista_modelos;

    //PROYECTO
    public $lista_categorias;
    public $lista_escalas;
    public $lista_actividades;
    public $lista_amenazas;
    public $lista_debilidades;
    public $lista_ODS;

    //IMPACTO SOCIAL
    public $lista_grupos_etnicos;
    public $lista_grupos_objetivos;
    public $lista_grupos_vulnerables;

    //SOSTENIBILIDAD FINANCIERA
    public $lista_composicion_ingresos;
    public $lista_tipo_interes_participar;
    public $lista_tipo_capacitacion;
    public $lista_tipo_networking;
    public $lista_fases_negocio;
    public $lista_fuentes_capital;

    //INNOVACION Y TECNOLOGIA
    public $lista_tipo_innovacion;
    public $lista_tipo_patente;
    public $lista_tipo_tecnologia;
    public $lista_tipo_blockchain;

    //RENEWABLE ENERGY
    public $lista_enfoques_energia;
    public $lista_fuente_energia;
    public $lista_tipo_industria_energia;

    //SUSTAINABLE FINANCE



     function __construct() {
       parent::__construct();
       print "En el constructor SubClass\n";
   }

    function getListaMediosContacto(){
        $variables = $this->variables();
        $query = "SELECT m.id, m.$variables->nombre nombre FROM medio_contacto m WHERE m.estado = 'A'";
        $result = $this->conn->query($query);
        $medios = [];
        while($reg =  $result -> fetch_object()){
            $medios[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_medios_contactos=$medios;
    }


    function getListaDifusion(){
        $variables = $this->variables();
        $query= "SELECT id_difusion id, $variables->nombre from tipo_difusion where estado = 'A'";
        $result = $this->conn->query($query);
        $difusiones = [];
        while($reg =  $result -> fetch_object()){
            $difusiones[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_difusion=$difusiones;
    }


    function getListaPerfilesRecomendacion(){
        $variables = $this->variables();
        $query= "SELECT m.id, m.$variables->nombre FROM perfil_recomendacion m WHERE m.estado = 'A'";
        $result = $this->conn->query($query);
        $oerfiles = [];
        while($reg =  $result -> fetch_object()){
            $perfiles[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_perfiles_recomendacion=$perfiles;
    }


    function getListaSectorOperativo(){
        $variables = $this->variables();
        $query= "SELECT a.id_sector_operativo id, a.nombre a.mixto, a.descripcion from sector_operativo a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $sectores = [];
        while($reg =  $result -> fetch_object()){
            $sectores[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_sectores=$sectores;
    }


    function getListaEstructuraJuridicaSectorOP(){
        $variables = $this->variables();
        $query= "SELECT so.id_sector_operativo so.$variables->nombre so.tipo_participante FROM sector_operativo so WHERE so.estado = 'A'";
        $result = $this->conn->query($query);
        $estructuras = [];
        while($reg =  $result -> fetch_object()){
            $estructuras[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_estructuras=$estructuras;
    }


    function getListaModeloOperativo(){
        $variables = $this->variables();
        $query= "SELECT 
            a.id_modelo_operativo id, 
            a.id_tipo_modelo_operativo idTipo, 
            a.$variables->modelo nombre, 
            b.$variables->nombre tipo 
            FROM modelo_operativo a, tipo_modelo_operativo b
            WHERE a.id_tipo_modelo_operativo = b.id_tipo_modelo_operativo
            AND a.id_modelo_operativo <> 30
            ORDER BY b.id_tipo_modelo_operativo asc, a.$variables->modelo asc";
        $result = $this->conn->query($query);
        $modelos = [];
        while($reg =  $result -> fetch_object()){
            $modelos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_modelos=$modelos;
    }

    function getListaCategorias(){
        $variables = $this->variables();
        $query= "SELECT id_categoria as id, nombre as descripcion, icono, estado from categoria where estado = 'A' order by nombre asc";
        $result = $this->conn->query($query);
        $categorias = [];
        while($reg =  $result -> fetch_object()){
            $categorias[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_categorias=$categorias;
    }


    function getListaEscalas(){
        $variables = $this->variables();
        $query= "SELECT a.id, a.$variables->nombre from escala_proyecto a where a.estado = 'A';";
        $result = $this->conn->query($query);
        $escalas = [];
        while($reg =  $result -> fetch_object()){
            $escalas[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_escalas=$escalas;
    }


    function getListaActividades(){
        $variables = $this->variables();
        $query= "SELECT a.id_actividad id, a.$variables->nombre from actividad_sectorial a where a.estado = 'A';";
        $result = $this->conn->query($query);
        $actividades = [];
        while($reg =  $result -> fetch_object()){
            $escalas[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_actividades=$actividades;
    }


    function getListaAmenazas(){
        $variables = $this->variables();
        $query= "SELECT a.id_amenaza id, a.$variables->descripcion nombre from amenaza a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $amenazas = [];
        while($reg =  $result -> fetch_object()){
            $amenazas[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_amenazas=$amenazas;
    }


    function getListaDebilidades(){
        $variables = $this->variables();
        $query= "SELECT a.id_debilidad id, a.$variables->descripcion nombre from debilidad a where a.estado = 'A' order by descripcion";
        $result = $this->conn->query($query);
        $debilidades = [];
        while($reg =  $result -> fetch_object()){
            $debilidades[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_debilidades=$debilidades;
    }


    function getListaODS(){
        $variables = $this->variables();
        $query= "SELECT id_objetivo_desarrollo_sostenible id, $variables->nombre null id_padre from objetivo_desarrollo_sostenible where estado = 'A' union all select id_meta id, $variables->nombre nombre, id_objetivo_desarrollo_sostenible id_padre from meta_objetivo_desarrollo_sostenible where estado = 'A'";
        $result = $this->conn->query($query);
        $ODS = [];
        while($reg =  $result -> fetch_object()){
            $ODS[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_ODS=$ODS;
    }    


    function getListaGruposEtnicos(){
        $variables = $this->variables();
        $query= "SELECT id_etnia id, $variables->nombre  from etnia where estado = 'A'";
        $result = $this->conn->query($query);
        $grupos = [];
        while($reg =  $result -> fetch_object()){
            $grupos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_grupos_etnicos=$grupos;
    }        


    function getListaGruposObjetivos(){
        $variables = $this->variables();
        $query= "SELECT id, $variables->nombre from grupos_objetivos a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $grupos = [];
        while($reg =  $result -> fetch_object()){
            $grupos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_grupos_objetivos=$grupos;
    }


    function getListaGruposVulnerables(){
        $variables = $this->variables();
        $query= "SELECT id_grupo_vulnerable id, $variables->nombre from grupos_vulnerables a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $grupos = [];
        while($reg =  $result -> fetch_object()){
            $grupos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_grupos_vulnerables=$grupos;
    }


    function getListaComposicionIngresos(){
        $variables = $this->variables();
        $query= "SELECT id_composicion_ingreso id , $variables->nombre, '' valor, '' descripcion from composicion_ingreso where estado = 'A'";
        $result = $this->conn->query($query);
        $composicion = [];
        while($reg =  $result -> fetch_object()){
            $composicion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_composicion_ingresos=$composicion;
    }





    function getListaTipoInteresParticipar(){
        $variables = $this->variables();
        $query= "SELECT a.id_tipo_interes_participar id, a.$variables->nombre from tipo_interes_participar a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $interes = [];
        while($reg =  $result -> fetch_object()){
            $interes[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_interes_participar=$interes;
    }


    function getListaTipoCapacitacion(){
        $variables = $this->variables();
        $query= "SELECT id_tipo_capacitacion id, $variables->nombre from tipo_capacitacion where estado = 'A'";
        $result = $this->conn->query($query);
        $capacitacion = [];
        while($reg =  $result -> fetch_object()){
            $capacitacion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_capacitacion=$capacitacion;
    }


    function getListaTipoNetworking(){
        $variables = $this->variables();
        $query= "SELECT a.id_tipo_networking id, a.$variables->nombre from tipo_networking a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $networking = [];
        while($reg =  $result -> fetch_object()){
            $networking[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_networking=$networking;
    }


    function getListaFasesNegocio(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre from fase_negocio a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $fases = [];
        while($reg =  $result -> fetch_object()){
            $fases[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_fases_negocio=$fases;
    }


    function getListaFuentesCapital(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre from fuente_capital a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $fuentes = [];
        while($reg =  $result -> fetch_object()){
            $fuentes[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_fuentes_capital=$fuentes;
    }


    function getListaTipoInnovacion(){
        $variables = $this->variables();
        $query= "SELECT id_tipo_innovacion id, a.$variables->nombre nombre, a.$variables->descripcion from tipo_innovacion a where estado = 'A'";
        $result = $this->conn->query($query);
        $innovacion = [];
        while($reg =  $result -> fetch_object()){
            $innovacion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_innovacion=$innovacion;
    }


    function getListaTipoPatente(){
        $variables = $this->variables();
        $query= "SELECT id_tipo_patente id, $variables->nombre from tipo_patente where estado = 'A'";
        $result = $this->conn->query($query);
        $patente = [];
        while($reg =  $result -> fetch_object()){
            $patente[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_patente=$patente;
    }


    function getListaTipoTecnologia(){
        $variables = $this->variables();
        $query= "SELECT id, a.$variables->nombre from tipo_tecnologia a where estado = 'A'";
        $result = $this->conn->query($query);
        $tecnologia = [];
        while($reg =  $result -> fetch_object()){
            $tecnologia[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_tecnologia=$tecnologia;
    }


    function getListaTipoBlockchain(){
        $variables = $this->variables();
        $query= "SELECT id, a.$variables->nombre nombre from tipo_blockchain a where estado = 'A'";
        $result = $this->conn->query($query);
        $blockchain = [];
        while($reg =  $result -> fetch_object()){
            $blockchain[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_blockchain=$blockchain;
    }






    function getListaEnfoquesEnergia(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre FROM enfoque_energia a where a.estado = 'A' ORDER BY a.$variables->nombre DESC";
        $result = $this->conn->query($query);
        $enfoques = [];
        while($reg =  $result -> fetch_object()){
            $enfoques[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_energia=$enfoques;
    }


    function getListaFuenteEnergia(){
        $variables = $this->variables();
        $query= "SELECT a.id_fuente_energia id, a.$variables->nombre nombre FROM fuente_energia a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $fuente = [];
        while($reg =  $result -> fetch_object()){
            $fuente[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_fuente_energia=$fuente;
    }


    function getListaTipoIndustriaEnergia(){
        $variables = $this->variables();
        $query= "SELECT a.id, a.$variables->nombre nombre FROM tipo_industria a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $industria = [];
        while($reg =  $result -> fetch_object()){
            $industria[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_industria_energia=$industria;
    }





    public function variables(){
    $variable = new stdClass();
     $variable->descripcion = "descripcion";
        $variable->nombre = "nombre";
        $variable->tipo = "tipo";
        $variable->numero_empleado = "numero_empleado";
        $variable->modelo = "modelo";
        $variable->abreviatura = "abreviatura";


    
    return $variable;
}
}
?>  