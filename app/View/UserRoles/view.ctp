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
                                                <li><a href=''><span>Periodo de Trabajo</span></a></li>
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
                                <div id="contenido">
                                    <div class="innercontenido">
                                      <header>
                                        <h3>Ver Relación    </h3>
                                      </header>
                                      <div class="users view">
                                        <div class="datagrid">
                                                <table>
                                                        <tbody>
<tr>
                                              <td><?php echo __('Id'); ?></td>
                                              <td><?php echo h($userRole['UserRole']['id']); ?></td>
                                            </tr>
                                            <tr>
                                              <td><?php echo __('Nombre Rol Relación'); ?></td>
                                              <td><?php echo h($userRole['UserRole']['id_user']); ?></td>
                                            </tr>
                                            <tr>
                                              <td><?php echo __('Nombre Usuario Relación'); ?></td>
                                              <td><?php echo h($userRole['UserRole']['id_role']); ?></td>
                                            </tr>
                                                        </tbody>
                                                </table>   
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <ul>
                                        <li><?php echo $this->Html->link(__('EDITAR RELACION'), array('action' => 'edit', $userRole['UserRole']['id']), array( 'class' => 'botonForm')); ?> </li>
                                        <li><?php echo $this->Form->postLink(__('ELIMINAR'), array('action' => 'delete', $userRole['UserRole']['id']), array( 'class' => 'botonForm'), __('Are you sure you want to delete # %s?', $userRole['UserRole']['id'])); ?> </li>
                                        <li><?php echo $this->Html->link(__('LISTA'), array('action' => 'index'), array( 'class' => 'botonForm')); ?> </li>
                                        <li><?php echo $this->Html->link(__('NUEVO'), array('action' => 'add'), array( 'class' => 'botonForm')); ?> </li>
                                        </ul>
                                    </div> 
                                    </div>
                                    
                                </div>
                                
                            </div>
                                
                        </section>
             
</section>