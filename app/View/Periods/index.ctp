<?php if ($this->Session->read('Auth.User')) { ?>
    <a class='btn btn-primary' href="/Periods/add">Nuevo Periodo</a>
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
                                    <h3 class="box-title">Periodos</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Termino</th> 
                                            <th>Usuario</th> 
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            </tr>
                                        </thead>
    <?php foreach($periods as $period): ?>
                <tbody>
                    <tr>
                        <td><?php echo $period['Period']['id'] ?></td>
                        <td><?php echo $period['Period']['iniciation_date'] ?></td>
                        <td><?php echo $period['Period']['final_date'] ?></td>
                        <td>
                        <?php foreach ($options1 as $option1): 
                        if($option1['User']['id']==$period['Period']['id_user'])
                        echo $option1['User']['rut'].' - '.$option1['User']['username'];
                        endforeach;?>
                        </td>
                        <!--Menu Herramientas-->
        <td><?php echo $this->Html->link($this->Html->image('Edit.png'),array('action' => 'edit', $period['Period']['id']), array('escape' => false));?></td>
        <td><?php echo $this->Form->postLink(
        $this->Html->image('Delete.png', array(
            'alt' => 'Delete',
            'title' => 'Delete'
        )),
        array('action' => 'delete', $period['Period']['id']),array(
        'escape' => false ), __('Esta seguro de eliminar el periodo # %s?', $period['Period']['id'])); ?></td>
        
                                                        </tr>
                                                </tbody>
                                                <?php endforeach; ?>
                                        <tfoot>
                                            <tr>
                                            <th>ID</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Termino</th> 
                                            <th>Usuario</th> 
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
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
