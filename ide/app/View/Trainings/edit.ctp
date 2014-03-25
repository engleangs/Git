<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Training'), '/Trainings/listing');
$this->Html->addCrumb(__('Edit'), '/Trainings/edit'.$data['Training']['training_id']);

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['Training']['training_id']));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Edit Training') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <input type="hidden" name="training_id" value="<?php echo $data['Training']['training_id']?>"> 
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Date Started') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                        <input type="text" required="required" value="<?php echo $data['Training']['training_datestart'] ?>" readonly="readonly" name="training_datestart" id="datepicker" class="form-control" placeholder="<?php echo __('Date placeholder ') ?>">
                        </div>
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Date Finish') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                        <input type="text" required="required" value="<?php echo $data['Training']['training_datefinish'] ?>" readonly="readonly" name="training_datefinish" id="datepicker2" class="form-control" placeholder="<?php echo __('Date placeholder') ?>">
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Responsible Staff') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" value ="<?php echo $data['Training']['training_responsible_staff']?>" name="training_responsible_staff"  class="form-control" placeholder="<?php echo __('Responsible Staff placeholder') ?>">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Crop') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="crop_code" id="select-crop" class="col-sm-12">
                            <?php
                                foreach ($crops as $key => $value)
                                {
                            ?>
                                <option <?php if($data['Training']['crop_code']==$value['Crop']['crop_code']) echo 'selected="selected"' ?> value="<?php echo $value['Crop']['crop_code'] ?>">
                                    <?php echo $value['Crop']['crop_name_en'].' : '.$value['Crop']['crop_code'] ?> 
                                </option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Crop Type') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4" required="required" class="form-control">
                            <input type="text" readonly="readonly" class="form-control"  name="crop_type" id="select-crop-type" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                            <div class="col-sm-5">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('Khet') ?>
                                </label>
                                <div class="col-sm-8" class="form-control">                                 
                                    <select name="khet_code" id="select-khet" class="col-sm-12">
                                        
                                        <?php 
                                            foreach ($khets as $key => $value) :
                                         ?>
                                            <option value="<?php 
                                                echo $value['Khet']['khet_code'] ?>"
                                                <?php if($selectKhetCode
                                                            ==
                                                        $value['Khet']['khet_code'])
                                                        echo 'selected="selected" ' ?>
                                                >
                                                    <?php 
                                                    echo $value['Khet']['khet_name_en'] .' : '.$value['Khet']['khet_name_kh'];?></option>
                                        <?php endforeach; ?>
                                     </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-2 control-label">
                                    <?php echo __('Srok') ?>
                                </label>
                                    <div class="col-sm-7" class="form-control">
                                        <select name="srok_code" id="select-srok" class="col-sm-12">
                                            
                                         </select>
                                    </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('Khum') ?>
                                </label>
                                <div class="col-sm-8" class="form-control">
                                    <select name="khum_code" id="select-khum" class="col-sm-12">
                                            
                                    </select>
                                </div>
                            </div>
                                 
                            <div class="col-sm-6">
                                <label class="col-sm-2 control-label">
                                    <?php echo __('Phum') ?>
                                </label>
                                <div class="col-sm-7" class="form-control">
                                    <select class="col-sm-12" id="select-phum" name="phum_code">                                                
                                    </select>
                                </div>
                            </div>
                                    
                        </div>                
                </div>
                <div class="collapse in" style="border-top:none;">
                    <div class="col-sm-4" style="float:left;" >
                        <legend><?php echo __('Client to Training')?></legend>
                        <fieldset>
                            <div class="panel-body " style="border:0;padding:0;">
                                <?php echo $this->element('trainingclient'); ?>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-4" style="float:left;" >
                        <legend><?php echo __('NonClient to Training')?></legend>
                        <fieldset>
                            <div class="panel-body" style="border:0;padding:0;">
                               <?php echo $this->element('trainingnonclient'); ?>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-4" style="float:left;" >
                        <legend><?php echo __('Vendor to Training')?></legend>
                        <fieldset>
                            <div class="panel-body" style="border:0; padding:0;">
                               <?php echo $this->element('trainingvendor'); ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="clearfix"></div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-5">
                                <div class="btn-toolbar">
                                    <button onclick="return validate(this.Form)" id="save" class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
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
          <input type="hidden" id="hidden-phum-code" 
    value="<?php echo $data['Training']['phum_code'] ?>">         
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
    $(document).ready(function()
    {
        $('#select-client').select2();  
        $('#select-nonclient').select2();  
        $('#select-crop').select2();  
        $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
        $("#datepicker2").datepicker({dateFormat: 'yy-mm-dd'});
        $('#select-phum').select2();
        $('#select-khum').select2();
        $('#select-srok').select2();
        $('#select-khet').select2();  
       
        selectTypeCrop();
        $('#select-crop').on('change',function(){
            selectTypeCrop();
            checkExsting();
        });
        $('#datepicker').on('change',function(){
             checkExsting();
        });
        $('#datepicker2').on('change',function(){
          
            checkExsting();
        });
        function selectTypeCrop()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Crops","action"=>"selectCropType")) ?>',
            type: 'POST',
            data: {
                crop_code: $('#select-crop').val()
            },
           
            success: function (data) {    
           
               $('#select-crop-type').val(data);
            }

            });
        }

        function checkExsting()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Trainings","action"=>"checkExsting")) ?>',
            type: 'POST',
            data: {
                crop_code: $('#select-crop').val(),
                date_start: $('#datepicker').val(),
                date_finish: $('#datepicker2').val()
            },
           
            success: function (data) {    
           
               $('.error').html(data);
            }

            });
        }
       
        /*------------Query Khet by Phum-------------*/
        $('#select-khet').on('change',function(){
           getSrokCode();
           
        });
        $('#select-srok').on('change',function(){
          getKhumCode();
        });
        $('#select-khum').on('change',function(){
            getKhumCode();
        });
        function getSrokCode()
        {
            $.ajax({
             
                url:'<?php echo $this->Html->url(array("controller"=>"Sroks","action"=>"getSrokByPhum")) ?>'+"/"+$('#hidden-phum-code').val(),
                type: 'POST',
                data:
                {
                    khet_code :$('#select-khet').val(),
                },
                success:function(data){
                    $('#select-srok').html(data);
                    $('#select-srok').select2();
                   getKhumCode();
                }
             
            });
        }
        function getKhumCode()
        {
            $.ajax({
             
                url:'<?php echo $this->Html->url(array("controller"=>"Khums","action"=>"getKhumByPhum")) ?>'+"/"+$('#hidden-phum-code').val(),
                type: 'POST',
                data:
                {
                    srok_code :$('#select-srok').val(),
                },
                success:function(data){
                    $('#select-khum').html(data);
                    $('#select-khum').select2();
                    getPhumCode();
                }
             
            });
        }
        function getPhumCode()
        {
            $.ajax({
             
                url:'<?php echo $this->Html->url(array("controller"=>"Phums","action"=>"getPhumByPhum")) ?>'+"/"+$('#hidden-phum-code').val(),
                type: 'POST',
                data:{
                    khum_code :$('#select-khum').val(),
                },
                success:function(data){
                    $('#select-phum').html(data);
                    $('#select-phum').select2();
                }
             
            });
        }
        $('#select-khet').trigger('change');
        
    
    });
</script>