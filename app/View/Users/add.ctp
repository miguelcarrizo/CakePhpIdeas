<?php 
        //echo $this->Html->script('jquery', FALSE);
        echo $this->Html->script('jqueryRut', FALSE);
        //echo $this->Html->script('jquery.validate', FALSE);
        //echo $this->Html->script('jquery-ui', FALSE);
        //echo $this->Html->script('rut', FALSE);
        //echo $this->Html->script('validarut', FALSE);
        //$this->Js->get('#rut_demo_1');
        //$this->Js->Rut();
?>


<?php
if (!Configure::read('debug')):
throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
if (Configure::read('debug') > 0):
Debugger::checkSecurityKeys();
endif;
?>
<script>
function onRutBlur(obj) {
        if (VerificaRut(obj.value))
          alert("Rut correcto");
        else
          alert("Rut incorrecto");
      }
</script>
<script type="text/javascript">
function validar1(form) {
    var rut_demo_1 = form.rut_demo_1.value;
    var count = 0;
    var count2 = 0;
    var factor = 2;
    var suma = 0;
    var sum = 0;
    var digito = 0;
    count2 = rut_demo_1.length - 1;
    while(count < rut_demo_1.length) {

    sum = factor * (parseInt(rut_demo_1.substr(count2,1)));
    suma = suma + sum;
    sum = 0;

    count = count + 1;
    count2 = count2 - 1;
    factor = factor + 1;

    if(factor > 7) {
    factor=2;
    }

    }
    digito = 11 - (suma % 11);

    if (digito == 11) {
    digito = 0;
    }
    if (digito == 10) {
    digito = "k";
    }
    form.dv1.value = digito;
}

function mis_datos(){
var key=window.event.keyCode;
if (key < 48 || key > 57){
window.event.keyCode=0;
}}

function vaciar(control)
{
control.value='';
}

</script> 


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
                    <?php echo $this->Form->input('rut_demo_1',array('label' =>false,'name'=>'rut_demo_1', 'type' => 'text', 'placeholder'=>'Rut', 'class'=>'form-control', 'onblur' => 'validar1(this,form)','onFocus' => 'vaciar(this)'));?>

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
                    echo $this->Form->submit(__('Añadir Usuario',true), array('class'=>'btn btn-primary')); 
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

