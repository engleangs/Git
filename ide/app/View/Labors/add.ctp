<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Labor'), '/Labors/listing');
$this->Html->addCrumb(__('Add New'), '/Labors/add');
 ?>
 <div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method ="POST"> 
    	   <div class="panel panel-midnightblue">
            	<div class="panel-heading">
        	        <h4> <?php echo __('Add New Labor') ?></h4>	        
            	</div>
    	        <div class="panel-body collapse in">
                   
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Code') ?><span class="require">*</span> 
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" id="labor_code" name="labor_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error"></div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="labor_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="labor_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Unit') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="labor_unit" class="form-control" placeholder="<?php echo __('Unit placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Cost per Unit USD') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="labor_costper_unit_usd" class="form-control" placeholder="<?php echo __('Cost per Unit USD placeholder') ?>">
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
   
    </form>
    </div>
</div>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
      $('#select-plot').select2();  

      $('#labor_code').on('change',function(){
            checkExistingLaborCode();
        });
        function checkExistingLaborCode()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Labors","action"=>"checkExistingLaborCode")) ?>',
                type: 'POST',
                data:{
                    code :$('#labor_code').val(),
                },
                success:function(data){
                    $('.error').html(data);
                }
            });
        }
    });
</script>