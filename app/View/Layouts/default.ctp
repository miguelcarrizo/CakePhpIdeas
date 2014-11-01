<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$user = AuthComponent::user();
$username = $user['username'];
$userRut = $user['rut'];
$userid = $user['id'];
$cakeDescription = __d('cake_dev','SAIPE by MC & CH');

foreach ($UserRoles as $UserRole):
    if($userid==$UserRole['UserRole']['id_user']){
        $roleid = $UserRole['UserRole']['id_role'];
    foreach ($Roles as $Role):
    if($roleid==$Role['Role']['id']){
        $rolename = $Role['Role']['role_name'];
    }
    endforeach;
    }
endforeach;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Saipe</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
         
        <?php
        //<!-- Morris chart -->
        echo $this->Html->css('morris/morris');
        //<!-- jvectormap -->
        echo $this->Html->css('jvectormap/jquery-jvectormap-1.2.2');
        //<!-- Date Picker -->
        echo $this->Html->css('datepicker/datepicker3');
        //<!-- Daterange picker -->
        echo $this->Html->css('daterangepicker/daterangepicker-bs3');
        //<!-- bootstrap wysihtml5 - text editor -->
        echo $this->Html->css('bootstrap-wysihtml5/bootstrap3-wysihtml5.min');
        //<!-- Theme style -->
        echo $this->Html->css('AdminLTE');
        echo $this->Html->meta('icon');
        
        echo $this->Html->script('jquery-2.1.1');
        
        // Want to send some glabal values to your scripts?
        $this->Js->set(array(
            'TEST' => 'Hello World',
            'ROOT' => $this->Html->url( '/', true)
        ));
        echo $this->Js->writeBuffer(array('onDomReady' => false));
        

        // Include any other scripts you've set
        
        echo $this->fetch('script');
        

        echo $this->fetch('meta');
        echo $this->fetch('css');
        //echo $this->Html->script('jquery');
        echo $scripts_for_layout;
        echo $this->Js->writeBuffer(array('cache' => TRUE));
        
        
	?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Sistema de ideas SAIPE
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <?php if ($this->Session->read('Auth.User')) { ?>
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <?php } ?>
                
                <?php if ($this->Session->read('Auth.User')) { ?>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Link para ver el diseño del sistema -->
                        <li class="">
                            <a href="http://design-sistemaideas.rhcloud.com/index.html" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-bookmark"></i>
                                <span>Diseño del Sistema</span>
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $username; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../../img/amp.jpg" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $username; ?> - <?php echo $userRut; ?>
                                        <small>Rol: <?php echo $rolename;?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="http://php-sistemaideas.rhcloud.com/users/logout" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php } ?>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php if ($this->Session->read('Auth.User')) { ?>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../../img/amp.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?php echo $username; ?></p>

                            <a href="#"><i class="fa fa-circle text-aqua"></i> Rol: <?php echo $rolename;?></a>
                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="/">
                                <i class="fa fa-home"></i> <span>Home</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Usuarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/users/"><i class="fa fa-angle-double-right"></i> Usuario</a></li>
                                <li><a href="/User_roles/"><i class="fa fa-angle-double-right"></i> Rol Usuario</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/Ideas/">
                                <i class="fa fa-exclamation"></i> <span>Ideas</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pencil"></i>
                                <span>Plan estratégico</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/Periods/"><i class="fa fa-angle-double-right"></i> Periodo de Trabajo</a></li>
                                <li><a href="/Drivers/"><i class="fa fa-angle-double-right"></i> Definición Drivers</a></li>
                                <li><a href="/Drivers/valoracion"><i class="fa fa-angle-double-right"></i> Valoración Drivers</a></li>
                                <li><a href="/Scenarios/categorizacion"><i class="fa fa-angle-double-right"></i> Categorización Drivers</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Evaluación Drivers</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i> <span>Análisis de cartera</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/forms/general.html"><i class="fa fa-angle-double-right"></i> Selección Ideas</a></li>
                                <li><a href="pages/forms/advanced.html"><i class="fa fa-angle-double-right"></i> Priorización Ideas</a></li>
                                <li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Balanceo Portafolio</a></li>
                                <li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Revisión</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-check"></i> <span>Autorización</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-file-text-o"></i> <span>Reportes</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cog"></i> <span>Configuración</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/DriverRatings/"><i class="fa fa-angle-double-right"></i> Valores Drivers</a></li>
                                <li><a href="/roles/"><i class="fa fa-angle-double-right"></i> Rol</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <?php } ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <?php if ($this->Session->read('Auth.User')) { ?>
            <aside class="right-side">
            <?php } ?>
                <?php if ($this->Session->read('Auth.User')) { ?>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Home
                        <small>Sistema de ideas SAIPE</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active"> </li>
                    </ol>
                </section>
                <?php } ?>
                <!-- Main content -->
                <section class="content">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                </section><!-- /.content -->
            <?php if ($this->Session->read('Auth.User')) { ?>
            </aside><!-- /.right-side -->
            <?php } ?>
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../js/plugins/morris/morris.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="/../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="/../../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../../js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../../js/AdminLTE/demo.js" type="text/javascript"></script>
    
      <?php  echo $this->Js->writeBuffer(); ?>
    </body>
</html>