<?php

require_once "modelos/Catalogos.php";
$catalogos = new Catalogos();


$catalogos->getListaTipoTransporte();

var_dump($catalogos->lista_tipo_transporte);











 ?>