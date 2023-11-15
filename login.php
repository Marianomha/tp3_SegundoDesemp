<?php 
session_start();
require_once 'funciones/conexion.php';
$MiConexion=ConexionBD();

$Mensaje= '';
if(!empty($_POST['Ingresar'])){

    require_once 'funciones/login1.php';
    $Usuariologueado= DatosLogin($_POST['Email'], $_POST['Clave'], $MiConexion);
    if(!empty($Usuariologueado)){
       
       
       //generar los valores del usuario



       $_SESSION['Usuario_Id'] = $Usuariologueado['ID'];
       $_SESSION['Usuario_Nombre']= $Usuariologueado['NOMBRE'];
       $_SESSION['Usuario_Apellido']= $Usuariologueado['APELLIDO'];

       require_once 'funciones/update_FechaUltimoAcceso.php';
       update_Fecha($MiConexion, $_SESSION['Usuario_Id']);

       if($Usuariologueado['ID_ROL']==1){
        $_SESSION['Usuario_Rol']= 'Administrador';
       }
       if ($Usuariologueado['ID_ROL']==2){
        $_SESSION['Usuario_Rol']= 'Usuario Normal';
        }
        if ($Usuariologueado['ID_ROL']==3){
        $_SESSION['Usuario_Rol']= 'Soporte Tecnico';
        }
        if ($Usuariologueado['ID_ROL']==4){
            $_SESSION['Usuario_Rol']= 'Analista';
        }
       
       $_SESSION['Usuario_Imagen']=$Usuariologueado['IMAGEN'];

       if($Usuariologueado['ACTIVO']==0){
        $Mensaje='Usted no se encuentra activo en el sistema';
       }
       else
       { 

        header('Location: index.php');
       exit;
       }
    }
    else {
        $Mensaje='Datos, incorrectos';
    }
}






?>




<?php require_once 'headlogin.php'; ?>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Panel de administración</h1>
      </div>
      <div class="login-box ">
        <form class="login-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INGRESA AL PANEL</h3>

         <!-- *******************************************
           esto se debe mostrar solo si hay errores en el logueo,
            y no mostrar la otra de Ingresa tus datos -->

            <?php 
            if(!empty($Mensaje)) {?>

          <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
              <?php echo $Mensaje; ?>
            </div>
          </div>
          <?php  } ?>
           <!-- si hay errores se muestra la seccion anterior, y esta no 
          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Ingresa tus datos</strong>
            </div>
          </div>
          <!- ------->

          <div class="form-group">
            <label class="control-label">Usuario (*)</label>
            <input class="form-control" placeholder="Email" autofocus name="Email"
            value= "<?php echo!empty($_POST['Email']) ? $_POST['Email'] : ''; ?>"   />
          </div>
          <div class="form-group">
            <label class="control-label">Clave (*)</label>
            <input class="form-control" type="password" placeholder="Password" name="Clave"
              />
          </div>
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste la clave ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name='Ingresar' value='Ingresar'><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
          </div>
        </form>
    
       
        <?php $MensajeReset='Tu clave será reseteada';?>
        <?php 
          $MiConexionReset=ConexionBD();
           $MensajeReset2= ' ';
          if(!empty($_POST['btnResetearClave'])){

            require_once 'funciones/reset.php';
            $UsuariologueadoReset= DatosReset($_POST['EmailReset'], $MiConexionReset);
            if(!empty($UsuariologueadoReset)){
              $MensajeReset2='Listo ,ya puedes loguearte';
            }
            else{
              $MensajeReset2='El email ingresado no existe';
            }
           
           
            }
        
        




        ?>
        <form class="forget-form" method="post" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste la clave ?</h3>
          <?php if(empty($_POST['EmailReset'])) { ?>
            <div class="bs-component">
            
            <div class="alert alert-dismissible alert-info">
              <strong><?php echo $MensajeReset?></strong>
            </div>
          </div>
          <?php }?>
          <?php if (!empty($_POST['EmailReset'])) { ?>
          <!-- este es el mensaje de error -->

        <?php 
        
        if(empty($UsuariologueadoReset)){ ?>
      
          <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
              <strong><?php echo 'Error'; ?></strong>
            </div>
          </div>
          
        <?php }?>

          <!-- este es el mensaje de ok!-->
          <?php if(!empty($UsuariologueadoReset)){?>
          <div class="bs-component">
            <div class="alert alert-dismissible alert-success">
              <strong><?php echo 'Listo';?></strong>
            </div>
          </div>
          <?php } ?>
          <?php }?>

          
          
          <div class="form-group">
            <label class="control-label">Ingresa tu correo</label>
            <input class="form-control" placeholder="Email" name='EmailReset' />
          </div>
          <div class="form-group btn-container ">
            <button class="btn btn-primary btn-block" type='submit' name='btnResetearClave' value='btnResetearClave'><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Ir al Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>