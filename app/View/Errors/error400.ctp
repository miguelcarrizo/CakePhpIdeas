<?php
/**
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');

if (Configure::read('debug') > 0):
	Debugger::checkSecurityKeys();
endif;


?>
<section id="banner1">
                
                        <section id="lateralcontenido">
                            <div class="inner4">
                                <div id='cssmenu'>
                                    <ul>
                                       <li><a href='http://php-sistemaideas.rhcloud.com/'><span>Home</span></a></li>
                                       <li class='active'><a href='http://php-sistemaideas.rhcloud.com/users/'><span>Administrador de Usuarios</span></a></li>
                                       <li><a href='http://php-sistemaideas.rhcloud.com/viewIdeas/view'><span>Ideas</span></a></li>
                                       <li><a href='http://php-sistemaideas.rhcloud.com/viewPlanEstrat/view'><span>Plan estratégico</span></a></li>
                                       <li><a href='http://php-sistemaideas.rhcloud.com/viewAnalisisCart/view'><span>Análisis de cartera</span></a></li>
                                       <li class='last'><a href='http://php-sistemaideas.rhcloud.com/viewAutorizacion/view'><span>Autorización</span></a></li>
                                    </ul>
                                    </div>
                                <div id="contenido">
                                    <div class="innercontenido">
                                        <h2><?php echo $name; ?></h2>
                                        <p class="error">
                                                <strong><?php echo __d('cake', 'Error'); ?>: </strong>
                                                <?php printf(
                                                        __d('cake', 'The requested address %s was not found on this server.'),
                                                        "<strong>'{$url}'</strong>"
                                                ); ?>
                                        </p>
                                        <?php
                                        if (Configure::read('debug') > 0):
                                                echo $this->element('exception_stack_trace');
                                        endif;
                                        ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                                
                        </section>
             
</section>