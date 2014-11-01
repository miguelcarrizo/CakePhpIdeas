



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
                                        <h3>Ver Idea</h3>
                                      </header>
                                      <div class="formulario"> 
                                        <div class="datagrid">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                      <td><?php echo __('Id'); ?></td>
                                                      <td><?php echo h($idea['Idea']['id']); ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td><?php echo __('Nombre'); ?></td>
                                                      <td><?php echo h($idea['Idea']['name']); ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td><?php echo __('Valor Aproximado'); ?></td>
                                                      <td><?php echo h($idea['Idea']['aprox_value']); ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td><?php echo __('VAN'); ?></td>
                                                      <td><?php echo h($idea['Idea']['van']); ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td><?php echo __('TIR'); ?></td>
                                                      <td><?php echo h($idea['Idea']['tir']); ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td><?php echo __('Area'); ?></td>
                                                      <td><?php echo h($idea['Idea']['area']); ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td><?php echo __('Usuario'); ?></td>
                                                      <td><?php echo h($idea['Idea']['id_user']); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>   
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <ul>
                                        <li><?php echo $this->Html->link(__('EDITAR IDEA'),array('action' => 'edit', $idea['Idea']['id']), array( 'class' => 'botonForm')); ?> </li>
                                        <li><?php echo $this->Form->postLink(__('ELIMINAR'), array('action' => 'delete', $idea['Idea']['id']), array( 'class' => 'botonForm'), __('Are you sure you want to delete # %s?', $idea['Idea']['id'])); ?> </li>
                                        <li><?php echo $this->Html->link(__('LISTA'), array('action' => 'index'), array( 'class' => 'botonForm')); ?> </li>
                                        <li><?php echo $this->Html->link(__('NUEVO'), array('action' => 'add'), array( 'class' => 'botonForm')); ?> </li>
                                        </ul>
                                    </div> 
                                    </div>
                                    
                                </div>
                                
                            </div>
                                
                        </section>
             
</section>