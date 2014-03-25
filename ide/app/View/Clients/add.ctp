<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Client'), '/Clients/listing');
$this->Html->addCrumb(__('Add New'), '/Clients/add');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form  id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="POST">
    	    <div class="panel panel-midnightblue">
            	<div class="panel-heading">
        	        <h4> <?php echo __('Add New Client') ?></h4>	        
            	</div>
    	        <div class="panel-body collapse in">
                    
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                        	<?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="client_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                        	<?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="client_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="radio" class="col-sm-4 control-label">
                            <?php echo __('Gender') ?>
                        </label>
                        <div class="col-sm-6">
                                <div class="radio block">
                                    <label>
                                    <input type="radio" value="Female" name="client_gender"> <?php echo __("Female")?><label>
                                </div>
                                <div class="radio block">
                                    <label><input type="radio" value="Male" name="client_gender" checked><?php echo __("Male")?></label>
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Date of birth') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo date('Y-m-d');?>" required="required" name="client_date_of_birth" class="form-control" id="datepicker2" readonly="readonly"
                             placeholder="<?php echo __('Date of birth placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Phone') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="client_phone" class="form-control" placeholder="<?php echo __('Phone placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Date Started') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" value="<?php echo date('Y-m-d');?>" required="required" name="client_datestarted" class="form-control" id="datepicker" readonly="readonly"
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
                        <div class="col-sm-6">
                            <label class="col-sm-4 control-label">
                                <?php echo __('Khet') ?>
                            </label>
                            <div class="col-sm-8" class="form-control">
                                <select name="khet_code" id="select-khet" class="col-sm-12">
                                <?php
                                    foreach ($Khets as $key => $value)
                                {?>
                                    <option value="<?php echo $value['Khet']['khet_code'] ?>">
                                    <?php 
                                         echo $value['Khet']['khet_name_en'].' : '.$value['Khet']['khet_code']; 
                                                    ?>
                                    </option>
                                    <?php
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-2 control-label">
                                <?php echo __('Srok') ?>
                            </label>
                            <div class="col-sm-8" class="form-control">
                                <select name="srok_code" id="select-srok" class="col-sm-12">
                                            
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-4 control-label">
                                <?php echo __('Khum') ?>
                            </label>
                            <div class="col-sm-8" class="form-control">
                                <select name="khum_code" id="select-khum" class="col-sm-12">
                                            
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-2 control-label">
                                <?php echo __('Phum') ?>
                            </label>
                            <div class="col-sm-8" class="form-control">
                                <select name="phum_code" id="select-phum" class="col-sm-12">
                                            
                                </select>
                            </div>
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
      $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
      $('#datepicker2').datepicker({dateFormat: 'yy-mm-dd',
                                    changeMonth: true,
                                    yearRange: "-100:+0",
                                    changeYear: true});
    });
</script>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $('#select-phum').select2();
        $('#select-khum').select2();
        $('#select-srok').select2();
        $('#select-khet').select2();  

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
        $('#select-khet').trigger('change');
    });
</script>