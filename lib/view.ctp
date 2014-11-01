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
                                       <li class='active  has-sub'><a href='#'><span>Administrador de Usuarios</span></a>
                                        <ul>
                                            <li><a href='http://php-sistemaideas.rhcloud.com/users/'><span>Usuario</span></a></li>
                                            <li><a href='http://php-sistemaideas.rhcloud.com/User_roles/'><span>Rol Usuario</span></a></li>
                                            <li><a href='http://php-sistemaideas.rhcloud.com/roles/'><span>Rol</span></a></li>
                                        </ul>
                                           </li>
                                       <li><a href='http://php-sistemaideas.rhcloud.com/Ideas/'><span>Ideas</span></a></li>
                                       <li class='active  has-sub'><a href=''><span>Plan estratégico</span></a>
                                            <ul>
                                                <li><a href='http://php-sistemaideas.rhcloud.com/Periods/'><span>Periodo de Trabajo</span></a></li>
                                                <li><a href=''><span>Definición Drivers</span></a></li>
                                                <li><a href=''><span>Valoración Drivers</span></a></li>
                                                <li><a href=''><span>Categorización Drivers</span></a></li>
                                                <li><a href=''><span>Evaluación Drivers</span></a></li>
                                            </ul>
                                        </li>
                                       <li><a href=''><span>Análisis de cartera</span></a></li>
                                       <li class='last'><a href=''><span>Autorización</span></a></li>
                                       <li class='last'><a href='http://design-sistemaideas.rhcloud.com/index.htm'><span>Diseño</span></a></li>
                                    </ul>
                                </div>
                                <div id="contenido">
                                    <div class="innercontenido">
                                      <header>
                                        <h3>Ver Rol</h3>
                                      </header>
                                      <div class="users view">
                                        <table border="1">
                                            <tr>
                                              <td><?php echo __('Id'); ?></td>
                                              <td><?php echo h($user_role['User_role']['id']); ?></td>
                                            </tr>
                                            <tr>
                                              <td><?php echo __('Nombre Rol'); ?></td>
                                              <td><?php echo h($user_role['User_role']['id_user']); ?></td>
                                            </tr>
                                            <tr>
                                              <td><?php echo __('Estado Rol'); ?></td>
                                              <td><?php echo h($user_role['User_role']['id_user']); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="actions">
                                        <h3><?php echo __('Actions'); ?></h3>
                                        <ul>
                                        <li><?php echo $this->Html->link(__('Edit Role'), array('action' => 'edit', $user_role['User_role']['id'])); ?> </li>
                                        <li><?php echo $this->Form->postLink(__('Delete Role'), array('action' => 'delete', $user_role['User_role']['id']), null, __('Are you sure you want to delete # %s?', $user_role['User_role']['id'])); ?> </li>
                                        <li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index')); ?> </li>
                                        <li><?php echo $this->Html->link(__('New Role'), array('action' => 'add')); ?> </li>
                                        </ul>
                                    </div> 
                                    </div>
                                    
                                </div>
                                
                            </div>
                                
                        </section>
             
</section>