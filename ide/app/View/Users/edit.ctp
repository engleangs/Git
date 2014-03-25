<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('User'), '/Users/listing');
$this->Html->addCrumb(__('Edit User'), '/Users/edit/'. $data['User']['user_id']);
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['User']['user_id']));?>" class="form-horizontal row-border" method="POST"> 
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                    <h4> <?php echo __('Edit User') ?></h4>          
                </div>
                <div class="panel-body collapse in">
                          
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" id="user_id" required="required" name="user_id" value="<?php echo $data['User']['user_id'] ?>" readonly="readonly" class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error"></div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" value="<?php echo $data['User']['user_name_en'] ?>" name="user_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $data['User']['user_name_kh']?>" name="user_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Permission') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <SELECT class="col-sm-12" id="permission" name="user_permission">
                            	<option 
                                    <?php if($data['User']['user_permission']=='superadmin') echo 'selected="selected"'?>
                                    value="superadmin">
                                    Super Admin
                                        
                                </option>
                                <option 
                                    <?php if($data['User']['user_permission']=='admin') echo 'selected="selected"'?>
                                    value="admin">
                                    Admin
                                </option>
                                <option 
                                    <?php if($data['User']['user_permission']=='user') echo 'selected="selected"'?>
                                    value="user">
                                    User
                                </option>
                                <option 
                                    <?php if($data['User']['user_permission']=='manager') echo 'selected="selected"'?>
                                    value="manager">
                                    Manager
                                </option>
                                 
                            </SELECT>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Username') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" id="user_name" required="required" value="<?php echo $data['User']['user_username']?>" name="user_username" class="form-control" placeholder="<?php echo __('Username placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error_username"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Password') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="password" value="<?php echo $data['User']['user_password'] ?>" id="password" required="required" name="user_password" class="form-control" placeholder="<?php echo __('Password placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error_password"></div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Confirm Password') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="password" value="<?php echo $data['User']['user_password'] ?>" id="confirm" name="user_confirmpassword" class="form-control" placeholder="<?php echo __('Confirm Password placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error_confirm"></div>
                            
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
            checkConfirmPassword();
            
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
            if(confirm==password)
            {
                $('.error_confirm').html('');
                $('.error_password').html('');
            }
        });
        $('#password').on('change',function(){
            var confirm=$('#confirm').val();
            var password =$(this).val();
            if(password!=confirm)
            {
                 $('.error_password').html('<div class="alert alert-dismissable alert-danger">Confirm Password not match. Try again!</div>');
            }
            if(confirm==password)
            {
               $('.error_password').html('');
               $('.error_confirm').html('');
            }
        }); 
        function checkConfirmPassword()
        {
            var confirm=$('#confirm').val();
            var password =$('password').val();
            if(confirm!=password)
            {
                 $('.error_password').html('<div class="alert alert-dismissable alert-danger">Confirm Password not match. Try again!</div>');
            }
            else
            {
                $('.error_password').html('');
            }
        }
    });
</script>