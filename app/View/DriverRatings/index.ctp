<?php if ($this->Session->read('Auth.User')) { ?>
    <a class='btn btn-primary' href="/DriverRatings/add"  >Nueva Valorización</a>
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
                                    <h3 class="box-title">Valorización de Driver</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Valor de driver</th>
                                                <th>Ver</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <?php foreach($driverRatings as $driverRating): ?>
                                                <tbody>
                                                    <tr>
        <td><?php echo $driverRating['DriverRating']['rating'] ?></td>
        <!--Menu Herramientas-->
        <td><?php echo $this->Html->link($this->Html->image('Search.png'),array('action' => 'view', $driverRating['DriverRating']['id']), array('escape' => false));?></td>
        <td><?php echo $this->Html->link($this->Html->image('Edit.png'),array('action' => 'edit', $driverRating['DriverRating']['id']), array('escape' => false));?></td>
        <td><?php echo $this->Form->postLink(
        $this->Html->image('Delete.png', array(
            'alt' => 'Delete',
            'title' => 'Delete'
        )),
        array('action' => 'delete', $driverRating['DriverRating']['id']),array(
        'escape' => false ), __('Esta seguro de eliminar el Valor de driver # %s?', $driverRating['DriverRating']['id'] )); ?></td>
                                                    </tr>
                                                </tbody>
                                                <?php endforeach; ?>
                                        <tfoot>
                                            <tr>
                                                <th>Valor de driver</th>
                                                <th>Ver</th>
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