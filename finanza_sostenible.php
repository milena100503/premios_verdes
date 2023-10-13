<?php 


	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/FinanzasSostenible.php";
    require_once "modelos/Catalogos.php";

    $fiso= new FinanzasSostenible();
    $fiso->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosSustainableFinance();



    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);


    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_title($etiquetas->finanzas_sostenibles_titulo));

//La institución financiera promueve las finanzas sostenibles mediante:
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p1));

        $options = [
            [
                'id' => '1',

                //Identificación y evaluación de riesgos ambientales
                'etiqueta' => $etiquetas->finanzas_sostenibles_p1_op1,
            ],
            [
                'id' => '2',
                //Identificación y evaluación de riesgos ambientales
                'etiqueta' => $etiquetas->finanzas_sostenibles_p1_op2,
            ],
            [
                'id' => '3',
             //Creación de productos y servicios
                'etiqueta' => $etiquetas->finanzas_sostenibles_p1_op3,
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

//¿A qué tipo de institución financiera pertenece?

    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p2));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->finanzas_sostenibles_p2_text));


   $options = [
        [
            'id' => '1',
            'etiqueta' => 'Administradora de fondos y fideicomisos',
        ],
        [
            'id' => '2',
            'etiqueta' => 'Asistencia Oficial de Desarrollo (ODA)',
        ],
        [
            'id' => '3',
            'etiqueta' => 'Banca privada',
        ],
        [
            'id' => '4',
            'etiqueta' => 'Banco de desarrollo',
        ],
        [
            'id' => '5',
            'etiqueta' => 'Casa de Corretaje',
        ],
        [
            'id' => '6',
            'etiqueta' => 'Compañía de seguro',
        ],
        [
            'id' => '7',
            'etiqueta' => 'Cooperativas de ahorro y crédito',
        ],
        [
            'id' => '8',
            'etiqueta' => 'Filantropía',
        ],
        [
            'id' => '9',
            'etiqueta' => 'Fondo privado',
        ],
        [
            'id' => '10',
            'etiqueta' => 'Hipotecaria',
        ],
                [
            'id' => '11',
            'etiqueta' => 'Programas de aceleramiento',
        ],
        [
            'id' => '12',
            'etiqueta' => 'Programas de incubación  ',
        ],
        [
            'id' => '13',
            'etiqueta' => 'otros ',
        ],

    ];

    $selectedOptions = [''];

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

//AÑADIR PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//Las organizaciones que acceden a sus productos y servicios se efoncan en:

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p3));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->finanzas_sostenibles_p3_text));

   $options = [
        [
            'id' => '1',
            'etiqueta' => 'Acceso al agua potable',
        ],
        [
            'id' => '2',
            'etiqueta' => 'Adaptación al cambio climático',
        ],
        [
            'id' => '3',
            'etiqueta' => 'Conservacion de Ecosistemas',
        ],
        [
            'id' => '4',
            'etiqueta' => 'Emprendimientos impacto social - ambiental',
        ],
        [
            'id' => '5',
            'etiqueta' => 'Energia Renovable',
        ],
        [
            'id' => '6',
            'etiqueta' => 'Equidad de genero',
        ],
        [
            'id' => '7',
            'etiqueta' => 'Inclusion Social',
        ],
        [
            'id' => '8',
            'etiqueta' => 'Innovacion ambiental',
        ],
        [
            'id' => '9',
            'etiqueta' => 'Mitigación al cambio climático',
        ],
        [
            'id' => '10',
            'etiqueta' => 'Recuperacion Verde Post COVID-19',
        ],
                [
            'id' => '11',
            'etiqueta' => 'Saneamiento',
        ],
        [
            'id' => '12',
            'etiqueta' => 'Transicion de negocios sostenibles ',
        ],
        [
            'id' => '13',
            'etiqueta' => 'otros ',
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


//¿Qué tipos de organizaciones acceden a sus productos o servicios?

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p4));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->finanzas_sostenibles_p4_text));


  $options = [
        [
            'id' => '1',
            'etiqueta' => 'Grandes empresas',
        ],
        [
            'id' => '2',
            'etiqueta' => 'Startups',
        ],
        [
            'id' => '3',
            'etiqueta' => 'PyMES',
        ],
        [
            'id' => '4',
            'etiqueta' => 'Entidades Gubernamentales',
        ],
        [
            'id' => '5',
            'etiqueta' => 'EONGs',
        ],
        [
            'id' => '6',
            'etiqueta' => 'Microempresas',
        ],
        [
            'id' => '7',
            'etiqueta' => 'Personas Naturales',
        ],
        [
            'id' => '8',
            'etiqueta' => 'academia',
        ],  
    ];

    $selectedOptions = ['2'];

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


//¿Cuál es el monto del portafolio?
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p5));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->monto_portafolio));


//¿Cuál es el porcentaje sobre el total de la cartera
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p6));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->porcentaje_cartera));

//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//¿Cuál es el rango de operación/asignación?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p6_1));

        $datos = array(
        [
            'a'=>  $fiso->rango_operacion_valor1,
            'b'=>  ' - ' ,
            'c'=>  $fiso->rango_operacion_valor2 ,
        ],
        [  

        

        ],
        [ 
             
        
        ],
    );
        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" > USD </td>';
        $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" > </td>';
        $table .= '<td style="color:  #000000; background-color: #BDB7B7;" > USD</td>';
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

//instrumentos financieros 
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p7));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->finanzas_sostenibles_p7_text));

  $options = [
        [
            'id' => '1',
            'etiqueta' => 'Prestamo a corto plazo',
        ],
        [
            'id' => '2',
            'etiqueta' => 'Prestamo a largo plazo',
        ],
        [
            'id' => '3',
            'etiqueta' => 'Bonos',
        ],
        [
            'id' => '4',
            'etiqueta' => 'Fideicomisos',
        ],
        [
            'id' => '5',
            'etiqueta' => 'Fondos no reembolsables',
        ],
        [
            'id' => '6',
            'etiqueta' => 'Capital privado',
        ],
        [
            'id' => '7',
            'etiqueta' => 'Polizas de inversion',
        ],
        [
            'id' => '8',
            'etiqueta' => 'Polizas deseguro',
        ],  
                [
            'id' => '9',
            'etiqueta' => 'Criptoactivos',
        ],
        [
            'id' => '10',
            'etiqueta' => 'Canje de deuda',
        ],
        [
            'id' => '11',
            'etiqueta' => 'Programas de encubacion',
        ],  
    ];

    $selectedOptions = ['2'];

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



//Prestamos a corto plazo
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p8));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($fiso->financiamiento_corto_plazo));
//Prestamos a largo plazo
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p9));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($fiso->financiamiento_largo_plazo));

    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//¿Cómo se gestiona el riesgo financiero?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p10));

    $datos = array(
        [
            'riesgo' => "xxx",
            'gestion' => 'xx', 
        ],
        [
            'riesgo' => "xxx",
            'gestieon' => 'xx',
        ],
        [
            'riesgo' => "xxxx",
            'gestion' => 'xx', 
        ],
        [
            'riesgo' => "xxxx",
            'gestion' => 'xx',
        ],
        [
            'riesgo' => "xxxx",
            'gestion' => 'xx',
        ],


    );
        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" >'.$etiquetas->finanzas_sostenibles_p10_riesgo.'</td>';
        $table .= '<td style="color:  #000000; background-color: #BDB7B7;" >'.$etiquetas->finanzas_sostenibles_p10_gestion.'</td>';
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


//¿El producto o servicio facilita la transición ecológica?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p11));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($fiso->prod_serv_facilita_transicion_ecologica));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p12));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->como_facilita_transicion_ecologica));

//¿El producto o servicio facilita la descarbonización?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p13));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($fiso->prod_serv_facilita_descarbonización));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p14));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->como_facilita_descarbonización));

//¿El producto o servicio acelera modelos circulares y crecimiento sostenible de países, ciudades, empresas que mitiguen y/o reduzcan la vulnerabilidad al cambio climático?

    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p15));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($fiso->prod_serv_acelera_modelos_circulares));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p16));


    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->como_acelera_modelos_circulares));


//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//¿El producto o servicio acelera la creación de empleo verde?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p17));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($fiso->prod_serv_acelera_creacion_empleo));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p18));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->como_acelera_creacion_empleo));

//¿El producto o servicio acelera el aprovechamiento sostenible de los recursos naturales que fomenten soluciones innovadoras basadas en naturaleza?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p19));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($fiso->prod_serv_acelera_aprov_sostenible));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p20));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->como_acelera_aprov_sostenible));


//¿El producto o servicio acelera la inclusión y reducción de desigualdades y pobreza?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p21));
   
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($fiso->prod_serv_acelera_reduccion_desigualdad));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p22));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->como_acelera_reduccion_desigualdad));



//¿El proyecto tiene fines de lucro?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p29));
    
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($fiso->tiene_fines_lucro));



//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);


//¿Qué buscas conseguir con tu participación en Premios Verdes?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p23));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->finanzas_sostenibles_p23_seleccione));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($fiso->intereses_participacion));


    $options = [
        [
            'id' => '1',
            'etiqueta' => 'Difusion',
        ],
        [
            'id' => '2',
            'etiqueta' => 'Networking',
        ],
        [
            'id' => '3',
            'etiqueta' => 'Financiamiento',
        ],
        [
            'id' => '4',
            'etiqueta' => 'Asesoria',
        ],
    ];

    $selectedOptions = [$fiso->intereses_participacion];

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

//Asesoría en:
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p24));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->finanzas_sostenibles_p24_seleccione));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p24_cual));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($fiso->tipos_capacitaciones));
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
        [
            'id' => '5',
            'etiqueta' => 'xxx',
        ]
    ];

    $selectedOptions = [ '1' ];

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







//Networking en:
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p25));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->finanzas_sostenibles_p25_seleccione));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($fiso->tipos_networking));
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
        [
            'id' => '5',
            'etiqueta' => 'xxx',
        ],
        [
            'id' => '6',
            'etiqueta' => 'xxx',
        ],
    ];

    $selectedOptions = [ '1' ];

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


//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);



//Rango de montos (Selecciona cuidadosamente el monto requerido por el proyecto, toma en cuenta que la moneda es USD dólar estadounidense).
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p26));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($fiso->monto_financiamiento));
       $options = [
            [
                'id' => '1',
                'etiqueta' => '$50.000',//<$50.000
            ],
            [
                'id' => '2',
                'etiqueta' => '$50.000 a $100.000',//$50.000 a $100.000
            ],
            [
                'id' => '3',
                'etiqueta' => '$100.000 a $500.000',
            ],
            [
                'id' => '4',
                'etiqueta' => '$500.000 a $1000000',
            ],
            [
                'id' => '5',
                'etiqueta' => 'otros',
            ],
            [
                'id' => '6',
                'etiqueta' => 'xxxx',
            ],
        ];

        $selectedOptions = [$fiso->monto_financiamiento];

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

//¿Cuál es el destino de los fondos?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p27));


    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->finanzas_sostenibles_p27_text));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->destino_fondos));

//Describe cómo el proyecto asegura económicamente su permanencia en el tiempo.
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->finanzas_sostenibles_p28_info));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($etiquetas->finanzas_sostenibles_p28_text));

//no encuentro preguntas

    /*
    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($fiso->descripcion_sostenibilidad_financiera)); 

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($fiso->ident_riesgos_ambientales));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($fiso->ident_riesgos_sociales));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($fiso->creacion_producto_servicio));

    */

   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');


 ?>