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
    
$pdf->SetXY(0,$pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p2_sub2));



$pdf->SetXY(10,$pdf->GetY()+10);

$tb_datos = "<table cellspacing='0' cellpadding='1' border='1' style='width: 100 %; margin-left: auto; margin-right: auto;'>";
$tb_datos.= "<tbody>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>".$etiquetas->inscripcion_p2_op2."</td>";
$tb_datos.= "<td>Milena Marin</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>".$etiquetas->inscripcion_p2_op3."</td>";
$tb_datos.= "<td>milenamarin@gmail.com</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>".$etiquetas->inscripcion_p2_op4."</td>";
$tb_datos.= "<td>No aplica</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>".$etiquetas->inscripcion_p2_op10."</td>";
$tb_datos.= "<td>096145321</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>".$etiquetas->inscripcion_p2_op11."</td>";
$tb_datos.= "<td>La Atarazana</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>".$etiquetas->inscripcion_p2_op6."</td>";
$tb_datos.= "<td>milena_marinm</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>".$etiquetas->inscripcion_p2_op7."</td>";
$tb_datos.= "<td>Ecuador</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>".$etiquetas->inscripcion_p2_op8."</td>";
$tb_datos.= "<td>Guayaquil</td>";
$tb_datos.= "</tr>";


$tb_datos.= "</tbody>";
$tb_datos.= "</table>";
$pdf->writeHTML($tb_datos);

$pdf->SetXY(0,$pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p3));

$pdf->SetXY(10,$pdf->GetY()+10);

$tb_datos = "<table cellspacing='0' cellpadding='1' border='1' style='width: 100 %; margin-left: auto; margin-right: auto;'>";
$tb_datos.= "<tbody>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>Facebook</td>";
$tb_datos.= "<td>Milena Marin</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>Instagram</td>";
$tb_datos.= "<td>milena_marinm</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>LinkedIn</td>";
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>Twitter</td>";
$tb_datos.= "<td>milena_marinm</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>Tik Tok</td>";
$tb_datos.= "<td>milena_marinm</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>Otra</td>";
$tb_datos.= "<td></td>";
$tb_datos.= "</tr>";

$tb_datos.= "</tbody>";
$tb_datos.= "</table>";
$pdf->writeHTML($tb_datos);


$pdf->SetXY(0,$pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p4));

$pdf->SetXY(10,$pdf->GetY()+10);

$tb_datos = "<table cellspacing='0' cellpadding='1' border='1' style='width: 100 %; margin-left: auto; margin-right: auto;'>";
$tb_datos.= "<tbody>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>Correo Electrónico</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>Teléfono</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>Telegram</td>";
$tb_datos.= "</tr>";

$tb_datos.= "<tr>";
$tb_datos.= "<td>Whatsapp</td>";
$tb_datos.= "</tr>";

$tb_datos.= "</tbody>";
$tb_datos.= "</table>";
$pdf->writeHTML($tb_datos);


$pdf->SetXY(0,$pdf->GetY()+10);
$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p5));

$pdf->SetXY(0,$pdf->GetY()+10);

//$pdf->writeHTML("<table>");
//$pdf->writeHTML("<tr>");
//$pdf->writeHTML("<td>" .$etiquetas->inscripcion_p2_op2. "</td>");
//$pdf->writeHTML("<td>" .$etiquetas->inscripcion_p2_op2. "</td>");
//$pdf->writeHTML("</tr>");
//$pdf->writeHTML("</table>");

//$pdf->writeHTML($utils->format_question($etiquetas->inscripcion_p2_op2));

//$pdf->SetX($pdf->GetX()+10);
//$pdf->writeHTML($utils->format_question("Milena Marin"));

$pdf->writeHTML($utils->format_question("Milena Marin"));

ob_end_clean();
$pdf->Output('proyecto.pdf', 'I');





 ?>
