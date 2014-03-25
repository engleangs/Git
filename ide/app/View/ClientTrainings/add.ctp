<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Non-Client'), '/NonClients/listing');
$this->Html->addCrumb(__('Add New'), '/NonClients/add');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="POST">
    	    <div class="panel panel-midnightblue">
            	<div class="panel-heading">
        	        <h4> <?php echo __('Add New Non Client') ?></h4>	        
            	</div>
    	        <div class="panel-body collapse in">
                    <div class="col-sm-6" style="float:left;" >
                         <div class="panel-body ">

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <?php echo __('Code') ?>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="nonclient_id" class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                                </div>
                            </div>     
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                	<?php echo __('Name English') ?>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="nonclient_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                                </div>
                            </div>     
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                	<?php echo __('Name Khmer') ?>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="nonclient_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                        <?php echo __('Phum') ?>
                                </label>
                                <div class="col-sm-6" class="form-control">
                                    <select name="phum_code" id="select-phum" class="col-sm-12">
                                    <?php
                                        foreach ($phums as $key => $value)
                                        {
                                        ?>
                                        <option value="<?php echo $value['Phum']['phum_code'] ?>">
                                                <?php echo $value['Phum']['phum_name_en']; ?>
                                        </option>
                                    <?php
                                            }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="radio" class="col-sm-3 control-label">
                                    <?php echo __('Gender') ?>
                                </label>
                                <div class="col-sm-6">
                                        <div class="radio block">
                                            <label>
                                            <input type="radio" value="Female" name="nonclient_gender"> <?php echo __("Female")?><label>
                                        </div>
                                        <div class="radio block">
                                            <label><input type="radio" value="Male" name="nonclient_gender" checked><?php echo __("Male")?></label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <?php echo __('Date of birth') ?>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" readonly="readonly" id="datepicker2" class="form-control" name=" nonclient_date_of_birth" 
                                    value="<?php echo date('Y-m-d')?>"
                                     placeholder="<?php echo __('Date of birth placeholder') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    <?php echo __('Phone') ?>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="nonclient_phone" class="form-control" placeholder="<?php echo __('Phone placeholder') ?>">
                                </div>
                            </div>                            
            
                            
                        </fieldset>
                         </div>
                    </div>
                    <div class="col-sm-6" style="float:left;">
                        <fieldset>
                            <div class="form-group" id="nonclient-blog">
                            
                            </div>     
                        </fieldset>
                    </div>
                    <div class="clearfix"></div>
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
        getPhumDetail();
        $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
        $('#datepicker2').datepicker({dateFormat: 'yy-mm-dd',
                                    changeMonth: true,
                                    yearRange: "-100:+0",
                                    changeYear: true});
        $('#select-phum').select2(); 
        $('#select-phum').on('change',function(){
            getPhumDetail();
        });
        function getPhumDetail()
        {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Phums","action"=>"getPhumDetail")) ?>',
            type: 'POST',
            data: {
                phum_code: $('#select-phum').val()
            },
           
            success: function (data) {    
               
               $('#nonclient-blog').html(data);
            }

        });
        }
    });
</script>

