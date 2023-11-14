<?php 
function formatearFecha($vFecha){

    $fecha_formateada= date("d/m/Y H:i:s", strtotime($vFecha));
    return $fecha_formateada;
}




?>