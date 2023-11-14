<?php 
function Listar_SolicitudesId($vConexion, $Valor){
$Usuario= array();

$Sql= "SELECT u.Nombre, u.Apellido, u.Id_Rol
FROM usuarios u
WHERE u.Id = '$Valor'" ; 

$rs= mysqli_query($vConexion, $Sql);

$data= mysqli_fetch_array($rs);

if(!empty($data))
{
    
    $Usuario['NOMBRE'] = $data['Nombre'];
    $Usuario['APELLIDO'] = $data['Apellido'];
    $Usuario['ID_ROL'] = $data['Id_Rol'];


}
return $Usuario;
 }

?>
