<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/SustainableMobility.php";
    require_once "modelos/Catalogos.php";


    $mobi= new SustainableMobility();
    $mobi->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosSustainableMobility();


    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
   
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);


//titulo
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_title($etiquetas->sustainable_mobility_titulo) );

//Transporte de pasajero:
//En que se enfoca el proyecto:
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p1));
    //Selecciona las que apliquen
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p1_seleccione));
    //tabla enfoca el proyecto

    $selectedOptions = [];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoques_transporte as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);
//Seleccione el tipo de transporte
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p2));
    //Selecciona las que apliquen
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p2_seleccione));

     //tabla tipo de transporte
    $selectedOptions = [];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_tipo_transporte as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);
//El proyecto promueve
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p3));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p3_seleccione));

    //tabla pryecto promueve
    $selectedOptions = [];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_objetivos_transporte as $option) {
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
//¿Qué tipo de vehículos ofrece el transporte?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p4));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p1_seleccione));

    //tabla de vehiculos
    $selectedOptions = [$mobi->tipos_transporte];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_tipo_vehiculo as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);

    //tabla cantidad,cual,cuantos.
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
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_mobility_p4_cantidad.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_mobility_p4_cual.'</td>';

        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_mobility_p4_cuantos.'</td>';
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
//¿Cuál es el de crecimiento anticipado en la flota durante los próximos 3 años?(%)
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p5));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($mobi->procentaje_crecimiento_flota));
//¿Algunos de los vehículos utilizan energías renovables?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p6));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($mobi->transporte_vehiculos_energias_renovables));
//Cuáles vehículos y que tipo de energía
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p7));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($mobi->detalle_transporte_vehiculos_energias_renovables));
//añadir pagina
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//Zona de operativa del transporte
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p8));
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p8_seleccione));

    $selectedOptions = [$mobi->zonas_operativas_transporte];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_zona_operativa_transporte as $option) {
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


//logistica:
//El proyecto se enfoca en que tipo de logística:
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p9));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p9_seleccione));

    $selectedOptions = [$mobi->enfoques_logistica];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoques_logistica as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);
//¿El proyecto tiene su propia flota?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p10));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($mobi->tiene_propia_flota));
//¿Qué tipo de vehículos tiene la flota?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p11));

    $selectedOptions = [$mobi->flota_tipos_vehiculo];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_tipo_vehiculo as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);
    //Selecciona las que apliquen
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p11_seleccione));



        $datos = array(
            [
                'valor' => 'aa',
                'duracion' => 'b',
                'interes' => 'c',
            ],
        );

        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100%; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_mobility_p11_cantidad.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_mobility_p11_cual.'</td>';

        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_mobility_p11_cuantos.'</td>';
        $table .= '</tr>';

        // Bucle a través de las filas de datos
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

//añadir pagina
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//¿Algunos de los vehículos utilizan energías renovables?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p12));
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($mobi->vehiculos_flota_utilizan_energias_renovables));
//¿Cuáles vehículos y qué tipo de energías?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p13));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($mobi->detalle_vehiculos_flota_energias_renovables));
//¿El proyecto ofrece logística de retorno?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p14));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($mobi->ofrece_logistica_retorno));
    //Explicar
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p15));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($mobi->detalle_logistica_retorno));
//¿Qué ha hecho el proyecto para reducir su huella de carbono?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p16));
    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($mobi->acciones_reduccion_huella_carbono));
//añadir pagina
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);


//Plataformas digitales:
//¿Qué tipo de plataforma digital?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p17));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p17_seleccione));

    $selectedOptions = [$mobi->plataforma_digital];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_plataformas_digitales as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);


    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p17_cual));
//¿La plataforma digital permite acceso de información o servicio de transporte que potencie la movilidad sostenible de la zona operativa?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p18));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($mobi->plataforma_digital_permite_acceso_informacion ));
    //explique
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p19));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($mobi->como_plataforma_digital_permite_acceso_informacion));

//añadir pagina
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//infraestrucuta:
//¿Qué tipo de infraestructura desarrolla?
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p20));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_mobility_p20_seleccione));

    //TABLA infraestructura desarrolla
    $selectedOptions = [$mobi->tipos_infraestructura];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_tipos_infraestructura as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);
//¿Cómo aporta el proyecto a la infraestructura para mejorar el sistema de movilidad sostenible en la localidad?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p21));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($mobi->como_aporta_infraestrutura));
//¿El proyecto busca minimizar las emisiones de carbono?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p22));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_boolean($mobi->busca_minimizar_emisiones_carbono));
//¿En qué porcentaje se han reducido las emisiones de carbono a partir de la implementación del proyecto?

    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_mobility_p23));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($mobi->porcentaje_reduccion_emisiones_carbono));


   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');


 ?>