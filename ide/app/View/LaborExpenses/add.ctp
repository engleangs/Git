<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Labor Expenses'), '/LaborExpenses/listing');
$this->Html->addCrumb(__('Add New'), '/LaborExpenses/add');

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Labor Expense') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="col-sm-6" style="float:left">
                        <legend></legend>
                        <fieldset>
                            <div class="panel-body">
                                <div class ="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Farmer Name')?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="client_id"  id="select-client" class="col-sm-12">
                                        <?php
                                            foreach ($clients as $key => $value) {
                                        ?>
                                        <option value='<?php echo $value['Client']['client_id'] ?>'>
                                        <?php 
    echo $value['Client']['client_id'].' ( '.$value['Client']['client_name_en'].')';?>
                                            </option>
                                        <?php
                                        } 
                                        ?>

                                        </select>
                                            
                                    </div>
                                </div>
                                <div class ="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Plot ID')?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="plot_id"  id="select-plot" class="col-sm-12">
                                                
                                            </select>
                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Date') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" required="required" name="laborexpense_date" class="form-control" id="datepicker" readonly="readonly" value="<?php echo date('Y-m-d');?>" 
                                             placeholder="<?php echo __('Date  placeholder') ?>">
                                    </div>
                                </div>
                                <div class ="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Type')?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="labor_code"  id="select-labor" class="col-sm-12">
                                        <?php
                                            foreach ($labors as $key => $value) {
                                        ?>
                                            <option value='<?php echo $value['Labor']['labor_code'] ?>'>
                                                        <?php echo $value['Labor']['labor_name_en'] ?>
                                            </option>
                                                <?php
                                                     } 
                                                ?>

                                        </select>
                                            
                                    </div>
                                </div>
                                <div class ="form-group">
                                        <label class="col-sm-3 control-label">
                                            <?php echo __('Unit')?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6"  id="unit">
                                           
                                        </div>
                                </div>
                                
                                <div class ="form-group">
                                        <label class="col-sm-3 control-label">
                                            <?php echo __('Cost Per Unit')?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6"  id="select-price">
                                           
                                        </div>
                                    </div>
                                <div class ="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Quantity')?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" required="required" id="quantity" name="laborexpense_quantity" class="form-control" placeholder ="<?php echo __('Quantity placeholder')?>"/>
                                            
                                    </div>
                                </div>
                                <div class ="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Total')?>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" id="total" name="total" class="form-control" value="0">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6" style="float:left;" >
                        <legend><?php echo __('Labor History')?></legend>
                        <fieldset>
                            <div class="form-group" id="labor-blog">
                            
                            </div>     
                        </fieldset>
                    </div>
                    <div class="clearfix"></div>
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
                    
                    
                </div>
            </div>
          
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
      $('#select-labor').select2(); 
            getInputPlot();
            getPlot();
            getUnit();
        $('#select-client').on('change',function(){
           getPlot();
        
        });
        function getPlot()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"getPlotCode")) ?>',
            type: 'POST',
            data: {
                client_id: $('#select-client').val()
            },
           
            success: function (data) {    
           
               $('#select-plot').html(data);
               $('#select-plot').select2();
               getInputPlot();
            }

            });
        }

        $('#select-labor').on('change', function()
        {
            getUnit();
        });
        function getUnit()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Labors","action"=>"getLaborUnit")) ?>',
            dataType:'json',
            type: 'POST',
            data: {
                labor_code: $('#select-labor').val()
            },
            success: function(data){ 
               
                $('#unit').html('<input type="text" required="required" readonly="readonly" name="labor_unit" class="form-control" value="'+ data['Labor'].labor_unit +'">');
                $('#select-price').html('<input type="text" required="required" id="price" readonly="readonly" name="laborexpense_price_usd" class="form-control" value="'+ data['Labor'].labor_costper_unit_usd +'">')
              
            }
            });
        }

        $('#quantity').on('keyup',function(){
            var qty=$('#quantity').val();
            console.log(qty);
            var price =$('#price').val();
            var total = 0;
            if(qty=='')
            {
               total=0 * parseFloat(price);
               $('#total').val(total);
            }
            else
            {
                total=parseFloat(qty) * parseFloat(price);
                $('#total').val(total);
            }
            
        });
        $('#select-plot').on('change',function(){
            getInputPlot();
        });

        function getInputPlot()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"PlotLaborExpenses","action"=>"getPlotExpenseHistory")) ?>',
                    type :'POST',
                    data :{
                        plot_id: $('#select-plot').val(),
                    },
                    success:function(data)
                    {
                        $('#labor-blog').html(data);
                        
                       
                    }
                });
        }
        
        
        

});
    
</script>




