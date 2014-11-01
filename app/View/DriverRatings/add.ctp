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
                <h3 class="box-title">Añadir Valor de driver</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('DriverRating'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label>Valor de driver</label>
                    <?php echo $this->Form->input('DriverRating.rating',array('label' =>false, 'placeholder'=>'Valor de driver', 'class'=>'form-control'));?>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <?php 
                    echo $this->Form->submit(__('Añadir Valor de driver',true), array('class'=>'btn btn-primary')); 
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
