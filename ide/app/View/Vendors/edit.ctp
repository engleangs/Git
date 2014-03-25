<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Vendor'), '/Vendors/listing');
$this->Html->addCrumb(__('Edit Vendor'), '/Vendors/edit/'.$data['Vendor']['vendor_code']);
 ?>
<div id="page-heading"></div>
<div class="container">
<div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['Vendor']['vendor_code']));?>" class="form-horizontal row-border"  method="post" enctype="multipart/form-data">            
    	<div class="panel panel-midnightblue">
	    	<div class="panel-heading">
		        <h4> <?php echo __('Edit Vendor') ?></h4>	        
	    	</div>
    		<div class="panel-body collapse in">
                <div class="col-sm-7" style="float:left;" >
                    <legend><?php echo __('Vendor info') ?></legend>
                    <fieldset>
                    <div class="panel-body ">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                            	<?php echo __('Code') ?><span class="require">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" required="required" id="vendorcode" name="vendor_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>"
                                value="<?php echo $data['Vendor']['vendor_code'] ?>" readonly=readonly >
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                            	<?php echo __('Name English') ?><span class="require">*</span>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" required="required" name="vendor_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>" value="<?php echo $data['Vendor']['vendor_name_en']?>">
                            </div>
                        </div>     
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                            	<?php echo __('Name Khmer') ?>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="vendor_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>" value="<?php echo $data['Vendor']['vendor_name_kh'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="radio" class="col-sm-3 control-label">
                                <?php echo __('Gender') ?>
                            </label>
                            <div class="col-sm-6">
                                <div class="radio block">
                                    <label><input type="radio" name="vendor_gender" value="Female" <?php if($data['Vendor']['vendor_gender']=='Female')echo "checked='checked'"; ?>> <?php echo __("Female")?><label>
                                </div>
                                <div class="radio block">
                                    <label><input type="radio" value="Male"
                                        <?php if($data['Vendor']['vendor_gender']=='Male')echo "checked='checked'"; ?>
                                     name="vendor_gender"><?php echo __("Male")?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                       <?php echo __('Position') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                            <select name="vendor_type" id="vendor_type" class="col-sm-12">
                                                <option <?php if($data['Vendor']['vendor_type']=='fba') echo 'selected="selected"' ?> value="fba">FBA</option>
                                                <option <?php if($data['Vendor']['vendor_type']=='ca') echo 'selected="selected"' ?> value="ca">CA</option>
                                            </select>
                           
                                    </div>
                                </div>
                                <div class="form-group" id="branch_manager_block">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Branch Manager') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="branch_manager" id="branch_manager" class="col-sm-12">
                                                <option <?php if($data['Vendor']['branch_manager']=='Lim Naluch') echo 'selected="selected"' ?> value="Lim Naluch">Lim Naluch (Kampot)</option>
                                                <option <?php if($data['Vendor']['branch_manager']=='Tek Monorom') echo 'selected="selected"' ?> value="Tek Monorom">Tek Monorom (Takeo)</option>
                                                <option <?php if($data['Vendor']['branch_manager']=='Om Sopheap') echo 'selected="selected"' ?> value="Om Sopheap">Om Sopheap (Prey Veng)</option>
                                                <option <?php if($data['Vendor']['branch_manager']=='Chan Sarom') echo 'selected="selected"' ?> value="Chan Sarom">Chan Sarom (Svay Rieng)</option>
                                                <option <?php if($data['Vendor']['branch_manager']=='Mov Kiman') echo 'selected="selected"' ?> value="Mov Kiman">Mov Kiman (Kandal)</option>
                                                <option <?php if($data['Vendor']['branch_manager']=='Sieng Vansitha') echo 'selected="selected"' ?> value="Sieng Vansitha">Sieng Vansitha</option>

                                             
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group" id="ca_block">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('CA') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="ca_code" id="ca_code" class="col-sm-12">
                                            <?php 
                                            foreach ($CA as $key => $item){ ?>
 
                                                <option <?php if(@$item['CommercialAgronomist']['ca_code']==@$data['Fba'][0]['ca_code']) echo 'selected="selected"'; ?> value="<?php $item['CommercialAgronomist']['ca_code']?>">
                                                    <?php echo $item['CommercialAgronomist']['ca_code'];
                                                    ?>
                                                </option> 
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                    <div class="ca_error col-sm-6" style="margin-top:10px;margin-left:140px;"></div>
                                </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo __('Date of birth') ?>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" id="datepicker2" value="<?php echo $data['Vendor']['vendor_date_of_birth'] ?>" name="vendor_date_of_birth" class="form-control" placeholder="<?php echo __('Date of birth placeholder') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo __('Phone') ?>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo $data['Vendor']['vendor_phone']?>" name="vendor_phone" class="form-control" placeholder="<?php echo __('Phone placeholder') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo __('Email') ?>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo $data['Vendor']['vendor_email'] ?>"name="vendor_email" class="form-control" placeholder="<?php echo __('Email placeholder') ?>">
                            </div>
                        </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Date Started') ?>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" value="<?php echo $data['Vendor']['vendor_datestarted'] ?>" name="vendor_datestarted" class="form-control" id="datepicker" 
                                         placeholder="<?php echo __('Date Started placeholder') ?>">
                                    </div>
                                </div>  
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Date Ended') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" required="required" value ="<?php echo $data['Vendor']['vendor_date_ended'] ?>" name="vendor_date_ended" class="form-control" id="datepicker_branch" readonly="readonly">
                                    </div>
                                </div>
                               
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo __("Photo")?>
                            </label>
                            <div class="col-sm-6">
                                <input type="file" name="file" class="form-control" placeholder="<?php echo __('Photo placeholder') ?>">
                                <input type="hidden" name="photo" value="<?php echo $data['Vendor']['vendor_photo']?>" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="col-sm-2 control-label">
                                    <?php echo __('Khet') ?>
                                </label>
                                <div class="col-sm-10" class="form-control">                                 
                                    <select name="khet_code" id="select-khet" class="col-sm-12">
                                        
                                        <?php 
                                            foreach ($khets as $key => $value) :
                                         ?>
                                            <option value="<?php 
                                                echo $value['Khet']['khet_code'] ?>"
                                                <?php if($selectKhetCode
                                                            ==
                                                        $value['Khet']['khet_code'])
                                                        echo 'selected="selected" ' ?>
                                                >
                                                    <?php 
                                                    echo $value['Khet']['khet_name_en'] .' : '.$value['Khet']['khet_code'];?></option>
                                        <?php endforeach; ?>
                                     </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-2 control-label">
                                    <?php echo __('Srok') ?>
                                </label>
                                    <div class="col-sm-10" class="form-control">
                                        <select name="srok_code" id="select-srok" class="col-sm-12">
                                            
                                         </select>
                                    </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="col-sm-2 control-label">
                                    <?php echo __('Khum') ?>
                                </label>
                                <div class="col-sm-10" class="form-control">
                                    <select name="khum_code" id="select-khum" class="col-sm-12">
                                            
                                    </select>
                                </div>
                            </div>
                                 
                            <div class="col-sm-6">
                                <label class="col-sm-2 control-label">
                                    <?php echo __('Phum') ?>
                                </label>
                                <div class="col-sm-10" class="form-control">
                                    <select class="col-sm-12" id="select-phum" name="phum_code">                                                
                                    </select>
                                </div>
                            </div>
                                    
                        </div>  
                        <!-- <div class="form-group">
                            
                        </div>   -->
                    </div> 
                </fieldset>
            </div>
            <div class="col-sm-5 " style="float:left;" >
                <legend><?php echo __('Client info')?></legend>
                <fieldset>
                    <?php echo $this->element('clientvendor'); ?>
                </fieldset>
                <div id="fba-ca-blog" class="col-sm-12" style="margin:20px 0 20px 0;">
                            
                            
                        <div class="clearfix"></div>
                        </div>
                        
            </div>
            <div class="clearfix"></div>  
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
   
   <input type="hidden" id="hidden-phum-code" name="hidde_phum_code" 
    value="<?php echo $data['Vendor']['phum_code'] ?>">
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
    $(document).ready(function(){
        $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
        $("#datepicker2").datepicker({dateFormat: 'yy-mm-dd',
                                    changeMonth: true,
                                    yearRange: "-100:+0",
                                    changeYear: true});
        $('#select-phum').select2(); 
        $('#select-khet').select2();
        $('#select-khum').select2();
        $('#select-srok').select2(); 
        $('#branch_manager').select2();  
        $('#vendor_type').select2(); 
        $('#branch_manager').select2();
        $('#ca_code').select2();
        $('#branch_manager_block').hide();
        $('#ca_block').hide();
       changePosition();
        $('#vendor_code').on('change',function(){
            checkExistingVendorCode();
        });
        $('#vendor_type').on('change',function(){
            changePosition();
        })
        function changePosition()
        {
            var position=$('#vendor_type').val();

            if(position=='fba')
            {
                $('#ca_block').show();
                $('#branch_manager_block').hide();
                $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"CommercialAgronomists","action"=>"getCA")) ?>',
                    type: 'POST',
                    dataType:'json',
                    data:{
                      
                    },
                    success:function(data){
                       
                        if(data.error ==false)
                        {
                            $('#ca_code').html(data.data);
                            $('.ca_error').html('');
                           
                        }
                        else
                        {
                            $('.ca_error').html('<div class="alert alert-dismissable alert-danger">'+data.msg+'</div>');
                            $('#ca_code').html('');
                            $('#ca_code').select2();
                    
                        }
                        
                }
            });
            }
            else
            {
                $('#branch_manager_block').show();
                $('#ca_block').hide();
            }
         
        }      
         /*------------Query Khet by Phum-------------*/
        $('#select-khet').on('change',function(){
           getSrokCode();
           
        });
        $('#select-srok').on('change',function(){
          getKhumCode();
        });
        $('#select-khum').on('change',function(){
            getKhumCode();
        });
        function getSrokCode()
        {
            $.ajax({
             
                url:'<?php echo $this->Html->url(array("controller"=>"Sroks","action"=>"getSrokByPhum")) ?>'+"/"+$('#hidden-phum-code').val(),
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
             
                url:'<?php echo $this->Html->url(array("controller"=>"Khums","action"=>"getKhumByPhum")) ?>'+"/"+$('#hidden-phum-code').val(),
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
             
                url:'<?php echo $this->Html->url(array("controller"=>"Phums","action"=>"getPhumByPhum")) ?>'+"/"+$('#hidden-phum-code').val(),
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