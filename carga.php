<?php 
session_start(); 
if(empty($_SESSION['Usuario_Nombre'])){

    header('Location: cerrarsesion.php');
    exit;
}

?>
<?php
require_once 'funciones/conexion.php';
$MiConexion= ConexionBD();
require_once 'funciones/select_TipoSolicitud1.php';
$Listado_Tipos=Listar_Solicitudes($MiConexion);
$cantidadTipos= count($Listado_Tipos); 

require_once 'funciones/insertar_registro.php';
require_once 'funciones/validacion_registro.php';

$MensajeValidacionError="";
$MensajeValidacionOk="";

if(!empty($_POST["btnRegistrar"])){
  //$Mensaje= Validar_Datos();
  
  $MensajeValidacionError=Validar_Datos();

  if (empty($MensajeValidacionError)){
  require_once 'funciones/fecha_resolucion.php';
  $calculoFechaEstimada=calcularFechaEntrega($_POST['Tipo']);
  
  if (InsertarRegistro($MiConexion,$calculoFechaEstimada) == !false){
    $MensajeValidacionOk=" Solicitud almacenada";
  
 
}
}
}




?>

<?php require_once 'headcarga.php'; ?>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php">Mi Panel</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="cerrarsesion.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <?php require_once 'asidecarga.php'; ?>
    
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Registra aqui tu solicitud</h1>
          <p>Detalla lo mas que puedas para que un encargado pueda asesorarte.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Registro</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa los datos solicitados</h3>

            <?php if (!empty($MensajeValidacionError)) {?>
            <div class="bs-component">
                <div class="alert alert-dismissible alert-danger">
                  <strong><?php echo $MensajeValidacionError; ?></strong>
                </div>
              </div>
              <?php } ?>


              <?php if (!empty($MensajeValidacionOk)) {?>
              <div class="bs-component">
                <div class="alert alert-dismissible alert-success">
                  <strong><?php echo $MensajeValidacionOk; ?></strong>
                </div>
                </div>
              <?php } ?>


              <div class="bs-component">
                <div class="alert alert-dismissible alert-info">
                  <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
                </div>
              </div>
         <form role="form" method= "post" action="carga.php">
            <div class="tile-body">
             
              
                <div class="form-group">
                  <label class="control-label">Título</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <input class="form-control" name='Titulo' 
                  value="<?php if(!empty($_POST['Titulo']) ? $_POST : " ");?>">
                  
                </div>
                
                <div class="form-group">
                  <label class="control-label">Descripción de solicitud <i class="fa fa-asterisk" aria-hidden="true"></i></label>
                  <textarea class="form-control" rows="4" placeholder="Ingresa los detalles..." name="Descripcion" ></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Tipo de solicitud</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  

                  <?php for ($i=0; $i<$cantidadTipos; $i++) { ?>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="Tipo" value="<?php echo $Listado_Tipos[$i]['ID']; ?>" ><?php echo $Listado_Tipos[$i]['DENOMINACION']; ?>
                    </label>
                  </div>
                  
                  <?php } ?>                  
                </div>

                </form>

                <!--
                <div class="form-group">
                  <label class="control-label">Puedes subir una captura de pantalla</label>
                  <input class="form-control" type="file">
                </div>
                -->
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="btnRegistrar" value="btnRegistrar" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
          </form>
            </div>
          </div>
        </div>
        
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
   
  </body>
</html>