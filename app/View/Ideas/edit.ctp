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
                <h3 class="box-title">Editar Idea</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Idea'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label>Nombre</label>
                    <?php echo $this->Form->input('Idea.name',array('label' =>false, 'type' => 'text', 'placeholder'=>'Nombre', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Valor Aproximado</label>
                    <?php echo $this->Form->input('Idea.aprox_value',array('label' =>false, 'type' => 'text', 'placeholder'=>'Valor Aproximado', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>VAN</label>
                    <?php echo $this->Form->input('Idea.van',array('label' =>false, 'type' => 'text', 'placeholder'=>'VAN', 'class'=>'form-control')); ?>
                </div>
                <div class="form-group">
                    <label>TIR</label>
                    <?php echo $this->Form->input('Idea.tir',array('label' =>false, 'type' => 'text', 'placeholder'=>'TIR', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Area</label>
                    <?php echo $this->Form->input('Idea.area',array('label' =>false, 'type' => 'text', 'placeholder'=>'Area', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Usuario</label>
                    <?php 
                    echo $this->Form->input('Driver.id_user'
                            ,array('label' =>false
                                , 'type' => 'hidden'
                                , 'default' => $userid));
                    echo $this->Form->input(''
                            ,array('label' =>false
                                , 'type' => 'text'
                                , 'class' => 'form-control'
                                , 'disabled' => 'disabled'
                                , 'default' => 'Usuario: '.$username.' - RUT: '.$userRut
                                , 'name' => false
                                , 'id' => false));?>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <?php 
                    echo $this->Form->submit(__('Editar Idea',true), array('class'=>'btn btn-primary')); 
                    echo $this->Form->end();
                ?>
            </div>
        </div><!-- /.box -->
        <?php echo $this->Form->postLink(__('ELIMINAR'), array('action' => 'delete', $this->Form->value('Idea.id')), array( 'class' => 'btn btn-primary btn-block'), __('Estas seguro de eliminar la idea # %s?', $this->Form->value('Idea.id'))); ?>
        <?php echo $this->Html->link(__('LISTA'), array('action' => 'index'), array( 'class' => 'btn btn-primary btn-block')); ?>
    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
    </div><!--/.col (right) -->
</div>   <!-- /.row -->