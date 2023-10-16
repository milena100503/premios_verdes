<?php 

	require_once('tcpdf/TCPDF-main/tcpdf.php');   
	require_once "etiquetas.php";
    require_once "Utils.php";
    require_once "modelos/SustainableHuman.php";
    require_once "modelos/Catalogos.php";


    $human= new SustainableHuman();
    $human->inicializar();    
    $catalogo = new Catalogos();
    $catalogo->getCatalogosSustainableHumanDevelopment();


    $utils = new Utils();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
    //$pdf->setPageOrientation('');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_title($etiquetas->sustainable_human_titulo));

//¿Cuáles son los ejes del proyecto?
    $pdf->SetXY(0, $pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p1));
    $pdf->SetXY(0, $pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p1_seleccione));

    $selectedOptions = [];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoques_desarrollo_humano as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);
//EDUCACION
//¿En cuál nivel de educación se basa el proyecto?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p2));


    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p2_seleccione));


    $selectedOptions = [$human->niveles_educacion];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_nivel_educativo as $option) {
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
//¿Cuáles son los enfoques de educación?

    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p3));

    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p3_seleccione));


    $selectedOptions = [$human->enfoques_educativos];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoque_educativo as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);
//¿El proyecto se enfoca en temas específicos?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p4));

    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($human->tiene_enfoque_temas_especificos));
    //cuales temas?
    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p5));

    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p5_seleccione));

    $selectedOptions = [];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_tema_educativo as $option) {
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
//¿Cuentan con aval de universidades u otras instituciones?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p6));

    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($human->tiene_aval_instituciones));

    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p7));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($human->detalle_aval_institucion));
//AÑADE UNA PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//IGUALDAD
//¿A cuál grupo minoritario apunta el proyecto?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p8));

    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p8_seleccione));

    $selectedOptions = [$human->grupos_minoritarios];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_grupos_minoritarios as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);   
//¿Cuáles son los enfoques de igualdad?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p9));
    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p9_seleccione));

    $selectedOptions = [$human->enfoques_igualdad];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoques_igualdad as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//¿Los programas fomentan la erradicación de cualquier tipo de violencia de género?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p10));

    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_boolean($human->erradica_violencia_genero));
    //explicar
    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p11));

    $pdf->SetY($pdf->GetY()+5);
    $pdf->writeHTML($utils->format_answer($human->como_erradica_violencia_genero));
//AÑADE UNA PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);

 //Empoderamiento de la mujer   
//EMPODERAMIENTO MUJER
//¿Cuáles son los enfoques de empoderamiento de la mujer?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p12));
    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p12_seleccione));

    $selectedOptions = [$human->enfoques_mujer];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoques_mujer as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//SALUD    
//¿Cuáles son los enfoques de salud?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p13));
    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p13_seleccione));
    
    $selectedOptions = [$human->enfoques_salud];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoque_salud as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//Fin de la pobreza
//¿Cuáles son los enfoques fin de la pobreza?
    $pdf->SetXY(0,$pdf->GetY()+10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p14));
    $pdf->SetXY(0,$pdf->GetY()+5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p14_seleccione));

    $selectedOptions = [$human->enfoques_pobreza];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoque_pobreza as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//HAMBRE CERO
//¿Cuáles son los enfoques de Hambre cero?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p14_1));
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p14_1_seleccione));

    $selectedOptions = [$human->enfoques_hambre];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoque_hambre as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table);    
//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//ACCESO A LA VIVIENDA
//¿Cuáles son los enfoques de acceso a vivienda?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p15));
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p15_seleccione));

    $selectedOptions = [$human->enfoques_vivienda];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoque_vivienda as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//¿Cuáles son los enfoques de Acceso a agua potable y saneamiento?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p19));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p19_seleccione));

    $selectedOptions = [$human->enfoques_agua];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoque_agua as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//TRABAJO DECENTE  
//¿Cuáles son los enfoques de Trabajo decente?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p16));
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p16_seleccione));

    $selectedOptions = [$human->enfoques_trabajo_decente];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoque_trabajo_decente as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//¿Cuáles son los enfoques de Trabajo verde?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p17));
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p17_seleccione));

    $selectedOptions = [$human->enfoques_trabajo_verde];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoque_trabajo_verde as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }

    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//JUSTICIA Y PAZ  
//¿Cuáles son los enfoques de justicia y paz?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p18));

    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p18_seleccione));

    $selectedOptions = [$human->enfoques_justicia];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_enfoque_justicia as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }
    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//SABERES Y CONOCIMIENTOS ANCESTRALES
//¿Que tipo de prácticas ancestrales fomenta el proyecto?
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p20));
    $pdf->SetXY(0, $pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_indication($etiquetas->sustainable_human_p20_seleccione));

    $selectedOptions = [$human->practicas_ancestrales];

    $table = '<table cellspacing="0" cellpadding="1" border="1" align="center" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $style = 'color: #FFFFFF; background-color: #000000;';

    foreach ($catalogo->lista_practica_ancestral as $option) {
        $id = $option['id'];
        $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
        $table .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
    }
    $table .= '</table>';

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($table); 
//AÑADE PAGINA
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false, 0);
//Explica la raíz de los conocimientos ancestrales y como han sido transmitidos de generación en generación
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p21));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($human->conocimientos_ancestrales));
//Explica cómo el proyecto satisface las necesidades humanas sin comprometer los recursos naturales
    $pdf->SetXY(0, $pdf->GetY() + 10);
    $pdf->writeHTML($utils->format_question($etiquetas->sustainable_human_p22));

    $pdf->SetY($pdf->GetY() + 5);
    $pdf->writeHTML($utils->format_answer($human->como_satisface_necesidades_humanas));





   ob_end_clean();
	$pdf->Output('proyecto.pdf', 'I');


 ?>