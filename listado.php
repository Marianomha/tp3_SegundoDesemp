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

    require_once 'funciones/select_Solicitudes.php';

    $ListadoSolicitudes = Listar_Solicitudes2($MiConexion);

    $Cantidad_ListadoSolicitudes = count($ListadoSolicitudes);

    $MensajeSumaSolicitudes=0;
    

    

   
    
  



?>


<?php require_once 'headlistado.php'; ?>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Mi Panel</a>
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
    <?php require_once 'asidelistado.php'; ?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
          <!-- si es administrador vera este titulo-->

          <?php if($_SESSION['Usuario_Rol']=='Administrador') { ?> 
          <p>Listado total de solicitudes</p>

          <?php } ?>
          
          <!-- si es usuario normal vera este titulo--->
          <?php if($_SESSION['Usuario_Rol']=='Usuario Normal') { ?>
          <p>Listado de mis solicitudes cargadas</p>
          <?php } ?>

          <!-- si es analista o tecnico vera este titulo-->
          <?php if($_SESSION['Usuario_Rol']=='Analista' ||$_SESSION['Usuario_Rol']=='Soporte Tecnico') { ?>
          <p>Listado de solicitudes cargadas</p>
          <?php } ?> 


        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active"><a href="#">Listado de Solicitudes</a></li>
        </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Solicitudes Nro <?php echo $MensajeSumaSolicitudes; ?></h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Registro</th>
                    <th>Fecha estimada</th>
                    <th>Solicitante</th>
                    <th>Opciones</th>

                  </tr>
                </thead>
                <tbody>
                 <?php require_once 'funciones/color_TipoFuncion.php'; 
                     require_once 'funciones/conocer_TipoSolicitud.php'; 
                    require_once 'funciones/selectId_Usuarios.php';
                    require_once 'funciones/formatear_fecha.php';

                    
                     ?>


             
                  
                  <?php 
                 
                  for ($i=0; $i<$Cantidad_ListadoSolicitudes; $i++) { ?>

                  <?php $IdUsuario= Listar_SolicitudesId($MiConexion,$ListadoSolicitudes[$i]['ID_USUARIO']); ?>
                  
                  
                  
                  <?php  if($_SESSION['Usuario_Rol'] == 'Administrador')  { ?>
                    
                    
                    <tr class="<?php echo colorTipoSolicitud($ListadoSolicitudes[$i]['ID_TIPOSOLICITUD']); ?>">

                     
                      <td><?php echo $ListadoSolicitudes[$i]['ID']; ?></td>
                      <td><?php echo $ListadoSolicitudes[$i]['TITULO']; ?></td>
                      <?php 
                      $descripcion= $ListadoSolicitudes[$i]['DESCRIPCION'];
                      $palabras= str_word_count($descripcion, 1);

                      $primeras_20_palabras= implode(' ', array_slice($palabras, 0 ,20));
                      ?>
                      <td><?php echo $primeras_20_palabras; ?></td>
                      <td><?php echo conocerTipoSolcitud($ListadoSolicitudes[$i]['ID_TIPOSOLICITUD']); ?></td>

                      <?php 
                     
                      ?>
                      <td><?php echo formatearFecha($ListadoSolicitudes[$i]['FECHACARGA']); ?></td>



                      <td><?php echo formatearFecha($ListadoSolicitudes[$i]['FECHARESOLUCION']); ?></td>
                       
                     <td><?php echo $IdUsuario['NOMBRE']."<br>".$IdUsuario['APELLIDO'] ; ?>
                      </td>
                     
                      <td> 
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                    </tr>

                    <?php $MensajeSumaSolicitudes++; ?>

                   
                   
                    <?php } ?>
                     


                    

                     <?php if($_SESSION['Usuario_Rol'] == 'Usuario Normal' && $IdUsuario['ID_ROL'] == 2 ) { ?>
                    
                    
                    <tr class="<?php echo colorTipoSolicitud($ListadoSolicitudes[$i]['ID_TIPOSOLICITUD']); ?>">

                    
                    <td><?php echo $ListadoSolicitudes[$i]['ID']; ?></td>
                      <td><?php echo $ListadoSolicitudes[$i]['TITULO']; ?></td>
                      <?php 
                      $descripcion= $ListadoSolicitudes[$i]['DESCRIPCION'];
                      $palabras= str_word_count($descripcion, 1);

                      $primeras_20_palabras= implode(' ', array_slice($palabras, 0 ,20));
                      ?>
                      <td><?php echo $primeras_20_palabras; ?></td>
                      <td><?php echo conocerTipoSolcitud($ListadoSolicitudes[$i]['ID_TIPOSOLICITUD']); ?></td>

                      <?php 
                      
                      ?>
                      <td><?php echo formatearFecha($ListadoSolicitudes[$i]['FECHACARGA']); ?></td>



                      <td><?php echo formatearFecha($ListadoSolicitudes[$i]['FECHARESOLUCION']); ?></td>
                       
                     <td><?php echo $IdUsuario['NOMBRE']."<br>".$IdUsuario['APELLIDO'] ; ?>
                      </td>
                     
                      <td> 
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                    </tr>
                    <?php $MensajeSumaSolicitudes++; ?>
                    
                    <?php } ?>




                    <?php if($_SESSION['Usuario_Rol'] == 'Soporte Tecnico' ) { ?>
                      
                    <?php if( $ListadoSolicitudes[$i]['ID_TIPOSOLICITUD'] == 3) { ?>
                    
                    <tr class="<?php echo colorTipoSolicitud($ListadoSolicitudes[$i]['ID_TIPOSOLICITUD']); ?>">

                    
                    <td><?php echo $ListadoSolicitudes[$i]['ID']; ?></td>
                      <td><?php echo $ListadoSolicitudes[$i]['TITULO']; ?></td>
                      <?php 
                      $descripcion= $ListadoSolicitudes[$i]['DESCRIPCION'];
                      $palabras= str_word_count($descripcion, 1);

                      $primeras_20_palabras= implode(' ', array_slice($palabras, 0 ,20));
                      ?>
                      <td><?php echo $primeras_20_palabras; ?></td>
                      <td><?php echo conocerTipoSolcitud($ListadoSolicitudes[$i]['ID_TIPOSOLICITUD']); ?></td>

                      <?php 
                      
                      ?>
                      <td><?php echo formatearFecha($ListadoSolicitudes[$i]['FECHACARGA']); ?></td>



                      <td><?php echo formatearFecha($ListadoSolicitudes[$i]['FECHARESOLUCION']); ?></td>
                       
                     <td><?php echo $IdUsuario['NOMBRE']."<br>".$IdUsuario['APELLIDO'] ; ?>
                      </td>
                     
                      <td> 
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                    </tr>
                    <?php $MensajeSumaSolicitudes++; ?>
                    <?php } ?>
                    
                    <?php } ?>



                    <?php if( $_SESSION['Usuario_Rol'] == 'Analista'  ) { ?>
                      
                      <?php if( $ListadoSolicitudes[$i]['ID_TIPOSOLICITUD'] == 2 || $ListadoSolicitudes[$i]['ID_TIPOSOLICITUD'] == 1) { ?>
                      
                      <tr class="<?php echo colorTipoSolicitud($ListadoSolicitudes[$i]['ID_TIPOSOLICITUD']); ?>">
  
                      
                      <td><?php echo $ListadoSolicitudes[$i]['ID']; ?></td>
                      <td><?php echo $ListadoSolicitudes[$i]['TITULO']; ?></td>
                      <?php 
                      $descripcion= $ListadoSolicitudes[$i]['DESCRIPCION'];
                      $palabras= str_word_count($descripcion, 1);

                      $primeras_20_palabras= implode(' ', array_slice($palabras, 0 ,20));
                      ?>
                      <td><?php echo $primeras_20_palabras; ?></td>
                      <td><?php echo conocerTipoSolcitud($ListadoSolicitudes[$i]['ID_TIPOSOLICITUD']); ?></td>

                      <?php 
                      
                      ?>
                      <td><?php echo formatearFecha($ListadoSolicitudes[$i]['FECHACARGA']); ?></td>



                      <td><?php echo formatearFecha($ListadoSolicitudes[$i]['FECHARESOLUCION']); ?></td>
                       
                     <td><?php echo $IdUsuario['NOMBRE']."<br>".$IdUsuario['APELLIDO'] ; ?>
                      </td>
                     
                      <td> 
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                    </tr>
                    <?php $MensajeSumaSolicitudes++; ?>
                      <?php } ?>
                      
                      <?php } ?>


                    





                   



                    <?php  } ?>
             

                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="clearfix">
          <?php echo $MensajeSumaSolicitudes; ?>
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