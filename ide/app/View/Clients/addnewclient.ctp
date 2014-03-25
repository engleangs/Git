 
<div id="page-heading">

</div>

<div class="container" style="">
    <div class="row">
        <form  id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="POST">
    	    <div class="panel panel-midnightblue" style="margin-bottom:0px;">        
               
    	        <div class="panel-body collapse in">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" id="client_en" name="client_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                        	<?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" id="client_kh" name="client_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="radio" class="col-sm-3 control-label">
                            <?php echo __('Gender') ?>
                        </label>
                        <div class="col-sm-6">
                                <div class="radio block">
                                    <label>
                                    <input type="radio" class="client_gender" value="Female" name="client_gender"> <?php echo __("Female")?></label>
                                </div>
                                <div class="radio block">
                                    <label><input type="radio" class="client_gender"  value="Male" name="client_gender" checked><?php echo __("Male")?></label>
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Date of birth') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo date('Y-m-d');?>" readonly="readonly" id="client_age" name="client_date_of_birth" class="form-control" placeholder="<?php echo __('Date of birth placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Phone') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" id="client_phone" name="client_phone" class="form-control" placeholder="<?php echo __('Phone placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Date Started') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" readonly="readonly" value="<?php echo date('Y-m-d'); ?>" name="client_datestarted" class="form-control client_date" id="datepicker" 
                             placeholder="<?php echo __('Date Started placeholder') ?>">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Date Ended') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="client_date_ended" class="form-control" id="datepicker_branch" readonly="readonly" value="<?php echo date('Y-m-d');?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Khet') ?>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="khet_code" id="select-khet" class="select-khet col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Srok') ?>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="srok_code" id="select-srok" class="select-srok col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Khum') ?>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="khum_code" id="select-khum" class="select-khum col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Phum') ?>
                        </label>
                        <div class="col-sm-4" class="form-control">
                            <select name="phum_code" id="select-phum" class="select-phum col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Client Vendor Datestarted') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" readonly="readonly" required="required" id="clientvendor_datestarted" value="<?php echo date('Y-m-d');?>" name="clientvendor_datestarted" class="form-control" placeholder="<?php echo __('ClientVendor DateStart placeholder') ?>">
                        </div>
                    </div>   
                    <div class="form-group">
                         <p id="message" class="alert alert-dismissable alert-success"></p> 
                         <p id="error" class="alert alert-dismissable alert-danger"></p> 
                    </div>  
                                                   

                </div>

	        </div>
            <input type="hidden" id="hidden-vendor-code" value="<?php echo $vendor_code ?>" >
           
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
    function addClient()
    {
       if(!validate()) return;
       $.ajax({
        url:'<?php echo $this->Html->url(array("controller"=>"Clients","action"=>"saveclient"))?>',
        type:'POST',
        dataType:'json',
        data :{
            client_id: $('#client_id').val(),
            client_name_en :$('#client_en').val(),
            client_name_kh : $('#client_kh').val(),
            client_gender : $('.client_gender').val(),
            client_date_of_birth : $('#client_age').val(),
            client_phone :$('#client_phone').val(),
            client_datestarted:$('.client_date').val(),
            client_date_ended:$('#datepicker_branch').val(),
            phum_code :$('#select-phum').val(),
            vendor_code : $('#hidden-vendor-code').val(),
            clientvendor_datestarted:$('#clientvendor_datestarted').val()
        },
        success:function(data)
        {
                
                if(data.error==true)
                {
                    $('#message').show();
                    $('#message').html(data.msg);
                                       
                }
                else{
                    $('#message').show();
                    $('#message').html(data.msg);
                }
                setTimeout(function()
                {
                    window.parent.addClientName(data.client_id,data.client_name_en,data.client_name_kh);
                    },1000); 
               
             
               
        },
        error: function () {
                $('#error').show();  
                $('#error').html('Client can not save');  
            }

       });
    }
    $(document).ready(function(){

        $('#message').hide();
        $('#error').hide();           
        $('#select-phum').select2();  
        $('#clientvendor_datestarted').datepicker({dateFormat: 'yy-mm-dd'});
        $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
        $("#client_age").datepicker({dateFormat: 'yy-mm-dd',
                                    changeMonth: true,
                                    yearRange: "-100:+0",
                                    changeYear: true});
        $('#select-phum').select2();
        $('#select-khum').select2();
        $('#select-srok').select2();
        $('#select-khet').select2();  
        getKhetByPhum();
       /*------------Query Khet-------------*/
        $('#select-khet').on('change',function(){
           getSrokCode();
        });
        $('#select-srok').on('change',function(){
          getKhumCode();
        });
        $('#select-khum').on('change',function(){
            getPhumCode();
        });
        function getSrokCode()
        {
            $.ajax({
             
                url:'<?php echo $this->Html->url(array("controller"=>"Sroks","action"=>"getSrokByPhum")) ?>',
                type: 'POST',
                data:
                {
                    khet_code :$('#select-khet').val(),
                },
                success:function(data){
                    $('#select-srok').html(data);
                    $('#select-srok').select2();

                   getKhumCode();
                }
             
            });
        }
        function getKhumCode()
        {
            $.ajax({
             
                url:'<?php echo $this->Html->url(array("controller"=>"Khums","action"=>"getKhumByPhum")) ?>',
                type: 'POST',
                data:
                {
                    srok_code :$('#select-srok').val(),
                },
                success:function(data){
                    $('#select-khum').html(data);
                    $('#select-khum').select2();
                    getPhumCode();
                }
             
            });
        }
        function getPhumCode()
        {
            $.ajax({
             
                url:'<?php echo $this->Html->url(array("controller"=>"Phums","action"=>"getPhumByPhum")) ?>',
                type: 'POST',
                data:{
                    khum_code :$('#select-khum').val(),
                },
                success:function(data){
                    $('#select-phum').html(data);
                    $('#select-phum').select2();
                }
             
            });
        }
      

        function getKhetByPhum()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Khets","action"=>"getKhetByPhum")) ?>',
                type: 'POST',
                data: {
                },
                success: function (data) {    
                    $('#select-khet').html(data);
                    $('#select-khet').select2();
                      $('#select-khet').trigger('change');
                  /*  $('#select-phum').val($('#select-phum').find('option').first().val());*/
                }
             });
        }
   

    });
</script>
<style type="text/css">
    #wrap > .container {
        padding: 0px;
    }
    .select2-container
    {
        width: 100%;
    }
    #message
    {
        f
    }

</style>