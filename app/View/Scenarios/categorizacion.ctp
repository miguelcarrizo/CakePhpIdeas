<?php if ($this->Session->read('Auth.User')) { ?>
    <a class='btn btn-primary' href="/Scenarios/add">Nuevo Escenario</a>
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
    function ActualizaCate(a,b,c,d,e,f) {
     //alert("Actualiza db");  
     //$.post("buh.php", $("#form").serialize());
     var str = "";
     var str2 = "";
     var index = '10';
     var status = "scenario entre idea:"+a+", y driver:"+b;
     //alert("id: "+a);  
     //alert("id: "+a);  
     //alert("#DriverValue'"+b+"' option:selected"); 
          $("#DriverValue"+c+d+" option:selected").each(function () {
                //str = $(this).text();
                str2 = $(this).val();
                //str3 = $(this).attr('class');
              });
          //valorselect = $("#DriverValue"+c+","+d+" option:selected").val();         
          //alert(valorselect);    
          //alert("#DriverValue"+c+","+d+" option:selected");
          //alert(str3);
          //alert(e);
          //alert("arreglo columna"+a);
          //alert("arreglo fila"+b);
          //alert("id idea"+c);
          //alert("id driver"+d);
         
        if(e){
            window.alert("edita");
             $.ajax({
                type: "POST",
                url: '/Scenarios/edit/id_idea:'+a+'/ind:'+index+'/id_driver:'+b+'/value:'+str2,
                data: { value: str2, id_idea: a, id_driver: b, ind: index}
              }).done(function( msg ) {
                //alert( "Data Saved: " + msg );
              }); 
          }
          else if(!e){
              $.ajax({
                type: "POST",
                url: '/Scenarios/add/',
                data: { value: str2, id_idea: a, id_driver: b, status: status, ind: index} 
              }).done(function( msg ) {
                //alert( "Data Saved: " + msg );
              }); 
          }
          
        }
</script>
  <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Escenarios</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th>Ideas/Drivers</th>
                                            
                                            <?php foreach ($optionsDrivers as $optionsDriver):
                                            echo '<th>'.$optionsDriver['Driver']['name'].'</th>';
                                            endforeach;?>
                                            </tr>
                                        </thead>
                                                <?php
                                                $count=0;
                                                foreach($optionsIdeas as $optionsIdea): ?>
                                        <tbody>
                                            <tr>
                                                <td><?php $count1=0;
                                                echo $optionsIdea['Idea']['name'] ?>
                                                </td>
                                                <?php 
                                                
                                                foreach ($optionsDrivers as $optionsDriver):
                                                echo '<td>';    
                                                    
                                                
                                                $var1 = $optionsIdea['Idea']['id'];
                                                $var2 = $optionsDriver['Driver']['id'];
                                                $index = 0;
                                               
                                                /*
                                                echo $var1;
                                                echo ",";
                                                echo $var2;
                                                echo ",";
                                                echo $count;
                                                echo ",";
                                                echo $count1;
                                                */
                                                
                                                $idscenario = $var1.$var2;
                                                $countscenario = 0;
                                                foreach($scenarios as $scenario):
                                                    $scen_idea = $scenario['Scenario']['id_idea'];
                                                    $scen_driv = $scenario['Scenario']['id_driver']; 
                                                    if($var1==$scen_idea&&$var2==$scen_driv){
                                                        $countscenario++;
                                                    }
                                                endforeach;
                                                echo 'escenario: ';
                                                echo $countscenario;
                                                if($countscenario==0){
                                                    $existe = false;
                                                    echo '<select id="DriverValue'.$count.$count1.'" name="'.$count.'" required="required" class="form-control" onChange="ActualizaCate(\''.$var1.'\',\''.$var2.'\',\''.$count.'\',\''.$count1.'\',\''.$existe.'\',\''.$index.'\')">';
                                                    echo '<option selected="true" style="display:none;">Seleccione el valor del Driver</option>';
                                                            foreach ($options2 as $option2):
                                                                echo '<option  value="'.$option2['DriverRating']['id'].'" >';
                                                                    echo $option2['DriverRating']['rating'];
                                                                echo '</option>';
                                                            endforeach;    
                                                    echo '</select>';
                                                    echo '</td>';
                                                }
                                                foreach($scenarios as $scenario):
                                                $idscenario1 = $scenario['Scenario']['id_idea'].$scenario['Scenario']['id_driver']; 
                                                
                                                if($idscenario==$idscenario1){
                                                $existe = true;
                                                echo '<select id="DriverValue'.$count.$count1.'" name="'.$count.'" required="required" class="form-control" onChange="ActualizaCate(\''.$var1.'\',\''.$var2.'\',\''.$count.'\',\''.$count1.'\',\''.$existe.'\')">';
                                                echo '<option selected="true" style="display:none;">Seleccione el valor del Driver</option>';
                                                        foreach ($options2 as $option2):
                                                            if($option2['DriverRating']['id']==$scenario['Scenario']['value']){
                                                                echo '<option selected="true"  value="'.$option2['DriverRating']['id'].'">';
                                                                    echo $option2['DriverRating']['rating'];
                                                                echo '</option>';
                                                            }
                                                            else{
                                                                    echo '<option  value="'.$option2['DriverRating']['id'].'" >';
                                                                        echo $option2['DriverRating']['rating'];
                                                                    echo '</option>';
                                                                }  
                                                        endforeach;    
                                                echo '</select>';
                                                echo '</td>';
                                                }
                                                  endforeach;
                                                $count1++;
                                                endforeach;?>
                                            </tr>
                                        </tbody>
                                        <?php 
                                        $count++;
                                        endforeach; 
                                        ?>
                                        <tfoot>
                                            <tr>
                                            <th>Ideas/Drivers</th>
                                            <?php foreach ($optionsDrivers as $optionsDriver):
                                            echo '<th>'.$optionsDriver['Driver']['name'].'</th>';
                                            endforeach;?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <!-- DATA TABES SCRIPT -->
        <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../js/AdminLTE/demo.js" type="text/javascript"></script>