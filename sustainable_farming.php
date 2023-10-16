<?php 


  require_once('tcpdf/TCPDF-main/tcpdf.php');   
  require_once "etiquetas.php";
  require_once "Utils.php";
  require_once "modelos/SustainableFarming.php";
  require_once "modelos/Catalogos.php";

  $fami= new SustainableFarming();
  $fami->inicializar();    
  $catalogo = new Catalogos();
  $catalogo->getCatalogosSustainableFarmingFoodProduction();




  $utils = new Utils();
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
  //$pdf->setPageOrientation('');
  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);

  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML( $utils->format_title($etiquetas->sustainable_farming_titulo));
//En que se enfoca el proyecto:
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p1));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_farming_p1_seleccione));

    
       $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_enfoques_produccion as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);



//¿Cuál es la filosofía del proyecto?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p2));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->filosofia_proyecto));

//¿Qué sistema de producción o tecnología se utilizan para reducir el impacto ambiental del proyecto?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p3));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->sistema_tecnologia_utilizada));

//Especifica cuáles los elementos que se priorizan y causan un impacto positivo ambiental
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p4));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_farming_p4_seleccione));

          
       $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_elementos_ambientales as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);


  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);



//¿El proyecto tiene estrategias para optimizar los recursos?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p5));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->tiene_estrategia_optimizacion_recursos));


//¿El proyecto busca maximizar la vida útil en todas las etapas de producción?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p6));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->maxima_vida_util_produccion));

//¿Cómo?
  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p7));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->como_maxima_vida_util_produccion));


//¿El proyecto integra procesos biológicos y ecológicos en la producción (Fijación de nitrógeno, regeneración de suelo, alelopatía, competición, depredación y parasitismo)?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p8));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->integra_procesos_biologicos_ecologicos));

//¿El proyecto busca minimizar las fuentes no renovables que causan impacto negativo en el ambiente y en la salud de los productores agrícolas y consumidores?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p9));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->minimiza_fuentes_no_renovables));

//¿Cuáles?
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p10));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->cuales_fuentes_no_renovables));


  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

//¿El proyecto aprovecha el conocimiento, tradiciones y saberes ancestrales de los agricultores, reforzando así el capital humano?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p11));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->aprovecha_conocimientos_tradiciones));
//como
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p12));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->como_aprovecha_conocimientos_tradiciones));

//¿El proyecto fomenta la rotación de cultivos con el objetivo de obtener un suelo más sano y mejor control de plagas?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p13));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->fomenta_rotacion_cultivos));
//cuales
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p14));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->cuales_cultivos_rotacion));
//¿El proyecto implementa buenas prácticas para proteger el suelo de la erosión, compactación o desertificación?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p15));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->implementa_practicas_evitar_erosion));
//¿Cuáles?
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p16));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->cuales_practicas_evitar_erosion));

//¿El proyecto usa el Manejo Integrado de Plagas (MIP) para controlar las plagas y minimizar la aplicación de químicos?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p17));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->utiliza_manejo_integrado_plagas));
 
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

//¿El proyecto implementa sistema agroforestales o agrosilvopastoriles?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p18));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->implementa_sistemas_agroforestales));

//¿El producto o servicio final no contribuye a la deforestación o degradación de bosques?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p19));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->no_contribuye_deforestacion_bosques));

//¿El proyecto optimiza la pérdida de alimentos a través de buenas prácticas o tecnología poscosecha?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p20));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->optimiza_perdida_alimentos));
//¿Cómo?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p21));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->como_optimiza_perdida_alimentos));

//¿El proyecto utiliza productores de proximidad cercana?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p22));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->busca_proveedores_proximidad_cercana));

//¿El proyecto compra los insumos de productores locales?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p23));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->compra_insumos_productores_locales));

//¿El proyecto tiene un menú rotativo basado en productos de estación?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p24));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->tiene_menu_rotativo));

  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

//¿El proyecto cuenta con un menú que incluye alimentos vegetarianos y veganos?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p25));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->tiene_menu_alimentos_vegetarianos));

//¿Cómo previene la pérdida y desperdicio de alimentos?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p26));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->como_previene_perdida_alimentos));

//¿El proyecto separa los residuos y los entrega a gestores?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p27));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->separa_residuos_para_gestores));

//¿El proyecto tiene sus propios cultivos?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p28));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->cuenta_con_cultivos_propios));

//¿El proyecto tiene una cadena de distribución circular o logística inversa?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p29));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->tiene_cadena_distribucion_inversa));

//Especificar
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p30));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->cual_cadena_distribucion_inversa));

  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

//¿El proyecto optimiza la infraestructura de transporte y distribución?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p31));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->optimiza_infraestructura_transporte));

//Especificar
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p32));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->como_optimiza_infraestructura_transporte));

//¿Los vehículos de distribución utilizan energías renovables?
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p33));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->vehiculos_utilizan_energias_renovables));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_farming_p34_text));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->como_vehiculos_utilizan_energias_renovables));

//¿El proyecto optimiza el uso de energía en sus bodegas?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p35));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->optimiza_energia_bodegas));
//Especificar
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p36));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->como_optimiza_energia_bodegas));

//¿El proyecto busca mejorar la seguridad alimentaria de individuos o familias y se enfoca en la creación de sistemas alimentarios locales?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p37));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->busca_mejorar_seguridad_alimentaria));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p38));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->como_busca_mejorar_seguridad_alimentaria));


  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

//¿El proyecto promueve el comercio local justo?
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p39));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->promueve_comercio_local));

//como?
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p40));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->como_promueve_comercio_local));

//¿El proyecto busca minimizar las emisiones de carbono?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p41));

  $pdf->SetY($pdf->GetY()+10);
  $pdf->writeHTML($utils->format_boolean($fami->busca_minimizar_emisiones_carbono));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p42));

  $pdf->SetY($pdf->GetY()+10);
  $pdf->writeHTML($utils->format_answer($fami->como_busca_minimizar_emisiones_carbono));

//¿El proyecto impulsa un modelo de la finca a la mesa?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p43));

  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_boolean($fami->impulsa_modelo_finca));
//¿Cómo?
  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p44));

  $pdf->SetY($pdf->GetY()+10);
  $pdf->writeHTML($utils->format_answer($fami->como_impulsa_modelo_finca));

//¿Cuales son las estrategias para entrenar al personal en temas de sustentabilidad? WTF
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p45));

  $pdf->SetY($pdf->GetY()+10);
  $pdf->writeHTML($utils->format_boolean($fami->estrategias_personal_sustentabilidad));

  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

//¿El proyecto utiliza empaques que evitan el uso de plásticos de un solo uso?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p46));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_farming_p46_seleccione));


       $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_empaques_ambientales as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);



//¿El proyecto involucra a comunidades locales?
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p47));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($fami->involucra_comunidades_locales));
//Funciones que desempeñan dentro del proyecto
  $pdf->SetXY(0,$pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_farming_p48));

  $pdf->SetXY(0,$pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($fami->funciones_dentro_del_proyecto));






   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');


 ?>