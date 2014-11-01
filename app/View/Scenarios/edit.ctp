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
                <h3 class="box-title">Editar Escenario</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Scenario'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label>Valor</label>
                    <?php echo $this->Form->input('Scenario.value',array('label' =>false, 'type' => 'text', 'placeholder'=>'Valor', 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <?php echo $this->Form->input('Scenario.status', array(
                    'options' => array('Activo' => 'Activo', 'Inactivo' => 'Inactivo'), 'label' =>false, 'placeholder'=>'Estado del Rol'
                    , 'class'=>'form-control'));?>
                </div>
                <div class="form-group">
                    <label>Seleccione Idea</label>
                    <?php 
                    echo '<select id="ScenarioIdIdea" required="required"  name="data[Scenario][id_idea]" class="form-control">';
                    echo '<option selected="true" style="display:none;">Seleccione Idea</option>';
                    foreach ($optionsIdeas as $optionsIdea):
                        if($optionsIdea['Idea']['id']==$this->Form->value('Scenario.id_idea')){
                            echo '<option selected="true"  value="'.$optionsIdea['Idea']['id'].'">';
                            echo $optionsIdea['Idea']['name'].' - '.$optionsIdea['Idea']['area'];
                            echo '</option>';   
                        }else{
                            echo '<option   value="'.$optionsIdea['Idea']['id'].'">';
                            echo $optionsIdea['Idea']['name'].' - '.$optionsIdea['Idea']['area'];
                            echo '</option>';
                        }
                    endforeach;
                    echo '</select>';
                    ?>
                </div>
                <div class="form-group">
                    <label>Seleccione Driver</label>
                    <?php 
                    echo '<select id="ScenarioIdDriver" required="required"  name="data[Scenario][id_driver]" class="form-control">';
                    echo '<option selected="true" style="display:none;">Seleccione Driver</option>';
                    foreach ($optionsDrivers as $optionsDriver):
                        if($option['User']['id']==$this->Form->value('Period.id_user')){
                            echo '<option selected="true"  value="'.$optionsDriver['Driver']['id'].'">';
                            echo $optionsDriver['Driver']['name'];
                            echo '</option>';
                        }else{
                            echo '<option   value="'.$optionsDriver['Driver']['id'].'">';
                            echo $optionsDriver['Driver']['name'];
                            echo '</option>';
                        }
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
                    echo $this->Form->submit(__('Editar Escenario',true), array('class'=>'btn btn-primary')); 
                    echo $this->Form->end();
                ?>
            </div>
        </div><!-- /.box -->
        <?php echo $this->Form->postLink(__('ELIMINAR'), array('action' => 'delete', $this->Form->value('Scenario.id')), array( 'class' => 'btn btn-primary btn-block'), __('Estas seguro de eliminar el escenario # %s?', $this->Form->value('Scenario.id'))); ?>
        <?php echo $this->Html->link(__('LISTA'), array('action' => 'index'), array( 'class' => 'btn btn-primary btn-block')); ?>
    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
    </div><!--/.col (right) -->
</div>   <!-- /.row -->