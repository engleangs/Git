<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Phum'), '/Phums/listing');
$this->Html->addCrumb(__('Add New'), '/Phums/add');

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form  id="adminForm"
        data-validate="parsley"
        action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Phum') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Code') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" id="phum_code" required="required"  name="phum_code" class="form-control" placeholder="<?php echo __('Code placeholder') ?>">
                            <div class="clearfix"></div>
                            <div class="error"></div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name English') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required"  name="phum_name_en" class="form-control" placeholder="<?php echo __('Name English placeholder') ?>">
                        </div>
                    </div>     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Name Khmer') ?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="phum_name_kh" class="form-control" placeholder="<?php echo __('Name Khmer placeholder') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                      
                            <label class="col-sm-3 control-label">
                                <?php echo __('Khet') ?>
                            </label>
                            <div class="col-sm-4" class="form-control">
                                <select name="khet_code" id="select-khet" class="col-sm-12">
                                    <?php
                                        foreach ($khets as $key => $value)
                                        {
                                    ?>
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
                    <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <?php echo __('Khum') ?>
                            </label>
                            <div class="col-sm-4" class="form-control">
                                <select name="khum_code" id="select-khum" class="col-sm-12">
                                            
                                </select>
                                        
                            </div>
                    </div>
                    <input type="hidden" name="hidden_phum_code" id="select-phum">
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
            <input type="hidden" value="0" name="id">          
        </form>
        
    </div>
    </div>
 <link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
       
        $('#select-khum').select2();
        $('#select-srok').select2();
        $('#select-khet').select2();  
        $('#phum_code').on('change',function(){
            checkExistingPhumCode();
        });
        function checkExistingPhumCode()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"Phums","action"=>"checkExistingPhumCode")) ?>',
                type: 'POST',
                data:{
                    code :$('#phum_code').val()
                  
                },
                success:function(data){
                    $('.error').html(data);
                }
            });
        }

        $('#select-khet').on('change',function(){
           getSrokCode();
        });
        $('#select-srok').on('change',function(){
          getKhumCode();
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
                }
             
            });
        }
        
        $('#select-khet').trigger('change');
    });
</script>
