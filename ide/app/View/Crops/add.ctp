<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Crop'), '/Crops/listing');
$this->Html->addCrumb(__('Add New'), '/Crops/add');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form  id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Crop') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" id="crop_code" required="required" name="crop_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error"></div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="crop_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="crop_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Crop Type') ?>
                        </label>
                        <div class="col-sm-4">
                            <select name="crop_type" id="select-crop-type" class="col-sm-12" >
                                <option value="vegetable">Vegetable</option>
                                <option value="rice">Rice</option>
                            </select>
                        </div>
                    </div>
                    <div class="crop_season">
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Product') ?>
                        </label>
                        <div class="col-sm-4">
                            <select name="product_code" id="select-product" class="col-sm-12" >
                            <?php foreach ($product as $key => $value) {?>
                                <option value="<?php echo $value['Product']['product_code']?>">
                                    <?php echo $value['Product']['product_code'].' ( '.$value['Product']['product_brand'] .')';?>
                                </option>
                            <?php } ?>
                            </select>
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

            </div>
       </div>
    </div>
       <input type="hidden" value="0" name="id">          
    </form>
    </div>
</div>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $('#select-crop-type').select2(); 
        $('#select-product').select2(); 

        $('#crop_code').on('change',function(){
            checkExistingCropCode();
        });
        selectCrop_Season();
        $('#select-crop-type').on('change',function(){
            selectCrop_Season();
        });
        function checkExistingCropCode()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Crops","action"=>"checkExistingCropCode")) ?>',
                type: 'POST',
                data:{
                    code :$('#crop_code').val(),
                },
                success:function(data){
                    $('.error').html(data);
                }
            });
        }

        function selectCrop_Season()
        {
            var crop_type=$('#select-crop-type').val();
            console.log(crop_type);
            if(crop_type=='rice')
            {
                $('.crop_season').html('<div class="form-group">'+
                            '<label class="col-sm-3 control-label">'+
                            '<?php echo __('Crop Season') ?></label>'+
                            '<div class="col-sm-4">'+
                                '<select name="crop_season" id="select-crop-season" class="col-sm-12" >'+
                                    '<option value="wetseason">Wet Season</option>'+
                                    '<option value="dryseason">Dry Season</option>'+
                                '</select>'+
                            '</div>'+
                        '</div>');
                $('#select-crop-season').select2();
            }
            else
            {
                $('.crop_season').html('');
            }
        }

    });
</script>