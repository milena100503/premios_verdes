<?php 
require_once "tcpdf/TCPDF-main/tcpdf.php";
require_once "Utils.php";
require_once "etiquetas.php";

$utils = new Utils();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetMargins(10, 20, 10, true);
$pdf->AddPage();
$pdf->SetAutoPageBreak(false, 0);

$pdf->SetXY(0,$pdf->GetY()+10);   
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


$options = [
            [
                'id' => '1',
                'etiqueta' => 'Correo Electrónico',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Teléfono',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Telegram',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Whatsapp',
            ],
         ];

       $selectedOptions = ['4'];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + );
        $pdf->writeHTML($lista_contactos);












$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p5));

$pdf->SetXY(10,$pdf->GetY()+2);

  $options = [
            [
                'id' => '1',
                'etiqueta' => 'Redes Sociales de Premios Verdes',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Redes Sociales de Amigos/Organizaciones',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Medios de Comunicación',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Un Mail directo de Premios Verdes',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Un Mail de Organización aliada',
            ],
            [
                'id' => '6',
                'etiqueta' => 'Publicidad',
            ],
            [
                'id' => '7',
                'etiqueta' => 'Recomendación',
            ],
            [
                'id' => '8',
                'etiqueta' => 'Ya es miembro de la comunidad Premios Verdes',
            ],
         ];

       $selectedOptions = ['6'];

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









$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p6));

$pdf->SetXY(10,$pdf->GetY()+2);

$options = [
            [
                'id' => '1',
                'etiqueta' => 'Privado',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Público',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Tercer Sector',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Alianza Público-Privado',
            ],
         ];

       $selectedOptions = ['1'];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);



$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p6_op));

$pdf->SetXY(10,$pdf->GetY()+2);        

$options = [
            [
                'id' => '1',
                'etiqueta' => 'Gran Empresa',
            ],
            [
                'id' => '2',
                'etiqueta' => 'PYME',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Microempresario',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Emprendedor',
            ],
         ];

       $selectedOptions = ['2'];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);




$pdf->AddPage();
$pdf->SetXY(0,$pdf->GetY()+1);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p7));

$pdf->SetXY(10,$pdf->GetY()+2); 

$options = [
            [
                'id' => '1',
                'etiqueta' => 'Acuacultura',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Acuaponía',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Agricultura',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Agroecología',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Agroforestería',
            ],
            [
                'id' => '6',
                'etiqueta' => 'Apicultura',
            ],
            [
                'id' => '7',
                'etiqueta' => 'Avicultura',
            ],
            [
                'id' => '8',
                'etiqueta' => 'Ganaderia',
            ],
            [
                'id' => '9',
                'etiqueta' => 'Pesca',
            ],
            [
                'id' => '10',
                'etiqueta' => 'Silvicultura',
            ],
         ];

       $selectedOptions = [];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);




$options = [
            [
                'id' => '1',
                'etiqueta' => 'Extracción de Petroleo',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Minería',
            ],
         ];

       $selectedOptions = [];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);
      



$options = [
            [
                'id' => '1',
                'etiqueta' => 'Abonos yfertilizantes',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Accesorios',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Alimentos',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Aparatos Eléctricos',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Artículos para el hogar',
            ],
            [
                'id' => '6',
                'etiqueta' => 'Bebidas(producción y/o embotellamiento)',
            ],
            [
                'id' => '7',
                'etiqueta' => 'Construcción/Diseño',
            ],
            [
                'id' => '8',
                'etiqueta' => 'Electrodomésticos',
            ],
            [
                'id' => '9',
                'etiqueta' => 'Energía',
            ],
            [
                'id' => '10',
                'etiqueta' => 'Joyería',
            ],
            [
                'id' => '11',
                'etiqueta' => 'Licores (producción y/ embotellamiento)',
            ],
            [
                'id' => '12',
                'etiqueta' => 'Materiales de construcción',
            ],
            [
                'id' => '13',
                'etiqueta' => 'Materiales e insummos basados del petróleo',
            ],
         ];

       $selectedOptions = [];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);
$pdf->AddPage();


$options = [
            [
                'id' => '1',
                'etiqueta' => 'Moda/textiles',
            ],
            [
                'id' => '2',
                'etiqueta' => 'Metalmecanica',
            ],
            [
                'id' => '3',
                'etiqueta' => 'Procesamiento/empaquetamiento',
            ],
            [
                'id' => '4',
                'etiqueta' => 'Reciclaje',
            ],
            [
                'id' => '5',
                'etiqueta' => 'Vehículos',
            ],
         ];

       $selectedOptions = [];

        $lista_contactos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
        $style = 'color: #FFFFFF; background-color: #000000;';

        foreach ($options as $option) {
            $id = $option['id'];
            $selected = in_array($id, $selectedOptions) ? ' style="' . $style . '"' : '';
            $lista_contactos .= '<tr><td' . $selected . '>' . $option['etiqueta'] . '</td></tr>';
        }

        $lista_contactos .= '</table>';

        //$pdf->SetY($pdf->GetY() + 5);
        $pdf->writeHTML($lista_contactos);


$pdf->SetXY(0,$pdf->GetY()+5);   
$pdf->writeHTML($utils->format_title($etiquetas->ingreso_proyecto_titulo));

$pdf->SetXY(0,$pdf->GetY()+5); 
$pdf->writeHTML($utils->format_question($etiquetas->ingreso_proyecto_p1));

$tb_datos = '<table cellspacing="0" cellpadding="5" border="1" style="width: 100%; margin-left: auto; margin-right: auto; margin-top: 50%;">';
$tb_datos.= "<tbody>";

$tb_datos.= "<tr>";
$tb_datos.= '<td>Academic Sustainability Research</td>';
$tb_datos.= "<td>Circular Economy</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td>Green Tech Startups</td>';
$tb_datos.= "<td>Habitat and Ecosystem Conservation</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td>Renewable Energy</td>';
$tb_datos.= "<td>Resilient Design Architecture</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td>Sustainable Farming and Food Production</td>';
$tb_datos.= "<td>Sustainable Fashion</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td>Sustainable Finance</td>';
$tb_datos.= "<td>Sustainable Human Development</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= '<td>Sustainable Mobility</td>';
$tb_datos.= "</tr>";

$tb_datos.= "</tbody>";
$tb_datos.= "</table>";
$pdf->writeHTML($tb_datos);






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
