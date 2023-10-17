<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/SustainableAcademic.php";
    require_once "modelos/Catalogos.php";


    $demic= new SustainableAcademic();
    $demic->inicializar();
    $catalogo = new Catalogos();
    $catalogo->getCatalogosSustainableAcademicResearch();


    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);


  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_title($etiquetas->sustainable_academic_titulo));

//¿Cuál es el enfoque de la investigación?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p1));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p1_seleccione));

    $selectedOptions = [$demic->enfoques_investigacion];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoques_investigacion as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);

//¿Cuál es la facultad de la universidad que apoya la investigación?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p2));
  $pdf->SetY($pdf->GetY()+10);
  $pdf->writeHTML($utils->format_answer($demic->facultad_apoyo_investigacion));

//La investigación se realiza de forma:
  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p3));


    $selectedOptions = [$demic->id_forma_investigacion];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_formas_investigacion as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);




//¿En cuál etapa se encuentra la investigación?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p4));

    $selectedOptions = [$demic->id_etapa_investigacion];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_etapas_investigacion as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);

  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

//¿Se cuenta con el apoyo de organizaciones externas?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p5));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($demic->tiene_apoyo_org_externa));
//¿Qué tipo de apoyo?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p6));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p6_seleccione));

    $selectedOptions = [];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_apoyos_investigacion as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);

//¿Que tipo de organizaciones prestan apoyo?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p7));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p7_seleccione));

    $selectedOptions = [];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_ongs_investigacion as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);

  
//¿El proyecto ha creado prototipos?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p8));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($demic->ha_creado_protipos));
//Explicar
  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p9));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->detalle_prototipos));

  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

  //¿El proyecto ha implementado un plan piloto para probar el concepto?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p10));

  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_boolean($demic->ha_implementado_plan_piloto));
//Explicar
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p11));

  $pdf->SetY($pdf->GetY()+10);
  $pdf->writeHTML($utils->format_answer($demic->detalle_plan_piloto));

  //¿Se ha creado una compañía o spin-off a raíz de esta investigación?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p12));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($demic->ha_creado_compania_spin));

  //Explicar el tipo de spin-off y quienes figuran como participantes
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p13));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->detalle_compania_spin));

  //¿Los investigadores declararon algún conflicto de interés?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p14));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($demic->tiene_conflictos_interes));

  //¿Cuáles?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p15));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->cuales_conflictos_interes));

  //¿La investigación fue aprobada por un comité de ética?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p16));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_boolean($demic->tiene_aprobacion_comite_etica));

  
  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);


  //¿Cuál es el estado de publicación de la investigación?
  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p17));

  $pdf->SetY( $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_answer($demic->id_estado_publicacion));

    $selectedOptions = [];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_estados_publicacion_investigacion as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);


  //Duración de la investigación - en meses
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p18));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->meses_investigacion));


    $datos = array(
        [
            'indicadores' => $demic->meses_investigacion,
            'impacto' => $demic->fecha_fin,
            
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
    $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p19.'</td>';
    $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p20.'</td>';
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




  //Fecha de inicio 
 // $pdf->SetXY(0, $pdf->GetY()+10);
  //$pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p19));

  //$pdf->SetXY(0, $pdf->GetY()+5);
//  $pdf->writeHTML($utils->format_indication($demic->fecha_inicio));

  //Fecha de culminación
  //$pdf->SetXY(0, $pdf->GetY()+10);
  //$pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p20));

  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_indication($demic->fecha_fin));

  //¿Resumen del paper? Dejar en blanco si no tiene resumen
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p21));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($demic->resumen_paper));

//¿El paper fue revisado y aprobado por homólogos?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p22));
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($demic->paper_aprobado_homologo));

    
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);




  //¿En cuál revista fue publicado el paper?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p23));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->revista_publicacion_paper));

  //Describe como esta investigación busca soluciones a la adaptación y mitigación del cambio climático
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p24));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->descripcion_solucion_cambio_climatico));

  //Describe como esta investigación busca el cumplimiento de la Agenda 2030
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p25));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->descripcion_cumplimiento_agenda_2030));

  //¿Cómo aportan a la sostenibilidad los resultados y recomendaciones de la investigación ?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p26));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->descripcion_sostenibilidad_financiera));

//¿Ha obtenido prestamos?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p27));


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
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p27_valor.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p27_duracion.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p27_interes.'</td>';
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



  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p27_valor));

  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p27_valor_text));

  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p27_duracion));

  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p27_interes));

  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p27_interes_text));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($demic->prestamos));

  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);

  //¿El proyecto ha obtenido fondos de trabajo?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p28));


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
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p28_desc.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p28_monto.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p28_monto_text.'</td>';
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

  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p28_desc));

  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p28_monto));

  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p28_monto_text));





//¿Ha obtenido fondos no reembolsables?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p29));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($demic->fondos_no_reembolsables));

       $datos = array(
            [
                'fuente' => 'a',
                'monto' => 'b',
                'monto' => 'c',
            ],
        );

        $table = '<div style="text-align: center;">';
        $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 100%; margin-left: auto; margin-right: auto;">';
        $table .= '<tr>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p29_fuente.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p29_monto.'</td>';
        $table .= '<td style="color: #000000; background-color: #BDB7B7;">'.$etiquetas->sustainable_academic_p29_monto_text.'</td>';
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




 // $pdf->SetXY(0, $pdf->GetY()+5);
//  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p29_fuente));

//  $pdf->SetXY(0, $pdf->GetY()+5);
//  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p29_monto));

//  $pdf->SetXY(0, $pdf->GetY()+5);
//  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p29_monto_text));

  //¿Qué buscas conseguir de tu participacién en Premios Verdes?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p30));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p30_seleccione));

//¿Qué buscas conseguir con tu participación en Premios Verdes?
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sostenibilidad_financiera_p8));

    $selectedOptions = [$demic->intereses_participacion];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_tipo_interes_participar as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);




  //$pdf->SetXY(0, $pdf->GetY()+5);
  //$pdf->writeHTML($utils->format_question($demic->intereses_participacion));

  //Asesoría en:
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p31));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p31_seleccione));

    $selectedOptions = [ $sofi->capacitaciones ];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_tipo_capacitacion as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);


 // $pdf->SetXY(0, $pdf->GetY()+5);
//  $pdf->writeHTML($utils->format_question($demic->tipos_capacitaciones));


  $pdf->AddPage();
  $pdf->SetAutoPageBreak(false, 0);


  //networking
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p32));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_academic_p32_seleccione));

    $selectedOptions = [ $sofi->netWorkings ];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_tipo_networking as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_indication($demic->tipos_networking));

  //Rango de montos (Selecciona cuidadosamente el monto requerido por el proyecto toma en cuenta que la moneda es USD Dólar estadounidense).
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p33));

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

        $selectedOptions = [$demic->monto_financiamiento];

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




  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_question($demic->monto_financiamiento));
  //¿Cuál es el destino de los fondos?

  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p34));

  $pdf->SetY($pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->destino_fondos));

  //Describe el modelo de negocio y su proyección financiera para ser un proyecto sostenible
  $pdf->SetXY(0, $pdf->GetY()+10);
  $pdf->writeHTML($utils->format_question($etiquetas->sustainable_academic_p35));

  $pdf->SetXY(0, $pdf->GetY()+5);
  $pdf->writeHTML($utils->format_answer($demic->descripcion_sostenibilidad_financiera));


   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');


 ?>