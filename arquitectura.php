<?php 


	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/Arquitectura.php";
    require_once "modelos/Catalogos.php";



    $arqui= new Arquitectura();
    $arqui->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosResilientArquitecture();


    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_title($etiquetas->arquitectura_titulo));

//Tu proyecto se enfoca en:
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p1));

        $options = [
            [
                'id' => '1',
                'etiqueta' => 'Paisajes o regeneración de espacios verdes',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Espacios públicos',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Construcción sustentable',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Infraestructura Verde',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Comunidades o ciudades sostenibles',
            ],
            [
                'id' => '6',
                'etiqueta' => 'Diseño de interiores',
            ],
        ];

        $selectedOptions = ['3'];

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


//¿Qué tipo de espacios?


    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p1_op1));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p1_op1_p1));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->arquitectura_p1_op1_seleccione));



    $datos = array(
        [
            'a' => "parques",
            'b' => '', 
        ],
        [
            'a' => "Huertos urbanos",
            'b' => '', 
        ],
        [
            'a' => "Ríos/Lagos/Lagunas",
            'b' => '', 
        ],
                [
            'a' => "Bosques",
            'b' => '', 
        ],
    );


        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" >'.$etiquetas->arquitectura_p1_op1_nombre.'</td>';
        $table .= '<td style="color:  #000000; background-color: #BDB7B7;" > '.$etiquetas->arquitectura_p1_op1_cuanto.'</td>';
        $table .= '</tr>';

    foreach ($datos as $fila) {
            $table .= '<tr>';
            foreach ($fila as $valor) {
                $table .= '<td >' . $valor . '</td>';
            }

            $table .= '</tr>';
        }

        $table .= '</table>';
        $table .= '</div>';

    $pdf->SetY( $pdf->GetY()+5);
    $pdf->writeHTML($table);





//¿Qué tipo de espacios públicos?


    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p1_op2));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p1_op2_p1));

    $datos = array(
        [
            'a' => "aaa",
            'b' => '', 
        ],
        [
            'a' => "bbb",
            'b' => '', 
        ],
        [
            'a' => "ccc",
            'b' => '', 
        ],
                [
            'a' => "ddd",
            'b' => '', 
        ],
    );


        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" >'.$etiquetas->arquitectura_p1_op2_nombre.'</td>';
        $table .= '<td style="color:  #000000; background-color: #BDB7B7;" > '.$etiquetas->arquitectura_p1_op2_unidad.'</td>';
        $table .= '</tr>';

    foreach ($datos as $fila) {
            $table .= '<tr>';
            foreach ($fila as $valor) {
                $table .= '<td >' . $valor . '</td>';
            }

            $table .= '</tr>';
        }

        $table .= '</table>';
        $table .= '</div>';

    $pdf->SetY( $pdf->GetY()+5);
    $pdf->writeHTML($table);



    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//Construcción sustentable
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p1_op3));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->arquitectura_p1_op3_seleccione));

    $datos = array(
        [
            'a' => "Preserva el entorno natural",
            'b' => '', 
        ],
        [
            'a' => "Vivienda digna",
            'b' => '', 
        ],
        [
            'a' => "Vivienda inteligente",
            'b' => '', 
        ],
                [
            'a' => "Construccion bioclimática",
            'b' => '', 
        ],
    );


        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" >'.$etiquetas->arquitectura_p1_op3_nombre.'</td>';
        $table .= '<td style="color:  #000000; background-color: #BDB7B7;" > '.$etiquetas->arquitectura_p1_op3_cuanto.'</td>';
        $table .= '</tr>';

    foreach ($datos as $fila) {
            $table .= '<tr>';
            foreach ($fila as $valor) {
                $table .= '<td >' . $valor . '</td>';
            }

            $table .= '</tr>';
        }

        $table .= '</table>';
        $table .= '</div>';

    $pdf->SetY( $pdf->GetY()+5);
    $pdf->writeHTML($table);


//Infraestructura Verde

    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p1_op4));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($arqui->infraestructura_verde));

//Comunidades o ciudades sostenibles
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p1_op5));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($arqui->comunidades_ciudades_sostenibles));


//Diseño de interiores
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p1_op6));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($arqui->diseno_interiores));

    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//termina las opciones

//¿El proyecto optimiza el uso de energía?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p2));

    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_boolean($arqui->optimiza_uso_energia));

//¿Cuál es el porcentaje de optimización, reducción o ahorro en energía?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p3));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($arqui->porcentaje_ahorro_energia));

//Determina el porcentaje de optimización, reducción o ahorro del recurso
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p4));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->arquitectura_p4_indicador));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($arqui->porcentaje_ahorro_energia));
//¿Qué tipo de recursos se ahorran? 
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p5));

    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_indication($etiquetas->arquitectura_p5_text));

        $options = [
            [
                'id' => '1',
                'etiqueta' => 'agua',
            ],
            [
                'id' => '2',
                'etiqueta' => 'aumento de vida util',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Emisiones',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Energia',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Espacio (áera)',
            ],
            [
                'id' => '6',
                'etiqueta' => 'Materiales',
            ],
            [
                'id' => '7',
                'etiqueta' => 'Menor peso',
            ],
            [
                'id' => '8',
                'etiqueta' => 'No aplica',
            ],
        ];

        $selectedOptions = ['1'];

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


//¿El proyecto promueve acceso a vivienda digna?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p6));

    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_boolean($arqui->promueve_acceso_vivienda_digna));


    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);


//Determina los niveles de sostenibilidad de la vivienda y enumere 3 condiciones que lo valide
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p7));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($arqui->descripcion_condiciones_sost_vivienda));


   $datos = array(
        [
            'a' => $etiquetas->arquitectura_p7_descripcion,
            'b' => $arqui->condicion_sost_vivienda1, 
        ],
        [
            'a' => $etiquetas->arquitectura_p7_descripcion,
            'b' => $arqui->condicion_sost_vivienda2, 
        ],
        [
            'a' => $etiquetas->arquitectura_p7_descripcion,
            'b' => $arqui->condicion_sost_vivienda3, 
        ],

    );


        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';

    foreach ($datos as $fila) {
            $table .= '<tr>';
            foreach ($fila as $valor) {
                $table .= '<td >' . $valor . '</td>';
            }

            $table .= '</tr>';
        }

        $table .= '</table>';
        $table .= '</div>';
        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

//¿El diseño del proyecto está basado en la naturaleza?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p8));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($arqui->basado_en_naturaleza));
//como
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p9));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($arqui->como_basado_en_naturaleza));

//¿El diseño o implementación del proyecto han potenciado los servicios ambientales?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p10));

    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_boolean($arqui->ha_potenciado_serv_ambientales));

    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->arquitectura_p11));

            $options = [
            [
                'id' => '1',
                'etiqueta' => 'Belleza Escénica',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Captura de Carbono',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Ciclo de carbono',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Generacion de oxigeno',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Polinizacion',
            ],
            [
                'id' => '6',
                'etiqueta' => 'Refugio de vida Silvestre',
            ],
            [
                'id' => '7',
                'etiqueta' => 'Regulación del clima',
            ],
            [
                'id' => '8',
                'etiqueta' => 'otro',
            ],
        ];

        $selectedOptions = ['1'];

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

    //$pdf->SetXY(0, $pdf->GetY() + 5);
    //$pdf->writeHTML($utils->format_indication($arqui->planificacion_construccion_sostenible));

   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');


 ?>