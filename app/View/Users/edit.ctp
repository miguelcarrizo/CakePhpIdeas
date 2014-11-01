<?php
if (!Configure::read('debug')):
throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
if (Configure::read('debug') > 0):
Debugger::checkSecurityKeys();
endif;
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Añadir Usuario</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('User'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label>Rut</label>
                    <?php echo $this->Form->input('User.rut',array('label' =>false, 'type' => 'text', 'placeholder'=>'Rut', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <?php echo $this->Form->input('User.username',array('label' =>false, 'placeholder'=>'Nombre', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Apellido</label>
                    <?php echo $this->Form->input('User.userlastname',array('label' =>false, 'placeholder'=>'Apellido', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <?php echo $this->Form->input('User.user_email',array('label' =>false, 'placeholder'=>'Correo', 'class'=>'form-control'));  ?>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <?php echo $this->Form->input('User.password',array('label' =>false, 'placeholder'=>'Contraseña', 'type' => 'password', 'class'=>'form-control')); ?>
                </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
                <?php 
                    echo $this->Form->submit(__('Modificar Usuario',true), array('class'=>'btn btn-primary')); 
                    echo $this->Form->end();
                ?>
            </div>
        </div><!-- /.box -->
        <?php echo $this->Form->postLink(__('ELIMINAR'),
        array('action' => 'delete', $this->Form->value('User.id')), 
        array( 'class' => 'btn btn-primary btn-block'),
        __('Estas seguro de eliminar el Usuario # %s?', $this->Form->value('User.id'))); ?>
         <?php echo $this->Html->link(__('LISTA'), array('action' => 'index'), array( 'class' => 'btn btn-primary btn-block')); ?>
           
        
    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
    </div><!--/.col (right) -->
</div>   <!-- /.row -->