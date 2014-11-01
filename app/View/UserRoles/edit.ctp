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
                <h3 class="box-title">Editar Relación</h3>
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
                        if($option1['User']['id']==$this->Form->value('UserRole.id_user')){
                            echo '<option selected="true"  value="'.$option1['User']['id'].'">';
                                echo $option1['User']['rut'].' - '.$option1['User']['username'];
                            echo '</option>';
                        }else{
                            echo '<option   value="'.$option1['User']['id'].'">';
                                echo $option1['User']['rut'].' - '.$option1['User']['username'];
                            echo '</option>';
                        }
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
                        if($option['Role']['id']==$this->Form->value('UserRole.id_role')){
                             echo '<option selected="true"  value="'.$option['Role']['id'].'">';
                                echo $option['Role']['role_name'].' - '.$option['Role']['id'];
                            echo '</option>';
                        }else{
                             echo '<option  value="'.$option['Role']['id'].'">';
                                echo $option['Role']['role_name'].' - '.$option['Role']['id'];
                            echo '</option>';
                        }
                    endforeach;
                    echo '</select>';
                    ?>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <?php 
                    echo $this->Form->submit(__('Editar Relación',true), array('class'=>'btn btn-primary')); 
                    echo $this->Form->end();
                ?>
            </div>
        </div><!-- /.box -->
        <?php echo $this->Form->postLink(__('ELIMINAR'), array('action' => 'delete', $this->Form->value('UserRole.id')),array( 'class' => 'btn btn-primary btn-block'), __('Estas seguro de eliminar la relación # %s?', $this->Form->value('UserRole.id'))); ?>
        <?php echo $this->Html->link(__('LISTA'), array('action' => 'index'), array( 'class' => 'btn btn-primary btn-block')); ?>
    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
    </div><!--/.col (right) -->
</div>   <!-- /.row -->
