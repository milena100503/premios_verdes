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
    public $lista_adicionalidades_carbono;
    public $lista_enfoques_habitat;
    public $lista_tipo_especie;
    public $lista_tipo_fauna;
    public $lista_tipo_bosques;
    public $lista_clases_bosques;
    public $lista_estrategias_incendio_forestal;
    public $lista_objetivos_agua;
    public $lista_recurso_hidrico;
    public $lista_contaminante_agua;
    public $lista_amenzas_ecosistemas;
    public $lista_accesos_informacion;

    //SUSTAINABLE FASHION
    public $lista_enfoques_moda;
    public $lista_tipo_textil;
    public $lista_normativa_textil;
    public $lista_patrones_corte;
    public $lista_empaques_sostenibles;
    public $lista_zonas_envio;
    public $lista_distribucion_producto;
    public $lista_canales_comunidad;

    //SUSTAINABLE FARMING AND FOOD PRODUCTION
    public $lista_enfoques_produccion;
    public $lista_elementos_ambientales;
    public $lista_empaques_ambientales;

    //SUSTAINABLE MOBILITY
    public $lista_enfoques_transporte;
    public $lista_tipo_transporte;
    public $lista_tipo_vehiculo;
    public $lista_objetivos_transporte;
    public $lista_zona_operativa_transporte;
    public $lista_enfoques_logistica;
    public $lista_plataformas_digitales;
    public $lista_tipos_infraestructura;

    //SUSTAINABLE HUMAN DEVELOPMENT
    public $lista_enfoques_desarrollo_humano;
    public $lista_nivel_educativo;
    public $lista_enfoque_educativo;
    public $lista_tema_educativo;
    public $lista_grupos_minoritarios;
    public $lista_enfoques_igualdad;
    public $lista_enfoques_mujer;
    public $lista_enfoque_salud;
    public $lista_enfoque_pobreza;
    public $lista_enfoque_hambre;
    public $lista_enfoque_vivienda;
    public $lista_enfoque_trabajo_decente;
    public $lista_enfoque_trabajo_verde;
    public $lista_enfoque_justicia;
    public $lista_enfoque_agua;
    public $lista_practica_ancestral;

    //SUSTAINABLE ACADEMIC RESEARCH
    public $lista_enfoques_investigacion;
    public $lista_formas_investigacion;
    public $lista_etapas_investigacion;
    public $lista_apoyos_investigacion;
    public $lista_ongs_investigacion;
    public $lista_estados_publicacion_investigacion;
    public $lista_fuentes_capitales;

    //CIRCULAR ECONOMY
    public $lista_enfoques_economia;
    public $lista_actividades_proyeconomia;
    public $lista_enfoques_fabricacion;
    public $lista_enfoques_regeneracion;
    public $lista_aprovechamiento_residuos;
    public $lista_tipo_gestion_residuos;
    public $lista_producto_final;
    public $lista_actores_proyecto;
    public $lista_origen_residuos;





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


    function getListaAdicionalidadesCarbono(){
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


    function getListaTiposEspecie(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from tipos_especie a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $especie = [];
        while($reg =  $result -> fetch_object()){
            $especie[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_especie=$especie;
    }


    function getListaTiposFauna(){
        $variables = $this->variables();
        $query= "SELECT a.id_tipo_fauna id, a.$variables->nombre nombre from tipo_fauna a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $fauna = [];
        while($reg =  $result -> fetch_object()){
            $fauna[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_fauna=$fauna;
    }


    function getListaTiposBosques(){
        $variables = $this->variables();
        $query= "SELECT a.id_tipo_bosque id, a.$variables->nombre nombre from tipo_bosque a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $bosques = [];
        while($reg =  $result -> fetch_object()){
            $bosques[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_bosques=$bosques;
    }


    function getListaClasesBosques(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from clases_bosque a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $bosques = [];
        while($reg =  $result -> fetch_object()){
            $bosques[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_clases_bosques=$bosques;
    }



    function getListaEstrategiasIncendioForestal(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from estrategia_incendio_forestal a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $incendios = [];
        while($reg =  $result -> fetch_object()){
            $incendios[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_estrategias_incendio_forestal=$incendios;
    }


    function getListaObjetivosAgua(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from objetivo_agua a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $agua = [];
        while($reg =  $result -> fetch_object()){
            $agua[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_objetivos_agua=$agua;
    }



    function getListaRecursoHidrico(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from recurso_hidrico a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $hidrico = [];
        while($reg =  $result -> fetch_object()){
            $hidrico[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_recurso_hidrico=$hidrico;
    }


    function getListaContaminanteAgua(){
        $variables = $this->variables();
        $query= "SELECT a.id_contaminante_agua id, a.$variables->nombre nombre from contaminante_agua a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $contaminante = [];
        while($reg =  $result -> fetch_object()){
            $contaminante[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_contaminante_agua=$contaminante;
    }


    function getListaAmenzasEcosistema(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from amenaza_ecosistema a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $ecosistemas = [];
        while($reg =  $result -> fetch_object()){
            $ecosistemas[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_amenzas_ecosistemas=$ecosistemas;
    }


    function getListaAccesosInformacion(){
        $variables = $this->variables();
        $query= "SELECT a.id_forma_acceso_informacion id, a.$variables->nombre nombre from forma_acceso_informacion a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $accesos = [];
        while($reg =  $result -> fetch_object()){
            $accesos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_accesos_informacion=$accesos;
    }


    function getListaEnfoquesModa(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from enfoque_moda a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $moda = [];
        while($reg =  $result -> fetch_object()){
            $moda[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_moda=$moda;
    }


    function getListaTipoTextil(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from tipo_textil a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $textil = [];
        while($reg =  $result -> fetch_object()){
            $textil[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_textil=$textil;
    }


    function getListaNormativaTextil(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from normativa_textil a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $normativa = [];
        while($reg =  $result -> fetch_object()){
            $normativa[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_normativa_textil=$normativa;
    }


    function getListaPatronesCorte(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from patron_corte a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $patrones = [];
        while($reg =  $result -> fetch_object()){
            $patrones[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_patrones_corte=$patrones;
    }


    function getListaEmpaquesSostenibles(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from empaques_sostenibles a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $empaques = [];
        while($reg =  $result -> fetch_object()){
            $empaques[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_empaques_sostenibles=$empaques;
    }


    function getListaZonasEnvio(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from zona_envio a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $zonas = [];
        while($reg =  $result -> fetch_object()){
            $zonas[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_zonas_envio=$zonas;
    }


    function getListaDistribucionProducto(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from distribucion_producto a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $distribucion = [];
        while($reg =  $result -> fetch_object()){
            $distribucion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_distribucion_producto=$distribucion;
    }


    function getListaCanalesComunidad(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from canal_comunidad a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $canales = [];
        while($reg =  $result -> fetch_object()){
            $canales[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_canales_comunidad=$canales;
    }


    function getListaEnfoquesProduccion(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from enfoque_produccion a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $produccion = [];
        while($reg =  $result -> fetch_object()){
            $produccion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_produccion=$produccion;
    }


    function getListaElementosAmbientales(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from elemento_ambiental a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $elementos = [];
        while($reg =  $result -> fetch_object()){
            $elementos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_elementos_ambientales=$elementos;
    }


    function getListaEmpaquesAmbientales(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from empaque_ambiental a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $empaques = [];
        while($reg =  $result -> fetch_object()){
            $empaques[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_empaques_ambientales=$empaques;
    }


    function getListaEnfoquesTransporte(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from enfoque_transporte a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $enfoques = [];
        while($reg =  $result -> fetch_object()){
            $enfoques[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_transporte=$enfoques;
    }


    function getListaTipoTransporte(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from tipo_transporte a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $transporte = [];
        while($reg =  $result -> fetch_object()){
            $transporte[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_transporte=$transporte;
    }

    function getListaTipoVehiculo(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from tipo_vehiculo a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $vehiculo = [];
        while($reg =  $result -> fetch_object()){
            $vehiculo[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_vehiculo=$vehiculo;
    }


    function getListaObjetivosTransporte(){
        $variables = $this->variables();
        $query= "SELECT  a.id id, a.$variables->nombre nombre from objetivo_proy_transporte a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $objetivos = [];
        while($reg =  $result -> fetch_object()){
            $objetivos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_objetivos_transporte=$objetivos;
    }


    function getListaZonaOperativaTransporte(){
        $variables = $this->variables();
        $query= "SELECT  a.id id, a.$variables->nombre nombre from zona_operativa a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $zona = [];
        while($reg =  $result -> fetch_object()){
            $zona[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_zona_operativa_transporte=$zona;
    }


    function getListaEnfoquesLogistica(){
        $variables = $this->variables();
        $query= "SELECT  a.id id, a.$variables->nombre nombre from enfoque_logistica a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $logistica = [];
        while($reg =  $result -> fetch_object()){
            $logistica[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_logistica=$logistica;
    }


    function getListaPlataformasDigitales(){
        $variables = $this->variables();
        $query= "SELECT  a.id id, a.$variables->nombre nombre from plataforma_digital a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $plataformas = [];
        while($reg =  $result -> fetch_object()){
            $plataformas[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_plataformas_digitales=$plataformas;
    }


    function getListaTiposInfraestuctura(){
        $variables = $this->variables();
        $query= "SELECT  a.id id, a.$variables->nombre nombre from tipo_infraestructura_transporte a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $infraestructura = [];
        while($reg =  $result -> fetch_object()){
            $infraestructura[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipos_infraestructura=$infraestructura;
    }


    function getListaEnfoquesDesarrolloHumano(){
        $variables = $this->variables();
        $query= "SELECT  e.id, e.$variables->nombre nombre FROM enfoque_desarrollo_humano e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $desarrollo = [];
        while($reg =  $result -> fetch_object()){
            $desarrollo[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_desarrollo_humano=$desarrollo;
    }


    function getListaNivelEducativo(){
        $variables = $this->variables();
        $query= "SELECT  e.id, e.$variables->nombre nombre FROM nivel_educativo e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $nivel = [];
        while($reg =  $result -> fetch_object()){
            $nivel[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_nivel_educativo=$nivel;
    }


    function getListaEnfoqueEducativo(){
        $variables = $this->variables();
        $query= "SELECT  e.id, e.$variables->nombre nombre FROM enfoque_educativo e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $enfoque = [];
        while($reg =  $result -> fetch_object()){
            $enfoque[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoque_educativo=$enfoque;
    }


    function getListaTemaEducativo(){
        $variables = $this->variables();
        $query= "SELECT  e.id, e.$variables->nombre nombre FROM temas_educacion e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $tema = [];
        while($reg =  $result -> fetch_object()){
            $tema[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tema_educativo=$tema;
    }


    function getListaGruposMinoritarios(){
        $variables = $this->variables();
        $query= "SELECT  e.id, e.$variables->nombre nombre FROM grupo_minoritario e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $grupo = [];
        while($reg =  $result -> fetch_object()){
            $grupo[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_grupos_minoritarios=$grupo;
    }


    function getListaEnfoquesIgualdad(){
        $variables = $this->variables();
        $query= "SELECT  e.id, e.$variables->nombre nombre FROM enfoque_igualdad e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $igualdad = [];
        while($reg =  $result -> fetch_object()){
            $igualdad[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_igualdad=$igualdad;
    }


    function getListaEnfoquesMujer(){
        $variables = $this->variables();
        $query= "SELECT  e.id, e.$variables->nombre nombre FROM enfoque_mujer e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $mujer = [];
        while($reg =  $result -> fetch_object()){
            $mujer[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_mujer=$mujer;
    }


    function getListaEnfoqueSalud(){
        $variables = $this->variables();
        $query= "SELECT  e.id, e.$variables->nombre nombre FROM enfoque_salud e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $salud = [];
        while($reg =  $result -> fetch_object()){
            $salud[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoque_salud=$salud;
    }


    function getListaEnfoquePobreza(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_pobreza e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $pobreza = [];
        while($reg =  $result -> fetch_object()){
            $pobreza[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoque_pobreza=$pobreza;
    }


    function getListaEnfoqueHambre(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_hambre e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $hambre = [];
        while($reg =  $result -> fetch_object()){
            $hambre[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoque_hambre=$hambre;
    }


    function getListaEnfoqueVivienda(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_vivienda e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $vivienda = [];
        while($reg =  $result -> fetch_object()){
            $vivienda[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoque_vivienda=$vivienda;
    }


    function getListaEnfoqueTrabajoDecente(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_trabajo_decente e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $trabajo = [];
        while($reg =  $result -> fetch_object()){
            $trabajo[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoque_trabajo_decente=$trabajo;
    }


    function getListaEnfoqueTrabajoVerde(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_trabajo_verde e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $verde = [];
        while($reg =  $result -> fetch_object()){
            $verde[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoque_trabajo_verde=$verde;
    }


    function getListaEnfoqueJusticia(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_justicia e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $justicia = [];
        while($reg =  $result -> fetch_object()){
            $justicia[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoque_justicia=$justicia;
    }


    function getListaEnfoqueAgua(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_agua e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $agua = [];
        while($reg =  $result -> fetch_object()){
            $agua[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoque_agua=$agua;
    }


    function getListaPracticaAncestral(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM practica_ancestral e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $practica = [];
        while($reg =  $result -> fetch_object()){
            $practica[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_practica_ancestral=$practica;
    }


    function getListaEnfoquesInvestigacion(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_investigacion e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $investigacion = [];
        while($reg =  $result -> fetch_object()){
            $investigacion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_investigacion=$investigacion;
    }


    function getListaFormasInvestigacion(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM forma_investigacion e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $formas = [];
        while($reg =  $result -> fetch_object()){
            $formas[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_formas_investigacion=$formas;
    }


    function getListaEtapasInvestigacion(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM etapa_investigacion e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $etapas = [];
        while($reg =  $result -> fetch_object()){
            $etapas[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_etapas_investigacion=$etapas;
    }


    function getListaApoyosInvestigacion(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM apoyo_investigacion e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $apoyos = [];
        while($reg =  $result -> fetch_object()){
            $apoyos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_apoyos_investigacion=$apoyos;
    }


    function getListaOngsInvestigacion(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM ong_investigacion e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $ongs = [];
        while($reg =  $result -> fetch_object()){
            $ongs[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_ongs_investigacion=$ongs;
    }


    function getListaEstadosPublicacionInvestigacion(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM estado_publicacion_investigacion e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $estados = [];
        while($reg =  $result -> fetch_object()){
            $estados[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_estados_publicacion_investigacion=$estados;
    }


    function getListaFuentesCapitales(){
        $variables = $this->variables();
        $query= "SELECT a.id id, a.$variables->nombre nombre from fuente_capital a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $fuentes = [];
        while($reg =  $result -> fetch_object()){
            $fuentes[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_fuentes_capitales=$fuentes;
    }


    function getListaEnfoquesEconomia(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_economia e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $economia = [];
        while($reg =  $result -> fetch_object()){
            $economia[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_economia=$economia;
    }


    function getListaActividadesProyEconomia(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM actividad_proy_economia e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $actividades = [];
        while($reg =  $result -> fetch_object()){
            $actividades[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_actividades_proyeconomia=$actividades;
    }


    function getListaEnfoquesFabricacion(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_fabricacion e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $fabricacion = [];
        while($reg =  $result -> fetch_object()){
            $fabricacion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_fabricacion=$fabricacion;
    }


    function getListaEnfoquesRegeneracion(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM enfoque_regeneracion e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $regeneracion = [];
        while($reg =  $result -> fetch_object()){
            $regeneracion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_enfoques_regeneracion=$regeneracion;
    }


    function getListaAprovechamientoResiduos(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM aprovechamiento_residuo e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $aprovechamiento = [];
        while($reg =  $result -> fetch_object()){
            $aprovechamiento[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_aprovechamiento_residuos=$aprovechamiento;
    }


    function getListaTipoGestionResiduos(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre, e.id_padre FROM tipo_gestion_residuo e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $gestion = [];
        while($reg =  $result -> fetch_object()){
            $gestion[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_tipo_gestion_residuos=$gestion;
    }


    function getListaProcesosReciclajes(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM proceso_reciclaje e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $procesos = [];
        while($reg =  $result -> fetch_object()){
            $procesos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_procesos_reciclajes=$procesos;
    }


    function getListaProductoFinal(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM producto_final e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $producto = [];
        while($reg =  $result -> fetch_object()){
            $producto[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_producto_final=$producto;
    }


    function getListaActoresProyecto(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM actor_proyecto e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $proyecto = [];
        while($reg =  $result -> fetch_object()){
            $proyecto[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_actores_proyecto=$proyecto;
    }


    function getListaOrigenResiduos(){
        $variables = $this->variables();
        $query= "SELECT a.id_origen_residuo id, a.$variables->nombre nombre FROM origen_residuo a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $origen = [];
        while($reg =  $result -> fetch_object()){
            $origen[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_origen_residuos=$origen;
    }


    function getListaCompuestoResiduos(){
        $variables = $this->variables();
        $query= "SELECT a.id_compuesto_residuo id, a.$variables->nombre nombre fROM compuesto_residuo a where a.estado = 'A'";
        $result = $this->conn->query($query);
        $compuestos = [];
        while($reg =  $result -> fetch_object()){
            $compuestos[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_compuesto_residuos=$compuestos;
    }


    function getListaImpactoMedido(){
        $variables = $this->variables();
        $query= "SELECT e.id, e.$variables->nombre nombre FROM impacto_medido e WHERE e.estado = 'A'";
        $result = $this->conn->query($query);
        $impacto = [];
        while($reg =  $result -> fetch_object()){
            $impacto[] = [
                'id' => $reg->id,
                'nombre' => $reg->nombre
            ];
        }
        $this->lista_impacto_medido=$impacto;
    }




    public function getCatalogosInscripcion(){
        $this->getListaMediosContacto();
        $this->getListaDifusion();
        $this->getListaPerfilesRecomendacion();
        $this->getListaSectorOperativo();
        $this->getListaEstructuraJuridicaSectorOP();
        $this->getListaModeloOperativo();
    }



    public function getCatalogosProyecto(){
        $this->getListaCategorias();
        $this->getListaEscalas();
        $this->getListaActividades();
        $this->getListaAmenazas();
        $this->getListaDebilidades();
        $this->getListaODS();
    }



    public function getCatalagosImpactoSocial(){
        $this->getListaGruposEtnicos();
        $this->getListaGruposObjetivos();
        $this->getListaGruposVulnerables();
    }



    public function getCatalogosSostenibilidadFinanciera(){
        $this->getListaComposicionIngresos();
        $this->getListaTipoInteresParticipar();
        $this->getListaTipoCapacitacion();
        $this->getListaTipoNetworking();
        $this->getListaFasesNegocio();
        $this->getListaFuentesCapital();
    }



    public function getCatalogosInnovacionTecnologia(){
        $this->getListaTipoInnovacion();
        $this->getListaTipoPatente();
        $this->getListaTipoTecnologia();
        $this->getListaTipoBlockchain();
    }



 public function getCatalogosRenewableEnergy(){
        $this->getListaEnfoquesEnergia();
        $this->getListaFuenteEnergia();
        $this->getListaTipoIndustriaEnergia();
    }



    public function getCatalogosSustainableFinance(){
        $this->getListaEnfoquesAmbientalesFinanzas();
        $this->getListaTipoOrganizacion();
        $this->getListaInstrumentoFinanciero();
        $this->getListaInstitucionesFinancieras();
        $this->getListaTipoFinanciamiento();
    }



    public function getCatalogosResilientArquitecture(){
        $this->getListaOpcionesArquitectura();
        $this->getListaRecursosArquitectura();
        $this->getListaServiciosAmbientales();
    }



    public function getCatalogosTechStartup(){
        $this->getListaEnfoquesStartup();
        $this->getListaProductosServicios();
        $this->getListaTiposCrecimiento();
    }



    public function getCatalogosHabitatEcosistem(){
        $this->getListaEcosistemas();
        $this->getListaObjetivosProyHabitat();
        $this->getListaFuentesAguaDulce();
        $this->getListaAdicionalidadesCarbono();
        $this->getListaEnfoquesHabitat();
        $this->getListaTiposEspecie();
        $this->getListaTiposFauna();
        $this->getListaTiposBosques();
        $this->getListaClasesBosques();
        $this->getListaEstrategiasIncendioForestal();
        $this->getListaObjetivosAgua();
        $this->getListaRecursoHidrico();
        $this->getListaContaminanteAgua();
        $this->getListaAmenzasEcosistema();
        $this->getListaAccesosInformacion();
    }



    public function getCatalogosSustainableFashion(){
        $this->getListaEnfoquesModa();
        $this->getListaEnfoquesModa();
        $this->getListaNormativaTextil();
        $this->getListaPatronesCorte();
        $this->getListaEmpaquesSostenibles();
        $this->getListaZonasEnvio();
        $this->getListaDistribucionProducto();
        $this->getListaCanalesComunidad();
    }



    public function getCatalogosSustainableFarmingFoodProduction(){
        $this->getListaEnfoquesProduccion();
        $this->getListaElementosAmbientales();
        $this->getListaEmpaquesAmbientales();
    }



    public function getCatalogosSustainableMobility(){
        $this->getListaEnfoquesTransporte();
        $this->getListaTipoTransporte();
        $this->getListaTipoVehiculo();
        $this->getListaObjetivosTransporte();
        $this->getListaZonaOperativaTransporte();
        $this->getListaEnfoquesLogistica();
        $this->getListaPlataformasDigitales();
        $this->getListaTiposInfraestuctura();
    }



    public function getCatalogosSustainableHumanDevelopment(){
        $this->getListaEnfoquesDesarrolloHumano();
        $this->getListaNivelEducativo();
        $this->getListaEnfoqueEducativo();
        $this->getListaTemaEducativo();
        $this->getListaGruposMinoritarios();
        $this->getListaEnfoquesIgualdad();
        $this->getListaEnfoquesMujer();
        $this->getListaEnfoqueSalud();
        $this->getListaEnfoquePobreza();
        $this->getListaEnfoqueHambre();
        $this->getListaEnfoqueVivienda();
        $this->getListaEnfoqueTrabajoDecente();
        $this->getListaEnfoqueTrabajoVerde();
        $this->getListaEnfoqueJusticia();
        $this->getListaEnfoqueAgua();
        $this->getListaPracticaAncestral();
    }



    public function getCatalogosSustainableAcademicResearch(){
        $this->getListaEnfoquesInvestigacion();
        $this->getListaFormasInvestigacion();
        $this->getListaEtapasInvestigacion();
        $this->getListaApoyosInvestigacion();
        $this->getListaOngsInvestigacion();
        $this->getListaEstadosPublicacionInvestigacion();
        $this->getListaFuentesCapitales();
    }



    public function getCatalogosCircularEconomy(){
        $this->getListaEnfoquesEconomia();
        $this->getListaActividadesProyEconomia();
        $this->getListaEnfoquesFabricacion();
        $this->getListaEnfoquesRegeneracion();
        $this->getListaAprovechamientoResiduos();
        $this->getListaProcesosReciclajes();
        $this->getListaProductoFinal();
        $this->getListaActoresProyecto();
        $this->getListaOrigenResiduos();
        $this->getListaCompuestoResiduos();
        $this->getListaImpactoMedido();
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