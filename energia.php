<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/RenewableEnergy.php";
    require_once "modelos/Catalogos.php";


    $rene= new RenewableEnergy();
    $rene->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosRenewableEnergy();


    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_title($etiquetas->energia_rv_titulo));

//¿En qué se enfoca el proyecto?

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p1));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->energia_rv_p1_seleccione));

	        

        $selectedOptions = [];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_enfoques_energia as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);






//¿Qué tipo de energía?

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p2));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->energia_rv_p2_seleccione));	        

        $selectedOptions = [];

		// Crear la tabla con doble columna.
		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		// Iterar sobre las filas de la tabla.
		foreach ($catalogo->lista_fuente_energia as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

		$table .= '</table>';

		// El resto del código sigue igual.
		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);


	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p2_text));

	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($rene->ahorro_alcanzado));


$pdf->AddPage();    

//Consumo de energía tradicional antes del proyecto
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p3));

	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($rene->consumo_energia_tradi_antes));

	
//Consumo de energía tradicional antes del proyecto
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p4));

	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($rene->consumo_energia_tradi_despues));

//¿Cuánto es el ahorro alcanzado, comparando con el escenario anterior?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p6));

	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($rene->ahorro_alcanzado));
//¿Cuánta energía genera el proyecto durante un año?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p7));

	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($rene->energia_generada_anual));

//¿El proyecto fomenta el uso de energía sostenible?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p8));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($rene->fomenta_uso_energia_sostenible));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p9));

	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($rene->como_fomenta_uso_energia_sostenible));

//¿El proyecto fomenta el acceso a energía en sitios remotos?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p10));

	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($rene->fomenta_acceso_sitio_remotos));


$pdf->AddPage();    
//¿Cuántas emisiones de gases de efecto invernadero generó el proyecto el año pasado y cuánto está generando actualmente? (ton CO2/año)

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p11));

//	$pdf->SetXY(0, $pdf->GetY()+5);
//	$pdf->writeHTML($utils->format_indication($etiquetas->energia_rv_p11_texto1));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($rene->emision_gases_invernadero));

//	$pdf->SetXY(0, $pdf->GetY()+5);
//	$pdf->writeHTML($utils->format_indication($etiquetas->energia_rv_p11_texto2));


        $datos = array(
        [
            'a'=>  'c' ,
            'b'=>  'c' ,
        ],
    );


        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" >'.$etiquetas->energia_rv_p11_texto1.'</td>';
        $table .= '<td style="color:  #000000; background-color: #BDB7B7;" > '.$etiquetas->energia_rv_p11_texto2.'</td>';
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


//¿Cuáles industrias se benefician del proyecto?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p12));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p12_seleccione));


        $selectedOptions = ['1', '4'];

		
		// Crear la tabla con doble columna.
		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_tipo_industria_energia as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

		// El resto del código sigue igual.
		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);





	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p12_text));
//¿Los insumos o minerales adquiridos para la producción del material necesario para el proyecto provienen de fuentes legales y reguladas?
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p13));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($rene->insumos_provienen_fuentes_legales));

//¿Los insumos o minerales adquiridos para la producción del material necesario para el proyecto provienen de fuentes legales y reguladas?

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p14));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($rene->contempla_reutilizacion_materiales));
	
//¿El proyecto contempla la reutilización o el reciclaje de los materiales una vez terminada su vida útil? 
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->energia_rv_p15));

	$pdf->SetY($pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($rene->como_contempla_reutilizacion_materiales));

   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');

 ?>