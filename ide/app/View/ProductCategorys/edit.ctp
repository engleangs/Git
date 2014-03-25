<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('ProductCategory'), '/ProductCategorys/listing');
$this->Html->addCrumb(__('Edit Category'), '/ProductCategorys/edit/'.$data['ProductCategory']['productcategory_code']);
 ?>
<div id="page-heading"></div>
<div class="container">
<div class="row">
        <form  id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['ProductCategory']['productcategory_code']));?>" class="form-horizontal row-border"  method="post">            
    	<div class="panel panel-midnightblue">
	    	<div class="panel-heading">
		        <h4> <?php echo __('Edit Category') ?></h4>	        
	    	</div>
    		<div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="productcategory_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>"
                            value="<?php echo $data['ProductCategory']['productcategory_code'] ?>" readonly=readonly >
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="productcategory_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>" value="<?php echo $data['ProductCategory']['productcategory_name_en']?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="productcategory_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>" value="<?php echo $data['ProductCategory']['productcategory_name_kh'] ?>">
                        </div>
                    </div>     
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="btn-toolbar">
                        <button  onclick="return validate(this.Form)" class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
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