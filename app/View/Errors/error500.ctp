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
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
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
                                                <?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
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