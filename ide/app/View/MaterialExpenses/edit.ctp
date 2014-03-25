<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Material'), '/MaterialExpenses/listing');
$this->Html->addCrumb(__('Edit MaterialExpense'), '/MaterialExpenses/edit'.$data['MaterialExpense']['materialexpense_id']);

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['MaterialExpense']['materialexpense_id']));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Edit MaterialExpense') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="col-sm-6" style="float:left">
                        <legend></legend>
                        <fieldset>
                            <div class="panel-body">
                                     
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            <?php echo __('Code') ?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" required="required" name="materialexpense_id" class="form-control" readonly="readonly" value="<?php echo $data['MaterialExpense']['materialexpense_id'] ?>" 
                                             placeholder="<?php echo __('Code placeholder') ?>">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            <?php echo __('Date') ?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="text" required="required" name="materialexpense_date" class="form-control" id="datepicker" readonly="readonly" value="<?php echo $data['MaterialExpense']['materialexpense_date']?>" 
                                             placeholder="<?php echo __('Date  placeholder') ?>">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class ="form-group">
                                        <label class="col-sm-3 control-label">
                                            <?php echo __('Quantity')?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-6">
                                           <input type="text" required="required" value="<?php echo $data['MaterialExpense']['materialexpense_quantity'] ?>" id="quantity" name="materialexpense_quantity" class="form-control" placeholder ="<?php echo __('Quantity placeholder')?>"/>
                                            
                                        </div>
                                    </div>
                                    
                                    
                            </div>
                        </fieldset>
                    </div>
                    
                    <div class="clearfix"></div>
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

<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/js/jqueryui.css' />
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-daterangepicker/daterangepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 

<script type="text/javascript">
  
$(document).ready(function(){
      $("#datepicker,#datepicker3").datepicker( {dateFormat: 'yy-mm-dd'});
      

});
    
</script>



