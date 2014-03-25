<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Sale'), '/Sales/listing');
$this->Html->addCrumb(__('Add New'), '/Sales/add');
?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form id="adminForm"
        data-validate="parsley" action="<?php echo $this->Html->url(array('action'=>'save'));?>" class="form-horizontal row-border" method="post">     
            <div class="panel panel-midnightblue">
                <div class="panel-heading">
                   <h4> <?php echo __('Add New Sale') ?></h4>           
                </div>
                <div class="panel-body collapse in">
                    <div class="col-sm-6" style="float:left;" >
                        <legend><?php echo __('Sale Info')?></legend>
                        <fieldset>
                            <div class="panel-body ">
                                <div class ="form-group">
                                    <label class="col-sm-2 control-label">
                                        <?php echo __('Date')?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" required="required" name="sale_date" class="form-control" id="datepicker" readonly="readonly" value="<?php echo date('Y-m-d');?>" 
                                        placeholder="<?php echo __('Date placeholder') ?>">
                                    </div>
                                </div>
                                <div class ="form-group">
                                    <label class="col-sm-2 control-label">
                                        <?php echo __('Vendor')?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="vendor_code"  id="select-vendor" class="col-sm-12">
                                            <?php
                                                foreach ($vendors as $key => $value) {
                                            ?>
                                                <option value='<?php echo $value['Vendor']['vendor_code'] ?>'>
                                                    <?php echo $value['Vendor']['vendor_name_en'].' : '.$value['Vendor']['vendor_code'] ?>
                                                </option>
                                            <?php
                                                 } 
                                            ?>

                                        </select>
                                        
                                    </div>
                                </div>
                                <div class ="form-group">
                                    <label class="col-sm-2 control-label">
                                        <?php echo __('Client')?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="client_id"  id="select-client" class="col-sm-12">
                                        
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a id="btn-add-new" class="btn btn-primary" href="#">
                                        <?php echo __('Add New Client')?></a> 
                                    </div>
                                    <div class="clearfix" style="margin-top:10px;"></div>
                                    <div class="col-sm-8 client_null" style="margin-top:10px;">
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        <?php echo __('Transaction Total') ?><span class="require">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" required="required" name="sale_value_usd" class="form-control" placeholder="<?php echo __('Transaction Total placeholder') ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <a id="btn-add-nonclient" class="btn btn-primary" href="#">
                                        <?php echo __('Add NonClient')?></a> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        <?php echo __('Comment') ?>
                                    </label>
                                    <div class="col-sm-6">
                                        <textarea name="sale_comment" cols="30" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6" style="float:left;" >
                        
                        <legend><?php echo __('Vendor Info')?></legend>
                        <fieldset>
                            <div class="form-group" id="vendor-blog">
                            
                            </div>     
                        </fieldset>
                        <legend><?php echo __('Client Info')?></legend>
                        <fieldset>
                            <div class="form-group" id="client-blog">
                            
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
    </div>
             
    </form>
</div>
</div>
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="customer-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4> <?php echo __('Add New Client') ?></h4>            
              
            </div>
            
            <div class="modal-body iframebody">
                                            
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-add" class="btn btn-primary">
                    <?php echo __('Save') ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"> 
                    <?php echo __('Close')?>
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="noncustomerModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="noncustomer-modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="margin-bottom:15px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo __('Add NonClient') ?></h4>
            </div>
            <div class="clearfix"></div>
            <div class="modal-body">
                <div class="form-group col-sm-12 pull-left">  
                        <label class="col-sm-5 control-label">
                            <?php echo __('NonClient') ?>
                        </label>
                        <div class="col-sm-6">
                            <select name="nonclient_id" id="select-nonclient" class="col-sm-12">
                            
                            </select>
                        </div>
                </div> 
                <div class="form-group col-sm-12 pull-left">
                        <label class="col-sm-5 control-label">
                            <?php echo __('Date Started') ?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo date('Y-m-d'); ?>" name="client_datestarted" readonly="readonly" class="form-control" id="client_datestarted" 
                            placeholder="<?php echo __('Date Started placeholder') ?>">
                        </div>
                </div> 
                <div class="form-group col-sm-12 pull-left">
                        <label class="col-sm-5 control-label">
                            <?php echo __('Date Ended') ?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo date('Y-m-d'); ?>" name="client_date_ended" readonly="readonly" class="form-control" id="datepicker4" 
                            placeholder="<?php echo __('Date Ended placeholder') ?>">
                        </div>
                </div>
                <div class="form-group col-sm-12 pull-left">
                        <label class="col-sm-5 control-label">
                            <?php echo __('ClientVendor Date Started') ?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo date('Y-m-d'); ?>" name="clientvendor_datestarted" readonly="readonly" class="form-control" id="clientvendor_datestarted" 
                            placeholder="<?php echo __('Date Started placeholder') ?>">
                        </div>
                </div>  
                <div class="clearfix"></div> 
                <div class="form-group">
                         <p id="message" class="alert alert-dismissable alert-success"></p> 
                         <p id="error" class="alert alert-dismissable alert-danger"></p> 
                </div>  
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                 <button type="button" id="btn-addnonclient" class="btn btn-primary"><?php echo __('Add')?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close')?></button>
               
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
#customerModal,#noncustomerModal
{
    overflow: scroll;
}
#customer-modal-dialog,#noncustomer-modal-dialog
{
    width:40%;
 }
.modal-content
{
    padding: 10px;
}
.iframebody{
    height: 500px;
    width: 100%;
}
.modal-body
    {
        padding: 0px;
    }
</style>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/js/jqueryui.css' />
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-daterangepicker/daterangepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 

<script type="text/javascript">
    
    function addClientName(id,client_name_en,client_name_kh)
    {
         $('#select-client').append('<option value="'+id+'" > '+client_name_en+' : '+id+'</option>');
         $('#select-client').select2();
         $('#select-nonclient').select2();
         $('#customerModal').modal('hide');
    }

    $(document).ready(function(){
        $("#datepicker,#client_datestarted,#datepicker4,#clientvendor_datestarted").datepicker( {dateFormat: 'yy-mm-dd'});
        $('#select-vendor').select2();
        $('#select-client').select2();  
        $('#message').hide();
        $('#error').hide();  
        
        $('#btn-add-new').click(function()
        {
            var $vendor_code = $('#select-vendor').val();
            var $url = '<?php echo $this->Html->url(array("controller"=>"Clients",
                                "action"=>"addnewclient")) ?>'+'/'+$vendor_code;
            $('#customerModal').modal('show');
            $('#customerModal').find('.modal-body').html(                
                '<iframe id="iframe" width="100%" height="100%" style="width:100%;height:100%;" frameborder="0" scrolling="yes" allowtransparency="true" src="' + $url + '"></iframe>'
            );
      
        });
        $('#btn-add-nonclient').click(function(){            
            $('#noncustomerModal').modal('show');

          
        });
        $('#btn-add').click(function()
        {
            document.getElementById("iframe").contentWindow.addClient();
            return false;
        });
     
        $('#select-client').on('change',function(){
           getClientInfo();
        });

        getClientBelongToVendor();

        $('#select-vendor').on('change',function(){
            getClientBelongToVendor();

        })
        getVendorInfo();
        $('#select-vendor').on('change',function(){
            getVendorInfo();
        })

        $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"NonClients","action"=>"selectnonclient")) ?>',
            type: 'POST',
            data: {
            },
           
            success: function (data) {    
               $('#select-nonclient').html(data);
               $('#select-nonclient').select2();
            }

        });

        $('#btn-addnonclient').click(function(){
            var $vendor_code = $('#select-vendor').val();
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Clients","action"=>"addNonClientToClient")) ?>'+'/'+$vendor_code,
            type: 'POST',
            dataType:'json',
            data: {
                nonclient_id:$('#select-nonclient').val(),
                client_datestarted:$('#client_datestarted').val(),
                client_date_ended:$('#datepicker4').val(),
                clientvendor_datestarted:$('#clientvendor_datestarted').val()
            },
           
            success: function (data) {    
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
                    $('#noncustomerModal').modal('hide');
                },1000); 
                $('#select-vendor').trigger('change');
              
            },
            error: function () {
                $('#error').show();  
                $('#error').html('Client can not save');  
            }

    

            });
        });
        
    });
    function getClientInfo()
    {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Clients","action"=>"getClient")) ?>',
            type: 'POST',
            data: {
                client_id: $('#select-client').val()
            },
           
            success: function (data) {    
               
               $('#client-blog').html(data);
            }

        });
    }
    function getVendorInfo()
    {
        $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Vendors","action"=>"getVendor")) ?>',
            type: 'POST',
          
            data: {
                vendor_code: $('#select-vendor').val()
            },
           
            success: function (data) {    
               
               $('#vendor-blog').html(data);
            }

        });
    }
    function getClientBelongToVendor()
    {
            $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Vendors","action"=>"getClientBelongToVendor")) ?>',
            type: 'POST',
            dataType :'json',
            data: {
                vendor_code: $('#select-vendor').val()
            },
           
            success: function (data) {    
               if(data.error ==false)
                {
                    $('#select-client').html(data.data);
                    $('#select-client').select2();
                    $('.client_null').html('');
                    getClientInfo();
                }
                else
                {
                    $('.client_null').html('<div class="alert alert-dismissable alert-danger">'+data.msg+'</div>');
                    $('#select-client').html('');
                    $('#select-client').select2();
                    
                                   
                }
              
            }

        });
    }

</script>



