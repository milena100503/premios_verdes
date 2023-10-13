<?php 


	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/HabitatEcosystem.php";
    require_once "modelos/Catalogos.php";


    $ecos= new HabitatEcosystem();
    $ecos->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosHabitatEcosystem();



    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);



    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_title($etiquetas->habitat_ecosystem_titulo));

    //En cuál ecosistema se enfoca el proyecto?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p1));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->habitat_ecosystem_p1_seleccione));

        $selectedOptions = [ ];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_ecosistemas as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

 //¿Que tipo de ecosistema marino?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p4));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->habitat_ecosystem_p4_seleccione));


            $options = [
            [
                'id' => '1',
                'etiqueta' => 'Aguas profundas',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Arrecifes de Coral',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Bosques de manglar',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Estuario',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Humedales',
            ],
            [
                'id' => '6',
                'etiqueta' => 'Mar abierto',
            ],
        ];

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);




    $pdf->AddPage();
    //El proyecto se concentra en:
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p2));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->habitat_ecosystem_p2_seleccione));

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_objetivos_proyhabitat as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);



    $pdf->SetAutoPageBreak(false, 0);


    //La fuente de agua dulce proviene de:
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p3_1));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->habitat_ecosystem_p3_1_seleccione));

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_fuentes_agua_dulce as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY( $pdf->GetY()+5);
        $pdf->writeHTML($table);



    $pdf->AddPage();
    //¿Que tipo de ecosistema terrestre?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p5));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->habitat_ecosystem_p5_seleccione));
        $options = [
            [
                'id' => '1',
                'etiqueta' => 'xxx',
            ],
            [
                'id' => '2',
                'etiqueta' => 'xxx',
            ],
            [
                'id' => '3',
                'etiqueta' => 'xxx',
            ],
            [
                'id' => '4',
                'etiqueta' => 'xxx',
            ],
        ];

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY( $pdf->GetY()+5);
        $pdf->writeHTML($table);

//DE AQUI
    //¿Cuál es el área directa de influencia del proyecto (en hectáreas)?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p6));

    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_answer($ecos->area_influencia_proyecto));  

//no esta    //¿En qué porcentaje se han reducido las emisiones de carbono a partir de la implementación del proyecto?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p7));
    
    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->porcentaje_reduccion_carbono));  

  

//¿Cuál es la proyección de captura de CO2 de su proyecto en toneladas equivalentes de Carbono?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p8));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->captura_dioxido_carbono));
     $pdf->AddPage();

    $pdf->SetAutoPageBreak(false, 0);

// ¿El proyecto considera adicionalidades al carbono? 
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p9));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->habitat_ecosystem_p9_seleccione));

        $selectedOptions = [$ecos->considera_adicionalidades_carbono];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_adicionalidades_carbono as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

//¿El proyecto dinamiza la economía local a través de la promoción de la bioeconomia?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p10));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($ecos->dinamiza_economia_local));
    //como
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p11));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->como_dinamiza_economia_local));

//¿El proyecto forma parte del manejo dentro de un área protegida?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p12));
 
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($ecos->maneja_area_protegida));
    //cual
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p13));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->como_maneja_area_protegida));

//¿El proyecto forma parte de un ecosistema frágil?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p14));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($ecos->hace_parte_ecosistema_fragil));

    //¿Cuál?
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p15));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->cual_ecosistema_fragil));
   
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//El proyecto se concentra en:
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p16));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p16_seleccione));

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_enfoques_habitat as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);



//¿Qué tipo de especies?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p17));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p17_seleccione));

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_tipo_especie as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY( $pdf->GetY()+5);
        $pdf->writeHTML($table);


//¿Qué tipo de fauna?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p18));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->habitat_ecosystem_p18_seleccione));

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_tipo_fauna as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

//¿Cuáles son las principales especies protegidas (hasta 5)?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p19));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->principales_especies_protegidas));

    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//¿El proyecto realiza monitoreo para determinar la cantidad de especies que se están conservando?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p20));

    $pdf->SetY($pdf->GetY()+10);
    $pdf->writeHTML($utils->format_boolean($ecos->realiza_monitoreo_especies));


//¿El proyecto cuenta con un plan de manejo del área de conservación?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p20_1));

    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_boolean($ecos->tiene_plan_area_conservacion));


    
//Tipo de Bosque
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p21));

        $selectedOptions = [ $ecos->id_tipo_bosque ];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_tipo_bosques as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);


    //Clasificación del Bosque
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p22));

        $selectedOptions = [ $ecos->id_clase_bosque ];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_clases_bosques as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);


//Indica cuál es la especie a erradicar
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p23));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->especie_a_erradicar ));

//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//¿Cuál es el principal estrategia de prevención de incendios forestales?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p24));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->id_estrategia_incendio_forestal ));


//¿Cuál es el porcentaje de disminución de incendios forestales? (%)    
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p25));
   
    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->disminucion_eventos_incendio_forestal));

//¿Cuál es el principal destino del recurso hídrico?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p26));
 
    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->id_recurso_hidrico ));


//¿Cuáles son los principales agentes de contaminación del recurso?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p27));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p27_seleccione));

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_contaminante_agua as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);



//¿Cuáles son las principales amenazas del ecosistema?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p28));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p28_seleccione));

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_amenazas_ecosistemas as $option) {
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

//¿Cómo promueve el acceso al conocimiento?

    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p29));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p29_seleccione));

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_accesos_informacion as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

//¿Tu proyecto involucra a comunidades locales?

    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p30));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($ecos->involucra_comunidades_locales));
    //Funciones que desempeñan dentro del proyecto

    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->habitat_ecosystem_p31));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($ecos->funciones_dentro_del_proyecto));


   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');


 ?>