<?php

require_once "modelos/Catalogos.php";
$catalogos = new Catalogos();


$catalogos->getListaProcesosReciclajes();

var_dump($catalogos->lista_procesos_reciclajes);











 ?>