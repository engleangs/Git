<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('User'), '/Users/listing');
$this->Html->addCrumb(__('Add New'), '/Users/add');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="POST"> 
    	    <div class="panel panel-midnightblue">
            	<div class="panel-heading">
        	        <h4> <?php echo __('Add New User') ?></h4>	        
            	</div>
    	        <div class="panel-body collapse in">
                          
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" id="user_id" required="required" name="user_id" class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error"></div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="user_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="user_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Permission') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <SELECT class="col-sm-12" id="permission" name="user_permission">
                                    <option value="superadmin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                            </SELECT>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Username') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" id="user_name" required="required" name="user_username" class="form-control" placeholder="<?php echo __('Username placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error_username"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Password') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="password" required="required" id="password"name="user_password" class="form-control" placeholder="<?php echo __('Password placeholder') ?>">
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Confirm Password') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="password" id="confirm" name="user_confirmpassword" class="form-control" placeholder="<?php echo __('Confirm Password placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error_password"></div>
                        </div>
                    </div>          
                
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="btn-toolbar">
                                    <button onclick="return validate(this.Form)" class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
                                    </button>
                                    <?php echo $this->Html->link($this->Html->tag('i',
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
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
      $('#permission').select2();  

        $('#user_id').on('change',function(){
            checkExistingUserId();
        });
        function checkExistingUserId()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Users","action"=>"checkExistingUserId")) ?>',
                type: 'POST',
                data:{
                    code :$('#user_id').val(),
                },
                success:function(data){
                    $('.error').html(data);
                }
            });
        }
        $('#user_name').on('change',function(){
            checkExistingUserName();
        });
        function checkExistingUserName()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Users","action"=>"checkExistingUserName")) ?>',
                type: 'POST',
                data:{
                    user_name :$('#user_name').val(),
                },
                success:function(data){
                    $('.error_username').html(data);
                }
            });
        }
        $('#confirm').on('change',function(){
            var confirm=$(this).val();
            var password =$('#password').val();
            if(confirm!=password)
            {
                 $('.error_password').html('<div class="alert alert-dismissable alert-danger">Confirm Password not match. Try again!</div>');
            }
            else
            {
                $('.error_password').html('');
            }
        });
        $('#password').on('change',function(){
            var confirm=$('#confirm').val();
            var password =$(this).val();
            if(confirm!=password)
            {
                 $('.error_password').html('<div class="alert alert-dismissable alert-danger">Confirm Password not match. Try again!</div>');
            }
            else
            {
                $('.error_password').html('');
            }
        });
    });
</script>