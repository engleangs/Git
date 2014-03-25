<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Plot'), '/Plots/listing');
$this->Html->addCrumb(__('Add New'), '/Plots/add');

 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
    
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">    
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Plot') ?></h4>         
                </div>
                <div class="panel-body collapse in">
                   
                    <div class="col-sm-6" style="float:left;" >
                        <div class="panel-body " >   
                            <div class="form-group">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('Project') ?><span class="required">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <select name="project_id" required="required" id="project" class="col-sm-12">
                                        <?php foreach ($projects as $key => $value) {
                                         ?>
                                            <option value="<?php echo $value['Project']['project_id'] ?>">
                                                <?php echo $value['Project']['project_id'].' ( '.$value['Project']['project_name_en'].' ) ';?>
                                            </option>
                                        <?php
                                        }?>
                                    </select>
                                   
                                </div>
                            </div>    
                            <div class="form-group">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('FBA ID') ?><span class="required">*</span>
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
                                    <div class="col-sm-12" style="padding-top:10px;" >
                                        <label>FBA Demonstration</label>
                                        <input type="checkbox" name="fba_check" class="checkAll" id="fba_check">
                                    </div>
                                           
                                </div>
                                        
                            </div>   
                                                               
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <?php echo __('Date Planting') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" required="required" name="plot_dateplanting" class="form-control" id="datepicker" readonly="readonly" value="<?php echo date('Y-m-d');?>" 
                                             placeholder="<?php echo __('Date Planting placeholder') ?>">
                                        </div>
                            </div>
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <?php echo __('Date Started') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" 
                                            name="plot_datestart" required="required" class="form-control" id="datepicker1" readonly="readonly" value="<?php echo date('Y-m-d');?>" 
                                             placeholder="<?php echo __('Date Started placeholder') ?>">
                                        </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('Crop Name') ?><span class="required">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <select name="crop_code"  id="select-crop" class="col-sm-12">
                                        <?php foreach ($productcategoriesCrop as $key => $value):?>
                                                <optgroup label="<?php echo $value['productcategory_code'] ?>">
                                                
                                                <?php 
                                                    foreach ($value['Crop'] as $index => $item) :
                                                 ?>
                                                 <option value="<?php echo $item['crop_code'] ?>">
                                                    <?php echo $item['crop_code'].'('.$item['crop_name_en'].')'; ?>
                                                 </option>
                                                <?php endforeach; ?>
                                                </optgroup>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                           <?php echo __('Plot Area') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" required="required" name="plot_size_m2" class="form-control" placeholder="<?php echo __('plot area placeholder') ?>">
                                        </div>
                            </div> 
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                           <?php echo __('GPS X') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" required="required" name="plot_centroid_x" class="form-control" placeholder="<?php echo __('centroid_x placeholder') ?>">
                                        </div>
                            </div>   
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                           <?php echo __('GPS Y') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" required="required" name="plot_centroid_y" class="form-control" placeholder="<?php echo __('centroid_y placeholder') ?>">
                                        </div>
                            </div>  
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                           <?php echo __('Plot Crop Cycle') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <select name="plot_crop_cycle" id="plot-crop-cycle" class="col-sm-12">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                          
                                        </div>
                            </div>
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                           <?php echo __('Plot Type Treatment') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <select name="plot_type_treatment" id="plot_type_treatment" class="col-sm-12">
                                                <option value="Drumseeding">Drumseeding</option>
                                                <option value="Broadcasting">Broadcasting</option>
                                                <option value="FDP">FDP</option>
                                            </select>
                                          
                                        </div>
                            </div>  
                        </div>
                         
                    </div>   
                 
                    <div class="col-sm-6" style="float:left;" id="client_info">

                        <legend><?php echo __('Client Info')?></legend>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <?php echo __('Client') ?><span class="required">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <select name="client_id" required="required" class="col-sm-12" id="select-client">
                                   
                                    </select>
                                           
                                </div>
                            </div>
                            <div class="form group" id="client_plot_info">
                                
                            </div>
                            <div class="form group" id="client_vendor_info">
                                
                            </div>
                        </fieldset>
                              
                    </div> 
                    <div class="col-sm-6" style="float:left;" id="vendor_info">
                    </div>         
                    <div class="clearfix"></div>      
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="btn-toolbar">
                                    <button onclick="return validate(this.Form)" class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
                                    </button>
                                    <?php echo $this->Html->link($this->Html->tag('i',
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
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-daterangepicker/daterangepicker.min.js'></script>

<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $('#select-client').select2();  
        $('#select-vendor').select2();
        $('#select-crop').select2();
        $('#plot-crop-cycle').select2();
        $('#plot_type_treatment').select2();
        $('#project').select2();
        $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
        $('#datepicker1').datepicker({dateFormat:'yy-mm-dd'});
        checkClientPlot();
        getVendorClient();

        $('#fba_check').change(function(){
            if(this.checked) {
                $('#client_info').hide();
                checkVendorPlot();
                $('#vendor_info').show();
            }
            else
            {
                $('#client_info').show();
                $('#vendor_info').hide();
            }
        });
       
        $('#select-client').on('change',function(){
            checkClientPlot();
        });
        $('#select-vendor').on('change',function(){
            getVendorClient();
            $('#fba_check').trigger('change');
        });
       
        function checkClientPlot()
        {
            $.ajax({
              
                url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"checkClientPlot")) ?>',
                type: 'POST',
                data: {
                    client_id: $('#select-client').val()
                },
                success: function(data) {    
                    $('#client_plot_info').html(data);
                    $('#client_vendor_info').html('');
                }
            });
         
        }
        function getVendorClient()
        {
            $.ajax({
              
                url:'<?php echo $this->Html->url(array("controller"=>"ClientVendors","action"=>"getVendorClient")) ?>',
                type: 'POST',
                dataType:'json',
                data: {
                    vendor_code: $('#select-vendor').val()
                },
                success: function(data) {    
                     if(data.error ==false)
                    {
                        $('#select-client').html(data.data);
                        $('#select-client').select2();
                        checkClientPlot();
                    }
                    else
                    {
                        $('#client_vendor_info').html('<div class="alert alert-dismissable alert-danger">'+data.msg+'</div>');
                        $('#select-client').html('');
                        $('#client_plot_info').html('');
                        $('#select-client').select2();
                                   
                    }
                }
            });
        }

        function checkVendorPlot()
        {
            $.ajax({
              
                url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"checkVendorPlot")) ?>',
                type: 'POST',
                data: {
                    vendor_code: $('#select-vendor').val()
                },
                success: function(data) {    
                    $('#vendor_info').html(data);
                    $('#client_vendor_info').html('');
                }
            });
        }
    });
</script>