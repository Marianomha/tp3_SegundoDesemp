<?php 
function Validar_Datos(){
$vMensaje='';

if(strlen($_POST['Titulo']) <5){
    $vMensaje.='Debe ingresar mas de 5 caracteres en el Titulo.<br>';
}
 if(strlen($_POST['Descripcion'])<5){
    $vMensaje.='Debe ingresar mas de 5 caracteres en la Descripcion.<br>';
}
if(empty($_POST['Tipo'])){
    $vMensaje.= 'Debe elegir un tipo de solicitud.<br>';
}

    //foreach($_POST as $Id => $Valor){
    //$_POST[$Id] = trim($_POST[$Id]);
    //$_POST[$Id] = strip_tags($_POST[$Id]);<
//}



return $vMensaje;
}




?>