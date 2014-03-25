<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Project'), '/Projects/listing');
$this->Html->addCrumb(__('Add New'), '/Projects/add');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form  id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
        	    <div class="panel-heading">
    	           <h4> <?php echo __('Add New Project') ?></h4>	        
        	    </div>
            	<div class="panel-body collapse in">
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="project_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>
                  <!--   <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Client') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <select name="client_id" id="select-client" class="col-sm-12">
                                <?php foreach ($clients as $key => $value){ ?>
                                <option value="<?php echo $value['Client']['client_id'] ?>">
                                <?php echo $value['Client']['client_name_en']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Fba') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <select name="fba_code" id="select-fba" class="col-sm-12">
                                <?php foreach ($fbas as $key => $value){ ?>
                                <option value="<?php echo $value['Fba']['fba_code'] ?>">
                                <?php echo $value['Fba']['fba_code']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div> -->       
                                    
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
        $('#select-client').select2();  
        $('#select-fba').select2();      
    });
</script>