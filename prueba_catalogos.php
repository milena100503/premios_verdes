<?php

require_once "modelos/Catalogos.php";
$catalogos = new Catalogos();


$catalogos->getListaTipoTextil();

var_dump($catalogos->lista_tipo_textil);











 ?>