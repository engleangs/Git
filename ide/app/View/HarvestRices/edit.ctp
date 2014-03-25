<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Harvest Rice'), '/HarvestRices/listing');
$this->Html->addCrumb(__('Edit'), '/HarvestRices/edit'.$data['HarvestRice']['harvestrice_id']);

?>
 
<div id="page-heading"></div>
<div class="container">
<div class="row">
    <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['HarvestRice']['harvestrice_id']));?>" class="form-horizontal row-border" method="post">     
    <div class="panel panel-midnightblue">
        <div class="panel-heading">
            <h4> <?php echo __('Edit HarvestRice') ?></h4>           
        </div>
        <div class="panel-body collapse in">
            <div class ="form-group">
                <div class="col-sm-4">
                    <label class="col-sm-4 control-label">
                        <?php echo __('Plot ID')?><span class="required">*</span>
                    </label>
                    <div class="col-sm-8">
                         <input type="text"  required="required" id="plot_id" readonly="readonly" value=<?php echo $data['HarvestRice']['plot_id'] ?> name="plot_id" class="form-control select-plot"/>
                        <div class="plot_error" style="padding-top:10px;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="col-sm-4 control-label">
                        <?php echo __('Quadrat')?><span class="required">*</span>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" id="quadrat"  required="required" value="<?php echo $data['HarvestRice']['harvestrice_quadrat_size_m2'] ?>" name="harvestrice_quadrat_size_m2" class="form-control" placeholder ="<?php echo __('Quadrat placeholder')?>"/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class ="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Price')?><span class="required">*</span>
                        </label>
                        <div class="col-sm-6">      
                            <input type="text" required="required" value="<?php echo $data['HarvestRice']['harvestrice_price'] ?>" name="harvestrice_price" id="price" class="form-control" placeholder ="<?php echo __('Price placeholder')?>">                              
                        </div>
                    </div>
                </div>
                
            
            </div>
            <div class="form-group">
                
                <div class="col-sm-4">
                    <label class="col-sm-4 control-label">
                        <?php echo __('Date') ?><span class="required">*</span>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" required="required" name="harvestrice_date" class="form-control" id="datepicker" readonly="readonly" 
                        value="<?php echo $data['HarvestRice']['harvestrice_date'];?>" 
                            placeholder="<?php echo __('Date  placeholder') ?>">
                    </div>
                </div>
                <div class ="col-sm-6">
                    <label class="col-sm-5 control-label">
                        <?php echo __('Harvest Complete?')?><span class="required">*</span>
                    </label>
                    <div class="col-sm-6">
                        <select class="col-sm-12" name="harvestrice_completed" id="complete">
                            <option <?php if($data['HarvestRice']['harvestrice_completed']==1) echo 'selected="selected"';?>value=1>Yes</option>
                            <option <?php if($data['HarvestRice']['harvestrice_completed']==0) echo 'selected="selected"';?> value=0>No</option>
                        </select> 
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th></th>
                            <th><?php echo __('Weight (kg)') ?></th>
                            <th><?php echo __('Moisture (%)')?></th>
                            <th><?php echo __('Yield (@ 14% (kg/ha))')?></th>
                            <th><?php echo __('Return ($)')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo __('Q1') ?></td>
                            <td>
                                <input type="text" value="<?php echo $data['HarvestRice']['harvestrice_q1_weight_kg'] ?>" id="q1_weight" name="harvestrice_q1_weight_kg" class="form-control"                           placeholder="<?php echo __('Weight q1 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" value="<?php echo $data['HarvestRice']['harvestrice_q1_moisture_%'] ?>" id="q1_moisture" name="harvestrice_q1_moisture_%" class="form-control"                           placeholder="<?php echo __('Moisture q1 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="yield_q1" name="yield_q1" class="form-control"
                                readonly="readonly">
                            </td>
                            <td><?php ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Q2') ?></td>
                            <td>
                                <input type="text" value="<?php echo $data['HarvestRice']['harvestrice_q2_weight_kg'] ?>" id="q2_weight" name="harvestrice_q2_weight_kg" class="form-control"                           placeholder="<?php echo __('Weight q2 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="q2_moisture" value="<?php echo $data['HarvestRice']['harvestrice_q2_moisture_%'] ?>" name="harvestrice_q2_moisture_%" class="form-control"                           placeholder="<?php echo __('Moisture q2 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="yield_q2" name="yield_q2" class="form-control"
                                readonly="readonly">
                            </td>
                            <td><?php ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Q3') ?></td>
                            <td>
                                <input type="text" value="<?php echo $data['HarvestRice']['harvestrice_q3_weight_kg'] ?>" id="q3_weight"  name="harvestrice_q3_weight_kg" class="form-control"                           placeholder="<?php echo __('Weight q3 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="q3_moisture" value="<?php echo $data['HarvestRice']['harvestrice_q3_moisture_%'] ?>" name="harvestrice_q3_moisture_%" class="form-control"                           placeholder="<?php echo __('Moisture q3 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="yield_q3" name="yield_q3" class="form-control"
                                readonly="readonly">
                            </td>
                            <td><?php ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Average')?></td>
                            <td colspan="4">
                                <input type="text" id="average" name="average" class="form-control"
                                readonly="readonly">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label class="col-sm-3 control-label">
                        <?php echo __('Revenue')?>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" id="revenue" readonly="readonly"value=0 name="revenue" class="form-control" placeholder ="<?php echo __('Revenue placeholder')?>"/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="col-sm-3 control-label">
                        <?php echo __('Costs')?>
                    </label>
                    <div class="col-sm-8" >
                        <input type="text" id="costtotal" readonly="readonly" name="costs" class="form-control" />        
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="col-sm-4 control-label">
                        <?php echo __('Gross Margin (No Labor)')?>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" readonly="readonly" id="gross_margin" name="gross_margin" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="btn-toolbar">
                            <button onclick="return validate(this.Form)" class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
                            </button>
                                <?php echo $this->Html->link(                                      
                                    $this->Html->tag('i',
                                            '',
                                                array('class'=>'')).' '.__('Cancel')
                                      ,
                                        array(                                        
                                            'action' => 'listing'
                                        ),
                                        array(
                                            'escape'=>false,
                                            'class'=>'btn-default btn'
                                            )
                                        ); 
                            ?>
                                        
                         </div>
                    </div>
                </div>
            </div>
                              
            <div class="clearfix"></div>       
        </div>
        
        
    </div>
    <input type="hidden" id="weeks_value" name="weeks_value" value="0" />
          
    </form>
</div>
</div>

<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/js/jqueryui.css' />
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-daterangepicker/daterangepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
 
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#complete').select2();
         $("#datepicker,#datepicker3").datepicker( {dateFormat: 'yy-mm-dd'});
        totalCost();
        calculateYield_q1_moisture();
        calculateYield_q2_moisture();
        calculateYield_q3_moisture();
    
        calculateAverage();
        calculateRevenue();

        function totalCost()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"totalCostExpense")) ?>',
                    type :'POST',
                    data :{
                        plot_id: $('#plot_id').val(),
                    },
                    success:function(data)
                    {
                        $('#costtotal').val(data);                     
                       
                    }
            });
        }
        function calculateRevenue()
        {
            var price =$('#price').val()==''?0:
                    parseFloat($('#price').val());
            var average=$('#average').val()==''?0:
                parseFloat($('#average').val());
            var total = 0;
            
            total=parseFloat(average) * parseFloat(price);
            $('#total').val(total.toFixed(2));

            var revenue=0;
            revenue=parseFloat($('#total').val());
            $('#revenue').val(total.toFixed(2));

            var gross_margin=0;
            gross_margin=$('#revenue').val() - $('#costtotal').val();
            $('#gross_margin').val(gross_margin.toFixed(2)); 
        }  

        function calculateAverage()
        {
            var yield_q1=$('#yield_q1').val()==''?0:parseFloat($('#yield_q1').val());
            var yield_q2=$('#yield_q2').val()==''?0:parseFloat($('#yield_q2').val());
            var yield_q3=$('#yield_q3').val()==''?0:parseFloat($('#yield_q3').val());
            var TotalYield=0;
            TotalYield=(parseFloat(yield_q1)+parseFloat(yield_q2)+parseFloat(yield_q3))/3;
            $('#average').val(TotalYield.toFixed(2));
        } 
        function caculateYields(weight,moisture,quadrat)
        {
            var yield = 0;
            yield=((parseInt(weight)* 100 - parseInt(moisture)) / 86)*10000/quadrat;
            return yield;   
        } 

        function calculateYield_q1_moisture()
        {
            var weight =$('#q1_weight').val()==''?0:parseInt($('#q1_weight').val());
            var moisture=$('#q1_moisture').val()==''?0:parseInt($('#q1_moisture').val());
            var quadrat =parseInt($('#quadrat').val());
            var total=caculateYields(weight,moisture,quadrat);
            $('#yield_q1').val(total.toFixed(2));    
        }
        function calculateYield_q2_moisture()
        {
            var weight =$('#q2_weight').val()==''?0:parseInt($('#q2_weight').val());
            var moisture=$('#q2_moisture').val()==''?0:parseInt($('#q2_moisture').val());
            var quadrat =parseInt($('#quadrat').val());
            var total=caculateYields(weight,moisture,quadrat);
            $('#yield_q2').val(total.toFixed(2));
        }
        function calculateYield_q3_moisture(){
            var weight =$('#q3_weight').val()==''?0:parseInt($('#q3_weight').val());
            var moisture=$('#q3_moisture').val()==''?0:parseInt($('#q3_moisture').val());
            var quadrat =parseInt($('#quadrat').val());
            var total=caculateYields(weight,moisture,quadrat);
            $('#yield_q3').val(total.toFixed(2));
        }
        $('#price').on('keyup',function(){
            calculateRevenue();
        });
        $('#total').on('keyup',function(){
           
            var total =$('#total').val()==''?0:parseFloat($('#total').val());
            $('#revenue').val(total);

            var gross_margin=0;
            gross_margin=$('#revenue').val() - $('#costtotal').val();
            $('#gross_margin').val(gross_margin.toFixed(2)); 
        });
        /*---------End keyup-------------------*/  

        /*---------Keyup to change value in q and mosture-----------*/
        $('#q1_weight').on('keyup', function(){
            calculateYield_q1_moisture();
            calculateAverage();  
            calculateRevenue();  
        });
        $('#q1_moisture').on('keyup', function(){
            calculateYield_q1_moisture();  
            calculateAverage(); 
            calculateRevenue();            
        });
        $('#q2_weight').on('keyup', function(){
            calculateYield_q2_moisture();
            calculateAverage(); 
            calculateRevenue();    
           
        });
        $('#q2_moisture').on('keyup', function(){
            calculateYield_q2_moisture();
            calculateAverage();
            calculateRevenue();     
         
        });
        $('#q3_weight').on('keyup', function(){
            calculateYield_q3_moisture();
            calculateAverage();
            calculateRevenue();     
        });
        $('#q3_moisture').on('keyup', function(){
            calculateYield_q3_moisture();
            calculateAverage();
            calculateRevenue();     
        });

     });


</script>




