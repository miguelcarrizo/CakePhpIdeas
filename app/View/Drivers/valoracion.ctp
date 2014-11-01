<?php if ($this->Session->read('Auth.User')) { ?>
    <a class='btn btn-primary' href="/Drivers/add">Nuevo Driver</a>
<?php } ?>
<?php
/**
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');

if (Configure::read('debug') > 0):
	Debugger::checkSecurityKeys();
endif;


?>
    <script>
        $("#DriverValue").change(function () {
          alert("Entró al ajax");
          var str = "";
          $("#DriverValue option:selected").each(function () {
                str += $(this).text() + ",";
              });
          $.ajax({
          type: "POST",
          url: "/Drivers/edit/".$(this),
          data: { values: str }
        }).done(function( msg ) {
          alert( "Data Saved: " + msg );
        });
        })
        .trigger('change');
    </script>
    <script>
    function ActualizaDb(a,b) {
     //alert("Actualiza db");  
     //$.post("buh.php", $("#form").serialize());
     var str = "";
     var str2 = "";
     //alert("id: "+a);  
     //alert("id: "+a);  
     //alert("#DriverValue'"+b+"' option:selected"); 
          $("#DriverValue"+b+" option:selected").each(function () {
                //str = $(this).text();
                str2 = $(this).val();
              });
          //valorselect = $("#DriverValue"+b+"  option:selected").val();         
          //alert(valorselect);    
          
          //alert(str2);
          //alert(b);
          $.ajax({
          type: "POST",
          url: '/Drivers/edit/'+a,
          data: { value: str2}
        }).done(function( msg ) {
          //alert( "Data Saved: " + msg );
        });
        }
    </script>
    <script>
        $(document).ready(function() {
            //alert(window.app.TEST + ' sent from ' + window.app.ROOT);
        });
    </script>
  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Drivers</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Periodo</th> 
                                                <th>Valorización</th> 
                                            </tr>
                                        </thead>
                                        <?php 
                                        $count=0;
                                        foreach($drivers as $driver): ?>
                                                <tbody>
                                                    <tr>
        <td><?php echo $driver['Driver']['id'] ?></td>
        <td><?php echo $driver['Driver']['name'] ?></td>
        <td>
        <?php foreach ($options4 as $option4): 
        if($option4['Period']['id']==$driver['Driver']['id_period'])
        echo 'De '.$option4['Period']['iniciation_date'].' a '.$option4['Period']['final_date'];
        endforeach;?>
        </td>
        <td>
            <?php
            $var1 = $driver['Driver']['id'];
            echo '<select id="DriverValue'.$count.'" name="\''.$count.'\'" required="required" class="form-control" onChange="ActualizaDb(\''.$var1.'\',\''.$count.'\')">';
            echo '<option selected="true" style="display:none;">Seleccione el valor del Driver</option>';
            foreach ($options2 as $option2):
                if($option2['DriverRating']['id']==$driver['Driver']['value']){
                    echo '<option selected="true"  value="'.$option2['DriverRating']['id'].'">';
                        echo $option2['DriverRating']['rating'];
                    echo '</option>';
                }else{
                    echo '<option  value="'.$option2['DriverRating']['id'].'">';
                        echo $option2['DriverRating']['rating'];
                    echo '</option>';
                }
            endforeach;      
            echo '</select>';
            ?>
        </td>
        <!--Menu Herramientas-->
        <!--<td><?php //echo $this->Html->link($this->Html->image('Search.png'),array('action' => 'view', $driver['Driver']['id']), array('escape' => false));?></td>-->
                                                    </tr>
                                                </tbody>
                                                <?php $count++; endforeach; ?>
                                        <tfoot>
                                            <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Periodo</th> 
                                            <th>Valorización</th> 
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
     