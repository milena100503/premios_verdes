<?php

require_once "modelos/Catalogos.php";
$catalogos = new Catalogos();


$catalogos->getListaClasesBosques();

var_dump($catalogos->lista_clases_bosques);











 ?>