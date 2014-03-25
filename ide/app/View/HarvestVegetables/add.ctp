<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Harvest Vegetable'), '/HarvestVegetables/listing');
$this->Html->addCrumb(__('Add New'), '/HarvestVegetables/add');

?>
 
<div id="page-heading"></div>
<div class="container">
<div class="row">
    <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
    <div class="panel panel-midnightblue">
        <div class="panel-heading">
            <h4> <?php echo __('Add New HarvestVegetable') ?></h4>           
        </div>
        <div class="panel-body collapse in">
            <div class="col-sm-6" style="float:left">
                <legend></legend>
                <fieldset>
                    <div class="panel-body">
                    <div class ="form-group" id="client_info">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Farmer Name')?><span class="required">*</span>
                        </label>
                        <div class="col-sm-6">
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
                    <div class="col-sm-12" style="padding-top:10px; padding-left:140px;" >
                            <label>FBA Demonstration</label>
                            <input type="checkbox" name="fba_check" class="checkAll" id="fba_check">
                    </div>
                    <div class="form-group" id="vendor_info">
                        
                                <label class="col-sm-3 control-label">
                                    <?php echo __('FBA ID') ?>
                                </label>
                                <div class="col-sm-6">
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
                    <div class ="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Plot ID')?><span class="required">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="plot_id"  id="select-plot" class="col-sm-12">
                            </select>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Week Training')?><span class="required">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select name="week_training"  id="select-week-training" class="col-sm-12">
                            </select>
                            <input type="hidden" name="week_training_value" id="week_training_value">
                            <div class="clearfix"></div>
                            <div class="error_training"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Date') ?><span class="required">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" required="required" name="harvestvegetable_date" class="form-control" id="datepicker" readonly="readonly" value="<?php echo date('Y-m-d');?>" 
                             placeholder="<?php echo __('Date  placeholder') ?>">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Surface m2')?><span class="required">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" required="required" name="harvestvegetable_surface_m2" class="form-control" placeholder ="<?php echo __('Surface placeholder')?>"/>
                                            
                        </div>
                    </div>
                    <div class ="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Quantity')?><span class="required">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" required="required" id="quantity" name="harvestvegetable_quantity_kg" class="form-control" placeholder ="<?php echo __('Quantity placeholder')?>"/>
                                            
                        </div>
                    </div>
                    <div class ="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Price')?><span class="required">*</span>
                        </label>
                        <div class="col-sm-6">      
                            <input type="text" required="required" name="harvestvegetable_price_usd" id="price" class="form-control" placeholder ="<?php echo __('Price placeholder')?>">                              
                        </div>
                    </div>
                    <div class ="form-group">
                        <label class="col-sm-3 control-label">
                        <?php echo __('Total')?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="total"  name="total" class="form-control" value="0">
                        </div>
                    </div>
                    
                    </div>
                </fieldset>
                </div>
                    <div class="col-sm-6" style="float:left;" >
                        <legend></legend>
                        <fieldset>
                        <div class="panel-body">
                            <div class ="form-group">
                                <label class="col-sm-3 control-label">
                                    <?php echo __('Harvest Complete?')?>
                                </label>
                                <div class="col-sm-6">
                                    <select class="col-sm-12" name="harvestvegetable_completed" id="complete">
                                    <option value=1>Yes</option>
                                    <option value=0>No</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <?php echo __('Revenue')?>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" id="revenue" readonly="readonly" value=0 name="revenue" class="form-control" placeholder ="<?php echo __('Revenue placeholder')?>"/>
                                            
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <?php echo __('Costs')?>
                                </label>
                                <div class="col-sm-6" >
                                    
                                    <input type="text" value=0 id="costtotal" readonly="readonly" name="costs" class="form-control" />        
                                </div>
                            </div>          
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <?php echo __('Gross Margin (No Labor)')?>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" value=0 readonly="readonly" id="gross_margin" name="gross_margin" class="form-control"/>
                                    <input type="hidden" readonly="readonly" id="costnolabor" name="costnolabor" class="form-control"/>
                                            
                                </div>
                            </div>
                        </div>
                        </fieldset>
                        <div class="clearfix"></div>
                        <legend><?php echo __('Harvest Vegetable History')?></legend>
                        <fieldset>
                            <div class="form-group" id="harvestvegetable-blog">
                            
                            </div>     
                        </fieldset>
                    </div>
                    <div class="clearfix"></div>
                    <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div  class="btn-toolbar">
                                        <button id="save" onclick="return validate(this.Form)"  class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
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
        $('#select-vendor').select2(); 
        $('#complete').select2(); 
        $('#select-week-training').select2();
        getHarvestVegetable();
        getPlot();
                 
        /*-----------when combox client change---------------*/
        $('#select-client').on('change',function(){
           getPlot();
           totalCost();
           totalCostNoLabor();

        });
        /*-----------when combox plot change---------------*/
        $('#select-plot').on('change',function(){
            getHarvestVegetable();
            getTrainingIdVegetable();
            totalCost();
            totalCostNoLabor();
            /*checkPreviousHarvestVegetable();*/
        });
        /*-------------request data via ajax to PlotsController--------*/
        function getPlot()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"getPlotHavestVegetable")) ?>',
            type: 'POST',
            data: {
                client_id: $('#select-client').val()
            },
           
            success: function (data) {    
             
               $('#select-plot').html(data);
               $('#select-plot').select2();
               getHarvestVegetable();
               getTrainingIdVegetable();
               totalCost();
               totalCostNoLabor();
               select_training_value();
               /*checkPreviousHarvestVegetable();*/
            }

            });
        }
        function getTrainingIdVegetable()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Trainings","action"=>"getTrainingIdVegetable")) ?>',
            type: 'POST',
            data: {
                 plot_id: $('#select-plot').val(),
            },
           
            success: function (data) {    
                
                if(data=='0')
                {
                    $('#harvestvegetable-blog').html('<div class="alert alert-dismissable alert-danger">Plot can not Harvest Now! Wait training week 6 till 10  </div>');
                }
                $('#select-week-training').html(data);
                $('#select-week-training').select2();
                select_training_value();
                $('.error_training').html("");
                    
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
        function getHarvestVegetable()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"HarvestVegetables","action"=>"getHarvestVegetableHistory")) ?>',
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
        $('#quantity').on('keyup',function(){
            var price =$('#price').val()==''?0:
                    parseInt($('#price').val());
            var qty=$('#quantity').val()==''?0:
                parseInt($('#quantity').val());
            var total = 0;
            
            total=parseInt(qty) * parseInt(price);
            $('#total').val(total); 

            var revenue=0;
            revenue=parseInt($('#total').val());
            $('#revenue').val(total);  

            var gross_margin=0;
            gross_margin=$('#revenue').val() - $('#costnolabor').val();
            $('#gross_margin').val(gross_margin);    
        });
       
        $('#price').on('keyup',function(){
            var price =$('#price').val()==''?0:
                    parseInt($('#price').val());
            var qty=$('#quantity').val()==''?0:
                parseInt($('#quantity').val());
            var total = 0;
            
            total=parseInt(qty) * parseInt(price);
            $('#total').val(total);

            var revenue=0;
            revenue=parseInt($('#total').val());
            $('#revenue').val(total);

            var gross_margin=0;
            gross_margin=$('#revenue').val() - $('#costnolabor').val();
            $('#gross_margin').val(gross_margin); 
            
        });
        $('#total').on('keyup',function(){
           
            var total =$('#total').val()==''?0:parseInt($('#total').val());
            $('#revenue').val(total);

            var gross_margin=0;
            gross_margin=$('#revenue').val() - $('#costnolabor').val();
            $('#gross_margin').val(gross_margin); 
        });
       /*---------End keyup-------------------*/  
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
                getPlotByVendorVegetable();
                $('#client_info').hide();
            }
            else
            {
                $('#vendor_info').hide();
                $('#client_info').show();
            }
        });

        function getPlotByVendorVegetable()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"getPlotByVendorVegetable")) ?>',
                    type :'POST',
                    data :{
                        vendor_code: $('#select-vendor').val(),
                     
                    },
                    success:function(data)
                    {
                       $('#select-plot').html(data);
                       $('#select-plot').select2();
                        getHarvestVegetable();
                        getTrainingIdVegetable();
                        totalCost();
                        totalCostNoLabor();
                        select_training_value();
                    }
            });
            
        }
        $('#select-vendor').on('change',function(){
            getPlotByVendorVegetable();
        });
       
});
  
</script>




