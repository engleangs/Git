<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Product'), '/Products/listing');
$this->Html->addCrumb(__('Edit Product'), '/Products/edit/'.$data['Product']['product_code']);
 ?>
<div id="page-heading"></div>
<div class="container">
<div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['Product']['product_code']));?>" class="form-horizontal row-border"  method="post" enctype="multipart/form-data">            
    	<div class="panel panel-midnightblue">
	    	<div class="panel-heading">
		        <h4> <?php echo __('Edit Product') ?></h4>	        
	    	</div>
    		<div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="product_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>"
                            value="<?php echo $data['Product']['product_code'] ?>" readonly=readonly >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Product Brand') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="product_brand" class="form-control" placeholder="<?php echo __('Product Brand placeholder') ?>" value="<?php echo $data['Product']['product_brand']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Unit') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="product_unit" class="form-control" placeholder="<?php echo __('Unit placeholder') ?>" value="<?php echo $data['Product']['product_unit']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Price per Unit Fab USD') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="product_priceperunit_fab_usd" class="form-control" placeholder="<?php echo __('Price per Unit Fab USD placeholder') ?>" value="<?php echo $data['Product']['product_priceperunit_fab_usd']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Price per Unit General USD') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="product_priceperunit_general_usd" class="form-control" placeholder="<?php echo __('Price per Unit General USD placeholder') ?>" value="<?php echo $data['Product']['product_priceperunit_general_usd']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Status') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="product_status" class="form-control" placeholder="<?php echo __('Status placeholder') ?>" value="<?php echo $data['Product']['product_status'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo __("Photo")?>
                            </label>
                            <div class="col-sm-4">
                                <input type="file" name="file" class="form-control" placeholder="<?php echo __('Photo placeholder') ?>">
                                <input type="hidden" name="photo" value="<?php echo $data['Product']['product_photo']?>" >
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
                                <option 
                                	<?php if($data['Product']['productcategory_code']==$value['ProductCategory']['productcategory_code']) echo 'selected="selected"' ?>value="<?php echo $value['ProductCategory']['productcategory_code'] ?>">
                                    <?php echo $value['ProductCategory']['productcategory_code'].' ('. $value['ProductCategory']['productcategory_name_en'].') '; ?>
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
      $('#select-productcategory').select2();  
      $('#select-crop').select2();  
    });
</script>