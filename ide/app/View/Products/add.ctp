<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Product'), '/Products/listing');
$this->Html->addCrumb(__('Add New'), '/Products/add');
?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post" enctype="multipart/form-data">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Product') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" id="product_code" name="product_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error"></div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Product Brand') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="product_brand" class="form-control" placeholder="<?php echo __('Product Brand placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Unit') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="product_unit" class="form-control" placeholder="<?php echo __('Unit placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Price per Unit Fab USD') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="product_priceperunit_fab_usd" class="form-control" placeholder="<?php echo __('Price per Unit Fab USD placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Price per Unit General USD') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="product_priceperunit_general_usd" class="form-control" placeholder="<?php echo __('Price per Unit General USD placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Status') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="product_status" class="form-control" placeholder="<?php echo __('Status placeholder') ?>">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __("Photo")?>
                        </label>
                        <div class="col-sm-4">
                            <input type="file" name="file" class="form-control" placeholder="<?php echo __('Photo placeholder') ?>">
                        </div>
                    </div>         
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('ProductCategory') ?>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="productcategory_code" id="select-productcategory" class="col-sm-12">
                            <?php
                                foreach ($productcategorys as $key => $value)
                                {
                            ?>
                                <option value="<?php echo $value['ProductCategory']['productcategory_code'] ?>">
                                    <?php echo $value['ProductCategory']['productcategory_code'].' ('. $value['ProductCategory']['productcategory_name_en'].') '; 
                                    ?>
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
 <link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
      $('#select-productcategory').select2();
      $('#select-crop').select2();  

      $('#product_code').on('change',function(){
            checkExistingProductCode();
        });
        function checkExistingProductCode()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Products","action"=>"checkExistingProductCode")) ?>',
                type: 'POST',
                data:{
                    code :$('#product_code').val(),
                },
                success:function(data){
                    $('.error').html(data);
                }
            });
        }
    });
</script>


