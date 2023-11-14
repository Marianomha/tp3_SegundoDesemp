<?php 
function conocerRol($ValorSession,$ValorId ){
$Mensaje='';

if(){
    $Mensaje= 'Administrador';

    
}
if($ValorId==2){
    $Mensaje= 'Usuario Normal';

}
if($ValorId==3){
    $Mensaje= 'Soporte Tecnico';

}
if($ValorId==4){
    $Mensaje= 'Analista';

}


return $Mensaje;
}






?>