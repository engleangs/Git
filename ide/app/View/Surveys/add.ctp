<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Survey'), '/Surveys/listing');
$this->Html->addCrumb(__('Add New'), '/Surveys/add');

 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Survey') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Where will farmers spend their income?') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <select name="farmer_spend_income" id="where_farmer_spend" class="col-sm-12">
                                <option value="Invest in farm">Invest in farm</option>
                                <option value="Household necessities">Household necessities</option>
                                <option value="Children">Children</option>
                                <option value="Luxury Goods">Luxury Goods</option>
                                <option value="Other">Other</option>
                             
                            </select>
                           
                        </div>
                        <div class="col-sm-4" id="other">
                            
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('What is the proportion of produce that is sold?') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="proportion_produce_sold" class="form-control" placeholder="<?php echo __('What is the proportion of produce that is sold placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('What is the proportion of produce that is consumed?') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="proportion_produce_consumed" class="form-control" placeholder="<?php echo __('What is the proportion of produce that is consumed placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('What was the estimated amount of time saved?') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="estimated_amount_time_saved" class="form-control" placeholder="<?php echo __('What was the estimated amount of time saved placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('How did farmers spend their additional times?') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="farmers_spend_additional_times" class="form-control" placeholder="<?php echo __('How did farmers spend their additional times placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group" style="padding-left:200px;">
                        <div class="col-sm-3" id="fba-blog" style="margin-left:50px;">        
                            <div class="radio block">
                                                <label><input type="radio" id="harvestrice" name="harvest" value="HarvestRice"> <?php echo __("Harvest Rice")?><label>
                            </div>
                            
                        </div> 
                        <div class="col-sm-3">
                                    
                            <div class="radio block">
                                <label><input type="radio" id="harvestvegetable" value="HarvestVegetable" name="harvest"><?php echo __("Harvest Vegetable")?></label>
                            </div>
                                      
                        </div>

                    </div> 
                    <div class="clearfix"></div>
                        <div class="error"></div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Harvest') ?>
                        </label>
                        <div class="col-sm-4">
                            <select name="survey_harvest_id" id="survey_harvest_id" class="col-sm-12" >
                                
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
        $('#survey_harvest_id').select2(); 
        $('#where_farmer_spend').select2();
        $('#harvestrice').attr('checked',true); 
        $('#where_farmer_spend').change(function(){
           var value= $(this).val();
           if(value=='Other')
           {
                $('#other').html('<input type="text" required="required" name="other_farmer_spend_income" id="other_farmer_spend_income" class="form-control">');
           }
           else
           {
            $('#other').html('');
           }
          
        });
        
        $('#harvestrice').change(function(){
            if(this.checked)
            {
                $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"Surveys","action"=>"selectHarvestRice")) ?>',
                    type: 'POST',
                    dataType:'json',
                    data: {
                    },
                   
                    success: function (data) {    
                        if(data.error ==false)
                        {
                            $('#survey_harvest_id').html(data.data);
                            $('#survey_harvest_id').select2();
                            $('.error').html('');
                        }
                        else
                        {
                            $('.error').html('<div class="alert alert-dismissable alert-danger">'+data.msg+'</div>');
                            $('#survey_harvest_id').html('');
                            $('#survey_harvest_id').select2();
                                           
                        }
                    }

                });
                $('#harvestvegetable').attr('checked',false);
                       
            } 
        });
        $('#harvestvegetable').change(function(){
            if(this.checked)
            {
                $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"Surveys","action"=>"selectHarvestVegetable")) ?>',
                    type: 'POST',
                    dataType:'json',
                    data:{},
                                    
                    success: function (data) {    
                   
                       if(data.error ==false)
                        {
                            $('#survey_harvest_id').html(data.data);
                            $('#survey_harvest_id').select2();
                            $('.error').html('');
                        }
                        else
                        {
                            $('.error').html('<div class="alert alert-dismissable alert-danger">'+data.msg+'</div>');
                            $('#survey_harvest_id').html('');
                            $('#survey_harvest_id').select2();
                                           
                        }
                    }

                });
                $('#harvestrice').attr('checked',false);
               
            }  
        });
        $('#harvestrice').trigger('change');
        $('#harvestvegetable').trigger('change');
    });
</script>