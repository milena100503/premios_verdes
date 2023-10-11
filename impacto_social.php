<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/SostenibilidadSocial.php";
    require_once "modelos/Catalogos.php";

    $soc= new SostenibilidadSocial();
    $soc->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalagosImpactoSocial();


    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_title($etiquetas->sostenibilidad_social_titulo));

//¿Cuál es el impacto social que genera el proyecto y cómo lo mides?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_social_p1));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_indication($etiquetas->sostenibilidad_social_p1_info));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($soc->desc_mejora_calidad_beneficiario));

//¿Cuál es el grupo objetivo principal del proyecto?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_social_p3));

	//$pdf->SetXY(0, $pdf->GetY()+5);
	//$pdf->writeHTML($utils->format_answer($soc->id_grupo_objetivos));


	
		$selectedOptions = [$soc->id_grupo_objetivos];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_grupos_etnicos as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);






//Cantidad de individuos impactados por el proyecto
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_social_p4));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($soc->cant_individuos));

// ¿Impacta a grupos vulnerables?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_social_p6));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($soc->impacta_grupo_vulnerable));
// 


		$selectedOptions = [];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_grupos_objetivos as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);


		$pdf->AddPage();
		$pdf->SetAutoPageBreak(false, 0);


//¿Impacta a grupos étnicos específicos?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_social_p7));
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($soc->impacta_grupo_etnico));



		$selectedOptions = [];

		$table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
		$style = 'color: #FFFFFF; background-color: #000000;';

		foreach ($catalogo->lista_grupos_vulnerables as $option) {
		    $id = $option['id'];
		    $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
		    $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
		}

		$table .= '</table>';

		$pdf->SetY($pdf->GetY() + 5);
		$pdf->writeHTML($table);




//Porcentaje según género:
		$pdf->SetXY(0, $pdf->GetY()+10);
		$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_social_p8));

		$datos = array(
		    [
		        'hombres' => $soc->porcentaje_hombres_impactados,
		        'mujeres' => $soc->porcentaje_mujeres_impactadas,
		        'LGBTI' => $soc->porcentaje_LGBTI_impactadas,
		    ],
		);

		$table = '<div style="text-align: center;">';
		$table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100%; margin-left: auto; margin-right: auto;">';
		$table .= '<tr>';
		$table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_social_p8_t1.'</td>';
		$table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_social_p8_t2.'</td>';
		$table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_social_p8_t3.'</td>';
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







//Menciona 3 indicadores cuantificables del impacto social generado por el proyecto:
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_social_p9));

	$datos = array(
	    [
	        'indicadores' => $soc->indicadores,
	        'impacto' => $soc->impacto,
	        'persona_impactadas' => $soc->persona_impactadas,
	    ],
	    // [
	    //     'indicadores' => $soc->indicadores,
	    //     'impacto' => $soc->impacto,
	    //     'persona_impactadas' => $soc->persona_impactadas,
	    // ],
	);

	$table = '<div style="text-align: center;">';
	$table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100%; margin-left: auto; margin-right: auto;">';
	$table .= '<tr>';
	$table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_social_p9_indicador.'</td>';
	$table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_social_p9_impacto.'</td>';
	$table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sostenibilidad_social_p9_numero.'</td>';
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





//¿El proyecto promueve la formación de líderes comunitarios?
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_social_p44));

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($soc->forma_lideres_comunitarios));

//¿Cuántos líderes son formados?

	$pdf->SetXY(0,$pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_social_p45));

	$pdf->SetXY(0,$pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($soc->indicador_lideres));



   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');

 ?>