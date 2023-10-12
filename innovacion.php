<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/Inovacion.php";
    require_once "modelos/Catalogos.php";

    $inova= new Inovacion();
    $inova->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosInnovacionTecnologia();

    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_title($etiquetas->innovacion_titulo));
//La innovación es parte del ADN de quienes trabajamos en proyectos de impacto, hay estos 3 tipos de innovación, elige si alguno aplica y explica la propuesta innovadora

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_indication($etiquetas->innovacion_intro));
//Selecciona tu principal tipo de innovación
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p1));


		$selectedOptions = [];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_tipo_innovacion as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY( $pdf->GetY()+5);
		$pdf->writeHTML($table);



//Explica la propuesta innovadora del proyecto

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p2));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($inova->propuesta_innovadora));
//¿Tu proyecto cuenta con patentes?

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p3));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($inova->patente));

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p3_cuales));


		
		$selectedOptions = [];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_tipo_patente as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY( $pdf->GetY()+5);
		$pdf->writeHTML($table);

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);



//¿Tiene el proyecto un registro de marca?

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p4));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($inova->tiene_registro_marca));
//cual
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p4_rp));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($inova->cual_registro_marca ));

//¿Tiene el proyecto registro sanitario?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p5));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($inova->tiene_registro_sanitario));
//cual
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->innovacion_p6));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($inova->cuales_registro_sanitario));

//¿Cuenta el proyecto con algún otro registro o certificación?
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p7));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($inova->tiene_otro_registro));
//cual
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p8));
	
	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($inova->cuales_otro_registro));

//¿Tu proyecto destina fondos para la innovación o investgación?
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p9));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($inova->fondo_innovacion));

//Porcentaje de presupuesto anual destinado a la innovación o investgación
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p10));



$options = [
    ['id' => '1', 'etiqueta' => '1-30%'],
    ['id' => '2', 'etiqueta' => '6-10%'],
    ['id' => '3', 'etiqueta' => '16-20%'],
    ['id' => '4', 'etiqueta' => '4-5%'],
    ['id' => '5', 'etiqueta' => '11-15%'],
    ['id' => '6', 'etiqueta' => 'mas de 20%'],
];

$selectedOptions = [$inova->porcentaje_venta_anual];

$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 100%; margin-left: auto; margin-right: auto;">';
$style = 'color: #FFFFFF; background-color: #000000;';
$columnCount = 2;

foreach (array_chunk($options, $columnCount) as $rowOptions) {
    $table .= '<tr>';
    foreach ($rowOptions as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<td' . $selected . '>' . $option['etiqueta'] . '</td>';
    }
    $table .= '</tr>';
}

$table .= '</table>';

$pdf->SetY($pdf->GetY() + 5);
$pdf->writeHTML($table);






	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

//¿Tu proyecto desarrolla tecnología que aporta a la sostenibilidad? (Tecnología digital)
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p11));

	$pdf->SetY($pdf->GetY() + 5);
	$pdf->writeHTML($utils->format_boolean($inova->desarrolla_tecnologia_aporta_sostenibilidad));	
//	¿Qué tipo de tecnología?
	$pdf->SetY($pdf->GetY() + 5);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p12));
	

		$selectedOptions = [];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_tipo_tecnologia as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY( $pdf->GetY()+5);
		$pdf->writeHTML($table);



	$pdf->SetY($pdf->GetY() + 5);
	$pdf->writeHTML($utils->format_indication($etiquetas->innovacion_p13));

	$pdf->SetY($pdf->GetY() + 5);
	$pdf->writeHTML($utils->format_answer($inova->cual_tecnologia));

//Explica como funciona la tecnología desarrollada
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p14));

	$pdf->SetY($pdf->GetY() + 5);
	$pdf->writeHTML($utils->format_boolean($inova->utiliza_blockchain));

//planea_utilizar_blockchain
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p15));

	$pdf->SetY($pdf->GetY() + 5);
	$pdf->writeHTML($utils->format_boolean($inova->planea_utilizar_blockchain));

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);
//tipo de blockchain
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p16));


		$selectedOptions = [];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_tipo_blockchain as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY( $pdf->GetY()+5);
		$pdf->writeHTML($table);

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p17));

	$pdf->SetY($pdf->GetY()+10);
	$pdf->writeHTML($utils->format_answer($etiquetas->innovacion_p17_text));
//Ha hecho el cuestionario para identificar si su producto o servicio es elegible para usar la tecnología blockchain. (Blockchain decision tree)
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->innovacion_p18));


	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_boolean($inova->ha_realizado_cuestionario_blockchain));


   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');
 ?>