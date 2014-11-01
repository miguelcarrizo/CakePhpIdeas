<?php if ($this->Session->read('Auth.User')) { ?>
    <a class='btn btn-primary' href="/Scenarios/add">Nuevo Escenario</a>
<?php } ?>
    
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
  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Escenarios</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>Valor</th>
                                            <th>Estado</th> 
                                            <th>Idea</th>
                                            <th>Driver</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            </tr>
                                        </thead>
    <?php foreach($scenarios as $scenario): ?>
<tbody>
    <tr>
        <td><?php echo $scenario['Scenario']['id'] ?></td>
        <td><?php echo $scenario['Scenario']['value'] ?></td>
        <td><?php echo $scenario['Scenario']['status'] ?></td>
        <td>
        <?php foreach ($optionsIdeas as $optionsIdea): 
        if($optionsIdea['Idea']['id']==$scenario['Scenario']['id_idea'])
        echo $optionsIdea['Idea']['name'].' - '.$optionsIdea['Idea']['area'];
        endforeach;?>
        </td>
        <td>
        <?php foreach ($optionsDrivers as $optionsDriver): 
        if($optionsDriver['Driver']['id']==$scenario['Scenario']['id_driver'])
        echo $optionsDriver['Driver']['name'];
        endforeach;?>
        </td>
                        <!--Menu Herramientas-->
        <td><?php echo $this->Html->link($this->Html->image('Edit.png'),array('action' => 'edit', $scenario['Scenario']['id']), array('escape' => false));?></td>
        <td><?php echo $this->Form->postLink(
        $this->Html->image('Delete.png', array(
            'alt' => 'Delete',
            'title' => 'Delete'
        )),
        array('action' => 'delete', $scenario['Scenario']['id']),array(
        'escape' => false ), __('Esta seguro de eliminar el escenario # %s?', $scenario['Scenario']['id'])); ?></td>
        
                                                        </tr>
                                                </tbody>
                                                <?php endforeach; ?>
                                        <tfoot>
                                            <tr>
                                            <th>ID</th>
                                            <th>Valor</th>
                                            <th>Estado</th> 
                                            <th>Idea</th>
                                            <th>Driver</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <!-- DATA TABES SCRIPT -->
        <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../js/AdminLTE/demo.js" type="text/javascript"></script>
        