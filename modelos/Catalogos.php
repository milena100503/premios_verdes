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
    public $lista_enfoques_ambientales_finanzas;
    public $lista_tipo_organizacion;
    public $lista_instrumento_financiero;
    public $lista_instituciones_financieras;
    public $lista_financiamiento;

    //RESILIENT ARQUITECTURE
    public $lista_opciones_arquitectura;
    public $lista_recursos_arquitectura;
    public $lista_servicios_ambientales;

    //TECH STARTUP
    public $lista_enfoques_startup;
    public $lista_productos_servicios;
    public $lista_tipos_crecimiento;

    //HABITAT AND ECOSYSTEM 
    public $lista_ecosistemas;
    public $lista_objetivos_proyhabitat;
    public $lista_fuentes_agua_dulce;
    public $lista_enfoques_habitat;







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
        $perfiles = [];
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
        $query= "SELECT 
                so.id_sector_operativo,
                so.$variables->nombre nombre,
                so.tipo_participante
            FROM sector_operativo so
            WHERE so.estado = 'A'";
        $result = $this->conn->query($query);
        $sectores = [];
        while($reg =  $result -> fetch_object()){
            $sectores[] = [
                'id' => $reg->id_sector_operativo,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_sectores=$sectores;
    }


    function getListaEstructuraJuridicaSectorOP(){
        $variables = $this->variables();
        $query= "SELECT 
                ej.id_estructura_juridica, 
                ej.$variables->nombre nombre, 
                ej.$variables->numero_empleado numero_empleado, 
                ej.id_sector_operativo,
                ej.tipo_participante,
                IF(so.nombre = 'Mixta', 'SI', 'NO') as mixta 
            FROM estructura_juridica ej
            LEFT JOIN sector_operativo so ON so.id_sector_operativo = ej.id_sector_operativo
            WHERE ej.estado = 'A'";
        $result = $this->conn->query($query);
        $estructuras = [];
        while($reg =  $result -> fetch_object()){
            $estructuras[] = [
                'id' => $reg->id_estructura_juridica,
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
            ORDER BY b.id_tipo_modelo_operativo asc, a.$variables->modelo asc;";
        $result = $this->conn->query($query);
        $modelos = [];
        while($reg =  $result -> fetch_object()){
            $modelos[] = [
                'id' => $reg->id_modelo_operativo,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_modelos=$modelos;
    }

    function getListaCategorias(){
        $variables = $this->variables();
        $query= "SELECT id_categoria as id, nombre, nombre as descripcion, icono, estado from categoria where estado = 'A' order by nombre asc";
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
        $query= "SELECT id_objetivo_desarrollo_sostenible id, $variables->nombre nombre, null id_padre
          from objetivo_desarrollo_sostenible
         where estado = 'A'
         union all
        select id_meta id, $variables->nombre nombre, id_objetivo_desarrollo_sostenible id_padre
          from meta_objetivo_desarrollo_sostenible 
         where estado = 'A'";
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


    function getListaEnfoquesAmbientalesFinanzas(){
        $variables = $this->variables();
        $query= "SELECT 
                a.id_opciones_finanzas_sostenibles id, 
                a.$variables->nombre nombre, 
                a.subtipo, 
                a.tipo 
            FROM opciones_finanzas_sostenibles a 
            WHERE a.estado = 'A'
        ORDER BY a.tipo asc, a.subtipo asc, a.nombre ASC";
        $result = $this->conn->query($query);
        $enfoques = [];
        while($reg =  $result -> fetch_object()){
            $enfoques[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_ambientales_finanzas=$enfoques;
    }


    function getListaTipoOrganizacion(){
        $variables = $this->variables();
        $query= "SELECT id, a.$variables->nombre nombre from tipo_organizacion a where estado = 'A'";
        $result = $this->conn->query($query);
        $organizacion = [];
        while($reg =  $result -> fetch_object()){
            $organizacion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_organizacion=$organizacion;
    }


    function getListaInstrumentoFinanciero(){
        $variables = $this->variables();
        $query= "SELECT id, a.$variables->nombre nombre from instrumento_financiero a where estado = 'A'";
        $result = $this->conn->query($query);
        $instrumento = [];
        while($reg =  $result -> fetch_object()){
            $instrumento[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_instrumento_financiero=$instrumento;
    }


    function getListaInstitucionesFinancieras(){
        $variables = $this->variables();
        $query= "SELECT a.id_tipo_institucion_financiera id, a.$variables->nombre nombre from tipo_institucion_financiera a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $instituciones = [];
        while($reg =  $result -> fetch_object()){
            $instituciones[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_instituciones_financieras=$instituciones;
    }


    function getListaTipoFinanciamiento(){
        $variables = $this->variables();
        $query= "SELECT id_tipo_financiamiento id, $variables->nombre nombre, tipo from tipo_financiamiento where estado = 'A'";
        $result = $this->conn->query($query);
        $financiamiento = [];
        while($reg =  $result -> fetch_object()){
            $financiamiento[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_financiamiento=$financiamiento;
    }


    function getListaOpcionesArquitectura(){
        $variables = $this->variables();
        $query= "SELECT a.id_gestion_urbana_opciones id, a.$variables->nombre nombre, a.id_padre, a.tipo FROM gestion_urbana_opciones a where a.estado = 'A' and  id_gestion_urbana_opciones <> 13";
        $result = $this->conn->query($query);
        $opciones = [];
        while($reg =  $result -> fetch_object()){
            $opciones[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_opciones_arquitectura=$opciones;
    }


    function getListaRecursosArquitectura(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre FROM recurso_arquitectura a where a.estado = 'A' ORDER BY a.$variables->nombre ASC;";
        $result = $this->conn->query($query);
        $recursos = [];
        while($reg =  $result -> fetch_object()){
            $recursos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_recursos_arquitectura=$recursos;
    }


    function getListaServiciosAmbientales(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre FROM servicio_ambiental a where a.estado = 'A' ORDER BY a.$variables->nombre DESC";
        $result = $this->conn->query($query);
        $servicios = [];
        while($reg =  $result -> fetch_object()){
            $servicios[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_servicios_ambientales=$servicios;
    }


    function getListaEnfoquesStartup(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from enfoque_startup a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $enfoques = [];
        while($reg =  $result -> fetch_object()){
            $enfoques[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_startup=$enfoques;
    }


    function getListaProductosServicios(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from producto_servicio_startup a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $productos = [];
        while($reg =  $result -> fetch_object()){
            $productos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_productos_servicios=$productos;
    }


    function getListaTiposCrecimiento(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from tipos_crecimiento a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $crecimiento = [];
        while($reg =  $result -> fetch_object()){
            $crecimiento[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipos_crecimiento=$crecimiento;
    }


    function getListaEcosistemas(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre, id_padre from tipos_ecosistemas a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $ecosistemas = [];
        while($reg =  $result -> fetch_object()){
            $ecosistemas[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_ecosistemas=$ecosistemas;
    }


    function getListaObjetivosProyHabitat(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from objetivo_proy_habitat a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $objetivos = [];
        while($reg =  $result -> fetch_object()){
            $objetivos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_objetivos_proyhabitat=$objetivos;
    }


    function getListaFuentesAguaDulce(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from fuente_agua_dulce a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $fuentes = [];
        while($reg =  $result -> fetch_object()){
            $fuentes[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_fuentes_agua_dulce=$fuentes;
    }


    function getListaAdiconalidadesCarbono(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from adicionalidad_carbono a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $adicionalidades = [];
        while($reg =  $result -> fetch_object()){
            $adicionalidades[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_adicionalidades_carbono=$adicionalidades;
    }


    function getListaEnfoquesHabitat(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from enfoque_habitat a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $habitat = [];
        while($reg =  $result -> fetch_object()){
            $habitat[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_habitat=$habitat;
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