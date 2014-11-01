<?php if ($this->Session->read('Auth.User')) { ?>
    <a class='btn btn-primary' href="/Drivers/add">Nuevo Driver</a>
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
                                    <h3 class="box-title">Drivers</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Valorización</th> 
                                                <th>Usuario</th>
                                                <th>Periodo</th> 
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <?php foreach($drivers as $driver): ?>
                                                <tbody>
                                                    <tr>
        <td><?php echo $driver['Driver']['id'] ?></td>
        <td><?php echo $driver['Driver']['name'] ?></td>
        <td><?php echo $driver['Driver']['value'] ?></td>
        <td>
        <?php foreach ($options1 as $option1): 
        if($option1['User']['id']==$driver['Driver']['id_user'])
        echo $option1['User']['rut'].' - '.$option1['User']['username'];
        endforeach;?>
        </td>
        <td>
        <?php foreach ($options4 as $option4): 
        if($option4['Period']['id']==$driver['Driver']['id_period'])
        echo 'De '.$option4['Period']['iniciation_date'].' a '.$option4['Period']['final_date'];
        endforeach;?>
        </td>
        <!--Menu Herramientas-->
        <!--<td><?php //echo $this->Html->link($this->Html->image('Search.png'),array('action' => 'view', $driver['Driver']['id']), array('escape' => false));?></td>-->
        
        <td><?php echo $this->Html->link($this->Html->image('Edit.png'),array('action' => 'edit', $driver['Driver']['id']), array('escape' => false));?></td>
        <td><?php echo $this->Form->postLink(
        $this->Html->image('Delete.png', array(
            'alt' => 'Delete',
            'title' => 'Delete'
        )),
        array('action' => 'delete', $driver['Driver']['id']),array(
        'escape' => false ), __('Esta seguro de eliminar el Driver # %s?', $driver['Driver']['id'])); ?></td>
                                                    </tr>
                                                </tbody>
                                                <?php endforeach; ?>
                                        <tfoot>
                                            <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Valorización</th> 
                                            <th>Usuario</th>
                                            <th>Periodo</th> 
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