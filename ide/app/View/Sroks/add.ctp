<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Srok'), '/Sroks/listing');
$this->Html->addCrumb(__('Add New'), '/Sroks/add');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
    	<form id="adminForm"
        data-validate="parsley"
        action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Srok') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" id="srok_code" required="required" name="srok_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error"></div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="srok_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="srok_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Khet') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="khet_code" id="select-khet" class="col-sm-12">
                            <?php
                                foreach ($khets as $key => $value)
                                {
                            ?>
                                <option value="<?php echo $value['Khet']['khet_code'] ?>">
                                    <?php echo $value['Khet']['khet_name_en'] .' : '.$value['Khet']['khet_code']; ?>
                                </option>
                            <?php
                                }
                            ?>
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
   </div>

    </div>
</div>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
      $('#select-khet').select2(); 

      $('#srok_code').on('change',function(){
            checkExistingKhetCode();
        });
        function checkExistingKhetCode()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Sroks","action"=>"checkExistingSrokCode")) ?>',
                type: 'POST',
                data:{
                    code :$('#srok_code').val()
                  
                },
                success:function(data){
                    $('.error').html(data);
                }
            });
        } 
    });
</script>