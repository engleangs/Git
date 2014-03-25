<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Harvest Rice'), '/HarvestRices/listing');
$this->Html->addCrumb(__('Add New'), '/HarvestRices/add');

?>
 
<div id="page-heading"></div>
<div class="container">
<div class="row">
    <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
    <div class="panel panel-midnightblue">
        <div class="panel-heading">
            <h4> <?php echo __('Add New HarvestRice') ?></h4>           
        </div>
        <div class="panel-body collapse in">
            <div class ="form-group">
                <div class="col-sm-4" id="client_info">
                    <label class="col-sm-4 control-label">
                        <?php echo __('Farmer Name')?><span class="require">*</span>
                    </label>
                    <div class="col-sm-8">
                        <select name="client_id"  id="select-client" class="col-sm-12">
                            <?php
                                foreach ($clients as $key => $value) {
                            ?>
                                <option value='<?php echo $value['Client']['client_id'] ?>'>
                            <?php echo $value['Client']['client_name_en'].'('.$value['Client']['client_id'].')' ?>
                                </option>
                            <?php
                            } 
                            ?>
                        </select>                          
                    </div>
                    
                </div>
                <div class="col-sm-4" id="vendor_info">
                        
                                <label class="col-sm-4 control-label">
                                    <?php echo __('FBA ID') ?>
                                </label>
                                <div class="col-sm-8">
                                    <select name="vendor_code" class="col-sm-12" id="select-vendor">
                                    <?php 
                                    foreach ($vendors as $key => $value) {
                                    ?>
                                        <option value="<?php echo $value['Vendor']['vendor_code'] ?>">
                                        <?php echo $value['Vendor']['vendor_code'].' ( '.$value['Vendor']['vendor_name_en'].')'; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>                                          
                                </div>
                                        
                    </div>   
                    <div class="col-sm-4" style="padding-top:10px; padding-left:140px;" >
                            <label>FBA Demonstration</label>
                            <input type="checkbox" name="fba_check" class="checkAll" id="fba_check">
                    </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label class="col-sm-4 control-label">
                        <?php echo __('Quadrat')?><span class="require">*</span>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" id="quadrat" required="required" value="9" name="harvestrice_quadrat_size_m2" class="form-control" placeholder ="<?php echo __('Quadrat placeholder')?>"/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class ="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Price')?><span class="require">*</span>
                        </label>
                        <div class="col-sm-8">      
                            <input type="text" required="required" name="harvestrice_price" id="price" class="form-control" placeholder ="<?php echo __('Price placeholder')?>">                              
                        </div>
                    </div>
                </div>
                
            
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label class="col-sm-4 control-label">
                        <?php echo __('Plot ID')?><span class="require">*</span>
                    </label>
                    <div class="col-sm-8">
                        <select name="plot_id"  id="select-plot" class="col-sm-12">
                        </select>
                        <div class="plot_error" style="padding-top:10px;">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="col-sm-4 control-label">
                        <?php echo __('Week Training')?><span class="require">*</span>
                    </label>
                    <div class="col-sm-8">
                        <select name="week_training"  id="select-week-training" class="col-sm-12">
                        </select>
                        <input type="hidden" name="week_training_value" id="week_training_value">
                        <div class="clearfix"></div>
                        <div class="error_training"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="col-sm-3 control-label">
                        <?php echo __('Date') ?><span class="require">*</span>
                    </label>
                    <div class="col-sm-8">
                        <input type="text" required="required" name="harvestrice_date" class="form-control" id="datepicker" readonly="readonly" 
                        value="<?php echo date('Y-m-d');?>" 
                            placeholder="<?php echo __('Date  placeholder') ?>">
                    </div>
                </div>
            </div>
            <div class ="form-group">
                <label class="col-sm-5 control-label">
                    <?php echo __('Harvest Complete?')?><span class="require">*</span>
                </label>
                <div class="col-sm-6">
                    <select class="col-sm-6" name="harvestrice_completed" id="complete">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                    </select> 
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
                                <input type="text" id="q1_weight" name="harvestrice_q1_weight_kg" class="form-control"                           placeholder="<?php echo __('Weight q1 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="q1_moisture" name="harvestrice_q1_moisture_%" class="form-control"                           placeholder="<?php echo __('Moisture q1 placeholder') ?>">
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
                                <input type="text" id="q2_weight" name="harvestrice_q2_weight_kg" class="form-control"                           placeholder="<?php echo __('Weight q2 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="q2_moisture" name="harvestrice_q2_moisture_%" class="form-control"                           placeholder="<?php echo __('Moisture q2 placeholder') ?>">
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
                                <input type="text" id="q3_weight" name="harvestrice_q3_weight_kg" class="form-control"                           placeholder="<?php echo __('Weight q3 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="q3_moisture" name="harvestrice_q3_moisture_%" class="form-control"                           placeholder="<?php echo __('Moisture q3 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="yield_q3" name="yield_q3" class="form-control"
                                readonly="readonly">
                            </td>
                            <td><?php ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Average')?></td>
                            <td>
                                <input type="text" id="average_weight" name="average_weight" class="form-control"
                                readonly="readonly">
                            </td>
                            <td>
                                <input type="text" id="average_moisture" name="average_moisture" class="form-control"
                                readonly="readonly">
                            </td>
                            <td>
                                <input type="text" id="average_yield" name="average_yield" class="form-control"
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
                        <input type="hidden" readonly="readonly" id="costnolabor" name="costnolabor" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="panel-heading">
                    <h4><?php echo __('Harvest Rice History')?></h4>
                    <div class="options">
                        <span>
                           <a href="javascript:;" class="panel-collapse" ><i class="fa fa-chevron-down"></i>
                           </a>
                        </span>
                      
                    </div>
                </div>
                <div class="col-sm-12" id="harvestvegetable-blog">
                                
                </div> 
                <div style="clear:both;"></div>
            </div> 
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="btn-toolbar">
                            <button id="save" onclick="return validate(this.Form)" class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
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
  
$(document).ready(function(){
        $("#datepicker,#datepicker3").datepicker( {dateFormat: 'yy-mm-dd'});
        $('#select-plot').select2();
        $('#select-client').select2(); 
        $('#complete').select2(); 
        $('#select-vendor').select2();
        $('#select-week-training').select2();
        getHarvestRiceHistory();
        getPlot();
                      
        /*-----------when combox client change---------------*/
        $('#select-client').on('change',function(){
           getPlot();
           totalCost();
           totalCostNoLabor();
          
        });
        /*-----------when combox plot change---------------*/
        $('#select-plot').on('change',function(){
           
            getHarvestRiceHistory();
            getTrainingIdRice();
            totalCost();
            totalCostNoLabor();
            /*checkPreviousHarvestRice()*/;
            
        });
        /*-------------request data via ajax to PlotsController--------*/
        function getPlot()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"getPlotHarvestRice")) ?>',
            type: 'POST',
            dataType:'json',
            data: {
                client_id: $('#select-client').val()
            },
           
            success: function (data) {    
                if(data.error ==false)
                {
                    $('#select-plot').html(data.data);
                    $('#select-plot').select2();
                    $('#harvestvegetable-blog').html('');
                }
                else
                {
                    $('#harvestvegetable-blog').html('<div class="alert alert-dismissable alert-danger">'+data.msg+'</div>');
                    $('#select-plot').html('');
                    $('#select-plot').select2();
                  
                }
               

            getHarvestRiceHistory();
            getTrainingIdRice();
            /*checkPreviousHarvestRice();*/
            totalCost();
            totalCostNoLabor();
            select_training_value();
               
              
            }

            });
        }
        function getTrainingIdRice()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Trainings","action"=>"getTrainingIdRice")) ?>',
            type: 'POST',
            dataType :'json',
            data: {
                 plot_id: $('#select-plot').val(),
            },
           
            success: function (data) {    
                
                if(data.error ==false)
                {
                    $('#select-week-training').html(data.data);
                    $('#select-week-training').select2();
                    select_training_value();
                    $('.plot_error').html('');
                    $('.error_training').html("");
                }
                else
                {
                    $('.plot_error').html('<div class="alert alert-dismissable alert-danger">'+data.msg+'</div>');
                    $('#select-week-training').html('');
                    $('#select-week-training').select2();
                    
                                   
                }
               

                    
            }

            });
        }
        /*--request data via ajax 
            to PlotCOntroller, total amount of PlotLaborExpense and
            PlotMaterialExpense */
        function totalCost()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"totalCostExpense")) ?>',
                    type :'POST',
                    data :{
                        plot_id: $('#select-plot').val(),
                    },
                    success:function(data)
                    {
                       
                        $('#costtotal').val(data);                     
                       
                    }
            });
        }
        function totalCostNoLabor()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"totalCostNoLabor")) ?>',
                    type :'POST',
                    data :{
                        plot_id: $('#select-plot').val(),
                    },
                    success:function(data)
                    {
                       
                        $('#costnolabor').val(data);                     
                       
                    }
            });
        }
        /*request data via ajax to HarvestVegetableController*/
        function getHarvestRiceHistory()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"HarvestRices","action"=>"getHarvestRiceHistory")) ?>',
                    type :'POST',
                    data :{
                        plot_id: $('#select-plot').val(),
                        client_id:$('#select-client').val()
                    },
                    success:function(data)
                    {
                        $('#harvestvegetable-blog').html(data);
                        
                       
                    }
                });
        }
       
        /*-----Keyup to change value in Total textbox--------------*/
        function calculateRevenue()
        {
            var price =$('#price').val()==''?0:
                    parseFloat($('#price').val());
            var average=$('#average_yield').val()==''?0:
                parseFloat($('#average_yield').val());
            var total = 0;
            
            total=parseFloat(average.toFixed(2)) * parseFloat(price.toFixed(2));
            $('#total').val(total);

            var revenue=0;
            revenue=parseFloat($('#total').val());
            $('#revenue').val(total.toFixed(2));

            var gross_margin=0;
            gross_margin=$('#revenue').val() - $('#costnolabor').val();
            $('#gross_margin').val(gross_margin.toFixed(2)); 
        }  

        function calculateAverageYield()
        {
            var yield_q1=$('#yield_q1').val()==''?0:parseFloat($('#yield_q1').val());
            var yield_q2=$('#yield_q2').val()==''?0:parseFloat($('#yield_q2').val());
            var yield_q3=$('#yield_q3').val()==''?0:parseFloat($('#yield_q3').val());
            var TotalYield=0;
            TotalYield=(parseFloat(yield_q1.toFixed(2))+parseFloat(yield_q2.toFixed(2))+parseFloat(yield_q3.toFixed(2)))/3;
            $('#average_yield').val(TotalYield.toFixed(2));
        } 
        function calculateAverageWeight()
        {
            var weight_q1=$('#q1_weight').val()==''?0:parseFloat($('#q1_weight').val());
            var weight_q2=$('#q2_weight').val()==''?0:parseFloat($('#q2_weight').val());
            var weight_q3=$('#q3_weight').val()==''?0:parseFloat($('#q3_weight').val());
            var Totalweight=0;
            Totalweight=(parseFloat(weight_q1.toFixed(2))+parseFloat(weight_q2.toFixed(2))+parseFloat(weight_q3.toFixed(2)))/3;
            $('#average_weight').val(Totalweight.toFixed(2));
        }
        function calculateAveragemoisture()
        {
            var q1_moisture=$('#q1_moisture').val()==''?0:parseFloat($('#q1_moisture').val());
            var q2_moisture=$('#q2_moisture').val()==''?0:parseFloat($('#q2_moisture').val());
            var q3_moisture=$('#q3_moisture').val()==''?0:parseFloat($('#q3_moisture').val());
            var Totalmoisture=0;
            Totalmoisture=(parseFloat(q1_moisture.toFixed(2))+parseFloat(q2_moisture.toFixed(2))+parseFloat(q3_moisture.toFixed(2)))/3;
            $('#average_moisture').val(Totalmoisture.toFixed(2));
        }
        function caculateYields(weight,moisture,quadrat)
        {
            var yield = 0;
            yield=((parseInt(weight)* 100 - parseInt(moisture)) / 86)*10000/quadrat;
            return yield.toFixed(2);   
        } 

        function calculateYield_q1_moisture()
        {
            var weight =$('#q1_weight').val()==''?0:parseInt($('#q1_weight').val());
            var moisture=$('#q1_moisture').val()==''?0:parseInt($('#q1_moisture').val());
            var quadrat =parseInt($('#quadrat').val());
            var total=caculateYields(weight,moisture,quadrat);
            $('#yield_q1').val(total);    
        }
        function calculateYield_q2_moisture()
        {
            var weight =$('#q2_weight').val()==''?0:parseInt($('#q2_weight').val());
            var moisture=$('#q2_moisture').val()==''?0:parseInt($('#q2_moisture').val());
            var quadrat =parseInt($('#quadrat').val());
            var total=caculateYields(weight,moisture,quadrat);
            $('#yield_q2').val(total);
        }
        function calculateYield_q3_moisture(){
            var weight =$('#q3_weight').val()==''?0:parseInt($('#q3_weight').val());
            var moisture=$('#q3_moisture').val()==''?0:parseInt($('#q3_moisture').val());
            var quadrat =parseInt($('#quadrat').val());
            var total=caculateYields(weight,moisture,quadrat);
            $('#yield_q3').val(total);
        }
        $('#price').on('keyup',function(){
            calculateRevenue();
        });
        $('#total').on('keyup',function(){
           
            var total =$('#total').val()==''?0:parseFloat($('#total').val());
            $('#revenue').val(total);

            var gross_margin=0;
            gross_margin=$('#revenue').val() - $('#costnolabor').val();
            $('#gross_margin').val(gross_margin); 
        });
        /*---------End keyup-------------------*/  

        /*---------Keyup to change value in q and mosture-----------*/
        $('#q1_weight').on('keyup', function(){
            calculateYield_q1_moisture();
            calculateAverageYield(); 
            calculateAverageWeight(); 
            calculateRevenue();  
        });
        $('#q1_moisture').on('keyup', function(){
            calculateYield_q1_moisture();  
            calculateAverageYield(); 
            calculateAveragemoisture();
            calculateRevenue();            
        });
        $('#q2_weight').on('keyup', function(){
            calculateYield_q2_moisture();
            calculateAverageYield(); 
            calculateAverageWeight();
            calculateRevenue();    
           
        });
        $('#q2_moisture').on('keyup', function(){
            calculateYield_q2_moisture();
            calculateAverageYield();
            calculateAveragemoisture();
            calculateRevenue();     
         
        });
        $('#q3_weight').on('keyup', function(){
            calculateYield_q3_moisture();
            calculateAverageYield();
            calculateAverageWeight();
            calculateRevenue();     
        });
        $('#q3_moisture').on('keyup', function(){
            calculateYield_q3_moisture();
            calculateAverageYield();
            calculateAveragemoisture();
            calculateRevenue();     
        });

        

        $('#select-week-training').change(function(){
            
          select_training_value();
        });

        function select_training_value()
        {
            var value=$("#select-week-training option:selected").text();
            $('#week_training_value').val(value);
        }
        $('#save').click(function(){
            var value=$("#select-week-training option:selected").text();
            if(value=='')
            {
                
            $('.error_training').html('<div class="alert alert-dismissable alert-danger">Please Select Week Trainings</div>');
            return false;
            }
            else{
                 $('.error_training').html("");
            }

        });

        $('#vendor_info').hide();
        $('#client_info').show();
        $('#fba_check').change(function(){
            if(this.checked) {
                $('#vendor_info').show();
                getPlotByVendorRice();
                $('#client_info').hide();
            }
            else
            {
                $('#vendor_info').hide();
                $('#client_info').show();
            }
        });

        function getPlotByVendorRice()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"getPlotByVendorRice")) ?>',
                    type :'POST',
                    data :{
                        vendor_code: $('#select-vendor').val(),
                     
                    },
                    success:function(data)
                    {
                       $('#select-plot').html(data);
                       $('#select-plot').select2();
                        getHarvestRiceHistory();
                        getTrainingIdRice();
                        /*checkPreviousHarvestRice();*/
                        totalCost();
                        totalCostNoLabor();
                        select_training_value();
                    }
            });
            
        }
        $('#select-vendor').on('change',function(){
            getPlotByVendorRice();
        }); 

});
    /*''*/
</script>




