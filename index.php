<?php 
require_once "tcpdf/TCPDF-main/tcpdf.php";
require_once "Utils.php";
require_once "etiquetas.php";
require_once "modelos/Catalogos.php";


$utils = new Utils();
$catalogo = new Catalogos();
$catalogo->getCatalogosInscripcion();
$catalogo->getCatalogosProyecto();




$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetMargins(10, 20, 10, true);
$pdf->AddPage();
$pdf->SetAutoPageBreak(false, 0);


$pdf->SetXY(15, 10);
$pdf->Image('logo_premios_verdes.png', 160, 10, 40, 15, 'PNG', '', '', false, 200, '', false, false, 0, false, false, false);
//$pdf->Image('images/certificado_500M_en_2023.png', 0, 0, 298, 210, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);
//Header («Content-type image/jpeg»);
//$image = imagecreatefromjpeg(«logo_example.jpg»);
//imagejpg($image);


//$img='logo_example.png';

$pdf->SetXY(0,$pdf->GetY()+15);   
$pdf->writeHTML($utils->format_title($etiquetas->inscripcion_titulo));

$pdf->SetXY(0,$pdf->GetY()+10); 
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p1));
    

$pdf->SetXY(10,$pdf->GetY()+10); 

$tipo_registro = 2;
if($tipo_registro ==1){//personal
	$tb_tipo = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100 %; margin-left: auto; margin-right: auto; margin-top: 50%">';
	$tb_tipo.= "<tbody>";
	$tb_tipo.= '<tr>';
	$tb_tipo.= '<td style="height:25px; color: #FFFFFF; background-color: #000000;"> <span>'.$etiquetas->inscripcion_p1_op2.'</span></td>';
	$tb_tipo.= "<td>".$etiquetas->inscripcion_p1_op1."</td>";
	$tb_tipo.= "</tr>";
	$tb_tipo.= "</tbody>";
	$tb_tipo.= "</table>";
	$pdf->writeHTML($tb_tipo);
}else{//organización
	$tb_tipo = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100 %; margin-left: auto; margin-right: auto; margin-top: 50%">';
	$tb_tipo.= "<tbody>";
	$tb_tipo.= "<tr>";
	$tb_tipo.= "<td>".$etiquetas->inscripcion_p1_op2."</td>";
	$tb_tipo.= '<td style="height:25px; color: #FFFFFF; background-color: #000000;">'.$etiquetas->inscripcion_p1_op1.'</td>';
	$tb_tipo.= "</tr>";
	$tb_tipo.= "</tbody>";
	$tb_tipo.= "</table>";
	$pdf->writeHTML($tb_tipo);

}

$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p2_sub2));



$pdf->SetXY(10,$pdf->GetY()+2);

$tb_datos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100%; margin-left: auto; margin-right: auto; margin-top: 50%;">';
$tb_datos.= "<tbody>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span>'.$etiquetas->inscripcion_p2_op2.'</span></td>';
$tb_datos.= "<td>Milena Marin</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span>'.$etiquetas->inscripcion_p2_op3.'</span> </td>';
$tb_datos.= "<td>milenamarin@gmail.com</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->inscripcion_p2_op4.'</span></td>';
$tb_datos.= "<td>No aplica</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->inscripcion_p2_op10.'</span></td>';
$tb_datos.= "<td>096145321</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->inscripcion_p2_op11.'</span></td>';
$tb_datos.= "<td>La Atarazana</td>";
$tb_datos.= "</tr>";

$tb_datos.= '<tr>';
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->inscripcion_p2_op6.'</span></td>';
$tb_datos.= '<td>milena_marinm</td>';
$tb_datos.= '</tr>';

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->inscripcion_p2_op7.'</span></td>';
$tb_datos.= "<td>Ecuador</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span style="margin-left:100px">'.$etiquetas->inscripcion_p2_op8.'</span></td>';
$tb_datos.= "<td>Guayaquil</td>";
$tb_datos.= "</tr>";


$tb_datos.= "</tbody>";
$tb_datos.= "</table>";
$pdf->writeHTML($tb_datos);

$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p3));

$pdf->SetXY(10,$pdf->GetY()+2);

$tb_datos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100%; margin-left: auto; margin-right: auto; margin-top: 50%;">';
$tb_datos.= "<tbody>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span style="margin-left:100px">Facebook</span></td>';
$tb_datos.= "<td>Milena Marin</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span style="margin-left:100px">Instagram</span></td>';
$tb_datos.= "<td>milena_marinm</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span style="margin-left:100px">LinkedIn</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span style="margin-left:100px">Twitter</span></td>';
$tb_datos.= "<td>milena_marinm</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span style="margin-left:100px">Tik Tok</span></td>';
$tb_datos.= "<td>milena_marinm</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span  style="margin-left:100px">Otra</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "</tbody>";
$tb_datos.= "</table>";
$pdf->writeHTML($tb_datos);
$pdf->AddPage();

$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p4));

//$pdf->SetXY(10,$pdf->GetY()+2);

$tb_datos = "<table cellspacing='0' cellpadding='5' border='1' style='width: 100 %; margin-left: auto; margin-right: auto;'>";
$tb_datos.= "<tbody>";

$pdf->writeHTML($tb_datos);


       $selectedOptions = ['4'];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_medios_contactos as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + );
        $pdf->writeHTML($lista_contactos);






$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p5));

$pdf->SetXY(10,$pdf->GetY()+2);



       $selectedOptions = ['6'];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_difusion as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);






$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p6));

$pdf->SetXY(10,$pdf->GetY()+2);



        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_perfiles_recomendacion as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);



$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p6_op));

$pdf->SetXY(10,$pdf->GetY()+2);        

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_sectores as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);




$pdf->AddPage();
$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p7));

$pdf->SetXY(10,$pdf->GetY()+2); 

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_estructuras as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option[''] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);





       $selectedOptions = [];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_modelos as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);
      




$pdf->AddPage();



$pdf->SetXY(0,$pdf->GetY()+1);   
$pdf->writeHTML($utils->format_title($etiquetas->ingreso_proyecto_titulo));

//CATEGORIAS
$pdf->SetXY(10,$pdf->GetY()+2); 
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p1));


       $selectedOptions = [];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_categorias as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);



$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p2));


$pdf->SetXY(10,$pdf->GetY()+2);

$tb_datos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100%; margin-left: auto; margin-right: auto; margin-top: 50%;">';
$tb_datos.= "<tbody>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span>'.$etiquetas->ingreso_proyecto_p2_op1.'</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span>'.$etiquetas->ingreso_proyecto_p2_op2.'</span> </td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->ingreso_proyecto_p2_op3.'</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->ingreso_proyecto_p2_op5.'</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->ingreso_proyecto_p2_op6.'</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= '<tr>';
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->ingreso_proyecto_p2_op7.'</span></td>';
$tb_datos.= '<td></td>';
$tb_datos.= '</tr>';

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>'.$etiquetas->ingreso_proyecto_p2_op8.'</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "</tbody>";
$tb_datos.= "</table>";
$pdf->writeHTML($tb_datos);


$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p2_op4));


$pdf->SetXY(10,$pdf->GetY()+2);

$tb_datos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100%; margin-left: auto; margin-right: auto; margin-top: 50%;">';
$tb_datos.= "<tbody>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span>Facebook</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE;"><span>Instagram</span> </td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>LinkedIn</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>Otra</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "</tbody>";
$tb_datos.= "</table>";
$pdf->writeHTML($tb_datos);

$pdf->AddPage();

$tb_datos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100%; margin-left: auto; margin-right: auto; margin-top: 50%;">';
$tb_datos.= "<tbody>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>Snapchat</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>TikTok</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td style="height:25px; background-color: #EEEEEE; display:flex;"><span>Twitter</span></td>';
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "</tbody>";
$tb_datos.= "</table>";
$pdf->writeHTML($tb_datos);


//En que fase se encuentra tu proyecto?
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p8));

$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer(''));

//
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p3));

$r1="12345";
$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer($r1));

//
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p4));

$r2="Un árbol es una planta, de tallo leñoso, que se ramifica a cierta altura del suelo.El término hace referencia habitualmente a aquellas plantas cuya altura supera un determinado límite en la madurez, diferente según las fuentes: dos metros, tres metros, cinco metros o los seis metros.";
$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer($r2));

//
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p9));

$r3="Un árbol es una planta, de tallo leñoso, que se ramifica a cierta altura del suelo.";
$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer($r3));




$pdf->AddPage();
$pdf->SetXY(0,$pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p10));


$pdf->SetXY(10,$pdf->GetY()+2);

       $selectedOptions = [];

        $lista_actividades = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_actividades as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_actividades .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $lista_actividades .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_actividades);

$pdf->AddPage();
$pdf->SetXY(10,$pdf->GetY()+2);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p11));

$pdf->SetXY(10,$pdf->GetY()+2);

       $selectedOptions = [];

        $lista_actividades = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_amenazas as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_actividades .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $lista_actividades .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_actividades);




//EXPLICA POR QUÉ ESCOGISTE ESTA AMENAZA?
$pdf->SetXY(0, $pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p11_expl));

$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer(''));


//PRINCIPAL DEBILIDAD

$pdf->SetXY(10,$pdf->GetY()+2);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p12));

$pdf->SetXY(10,$pdf->GetY()+2);

       $selectedOptions = [];

        $lista_actividades = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($catalogo->lista_debilidades as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_actividades .= '<tr><td' . $selected . '>' . $option['nombre'] . '</td></tr>';
        }

        $lista_actividades .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_actividades);


$pdf->AddPage();
//EXPLICA POR QUÉ ESCOGISTE ESTA DEBILIDAD
$pdf->SetXY(0, $pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p12_expl));

$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer(''));



//PREMIOS VERDES TRABAJA MUY ALINEADO Y COMPROMETIDOS CON LOS ODS, SELECCIONA LAS TRES METAS DE ODS QUE MÁS SE ALINEAN AL PROYECTO
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p13));
$options = [
            [
                'id' => '1',
                'etiqueta' => 'Para 2030, erradicar la pobreza extrema para todas las personas en el mundo',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Para 2030, reducir al menos a la mitad la proporción de hombres, mujeres y niños de todas las edades que viven en la pobreza en todas sus dimensiones con arreglo a las definiciones nacionales',
            ],
            [
                'id' => '3',
                'etiqueta' => ' Poner en práctica a nivel nacional sistemas y medidas apropiadas de protección social para todos, incluidos niveles mínimos, y, para 2030, lograr una amplia cobertura de los pobres y los vulnerables',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Para 2030, garantizar que todos los hombres y mujeres, en particular los pobres y los vulnerables, tengan los mismos derechos a los recursos económicos, así como acceso a los servicios básicos, la propiedad y el control de las tierras y otros bienes, la herencia, los recursos naturales, las nuevas tecnologías apropiadas y los servicios financieros, incluida la microfinanciación',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Para 2030, fomentar la resiliencia de los pobres y las personas que se encuentran en situaciones vulnerables y reducir su exposición y vulnerabilidad a los fenómenos extremos relacionados con el clima y otras crisis y desastres económicos, sociales y ambientales',
            ],
            [
                'id' => '6',
                'etiqueta' => 'Garantizar una movilización importante de recursos procedentes de diversas fuentes, incluso mediante la mejora de la cooperación para el desarrollo, a fin de proporcionar medios suficientes y previsibles a los países en desarrollo, en particular los países menos adelantados, para poner en práctica programas y políticas encaminados a poner fin a la pobreza en todas sus dimensiones',
            ],
            [
                'id' => '7',
                'etiqueta' => 'Garantizar una movilización importante de recursos procedentes de diversas fuentes, incluso mediante la mejora de la cooperación para el desarrollo, a fin de proporcionar medios suficientes y previsibles a los países en desarrollo, en particular los países menos adelantados, para poner en práctica programas y políticas encaminados a poner fin a la pobreza en todas sus dimensiones',
            ],
         ];

       $selectedOptions = [1, 3, 6]; 

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);



//IMAGEN PRINCIPAL (HASTA 20 MB)
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_archivos_img_principal));

$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer(''));


//LOGO (HASTA 3 MB)
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_archivos_img_logo));

$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer(''));


//LINK VIDEO (OPCIONAL)
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_archivos_link_video1));

$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer(''));


$pdf->AddPage();
//LINK VIDEO 2 (OPCIONAL)
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_archivos_link_video2));

$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer(''));


//DOCUMENTO ADICIONAL DE SU PROYECTO (FORMATO PDF-HASTA 20MB, OPCIONAL)
$pdf->SetXY(0, $pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_archivos_pdf));

$pdf->SetY($pdf->GetY()+5);
$pdf->writeHTML($utils->format_answer(''));


//$pdf->writeHTML("<table>");
//$pdf->writeHTML("<tr>");
//$pdf->writeHTML("<td>" .$etiquetas->inscripcion_p2_op2. "</td>");
//$pdf->writeHTML("<td>" .$etiquetas->inscripcion_p2_op2. "</td>");
//$pdf->writeHTML("</tr>");
//$pdf->writeHTML("</table>");

//$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p2_op2));

//$pdf->SetX($pdf->GetX()+10);
//$pdf->writeHTML($utils->format_question("Milena Marin"));


ob_end_clean();
$pdf->Output('proyecto.pdf', 'I');





 ?>
