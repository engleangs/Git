<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Topic'), '/Topics/listing');
$this->Html->addCrumb(__('Edit Topic'), '/Topics/edit/'.$data['Topic']['topic_id']);
 ?>
<div id="page-heading"></div>
<div class="container">
<div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['Topic']['topic_id']));?>" class="form-horizontal row-border"  method="post">            
    	<div class="panel panel-midnightblue">
	    	<div class="panel-heading">
		        <h4> <?php echo __('Edit Topic') ?></h4>	        
	    	</div>
    		<div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="topic_id" class="form-control" placeholder="<?php echo __('Code placeholder') ?>"
                            value="<?php echo $data['Topic']['topic_id'] ?>" readonly=readonly >
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Topic') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="topic" class="form-control" placeholder="<?php echo __('Topic placeholder') ?>" value="<?php echo $data['Topic']['topic']?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Type') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="type" id="select-srok" class="col-sm-12">
                                <option <?php  if($data['Topic']['type']=='vegetabletopic') echo 'selected="selected"'; ?> value='vegetabletopic'>Vegetable Topic</option>
                                <option <?php if($data['Topic']['type']=='ricetopic') echo 'selected="selected"'; ?> value='ricetopic'>Rice Topic</option>
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
   </form>

    </div>
</div>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
      $('#select-srok').select2();  
    });
</script>