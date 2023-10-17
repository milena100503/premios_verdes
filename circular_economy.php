<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/CircularEconomy.php";
    require_once "modelos/Catalogos.php";

    
    $cireco= new CircularEconomy();
    $cireco->inicializar();    
    $catalogo = new Catalogos();
    $catalogo->getCatalogosCircularEconomy();



    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
	
	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_title($etiquetas->circular_economy_titulo));

//¿En cuál de los ejes de la Economía Circular se enfoca el proyecto?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p1));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p1_seleccione));

		$selectedOptions = [ ];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_enfoques_economia as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);
//El proyecto se dedica a:
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p2));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p2_seleccione));

		$selectedOptions = [ ];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_actividades_proyeconomia as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);
//¿Cuál es el enfoque en la fabricación de productos o provisión de servicios?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p3));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p3_seleccione));

		$selectedOptions = [ ];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_enfoques_fabricacion as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);
//¿Cuál es el enfoque del proyecto la regeneración de recursos naturales?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p4));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p4_seleccione));

		$selectedOptions = [];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_enfoques_regeneracion as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';
		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);

//AÑADE UNA PAGINA
	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);
//Del total de un producto o parte fabricado ¿qué cantidad, al final de su vida útil podria ser utilizado como materia primas en otros procesos productivos?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p5));

	        $datos = array(
        [
            'a'=>  '233' ,
            'b' => "gramo", 
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

    $pdf->SetY( $pdf->GetY()+5);
    $pdf->writeHTML($table);
//Del total de un producto o parte fabricado, ¿qué cantidad, al final de su vida útil vuelve a la naturaleza?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p6));

	        $datos = array(
        [
            'a'=>  '233' ,
            'b' => "kilogramo", 
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
    $pdf->SetY( $pdf->GetY()+5);
    $pdf->writeHTML($table);


//El residuo que se genera al final de la vida útil del producto:
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p7));

		$selectedOptions = [ ];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_aprovechamiento_residuos as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';
		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);


//Del producto, ¿qué cantidad es reciclable?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p8));

	        $datos = array(
        [
            'a'=>  $cireco->cantidad_reciclable ,
            'b' => "kilogramo", 
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
    $pdf->SetY( $pdf->GetY()+5);
    $pdf->writeHTML($table);


	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($cireco->unidad_cantidad_reciclable));



//Explica cuáles son las estrategias que han implementado para reducir los residuos y lacontaminación desde el diseño y cuáles materiales se han reducido para la producción.
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p9));

	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($cireco->estrategias_reduccion_contaminacion));

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0); 

//¿El producto es reparable previo a su descarte?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p10));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($cireco->producto_es_reparable));

//¿El alquiler del producto es una opción como modelo de negocio?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p11));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($cireco->es_opcion_modelo_negocio));
//¿El proyecto participa en la gestión de residuos sólidos?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p12));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($cireco->participa_gestion_residuos));

//¿En qué capacidad?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p13));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p13_seleccione));

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_tipo_gestion_residuos as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);



//Generación
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p14));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p14_seleccione));

        $selectedOptions = ['2', '3', '1'];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_tipo_gestion_residuos1 as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);






	
	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

//Tratamiento
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p15));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p15_seleccione));



        $options = [
            [
                'id' => '1',
                'etiqueta' => 'Incineración',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Gasificación',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Encapsulación',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Pirólisis',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Otro',
            ],
        ];

        $selectedOptions = [ ];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_tipo_gestion_residuos3 as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);


//¿Cual es el proceso de reciclaje?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p16));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p16_seleccione));

	        $options = [
            [
                'id' => '1',
                'etiqueta' => 'Biológico',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Mecánico',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Químico',
            ],
        ];

        $selectedOptions = [ ];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_procesos_reciclajes as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);





//¿Cuál es el producto final en la gestión deL residuo?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p17));

        $selectedOptions = [$cireco->id_producto_final];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_producto_final as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

//¿El tratamiento o sistema de disposición final permite la generación de energía?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p18));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($cireco->permite_generacion_energia));

//¿Cuántos kw/hora?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p19));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($cireco->cantidad_generacion_energia));

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);


//¿Tu proyecto incluye investigación o experimentación en reciclaje de residuos sólidos?

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p20));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($cireco->incluye_experimentacion_reciclaje));



//¿Qué tipo de actores involucra tu proyecto?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p21));

        $selectedOptions = [ ];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_actores_proyecto as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

//¿Cuál es el origen de los residuos con los que trabaja?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p22));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p22_seleccione));

        $selectedOptions = [ ];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_origen_residuos as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

		$pdf->SetXY(0, $pdf->GetY()+5);
		$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p22_cantidad));
	    $options = [
            [
                'id' => '1',
                'etiqueta' => '2000',
            ],
        ];

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


       	$options = [
            [
                'id' => '1',
                'etiqueta' => 'galones',
            ],
            [
                'id' => '2',
                'etiqueta' => 'kilos',
            ],
            [
                'id' => '3',
                'etiqueta' => 'libras',
            ],

        ];

        $selectedOptions = ['2', '3'];

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



//¿De qué están compuestos los residuos con los que trabaja?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p23));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->circular_economy_p23_seleccione));

        $selectedOptions = [ ];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_compuesto_residuos as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

	
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p23_cantidad));
	    $options = [
            [
                'id' => '1',
                'etiqueta' => '2000',
            ],
        ];

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


       	$options = [
            [
                'id' => '1',
                'etiqueta' => 'galones',
            ],
            [
                'id' => '2',
                'etiqueta' => 'kilos',
            ],
            [
                'id' => '3',
                'etiqueta' => 'libras',
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




//¿El proyecto se enfoca en la producción de productos reusables?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p24));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($cireco->tiene_enfoque_producto_reusable));

//¿Hasta cuántas veces se puede reusar el producto?

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p25));
	
	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($cireco->numero_veces_reusar_producto));

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);


//¿Se ha determinado el impacto ambiental generado por el producto en comparación con uno descartable?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p26));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($cireco->ha_determinado_impacto_ambiental));
//Impacto medidofalta
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p27));
//¿Cuál es el impacto?falta
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p28));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($cireco->detalle_impacto));
//¿El producto al final de su vida útil es reciclable?

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p29));

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_boolean($cireco->producto_es_reciclable));

//¿El proyecto incluye campañas de educación o capacitación sobre la economía circular?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->circular_economy_p30));

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_boolean($cireco->incluye_capacitacion_economia_circular));


   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');

 ?>