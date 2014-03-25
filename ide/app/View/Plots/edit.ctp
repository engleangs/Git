<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Plot'), '/Plots/listing');
$this->Html->addCrumb(__('Edit Plot'), '/Plots/edit'.$data['Plot']['plot_id']);

 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
    
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['Plot']['plot_id']));?>" class="form-horizontal row-border" method="post">    
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Edit Plot') ?></h4>         
                </div>
                        <div class="panel-body collapse in">  
                            <div class="form-group">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('Project') ?><span class="required">*</span>
                                </label>
                                <div class="col-sm-4">
                                    <select name="project_id" id="project" class="col-sm-12">
                                        <?php foreach ($projects as $key => $value) {
                                         ?>
                                            <option <?php if($data['Plot']['project_id']==$value['Project']['project_id']) echo 'selected="selected"' ?> value="<?php echo $value['Project']['project_id'] ?>">
                                                <?php echo $value['Project']['project_id'].' ( '.$value['Project']['project_name_en'].' ) ';?>
                                            </option>
                                        <?php
                                        }?>
                                    </select>
                                   
                                </div>
                            </div>    
                                                
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <?php echo __('Date Planting') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="text" required="required" name="plot_dateplanting" class="form-control" id="datepicker" readonly="readonly" value="<?php echo $data['Plot']['plot_dateplanting'];?>" 
                                             placeholder="<?php echo __('Date Planting placeholder') ?>">
                                        </div>
                            </div>
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <?php echo __('Date Started') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="text" 
                                            name="plot_datestart" required="required" class="form-control" id="datepicker1" readonly="readonly" value="<?php echo $data['Plot']['plot_datestart'];?>" 
                                             placeholder="<?php echo __('Date Started placeholder') ?>">
                                        </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('Crop Name') ?><span class="required">*</span>
                                </label>
                                <div class="col-sm-4">
                                    <select name="crop_code"  id="select-crop" class="col-sm-12">
                                        <?php foreach ($productcategoriesCrop as $key => $value):?>
                                                <optgroup label="<?php echo $value['productcategory_code'] ?>">
                                                
                                                <?php 
                                                foreach ($value['Crop'] as $index => $item) :
                                                 ?>
                                                 <option 
                                                 <?php if($data['Plot']['crop_code']==$item['crop_code']) echo'selected="selected"' ?>
                                                 value="<?php echo $item['crop_code'] ?>">
                                                    <?php echo $item['crop_code'].' ( '.$item['crop_name_en'].' )'; ?>
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
                                        <div class="col-sm-4">
                                            <input type="text" required="required" name="plot_size_m2" value ="<?php echo $data['Plot']['plot_size_m2'] ?>" class="form-control" placeholder="<?php echo __('plot area placeholder') ?>">
                                        </div>
                            </div> 
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                           <?php echo __('GPS X') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="text" required="required" name="plot_centroid_x" value ="<?php echo $data['Plot']['plot_centroid_x'] ?>" class="form-control" placeholder="<?php echo __('centroid_x placeholder') ?>">
                                        </div>
                            </div>   
                            <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                           <?php echo __('GPS Y') ?><span class="required">*</span>
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="text" required="required" name="plot_centroid_y" value ="<?php echo $data['Plot']['plot_centroid_y'] ?>" class="form-control" placeholder="<?php echo __('centroid_y placeholder') ?>">
                                        </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('Plot Crop Cycle') ?><span class="require">*</span>
                                </label>
                                <div class="col-sm-4">
                                    <select name="plot_crop_cycle" id="plot_crop_cycle" class="col-sm-12">
                                        <option <?php if($data['Plot']['plot_crop_cycle']=='1') echo 'selected="selected"' ?> value="1">1</option>
                                        <option <?php if($data['Plot']['plot_crop_cycle']=='2') echo 'selected="selected"' ?> value="2">2</option>
                                        <option <?php if($data['Plot']['plot_crop_cycle']=='3') echo 'selected="selected"' ?> value="3">3</option> 
                                    </select>
                                </div>
                         
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('Plot Type Treatment') ?><span class="require">*</span>
                                </label>
                                <div class="col-sm-4">
                                    <select name="plot_type_treatment" id="plot_type_treatment" class="col-sm-12">
                                        <option <?php if($data['Plot']['plot_type_treatment']=='Drumseeding') echo 'selected="selected"' ?> value="Drumseeding">Drumseeding</option>
                                        <option <?php if($data['Plot']['plot_type_treatment']=='Broadcasting') echo 'selected="selected"' ?> value="Broadcasting">Broadcasting</option>
                                        <option <?php if($data['Plot']['plot_type_treatment']=='FDP') echo 'selected="selected"' ?> value="FDP">FDP</option> 
                                    </select>
                                </div>
                         
                            </div>   
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
        $('#project').select2();
        $('#plot_type_treatment').select2();
        $('#plot_crop_cycle').select2();
        $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
        $('#datepicker1').datepicker({dateFormat:'yy-mm-dd'});
        checkClientPlot();
        getVendorClient();
        $('#fba_check').change(function(){
            if(this.checked) {
                $('#client_info').hide();
            }
            else
            {
                $('#client_info').show();
            }
        });
        $('#select-client').on('change',function(){
            checkClientPlot();
        });
        $('#select-vendor').on('change',function(){
            getVendorClient();
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
                        $('.client_plot_info').html('<div class="alert alert-dismissable alert-danger">'+data.msg+'</div>');
                        $('#select-client').html('');
                        $('#select-client').select2();
                                   
                    }
                }
            });
        }
    });
</script>