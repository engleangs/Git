<?php 
    echo $this->Form->create('User')
 ?>
<div class="focusedform">
    <div class="verticalcenter">
        <div class="panel panel-primary">
            <a class="navbar-brand" href="<?php echo $this->webroot; ?>">IDE Cambodia </a>
        </div>
        <div style="clear:both"></div>
        <div class="panel panel-primary">
            <div class="panel-body">
                <h4 class="text-center" style="margin-bottom: 25px;"><?php 
                    echo $this->Session->flash('auth');
                    echo $this->Session->flash();

                 ?> 
                </h4>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i>
                            </span>
                            <input type="text" class="form-control" id="username" 
                                        name="data[User][user_username]"
                                        placeholder="Username"> 
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" 
                                        name="data[User][user_password]"
                                        placeholder="Password" />
                            </div>
                    </div>
                </div>
                           
            </div>
            <div class="panel-footer">              
                <div>
                    
                   <button class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
 </div>
</div>
</form>
