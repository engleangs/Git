<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('FieldDay'), '/FieldDays/listing');
$this->Html->addCrumb(__('Add New'), '/FieldDays/add');

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Field Day') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Field Date') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                        <input type="text" required="required" value="<?php echo date('Y-m-d') ?>" readonly="readonly" name="field_day_date" id="datepicker" class="form-control" placeholder="<?php echo __('Date placeholder') ?>">
                        </div>
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Subject of Event') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                        <input type="text" required="required" name="field_day_subject"  class="form-control" placeholder="<?php echo __('Subject placeholder') ?>">
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Responsible Staff') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="responsible_staff"  class="form-control" placeholder="<?php echo __('Responsible Staff placeholder') ?>">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Type of Event') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text"  required="required" class="form-control" placeholder="<?php echo __('Type of Event placeholder') ?>"  name="type_of_events" class="col-sm-12">
                        </div>
                    </div>
                </div>
                <div class="collapse in" style="border-top:none;">
                    <div class="col-sm-6" style="float:left;" >
                        <legend><?php echo __('Add Client to Field Day')?></legend>
                        <fieldset>
                            <div class="panel-body " style="border:0;">
                                <?php echo $this->element('clientfieldday'); ?>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6" style="float:left;" >
                        <legend><?php echo __('Add NonClient to Field Day')?></legend>
                        <fieldset>
                            <div class="panel-body" style="border:0;">
                               <?php echo $this->element('nonclientfieldday'); ?>
                            </div>
                        </fieldset>
                    </div>

                </div>
                <div class="clearfix"></div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
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
          <input type="hidden" value="0" name="id">          
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
    $(document).ready(function(){
        $('#select-client').select2();  
        $('#select-nonclient').select2();  
        $('#select-crop').select2();  
        $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
        $("#datepicker2").datepicker({dateFormat: 'yy-mm-dd'});
           
    });
</script>