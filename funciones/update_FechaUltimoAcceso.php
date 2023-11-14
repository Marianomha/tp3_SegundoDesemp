<?php
function update_Fecha($vConexion, $Valor){
    $Sql= "UPDATE usuarios SET Ult_FechAcceso = CURRENT_TIMESTAMP() WHERE id = $Valor";
  

$rs= mysqli_query($vConexion, $Sql);
}






?>