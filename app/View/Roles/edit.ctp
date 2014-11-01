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
                    <h3 class="box-title">Editar Rol</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Role'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label>Nombre del Rol</label>
                    <?php echo $this->Form->input('Role.role_name',array('label' =>false, 'placeholder'=>'Nombre del Rol', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Estado del Rol</label>
                    <?php echo $this->Form->input('Role.role_status', array(
                                                        'options' => array('Activo' => 'Activo', 'Inactivo' => 'Inactivo'), 'label' =>false, 'placeholder'=>'Estado del Rol'
                                                    , 'class'=>'form-control'));?>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <?php 
                    echo $this->Form->submit(__('Editar Rol',true), array('class'=>'btn btn-primary')); 
                    echo $this->Form->end();
                ?>
            </div>
        </div><!-- /.box -->
        <?php echo $this->Form->postLink(__('ELIMINAR'), 
                                                    array('action' => 'delete', $this->Form->value('Role.id')), 
                                                    array( 'class' => 'btn btn-primary btn-block'),
                                                    __('Estas seguro de eliminar el rol # %s?', $this->Form->value('Role.id')
                                                            )); ?>
        <?php echo $this->Html->link(__('LISTA'), array('action' => 'index'), array( 'class' => 'btn btn-primary btn-block')); ?>
    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
    </div><!--/.col (right) -->
</div>   <!-- /.row -->