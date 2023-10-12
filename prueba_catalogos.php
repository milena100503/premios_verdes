<?php

require_once "modelos/Catalogos.php";
$catalogos = new Catalogos();


$catalogos->getListaEnfoquesAmbientalesFinanzas();

var_dump($catalogos->lista_enfoques_ambientales_finanzas);











 ?>