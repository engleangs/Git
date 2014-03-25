<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Crop'), '/Crops/listing');
$this->Html->addCrumb(__('Edit Crop'), '/Crops/edit/'.$data['Crop']['crop_code']);
 ?>
<div id="page-heading"></div>
<div class="container">
<div class="row">
        <form action="<?php echo $this->Html->url(array('action'=>'save',$data['Crop']['crop_code']));?>" class="form-horizontal row-border"  method="post">            
    	<div class="panel panel-midnightblue">
	    	<div class="panel-heading">
		        <h4> <?php echo __('Edit Crop') ?></h4>	        
	    	</div>
    		<div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Code') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="crop_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>"
                            value="<?php echo $data['Crop']['crop_code'] ?>" readonly=readonly >
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name English') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="crop_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>" value="<?php echo $data['Crop']['crop_name_en']?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="crop_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>" value="<?php echo $data['Crop']['crop_name_kh'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Crop Type') ?>
                        </label>
                        <div class="col-sm-4">
                            <select name="crop_type" id="select-crop-type" class="col-sm-12"> 
                                <option <?php  if($data['Crop']['crop_type']=='vegetable') echo 'selected="selected"'; ?> value='vegetable'>Vegetable</option>
                                <option <?php if($data['Crop']['crop_type']=='rice') echo 'selected="selected"'; ?> value='rice'>Rice</option> 
                            </select>
                        </div>
                    </div>     
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="btn-toolbar">
                        <button class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
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
   </form>

    </div>
</div>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
      $('#select-crop-type').select2();  
    });
</script>