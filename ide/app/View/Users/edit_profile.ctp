<?php 
$user = CakeSession::read("Auth.User");

$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('User'), '/Users/editProfile');
$this->Html->addCrumb(__('Edit User Profile'), '/Users/editProfile/'.$user['user_id']);
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array('action'=>'saveprofile',$user['user_id']));?>" class="form-horizontal row-border" method="POST"> 
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                    <h4> <?php echo __('Edit User Profile') ?></h4>          
                </div>
                <div class="panel-body collapse in">
                          
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name English') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $data['User']['user_name_en'] ?>" name="user_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
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
                            <?php echo __('Username') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo $data['User']['user_username']?>" name="user_username" class="form-control" placeholder="<?php echo __('Username placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Password') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="password" <?php echo $data['User']['user_password']?> name="user_password" class="form-control" placeholder="<?php echo __('Password placeholder') ?>">
                        </div>
                    </div>          
                
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="btn-toolbar">
                                    <button class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
                                    </button>
                                    <button class="btn-default btn" title="<?php echo __('Cancel Title') ?>"><?php echo __('Cancel') ?>
                                    </button>
                                    
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
    });
</script>