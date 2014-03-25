<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Material Expense'), '/MaterialExpenses/listing');
$this->Html->addCrumb(__('Add New'), '/MaterialExpenses/add');

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Materials Expense') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="col-sm-6" style="float:left">
                        <legend></legend>
                        <fieldset>
                            <div class="panel-body">
                                    <div class ="form-group" id="client_info">
                                        <label class="col-sm-3 control-label">
                                            <?php echo __('Farmer Name')?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <select name="client_id" required="required"  id="select-client" class="col-sm-12">
                                                <?php
                                                    foreach ($clients as $key => $value) {
                                                ?>
                                                    <option value='<?php echo $value['Client']['client_id'] ?>'>
                                                        <?php echo $value['Client']['client_id'].' ('.$value['Client']['client_name_en'].')'; ?>
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
                                            <select name="vendor_code" required="required" class="col-sm-12" id="select-vendor">
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
                                            <?php echo __('Plot ID')?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <select name="plot_id" required="required"  id="select-plot" class="col-sm-12">
                                                
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            <?php echo __('Date') ?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text"  required="required" name="materialexpense_date" class="form-control" id="datepicker" readonly="readonly" value="<?php echo date('Y-m-d');?>" 
                                             placeholder="<?php echo __('Date  placeholder') ?>">
                                        </div>
                                    </div>
                                    <div class ="form-group">
                                        <label class="col-sm-3 control-label">
                                            <?php echo __('Material')?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                           
                                            <select name="product_code"  id="select-product_brandcategory" class="col-sm-12">
                                               <?php foreach ($produccategories as $key => $value):?>
                                               <optgroup label="<?php echo $value['productcategory_name_en'] ?>">
                                                
                                                <?php 
                                                    foreach ($value['products'] as $index => $item) :
                                                 ?>
                                                 <option value="<?php echo $item['product_code'] ?>">
                                                    <?php echo $item['product_brand'] ?>
                                                 </option>
                                                <?php endforeach; ?>
                                               </optgroup>
                                           <?php endforeach; ?>

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
                                            <?php echo __('Quantity')?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                           <input type="text"  required="required" id="quantity" name="materialexpense_quantity" class="form-control" placeholder ="<?php echo __('Quantity placeholder')?>"/>
                                            
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
                        <legend><?php echo __('Material History')?></legend>
                        <fieldset>
                            <div class="form-group" id="material-blog">
                            
                            </div>     
                        </fieldset>
                    </div>
                    <div class="clearfix"></div>
                    <div id="vendor-blog"></div>
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
      $('#select-vendor').select2();
      $('#select-product_brandcategory').select2(); 
            getInputPlot();
            getPlot();
            getUnit();
        $('#select-client').on('change',function(){
           getPlot();
        
        });
        $('#select-product_brandcategory').on('change', function()
        {
            getUnit();
        });
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

        $('#vendor_info').hide();
        $('#client_info').show();
        $('#fba_check').change(function(){
            if(this.checked) {
                $('#vendor_info').show();
                getPlotbelongToVendor();
                $('#client_info').hide();
            }
            else
            {
                $('#vendor_info').hide();
                $('#client_info').show();
            }
        });

        function getPlotbelongToVendor()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"getPlotbelongToVendor")) ?>',
                    type :'POST',
                    dataType:'json',
                    data :{
                        vendor_code: $('#select-vendor').val(),
                     
                    },
                    success:function(data)
                    {
                        if(data.error ==false)
                    {
                        $('#select-plot').html(data.data);
                        $('#select-plot').select2();
                        $('#vendor-blog').html('');
                    }
                    else
                    {
                        $('#vendor-blog').html('<div class="alert alert-dismissable alert-danger">'+data.msg+'</div>');
                        $('#select-plot').html('');
                        $('#select-plot').select2();
                      
                    }
                       
                    }
            });
            
        }
        $('#select-vendor').on('change',function(){
            getPlotbelongToVendor();
        });

        $('#select-plot').on('change',function(){
            getInputPlot();
        });
        function getInputPlot()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"PlotMaterialExpenses","action"=>"getPlotMaterialExpenseHistory")) ?>',
                    type :'POST',
                    data :{
                        plot_id: $('#select-plot').val(),
                    },
                    success:function(data)
                    {
                        $('#material-blog').html(data);
                        
                       
                    }
                });
        }
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
        function getUnit()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Products","action"=>"getProductUnit")) ?>',
            dataType:'json',
            type: 'POST',
            data: {
                product_code: $('#select-product_brandcategory').val()
            },
            success: function(data){  
              
               $('#unit').html('<input type="text" required="required" readonly="readonly" name="product_unit" class="form-control" value="'+ data['Product'].product_unit +'">');
                $('#select-price').html('<input type="text"  required="required" id="price" readonly="readonly" name="materialexpense_price_usd" class="form-control" value="'+ data['Product'].product_priceperunit_general_usd +'">');
            }

            });
        }

});
    
</script>



