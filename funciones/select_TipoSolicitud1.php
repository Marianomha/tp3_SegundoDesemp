<?php 
function Listar_Solicitudes($vConexion){
$Listado= array();

$Sql= "SELECT * FROM tipodesolicitudes ORDER BY Denominacion ";

$rs= mysqli_query($vConexion, $Sql);

$i=0;
while($data = mysqli_fetch_array($rs)){
    $Listado[$i]['ID'] = $data ['Id'];
    $Listado[$i]['DENOMINACION'] = $data['Denominacion'];
    $i++;

}
return $Listado;



}








?>