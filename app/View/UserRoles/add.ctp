<?php
if (!Configure::read('debug')):
throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
if (Configure::read('debug') > 0):
Debugger::checkSecurityKeys();
endif;

$user = AuthComponent::user();
$username = $user['username'];
$userRut = $user['rut'];
$userid = $user['id'];
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Añadir Relación</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('UserRole'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label>Seleccione Usuario</label>
                    <?php 
                    echo '<select id="UserRoleIdUser" name="data[UserRole][id_user]> required="required" class="form-control">';
                    echo '<option selected="true" style="display:none;">Seleccione Usuario</option>';
                    foreach ($options1 as $option1):
                        echo '<option   value="'.$option1['User']['id'].'">';
                        echo $option1['User']['rut'].' - '.$option1['User']['username'];
                    echo '</option>';
                    endforeach;
                    echo '</select>';
                    ?>
                </div>
                <div class="form-group">
                    <label>Seleccione Rol</label>
                    <?php 
                    echo '</select>';
                    echo '<select id="UserRoleIdRole" name="data[UserRole][id_role] required="required" class="form-control">';
                    echo '<option selected="true" style="display:none;">Seleccione Rol</option>';
                    foreach ($options as $option):
                        echo '<option  value="'.$option['Role']['id'].'">';
                        echo $option['Role']['role_name'];
                    echo '</option>';
                    endforeach;
                    echo '</select>';
                    ?>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <?php 
                    echo $this->Form->submit(__('Añadir Relación',true), array('class'=>'btn btn-primary')); 
                    echo $this->Form->end();
                ?>
            </div>
        </div><!-- /.box -->
        <?php echo $this->Html->link(__('LISTA'), array('action' => 'index'), array( 'class' => 'btn btn-primary btn-block')); ?>
    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
    </div><!--/.col (right) -->
</div>   <!-- /.row -->