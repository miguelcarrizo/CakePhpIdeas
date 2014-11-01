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
                                
                                <div id="contenido">
                                    <div class="innercontenido">
                                      <header>
                                        <h3>Home</h3>
                                        </header>
                                        <p style="height: 200px;">Contenido</p>
                                        <p style="height: 200px;">Contenido</p>
                                        <p style="height: 100px;">Contenido</p>  
                                    </div>
                                    
                                </div>
                                
                            </div>
                                
                        </section>
</section>