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
                <h3 class="box-title">Añadir Driver</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Driver'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label>Nombre</label>
                    <?php echo $this->Form->input('Driver.name',array('label' =>false, 'type' => 'text', 'placeholder'=>'Nombre', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Ingrese el valor del Driver. Ej: 100.</label>
                    <?php echo $this->Form->input('Driver.value',array('label' =>false, 'type' => 'text', 'placeholder'=>'Valor', 'class'=>'form-control'));?>
                </div>
                
                <div class="form-group">
                    <label>Seleccione Periodo</label>
                    <?php 
                    echo '<select id="DriverIdPeriod" name="data[Driver][id_period] required="required" class="form-control">';
                    echo '<option selected="true" style="display:none;">Seleccione Periodo</option>';
                    foreach ($options as $option):
                        echo '<option  value="'.$option['Period']['id'].'">';
                        echo 'De '.$option['Period']['id'].' a '.$option['Period']['iniciation_date'].'-'.$option['Period']['final_date'];
                    echo '</option>';
                    endforeach;
                    echo '</select>';
                    ?>
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
                    echo $this->Form->submit(__('Añadir Driver',true), array('class'=>'btn btn-primary')); 
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
