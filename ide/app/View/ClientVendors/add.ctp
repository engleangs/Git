<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('ClientVendor'), '/clientvendors/listing');
$this->Html->addCrumb(__('Add New'), '/clientvendors/add');
?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Client Vendor') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                       
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Client') ?>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="client_id" id="select-productcategory" class="col-sm-12">
                            <?php
                                foreach ($clients as $key => $value)
                                {
                            ?>
                                <option value="<?php echo $value['Client']['client_id'] ?>">
                                    <?php echo $value['Client']['client_id']; ?>
                                </option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Vednor') ?>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="vendor_code" id="select-crop" class="col-sm-12">
                            <?php
                                foreach ($vendors as $key => $value)
                                {
                            ?>
                                <option value="<?php echo $value['Vendor']['vendor_code'] ?>">
                                    <?php echo $value['Vendor']['vendor_code']; ?>
                                </option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Date Started') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="clientvendor_datestarted" class="form-control" id="datepicker" 
                             placeholder="<?php echo __('Date Started placeholder') ?>">
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
       <input type="hidden" value="0" name="id">          
    </form>
        
    </div>
    </div>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/js/jqueryui.css' />
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-daterangepicker/daterangepicker.min.js'></script>
<script type="text/javascript">
    $(document).ready(function(){
      $("#datepicker,#datepicker3").datepicker( {dateFormat: 'yy-mm-dd'});
    });
</script>
 <link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
      $('#select-productcategory').select2();
      $('#select-crop').select2();  
    });
</script>


