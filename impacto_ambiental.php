<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/SostenibilidadAmbiental.php";
    require_once "modelos/Catalogos.php";
	



    $samb= new SostenibilidadAmbiental();
    $samb->inicializar();
    $catalogo->getCatalagosImpactoSocial();


    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', true);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

//Impacto Ambiental
    $pdf->SetMargins(10, 20, 10, true);
	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

	$pdf->SetXY(0,$pdf->GetY()+10);

    $pdf->writeHTML($utils->format_title($etiquetas->sostenibilidad_ambiental_titulo));

	//Describe el impacto ambiental positivo en el área de influencia del proyecto
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_ambiental_p1));	

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($samb->impacto_ambiental));

	//¿El proyecto ha tomado en cuenta los riesgos y amenazas?		

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_ambiental_p2));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($samb->cuantifico_riesgos_impactos));

	//Riesgos

	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_ambiental_p3));

	// $pdf->SetY( $pdf->GetY()+5);
	// $pdf->writeHTML($utils->format_answer($samb->cuantifico_riesgos_impactos));

    $datos = array(
        [
            'riesgo' => "uso de la marca",
            'acciones_para_remediar_riesgo' => 'El mal uso de la marca, por lo cual se ha registrado también el uso de Propiedad intelectual.', 
        ],
        [
            'riesgo' => "competencia",
            'acciones_para_remediar_riesgo' => 'Existen otros espacios que recopilan y publican contenidos, por eso nos hemos distinguido con NFT',
         ],
         [
            'riesgo' => "algo mas",
            'acciones_para_remediar_riesgo' => 'algo mas mas mas mas mas algo mas',
        ],
    );


	    $table = '<div style="text-align: center;">';
	    $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100 %; margin-left: auto; margin-right: auto;">';
	    $table .= '<tr>';
	    $table .= '<td  style="color:  #000000; background-color: #BDB7B7;" >'.$etiquetas->sostenibilidad_ambiental_p3_riesgo_label.'</td>';
	    $table .= '<td style="color:  #000000; background-color: #BDB7B7;" > '.$etiquetas->sostenibilidad_ambiental_p3_accion_label.'</td>';
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



	//¿El proyecto ha obtenido alguna certificación ambiental?

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_ambiental_p6));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($samb->obtenido_certificacion_ambiental));

	//¿Cuáles?

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_ambiental_p7));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($samb->descripcion_certificacion_ambiental));


	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);

	//¿El proyecto fue creado a partir de una mandato de ley o norma?

	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_ambiental_p8));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_boolean($samb->obedece_regularizacion_normativa_local));

	//cuales
	$pdf->SetXY(0, $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_ambiental_p9));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($samb->descripcion_certificacion_ambiental));


//¿Qué acciones ha realizado el proyecto para la mitigación y adaptación al cambio climático?
	$pdf->SetXY(0, $pdf->GetY()+10);
	$pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_ambiental_10));

	$pdf->SetY( $pdf->GetY()+5);
	$pdf->writeHTML($utils->format_answer($samb->acciones_adaptacion_cambio_climatico));


   ob_end_clean();
	$pdf->Output('Impacto_Ambiental.pdf', 'I');


 ?>