<?php
function InsertarRegistro($vConexion, $FechaEstimada){
   

$Sql_Insert= "INSERT INTO solicitudes (Titulo, Descripcion, ID_Usuario, FechaCarga, Id_TipoSolicitud, FechaResolucion) 
VALUES('".$_POST['Titulo']."' ,'".$_POST['Descripcion']."' , '".$_SESSION['Usuario_Id']."' , NOW() ,
'".$_POST['Tipo']."', '".$FechaEstimada." ')";


if(!mysqli_query($vConexion, $Sql_Insert)){
    die('Error al intetar insetar el registro');
}
return true;

}






?>