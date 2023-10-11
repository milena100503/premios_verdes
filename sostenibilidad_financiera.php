<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/SostenibilidadFinanciera.php";
    require_once "modelos/Catalogos.php";


    $sofi= new SostenibilidadFinanciera();
    $sofi->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosSostenibilidadFinanciera();


//falta las tablas ¿En qué fase de ejecución se encuentra el modelo de negocio?// no encuento la completo,Rango de montos (Selecciona cuidadosamente el monto requerido por su proyecto; tome en cuenta que la moneda son $dólares estadounidenses) no pinta  en el pdf
    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_title($etiquetas->sostenibilidad_financiera_titulo));

// ¿Cuál es la estrategia financiera del proyecto?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p1));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p1_info));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($sofi->descripcion_sostenibilidad_financiera));


//¿El proyecto tiene fines de lucro?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p3));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($sofi->fines_lucro));

//Indica o señala, cómo es la composición de los ingresos del proyecto

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p4));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($sofi->crecimiento_economico));


    $datos = array(
    );


	    $table = '<div style="text-align: center;">';
	    $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';
	    $table .= '<tr>';
	    $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" >'.$etiquetas->sostenibilidad_financiera_p4_composicion.'</td>';
	    $table .= '<td style="color:  #000000; background-color: #BDB7B7;" > %</td>';
	    $table .= '</tr>';

	foreach ($catalogos->lista_composicion_ingresos as $fila) {
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

//Ingreso generado por el proyecto
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p5));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p5_info));

	
        $datos = array(
        [
            'a'=>  $etiquetas->sostenibilidad_financiera_p5_anio_f_an ,
            'Composición' => "000",
            '%' => '000', 
        ],
        [  

         'a'=>  $etiquetas->sostenibilidad_financiera_p5_anio_f_ac ,
            'Composición' => "0000",
            '%' => '000',
        ],
        [ 

         'a'=>  $etiquetas->sostenibilidad_financiera_p5_proyeccion_f,
            'Composición' => "000",
            '%' => '000', 
        ],
    );


        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" ></td>';
        $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" >'.$etiquetas->sostenibilidad_financiera_p5_monto_f.'</td>';
        $table .= '<td style="color:  #000000; background-color: #BDB7B7;" > '.$etiquetas->sostenibilidad_financiera_p5_tasa_f.'</td>';
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





	// $pdf->SetXY(0, $pdf->GetY()+5);
	// $pdf->writeHTML($utils->format_indication($sofi->fines_lucro));

   

//Subir un estado financiero actual o la declaración de impuestos del año anterior
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p7));
	
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p6_info));
	
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($sofi->archivo));



//montos //Rango de montos (Selecciona cuidadosamente el monto requerido por su proyecto, tome en cuenta que la moneda son $dólares estadounidenses).

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p8_montos));

	// $pdf->SetXY(0, $pdf->GetY()+10);
	// $pdf->writeHTML($utils->format_indication($sofi-> ));

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

        $selectedOptions = ['2', '3', '1'];

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


//¿Qué buscas conseguir con tu participación en Premios Verdes?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p8));

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

		$selectedOptions = [ $sofi->intereses_participar ];

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



//Asesoria en:
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p8_asesoria));

		$options = [
		    [
		        'id' => '1',
		        'etiqueta' => 'tecnicas',
		    ],
		    [
		        'id' => '2',
		        'etiqueta' => 'Gerenciales y de negocio',
		    ],
		    [
		        'id' => '3',
		        'etiqueta' => 'Estructuración de proyecto',
		    ],
		    [
		        'id' => '4',
		        'etiqueta' => 'Asesoría financiera',
		    ],
		    [
		        'id' => '5',
		        'etiqueta' => 'otros',
		    ]
		];

		$selectedOptions = [ $sofi->capacitaciones ];

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
	$pdf->SetAutoPageBreak(false, 0);

//networking
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p8_networking));
   

		$options = [
		    [
		        'id' => '1',
		        'etiqueta' => 'otros participantes',
		    ],
		    [
		        'id' => '2',
		        'etiqueta' => 'productos o servicios complementarios',
		    ],
		    [
		        'id' => '3',
		        'etiqueta' => 'potenciales inversionista',
		    ],
		    [
		        'id' => '4',
		        'etiqueta' => 'Potenciales líneas de crédito',
		    ],
		    [
		        'id' => '5',
		        'etiqueta' => 'Fondos no reembolsables',
		    ],
		    [
		        'id' => '6',
		        'etiqueta' => 'Incubadoras, aceleradoras, programas de mentoría',
		    ],
		];

		$selectedOptions = [ $sofi->netWorkings ];

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


//destinos de fondos
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p8_destino_fondos));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p8_mensaje_fondos));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($sofi->destino_de_fondo));
// ¿En qué fase de ejecución se encuentra el modelo de negocio?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p9));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($sofi->id_fase_ejecucion));

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
		];

		$selectedOptions = [  ];

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






//
//¿El proyecto ha tenido alguna experiencia en levantamiento de fondos?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p20));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($sofi->tiene_experiencia_leventamiento_fondos));


	//¿Ha recibido algún capital?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p10));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($sofi->ha_levantado_capital_riesgo));

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);
//Selecciona la fuente de capital
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p11));

		$options = [
		    [
		        'id' => '1',
		        'etiqueta' => 'Inversionista Angel',
		    ],
		    [
		        'id' => '2',
		        'etiqueta' => 'Fondo de Inversión',
		    ],
		    [
		        'id' => '3',
		        'etiqueta' => 'Crowdfunding',
		    ],
		];

		$selectedOptions = [  ];

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


//cual
        $datos = array(
            [
                'valor' => 'a',
                'duracion' => 'b',
    
            ],
        );

        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p11_desc.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p11_monto.'</td>';
        $table .= '</tr>';

        // Loop through the rows of data
        foreach ($datos as $fila) {
            $table .= '<tr>';
            foreach ($fila as $valor) {
                $table .= '<td>'.$valor.'</td>';
            }
            $table .= '</tr>';
        }

        $table .= '</table>';
        $table .= '</div>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);


	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p11_desc));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p11_monto));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p11_monto_text));




//obtenido prestamos
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p12));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($sofi->ha_obtenido_prestamos));


        $datos = array(
            [
                'valor' => 'a',
                'duracion' => 'b',
                'interes' => 'c',
            ],
        );

        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100%; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p12_valor.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p12_duracion.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p12_interes.'</td>';
        $table .= '</tr>';

        // Loop through the rows of data
        foreach ($datos as $fila) {
            $table .= '<tr>';
            foreach ($fila as $valor) {
                $table .= '<td>'.$valor.'</td>';
            }
            $table .= '</tr>';
        }

        $table .= '</table>';
        $table .= '</div>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);



//	$pdf->SetXY(0, $pdf->GetY()+5);
//	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p12_valor));

//	$pdf->SetXY(0, $pdf->GetY()+5);
//	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p12_valor_text));

//	$pdf->SetXY(0, $pdf->GetY()+5);
//	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p12_duracion));

//	$pdf->SetXY(0, $pdf->GetY()+5);
//	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p12_duracion_text));

//	$pdf->SetXY(0, $pdf->GetY()+5);
//	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p12_interes));

//	$pdf->SetXY(0, $pdf->GetY()+5);
//	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p12_interes_text)); 
	
//¿Ha recibido prestamos?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p14));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($sofi->ha_obtenido_prestamos));


	  		$datos = array(
            [
                'valor' => 'a',
                'duracion' => 'b',
                'Interés' => 'b',
    
            ],
        );

        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p15.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p16.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p17.'</td>';

        $table .= '</tr>';

        // Loop through the rows of data
        foreach ($datos as $fila) {
            $table .= '<tr>';
            foreach ($fila as $valor) {
                $table .= '<td>'.$valor.'</td>';
            }
            $table .= '</tr>';
        }

        $table .= '</table>';
        $table .= '</div>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);




	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p15));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p16));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p17));

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

//fondos //¿Ha recibido fondos no reembolsables?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p18));
	
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($sofi->ha_obtenido_fondos_no_reembolsables));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p19_fuente));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p19_monto));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_financiera_p19_monto_text));



	  		$datos = array(
            [
                'valor' => 'a',
                'duracion' => 'b',
                'Interés' => 'b',
    
            ],
        );

        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p19_fuente.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p19_monto.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_financiera_p19_monto_text.'</td>';

        $table .= '</tr>';

        // Loop through the rows of data
        foreach ($datos as $fila) {
            $table .= '<tr>';
            foreach ($fila as $valor) {
                $table .= '<td>'.$valor.'</td>';
            }
            $table .= '</tr>';
        }

        $table .= '</table>';
        $table .= '</div>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);


   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');
 ?>