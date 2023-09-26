<?php

require_once "modelos/Catalogos.php";
$catalogos = new Catalogos();


$catalogos->getListaFasesNegocio();

var_dump($catalogos->lista_fases_negocio);











 ?>