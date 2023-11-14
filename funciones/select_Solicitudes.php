<?php 
function Listar_Solicitudes2($vConexion){
$Listado= array();

$Sql= "SELECT * FROM solicitudes ORDER BY FechaCarga asc";

$rs= mysqli_query($vConexion, $Sql);

$i=0;
while($data = mysqli_fetch_array($rs)){
    $Listado[$i]['ID'] = $data ['Id'];
    $Listado[$i]['TITULO'] = $data['Titulo'];
    $Listado[$i]['DESCRIPCION'] = $data ['Descripcion'];
     $Listado[$i]['ID_TIPOSOLICITUD'] = $data ['Id_TipoSolicitud'];
    $Listado[$i]['FECHACARGA'] = $data ['FechaCarga'];
    $Listado[$i]['ID_USUARIO'] = $data ['Id_Usuario'];
    $Listado[$i]['FECHARESOLUCION'] = $data ['FechaResolucion'];
   
    
    $i++;


}
return $Listado;
 


}








?>