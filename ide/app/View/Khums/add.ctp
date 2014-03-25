<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Khum'), '/Khums/listing');
$this->Html->addCrumb(__('Add New'), '/Khums/add');
?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley"
        action="<?php echo $this->Html->url(array('action'=>'save'));?>
        " class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Khum') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" id="khum_code" name="khum_code" required="required"
                            class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error"></div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" name="khum_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="khum_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                      
                            <label class="col-sm-3 control-label">
                                <?php echo __('Khet') ?>
                            </label>
                            <div class="col-sm-4" class="form-control">
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
                    <div class="form-group">
                      
                            <label class="col-sm-3 control-label">
                                <?php echo __('Srok') ?>
                            </label>
                            <div class="col-sm-4" class="form-control">
                                <select name="srok_code" id="select-srok" class="col-sm-12">
                                            
                                </select>
                            </div>
                       
                    </div> 
                    
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <button onclick="return validate(this.Form)"
                                 class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
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
       <input type="hidden" value="0" name="id">          
    </form>
        
    </div>
    </div>
   </div>

    </div>
</div>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
       
        $('#select-srok').select2();
        $('#select-khet').select2();   
        $('#khum_code').on('change',function(){
            checkExistingKhumCode();
        });
        function checkExistingKhumCode()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Khums","action"=>"checkExistingKhumCode")) ?>',
                type: 'POST',
                data:{
                    code :$('#khum_code').val()
                 
                },
                success:function(data){
                    $('.error').html(data);
                }
            });
        }

        $('#select-khet').on('change',function(){
           getSrokCode();
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

                  
                }
             
            });
        }
       
        $('#select-khet').trigger('change');
    });
</script>