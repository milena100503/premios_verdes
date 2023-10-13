<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/TechStartup.php";
    require_once "modelos/Catalogos.php";

    $tech= new TechStartup();
    $tech->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosTechStartup();


    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(false, 0);


	$pdf->AddPage();
	$pdf->SetAutoPageBreak(false, 0);
//titulo
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_title($etiquetas->tech_startup_titulo));

//La startup se enfoca en:
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p1));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->tech_startup_p1_seleccione));

        $selectedOptions = [$tech->enfoques_startup];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_enfoques_startup as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);
//Producto o servicio provisto:
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p2));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->tech_startup_p2_seleccione));


        $selectedOptions = [$tech->productos_servicios];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_productos_servicios as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);

//añadir pagina
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//Fecha de inicio de la startup
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p3));
//Las startups consideradas para esta categoría no pueden tener más de 5 años desde su origen
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->tech_startup_p3_info));
    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($tech->fecha_inicio));
//Cantidad de empleados
    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p4));
    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($tech->cantidad_empleados));
//¿Cómo está distribuido el equipo ejecutivo?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p5));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($tech->distribucion_equipo_ejecutivo));
//¿Cuál es la estrategia de escalabilidad del producto o servicio?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p6));

   $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($tech->estrategia_escalabilidad));
//Ruta de crecimiento


        $selectedOptions = [$tech->id_tipo_crecimiento];

        $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_tipos_crecimiento as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $table .= '</table>';

        $pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($table);
//¿Cuál es la Ventaja Competitiva del proyecto ante la competencia?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p8));
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p8_text));
    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($tech->ventaja_competitiva));
//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

//¿El proyecto ha participado en rondas de inversión?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p9));
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($tech->ha_participado_rondas_inversion));
//¿Cuál fue el resultado?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p10));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($tech->resultado_rondas_inversion));
//¿El proyecto mide su impacto de la huella de Co2?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p11));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($tech->mide_impacto_huella_co2));
//¿Qué medidas toma para compensar las emisiones?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p12));
    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($tech->medidas_para_compensar_emisiones));
//¿El proyecto hace reportes de ASG?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p13));
    
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($tech->hace_reportes_asg));

//¿Tiene la startup algún subsidio del gobierno?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p14));

    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($tech->tiene_subsidio_gobierno));

//¿Qué tipo de subsidio y de cuál entidad?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->tech_startup_p15));

    $pdf->SetY( $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($tech->motivo_subsidio_gobierno));





   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');


 ?>