<?php
function DatosLogin( $vUsuario, $vClave, $vConexion){

    $Usuario= array();
    $Sql=" SELECT * FROM usuarios WHERE Email= '$vUsuario' AND Clave= MD5('$vClave')  ";
    $rs= mysqli_query($vConexion, $Sql);
    
    $data= mysqli_fetch_array($rs);
    if(!empty($data)){

        $Usuario['ID'] = $data['Id'];
        $Usuario['NOMBRE'] = $data['Nombre'];
        $Usuario['APELLIDO'] = $data['Apellido'];
        $Usuario['EMAIL'] = $data['Email'];
        $Usuario['CLAVE'] = $data['Clave'];
        $Usuario['ID_ROL'] = $data['Id_Rol'];
        $Usuario['ULT_FECHACCESO'] = $data['Ult_FechAcceso'];
        $Usuario['ACTIVO'] = $data['Activo'];

        if(empty($data['Imagen'])) { 
            $data['Imagen']='user.png'; 
        }
    

        $Usuario['IMAGEN'] = $data['Imagen'];

    }
    return $Usuario;
}




?>