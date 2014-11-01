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
                <h3 class="box-title">Añadir Periodo</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Period'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label>Valor de driver</label>
                    <?php echo $this->Form->input('Idea.name',array('label' =>false, 'type' => 'text', 'placeholder'=>'Nombre', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Valor de driver</label>
                    <?php echo $this->Form->input('Period.iniciation_date',array('label' =>false, 'type' => 'text', 'placeholder'=>'Fecha Inicio ej: 2014-10-09', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Valor de driver</label>
                    <?php echo $this->Form->input('Period.final_date',array('label' =>false, 'type' => 'text', 'placeholder'=>'Fecha Fin ej: 2014-10-09', 'class'=>'form-control')); ?>
                </div>
                <div class="form-group">
                    <label>Valor de driver</label>
                    <?php 
                    echo $this->Form->input('Period.id_user'
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
                    echo $this->Form->submit(__('Añadir Periodo',true), array('class'=>'btn btn-primary')); 
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
