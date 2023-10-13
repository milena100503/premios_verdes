<?php

require_once "modelos/Catalogos.php";
$catalogos = new Catalogos();


$catalogos->getListaEcosistemas();

var_dump($catalogos->lista_ecosistemas);











 ?>