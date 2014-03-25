<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Meeting'), '/Meetings/listing');
$this->Html->addCrumb(__('Edit'), '/Meetings/edit'.$data['Meeting']['meeting_id']);

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save',$data['Meeting']['meeting_id']));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Edit Meeting') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <input type="hidden" name="meeting_id" value="<?php echo $data['Meeting']['meeting_id']?>"> 
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Date') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                        <input type="text" required="required" value="<?php echo $data['Meeting']['meeting_date'] ?>" readonly="readonly" name="meeting_date" id="datepicker" class="form-control" placeholder="<?php echo __('Date placeholder ') ?>">
                        </div>
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Subject') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" value="<?php echo $data['Meeting']['meeting_subject']?>" name="meeting_subject"  class="form-control" placeholder="<?php echo __('meeting subject placeholder') ?>">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Responsible Staff') ?><span class="require">*</span>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" required="required" value ="<?php echo $data['Meeting']['meeting_responsible_staff']?>" name="meeting_responsible_staff"  class="form-control" placeholder="<?php echo __('Responsible Staff placeholder') ?>">
                            
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-5">
                                <label class="col-sm-4 control-label">
                                    <?php echo __('Khet') ?>
                                </label>
                                <div class="col-sm-8" class="form-control">                                 
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
                                                    echo $value['Khet']['khet_name_en'] .' : '.$value['Khet']['khet_name_kh'];?></option>
                                        <?php endforeach; ?>
                                     </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-2 control-label">
                                    <?php echo __('Srok') ?>
                                </label>
                                    <div class="col-sm-7" class="form-control">
                                        <select name="srok_code" id="select-srok" class="col-sm-12">
                                            
                                         </select>
                                    </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-5">
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
                                <div class="col-sm-7" class="form-control">
                                    <select class="col-sm-12" id="select-phum" name="phum_code">                                                
                                    </select>
                                </div>
                            </div>
                                    
                        </div>                
                </div>
                <div class="collapse in" style="border-top:none;">
                    <div class="col-sm-4" style="float:left;" >
                        <legend><?php echo __('Client to Meeting')?></legend>
                        <fieldset>
                            <div class="panel-body " style="border:0;padding:0;">
                                <?php echo $this->element('meetingclient'); ?>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-4" style="float:left;" >
                        <legend><?php echo __('NonClient to Meeting')?></legend>
                        <fieldset>
                            <div class="panel-body" style="border:0;padding:0;">
                               <?php echo $this->element('meetingnonclient'); ?>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-4" style="float:left;" >
                        <legend><?php echo __('Vendor to Meeting')?></legend>
                        <fieldset>
                            <div class="panel-body" style="border:0; padding:0;">
                               <?php echo $this->element('meetingvendor'); ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="clearfix"></div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-5">
                                <div class="btn-toolbar">
                                    <button onclick="return validate(this.Form)" id="save" class="btn-primary btn" title="<?php echo __('Save Title') ?>"><?php echo __('Save') ?>
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
          <input type="hidden" id="hidden-phum-code" 
    value="<?php echo $data['Meeting']['phum_code'] ?>">         
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
    $(document).ready(function()
    {
        $('#select-client').select2();  
        $('#select-nonclient').select2();  
        $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'});
        $('#select-phum').select2();
        $('#select-khum').select2();
        $('#select-srok').select2();
        $('#select-khet').select2();  
       
              
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