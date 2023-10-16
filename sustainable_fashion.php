<?php 


	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/SustainableFashion.php";
    require_once "modelos/Catalogos.php";


    $fashi= new SustainableFashion();
    $fashi->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosSustainableFashion();




    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

      $pdf->AddPage();
      $pdf->SetAutoPageBreak(false, 0);

      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_title($etiquetas->sustainable_fashion_titulo));
//¿Cuál es la filosofía del proyecto?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p0));
      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->filosofia_proyecto));
//¿En qué se enfoca el proyecto?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p1));
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_fashion_p1_seleccione));
          

       $selectedOptions = [$fashi->enfoques_moda];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_enfoques_moda as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);
//¿Qué tipo de textil?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p2));
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_fashion_p2_especifique));


       $selectedOptions = [$fashi->tipos_textil];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_tipo_textil as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//¿Cuáles materiales?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p4));
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->cuales_materiales_reciclaje));
//Cantidad de producción anual
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p5));
      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->cantidad_produccion_anual_textiles));
//Describe el tipo de diseños
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p6));

      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->descripcion_tipo_diseno));
//Corte de Patrones
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p7));
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_fashion_p7_seleccione));

          
       $selectedOptions = [$fashi->patrones_corte];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_patrones_corte as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);   
//¿Las telas de muestreo tienen un segundo uso?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p8));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->tiene_segundo_uso_tela_muestreo));
//¿Se ha utilizado tecnología 3D para el muestreo?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p9));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->ha_utilizado_tecnologia_3d));
//AÑADE PAGINA
      $pdf->AddPage();
      $pdf->SetAutoPageBreak(false, 0);   
//¿Se ha utilizado virtual sampling para el muestreo?

      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p10));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->ha_utilizado_virtual_sampling));
//¿Utiliza material reciclado para la producción de la indumentaria?

      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p11));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->utiliza_material_reciclado_indumentaria));
    //¿Cuál material?
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p12));

      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->cual_material_reciclado_indumentaria));
//¿Utiliza biotextiles en la producción de la indumentaria?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p13));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->utiliza_biotextiles_en_produccion));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p14));

      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->cuales_biotextiles));
//¿El proyecto produce indumentaria con un propósito multi-estación, o multifuncional que prolonga su vida útil?

      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p15));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->produce_indumentaria_proposito));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p16));

      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->detalle_indumentarias_proposito));
//AÑADE PAGINA
      $pdf->AddPage();
      $pdf->SetAutoPageBreak(false, 0);
//¿El material de confección es comprado localmente?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p17));
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->material_confeccion_comprado_localmente));
//¿Se utilizan fuentes de energía renovable para la producción?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p18));
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->utiliza_energia_renovable));
//¿Se utilizan colorantes naturales para teñir las telas?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p19));
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->utiliza_colorantes_naturales));
//¿Utilizan el Just-in-time, o hecho al pedido para minimizar el desecho?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p20));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->utiliza_just_in_time));
//¿Se utilizan empaques sostenibles?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p21));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->utiliza_empaques_sostenibles));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p22));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_fashion_p22_seleccione));
      //
       

       $selectedOptions = [ $fashi->cuales_empaques_sostenibles];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_empaques_sostenibles as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);
//AÑADE PAGINA
      $pdf->AddPage();
      $pdf->SetAutoPageBreak(false, 0);

//¿Cuál es la zona de envios?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p23));
       

       $selectedOptions = [ $fashi->id_zona_envio];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_zonas_envio as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);
//¿Cómo se hace la distribución del producto?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p24));
      

       $selectedOptions = [ $fashi->distribución_del_producto];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_distribucion_producto as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);
//¿El proyecto tiene una cadena de distribución circular o logística inversa?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p25));
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->tiene_cadena_distribucion));
      //especificar
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_fashion_p26));
      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->detalle_cadena_distribucion));
//¿El proyecto optimiza la infraestructura de transporte y distribución?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p27));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->optimiza_infraestructura_transporte));
      //explicacion
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_fashion_p28));

      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->detalle_optimizacion_infraestrutura_transporte));
//AÑADE PAGINA
      $pdf->AddPage();
      $pdf->SetAutoPageBreak(false, 0);
//¿Los vehículos de distribución utilizan energías renovables?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p29));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->vehiculos_utilizan_energias_renovables));
      //explicar
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_fashion_p30));

      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->detalle_vehiculos_distribucion));

      //¿El proyecto optimiza el uso de energía en sus bodegas?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p31));
      
      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->optimiza_energia_bodegas));
//¿El proyecto produce indumentaria o accesorios digitales?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p32));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->produce_accesorios_digitales));
//¿Cuáles son las herramientas usadas para la creación de la piezas digitales?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p33));

      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->herramientas_piezas_digitales));
//¿Las piezas digitales tienen una utilización física? Las piezas son exclusivamente digitales o se producen digitalmente con el fin de ser producidas físicamente
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p34));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->tiene_utilizacion_fisica_piezas_digitales));
//¿Tiene el proyecto una comunidad online?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p35));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->tiene_comunidad_online));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_fashion_p36_seleccione));


       $selectedOptions = [ ];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_canales_comunidad as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);
//AÑADE PAGINA
      $pdf->AddPage();
      $pdf->SetAutoPageBreak(false, 0);
//¿Ha participado el proyecto en pasarelas digitales?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p37));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->ha_participado_pasarelas_digitales));
      //cuales
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p38));

      $pdf->SetY($pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->cuales_pasarelas_digitales));
//¿Qué hace que el proyecto cumpla con las características de Slow Fashion?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p39));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->detalle_caracteristicas_slow_fashion));      
//¿Qué tipo de materiales e insumos? NO REPUESTAS
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p45));
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->tipos_materiales_insumos));
// ¿El proyecto involucra a comunidades locales?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p43));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->involucra_comunidades_locales));
//¿El proyecto promueve el comercio local justo?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p40));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_boolean($fashi->promueve_comercio_local));

       //¿Como?
      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p41));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->como_promueve_comercio_local));
//¿Cuáles son las estrategias para entrenar al personal en temas de sustentabilidad?
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p42));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->estrategias_personal_sustentabilidad));
//AÑADE PAGINA
      $pdf->AddPage();
      $pdf->SetAutoPageBreak(false, 0);
//Funciones que desempeñan dentro del proyecto
      $pdf->SetXY(0, $pdf->GetY() + 10);
      $pdf->writeHTML($utils->format_question($etiquetas->sustainable_fashion_p44));

      $pdf->SetXY(0, $pdf->GetY() + 5);
      $pdf->writeHTML($utils->format_answer($fashi->funciones_dentro_del_proyecto));





   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');


 ?>