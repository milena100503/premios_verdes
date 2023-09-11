<?php

class Utils {
    public function format_title($text){
        return '<h1>'.html_entity_decode($text).'</h1>';
    }

    public function format_indication($text){
        return '<p >'.html_entity_decode($text).'</p>';
    }
//
    public function format_question($text){
        return '<p> <strong>'.html_entity_decode($text).'</strong></p>';
    }


    public function format_answer($text){
        return '<p align="justify"; style="border: 1px solid #BFB9B9; padding: 10px;" >'.html_entity_decode($text).'</p>';
    }

    public function format_boolean($option)
	{
    $options = ["SI", "NO"];

    $table = '<div style="text-align: center;">';
    $table .= '<table cellspacing="0" cellpadding="1" border="1" style="width: 50%; margin-left: auto; margin-right: auto;">';
    $table .= '<tr>';

    foreach ($options as $opt) {
        $selected = strtoupper($option) === strtoupper($opt) ? 'style="color: #FFFFFF; background-color: #000000;"' : '';
        
        $table .= '<td ' . $selected . '>';
        $table .= strtoupper($opt); 
        $table .= '</td>';

    }
    $table .= '</tr>';
    $table .= '</table>';
    $table .= '</div>';
	return $table;

	
}











}
// class Utils {
//     public function format_title($text){
//         return '<h1>'.html_entity_decode($text).'</h1>';
//     }

//     public function format_indication($text){
//         return '<p>'.html_entity_decode($text).'</p>';
//     }


//     public function format_question($text){
//         return '<p>'.html_entity_decode($text).'</p>';
//     }


// }

?>
