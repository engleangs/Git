<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('FBA'), '/Fbas/listing');
$this->Html->addCrumb(__('Add New'), '/Fbas/add');

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New FBA') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" id="fba_code" name="fba_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('CA') ?>
                        </label>
                        <div class="col-sm-4" class="form-control" id="ca_code">
                                <select name="ca_code" id="select-ca" class="col-sm-12">
                                <?php foreach ($cas as $key => $value) {
                                 ?>
                          
                                <option value="<?php echo $value['CommercialAgronomist']['ca_code'] ?>">
                                    <?php echo $value['CommercialAgronomist']['ca_code'] ?>
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
                                <button class="btn-default btn" title="<?php echo __('Cancel Title') ?>"><?php echo __('Cancel') ?>
                                </button>
                                
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
        $('#select-ca').select2();
        $('#select-vendor').select2();

        $('#fba_code').on('change',function(){
            checkExistingFbaCode();
        });
        function checkExistingFbaCode()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Fbas","action"=>"checkExistingFbaCode")) ?>',
                type: 'POST',
                data:{
                    code :$('#fba_code').val(),
                },
                success:function(data){
                    $('.error').html(data);
                }
            });
        }
 
    });

</script>
