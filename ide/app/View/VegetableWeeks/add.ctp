<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('VegetableWeek'), '/VegetableWeeks/listing');
$this->Html->addCrumb(__('Add New'), '/VegetableWeeks/add');

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post"> 
            <div class="panel-body collapse in">
                    <div class="col-sm-5" style="float:left;" >
                        <legend><?php echo __('Add Vegetable Week')?></legend>
                        <fieldset>
                             <div class="valid"></div>
                             <div class="panel-body ">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Training') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-8" class="form-control">
                                        <select name="training_id" id="select-training" class="col-sm-12"> 
                                        <?php foreach ($trainings as $key => $value) {
                                        ?>
                                            <option  <?php if($training_id==$value['Training']['training_id']) echo 'selected="selected"' ?> value="<?php echo $value['Training']['training_id']?>"><?php echo $value['Training']['training_id'] ?></option>
                                        <?php } ?>  
                                        </select>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Week_#') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" required="required" id="week" name="week" class="form-control" placeholder="<?php echo __('Week placeholder') ?>">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class ="col-sm-8 " id="alert" style="margin-left:100px;">
                                    
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Date') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" required="required" readonly="readonly" name="week_date" class="form-control" id="datepicker"  
                                          <?php 
                                          if($date_start==0) { 
                                          ?>
                                            value="<?php echo date('Y-m-d') ?>" 
                                          <?php 
                                          }else { 
                                          ?> 
                                          value="<?php echo $date_start ?>" 
                                          <?php } ?>
                                        >
                                    </div>
                                </div>     
                                <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo __('Week Trainer') ?><span class="require">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" required="required" name="week_trainer" class="form-control typeahead "  
                                            placeholder="<?php echo __('Week Trainer placeholder') ?>">
                                            
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Topic 1') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-8" class="form-control">
                                        <select name="week_topic1" id="topic_1" class="col-sm-12"> 
                                        <?php foreach ($topics as $key => $value) {
                                          ?>
                                          <option value="<?php echo $value['Topic']['topic']?>">
                                            <?php echo $value['Topic']['topic'] ?>
                                          </option>
                                           
                                        <?php
                                        } ?>
                                             
                                        </select>
                                        <div class="clearfix"></div>
                                        <div class="error1" style="padding-top:10px;"></div>  
                                    </div>
                                    
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Topic 2') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-8" class="form-control">
                                        <select name="week_topic2" id="topic_2" class="col-sm-12"> 
                                        <?php foreach ($topics as $key => $value) {
                                          ?>
                                          <option value="<?php echo $value['Topic']['topic']?>">
                                            <?php echo $value['Topic']['topic'] ?>
                                          </option>
                                           
                                        <?php
                                        } ?>
                                             
                                        </select> 
                                        <div class="clearfix"></div>
                                        <div class="error2" style="padding-top:10px;"></div> 
                                    </div>
                                    
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Topic 3') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-8" class="form-control">
                                        <select name="week_topic3" id="topic_3" class="col-sm-12"> 
                                        <?php foreach ($topics as $key => $value) {
                                          ?>
                                          <option value="<?php echo $value['Topic']['topic']?>">
                                            <?php echo $value['Topic']['topic'] ?>
                                          </option>
                                           
                                        <?php
                                        } ?>
                                             
                                        </select>
                                        <div class="clearfix"></div>
                                        <div class="error3" style="padding-top:10px;"></div>  
                                    </div>
                                  
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Topic 4') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-8" class="form-control">
                                        <select name="week_topic4" id="topic_4" class="col-sm-12"> 
                                        <?php foreach ($topics as $key => $value) {
                                          ?>
                                          <option value="<?php echo $value['Topic']['topic']?>">
                                            <?php echo $value['Topic']['topic'] ?>
                                          </option>
                                           
                                        <?php
                                        } ?>
                                             
                                        </select> 
                                        <div class="clearfix"></div>
                                        <div class="error4" style="padding-top:10px;"></div> 
                                      </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">
                                        <?php echo __('Non Client') ?>
                                    </label>
                                    <div class="col-sm-8" class="form-control">
                                        <select name="week_client_attend" id="select-nonclient" class="col-sm-12"> 
                                            <option value=1>Yes</option>
                                            <option value=0>No</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-7" style="float:left;" >
                        <legend><?php echo __('Vegetable Weeks Training')?></legend>
                        <fieldset>
                             <div class="form-group" id="vegetable-blog">
                            </div>     
                        </fieldset>
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
            
        <input type="hidden" value="0" name="id">          
        </form>
        
    </div>
</div>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/js/jqueryui.css' />
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-daterangepicker/daterangepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-typeahead/typeahead.min.js'></script>  
<script type="text/javascript">
  $(document).ready(function(){
      $('#select-nonclient').select2(); 
      $('#select-training').select2();
      $('#topic_1').select2();
      $('#topic_2').select2();
      $('#topic_3').select2();
      $('#topic_4').select2();
      $("#datepicker").datepicker( {dateFormat: 'yy-mm-dd'}); 
      selectVegetableWeekByTraining();

      $('#select-training').on('change',function(){
            selectVegetableWeekByTraining();
      });

      $('#week').on('keyup',function(){
            checkValidWeek();
            checkExistindWeek();
           
      });

      function checkExistindWeek()
      {
        var week=$('#week').val();
        var bln = true;
        $('#data-training tr td.week').each(function(){
            weeks=$(this).html();
            if(week==weeks)
            {   bln  = false;}
            
        });
        $('#alert').html('');
        if(!bln)
        {
             $('#alert').html('<div class="alert alert-dismissable alert-danger "> Data exist, Please try again!</div>');
        }
      }

      function checkValidWeek()
      {
           var week=$('#week').val();
           var bln = true;
           if(week < 1 || week > 10)
           {
                $('.valid').html('<div class="alert alert-dismissable alert-danger ">Invalid Week, Must be 1 -> 10</div>');
           }
           else
           {
                $('.valid').html('');
           }
           if(week=='')
           {
               $('.valid').html('');
           }
      } 

      /*function checkduplicateWeek()
      {
          $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"VegetableWeeks","action"=>"checkduplicateWeek")) ?>',
            type: 'POST',
            data: {
                training_id: $('#select-training').val()
               
            },
           
            success: function (data) {    
               
               $('#vegetable-blog').html(data);
            }
      }*/
      function selectVegetableWeekByTraining()
      {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"VegetableWeeks","action"=>"getVegetableWeekByTraining")) ?>',
            type: 'POST',
            data: {
                training_id: $('#select-training').val()
            },
           
            success: function (data) {    
               
               $('#vegetable-blog').html(data);
            }
            });

      }
      $('.typeahead').typeahead({
          name: 'Vendors',
          prefetch: '<?php echo $this->Html->url(array("controller"=>"Vendors","action"=>"getVendorCode")) ?>'
         
      });
      $('#topic_2').on('change',function(){
         var topic =  $('#topic_1').val();
         var topic2=  $(this).val();
         var topic3 = $('#topic_3').val();
         var topic4 = $('#topic_4').val();
         if(topic2 == topic || topic2== topic3 || topic2== topic4)
         {
            $('.error2').html('<div class="alert alert-dismissable alert-danger">Topic is duplicated. Choose other one!</div>');
         }
         else
         {
             $('.error2').html('');
         }
      });
      $('#topic_3').on('change',function(){
         var topic3 = $(this).val();
         var topic2=  $('#topic_2').val();
         var topic =  $('#topic_1').val();
         var topic4 = $('#topic_4').val();
         if(topic3 == topic2 || topic3== topic || topic3== topic4)
         {
            $('.error3').html('<div class="alert alert-dismissable alert-danger">Topic is duplicated. Choose other one!</div>');
         }
         else
         {
             $('.error3').html('');
         }
      });
      $('#topic_4').on('change',function(){
         var topic4 = $(this).val();
         var topic2=  $('#topic_2').val();
         var topic3 = $('#topic_3').val();
         var topic = $('#topic_1').val();
         if(topic4 == topic2 || topic4== topic3 || topic4== topic)
         {
            $('.error4').html('<div class="alert alert-dismissable alert-danger">Topic is duplicated. Choose other one!</div>');
         }
         else
         {
             $('.error4').html('');
         }
      });
      $('#topic_1').on('change',function(){
         var topic = $(this).val();
         var topic2=  $('#topic_2').val();
         var topic3 = $('#topic_3').val();
         var topic4 = $('#topic_4').val();
         if(topic == topic2 || topic== topic3 || topic== topic4)
         {
            $('.error1').html('<div class="alert alert-dismissable alert-danger">Topic is duplicated. Choose other one!</div>');
         }
         else
         {
             $('.error1').html('');
         }
      });

  });
</script>