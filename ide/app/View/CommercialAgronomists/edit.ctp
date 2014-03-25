<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('CommercialAgronomist'), '/CommercialAgronomists/listing');
$this->Html->addCrumb(__('Edit CA'), '/CommercialAgronomists/edit/'.$data['CommercialAgronomist']['ca_code']);
 ?>
<div id="page-heading"></div>
<div class="container">
<div class="row">
        <form action="<?php echo $this->Html->url(array('action'=>'save',$data['CommercialAgronomist']['ca_code']));?>" class="form-horizontal row-border"  method="post">            
    	<div class="panel panel-midnightblue">
	    	<div class="panel-heading">
		        <h4> <?php echo __('Edit CommercialAgronomist') ?></h4>	        
	    	</div>
    		<div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Code') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="ca_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>"
                            value="<?php echo $data['CommercialAgronomist']['ca_code'] ?>" readonly=readonly >
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
      $('#select-khum').select2();  
    });
</script>