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
?>
<!DOCTYPE HTML>
<html>
    <head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('skel');
        echo $this->Html->css('style');
        echo $this->Html->css('style-noscript');

        echo $this->Html->script('jquery.min');
        echo $this->Html->script('jquery.dropotron.min');
        echo $this->Html->script('skel.min');
        echo $this->Html->script('skel-layers.min');
        echo $this->Html->script('init');
        echo $this->Html->Script('jquery-1.9.1');
        echo $this->Html->Script('jquery-ui');


        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
	?>
        <script>
                $(document).ready(function()
                {
                    $(".login2").hide();

                    $("#ingresar").click(function()
                    {
                        $(".login2").show(1000);
                        $(".inner2").hide(1000);
                    });
                    
                    $("#ingresar2").click(function()
                    {
                        $(".login2").show(1000);
                        $(".inner2").hide(1000);
                    });
                });
                </script>
    </head>
    <body class="index loading">
        <!-- Header -->
        <header id="header" class="alt">
            <h1 id="logo"><a href="http://php-sistemaideas.rhcloud.com/">SAIPE <span>by MC & CH</span></a></h1>
            <nav id="nav">
                <ul>
                    <?php if ($this->Session->read('Auth.User')) { ?>
                    <li class="current"><a href="">Bienvenido,</a><?php echo $username; ?></li>
                    <?php }else{ ?>
                    <li class="current"><a href="">Bienvenido</a></li>
                    <?php } ?>
                    
                    <li class="current"><a href="http://design-sistemaideas.rhcloud.com/index.htm">Diseño del Sistema</a></li>
                    <li class="submenu">
                            <a href="">Ayuda</a>
                            <ul>
                                    <li><a href="">Osiris Consultores</a></li>
                                    <li><a href="http://design-sistemaideas.rhcloud.com/index.htm">Diseño del Sistema</a></li>
                                    <li><a href="">Manuales</a></li>
                                    <li><a href="">Contacto</a></li>
                            </ul>
                    </li>
                    <?php if ($this->Session->read('Auth.User')) { ?>
                        <li><a style='border-radius:5px;' id='ingresar2' href="http://php-sistemaideas.rhcloud.com/users/logout" class='button special'>Logout</a></li>
                    <?php } ?>
                    
                </ul>
              
            </nav>
              <div id='cssmenu'>
            <ul>
               <li><a href='http://php-sistemaideas.rhcloud.com/'><span>Home</span></a></li>
                <li class='active  has-sub'><a href='#'><span>Usuarios</span></a>
                    <ul>
                        <li><a href='http://php-sistemaideas.rhcloud.com/users/'><span>Usuario</span></a></li>
                        <li><a href='http://php-sistemaideas.rhcloud.com/User_roles/'><span>Rol Usuario</span></a></li>
                    </ul>
                </li>
                <li><a href='http://php-sistemaideas.rhcloud.com/Ideas/'><span>Ideas</span></a></li>
                <li class='active  has-sub'><a href=''><span>Plan estratégico</span></a>
                    <ul>
                        <li><a href='http://php-sistemaideas.rhcloud.com/Periods/'><span>Periodo de Trabajo</span></a></li>
                        <li><a href='http://php-sistemaideas.rhcloud.com/Drivers/'><span>Definición Drivers</span></a></li>
                        <li><a href=''><span>Valoración Drivers</span></a></li>
                        <li><a href=''><span>Categorización Drivers</span></a></li>
                        <li><a href=''><span>Evaluación Drivers</span></a></li>
                    </ul>
                </li>
                <li class='has-sub'><a href=''><span>Análisis de cartera</span></a>
                    <ul>
                        <li><a href=''><span>Selección Ideas</span></a></li>
                        <li><a href=''><span>Priorización Ideas</span></a></li>
                        <li><a href=''><span>Balanceo Portafolio</span></a></li>
                        <li><a href=''><span>Revisión Reportes</span></a></li>
                    </ul>
                </li>
                <li><a href=''><span>Autorización</span></a></li>
                <li class='has-sub'><a href=''><span>Configuración</span></a>
                    <ul>
                        <li><a href='http://php-sistemaideas.rhcloud.com/DriverRatings/'><span>Valores Drivers</span></a></li>
                        <li><a href='http://php-sistemaideas.rhcloud.com/roles/'><span>Rol</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        </header>
        
                    <!--<div id="header">
                            <h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
                    </div>-->
      
        <!-- Contenido -->            
        <div>
              <!-- Menu -->                 
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>

        <footer id="footer" >
            <span class="copyright">&copy; MC & CH. Design: <a href="#">MC & CH</a>.</span>
        </footer>
        <?php //echo $this->Html->link($this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),'http://www.cakephp.org/',array('target' => '_blank', 'escape' => false));?>	
        <?php
        // Remove this sql_dump to allow DebugKit to handle more advanced SQL display
        // echo $this->element('sql_dump');
        ?>
    </body>
</html>
