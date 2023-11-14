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
    $SumaSolicitudes=0 ;

    

   
    
  



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->   
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Listado - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
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
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/team/<?php echo $_SESSION['Usuario_Imagen']; ?>" alt="<?php echo $_SESSION['Usuario_Nombre']; ?>">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['Usuario_Nombre']. ' '.$_SESSION['Usuario_Apellido']; ?></p>
          <p class="app-sideba__user-designation"><?php echo $_SESSION['Usuario_Rol']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>

        <li><a class="app-menu__item" href="carga.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Registro</span></a></li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="listado.php"><i class="icon fa fa-circle-o"></i> Listado de solicitudes</a></li>
            <!--otros listados
            <li><a class="treeview-item" href="listado.html"><i class="icon fa fa-circle-o"></i> Listado2</a></li>
            <li><a class="treeview-item" href="listado.html"><i class="icon fa fa-circle-o"></i> Listado3</a></li>            
            -->
          </ul>
        </li>
      </ul>
    </aside>
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
            <h3 class="tile-title">Solicitudes <?php echo 'Nro'.$SumaSolicitudes ?></h3>
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
                     ?>


                  
                  
                  <?php for ($i=0; $i<$Cantidad_ListadoSolicitudes; $i++) { ?>

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
                      require_once 'funciones/formatear_fecha.php';
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
                      require_once 'funciones/formatear_fecha.php';
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
                      require_once 'funciones/formatear_fecha.php';
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
                      require_once 'funciones/formatear_fecha.php';
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
                      <?php } ?>
                      <?php } ?>













                    <?php } ?>


                   
                     
                 





                    







                 
             

                  <!--<tr class="table-info">
                    <td>2</td>
                    <td>Modificar lista de precios</td>
                    <td>Generar cálculo automático de precio segun variación del dólar.</td>
                    <td>Desarrollo nueva funcionalidad </td>
                    <td>01/11/2023 12:55:56</td>
                    <td>03/11/2023 12:55:56</td>
                    <td>Gisela Marquez</td>
                    <td>
                      <a href="#">Ver detalles...</a>
                      <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                    </td>
                  </tr>
                 
                  <tr class="table-danger">
                      <td>3</td>
                      <td>Sin acceso a la VPN</td>
                      <td>Solicito me habiliten el ingreso a la red de la empresa</td>
                      <td>Soporte tecnico</td>
                      <td>01/11/2023 13:55:21</td>
                      <td>02/11/2023 13:55:21</td>
                      <td>Martin Cardozo</td>
                      <td>
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                  </tr>

                  <tr class="table-warning">
                      <td>4</td>
                      <td>No muestra mensaje al fallar la clave de acceso</td>
                      <td>En acceso al sistema debe mostrar mensaje si hay fallo en la clave.</td>
                      <td>Reporte de error</td>
                      <td>02/11/2023 08:25:42</td>
                      <td>05/11/2023 08:25:42</td>
                      <td>Paola Torres</td>
                      <td>
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                  </tr>
                  
                  <tr class="table-warning">
                      <td>5</td>
                      <td>En el login, se ve mensaje</td>
                      <td>Al ingresar al equipo de trabajo con mi login y clave, veo error de conexion con la base de datos.</td>
                      <td>Reporte de Error</td>
                      <td>02/11/2023 14:30:15</td>
                      <td>09/11/2023 14:30:15</td>
                      <td>Mario Gimenez</td> 
                      <td>
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                  </tr> -->

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
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