 <div class="panel-body ">            
                <table id="client-table" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            
                            <th><?php echo __('Client')?></th>
                            <th><?php echo __('Date Started')?></th>
                            <th>
                                <?php echo __('Action') ?>                                          
                            </th>
                                   
                        </tr>
                    </thead>
                    <tbody>  
                           <?php
                           if(isset($clientvendors))
                           {
                            foreach ($clientvendors as $key => $value) :?>                      
                        <tr class="<?php echo ($key%2)==0?'event':'odd';
                            echo ' '.$value['ClientVendor']['client_id'] ?>">
                            
                            <td>
                                <?php echo $value['ClientVendor']['client_id']?>
                                <input type="hidden" name="client[]" value ="<?php
                                    echo $value['ClientVendor']['client_id'] ?>" />
                            </td>
                            <td>
                                <?php echo $value['ClientVendor']
                            ['clientvendor_datestarted']?>
                            <input type="hidden" name="datestarted[]" value="<?php echo $value['ClientVendor']
                            ['clientvendor_datestarted']?>">
                            </td>

                            <td>
                                <input type="button" 
                                class="btn btn-primary btn-xs remove" 
                                value="<?php echo __('Remove') ?>">
                            </td>
                                                                 
                        </tr>
                        <?php
                         endforeach;
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" align="center">
                                <a id="btn-select" class="btn btn-primary" href="#">
                            <?php echo __('Select') ?></a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
</div>
<!-- Modal -->
<div class="modal fade" id="customerModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="customer-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo __('Add Client') ?></h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Client') ?>
                        </label>
                        <div class="col-sm-6">
                            <select name="client_id" id="select-client" class="col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Date Started') ?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" value="<?php echo date('Y-m-d'); ?>" name="clientvender_datestarted" readonly="readonly" class="form-control" id="datepicker4" 
                            placeholder="<?php echo __('Date Started placeholder') ?>">
                        </div>
                    </div> 
            </div>
            <div class="modal-footer">
                 <button type="button" id="btn-add" class="btn btn-primary"><?php echo __('Add')?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close')?></button>
               
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/js/jqueryui.css' />
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script>
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-daterangepicker/daterangepicker.min.js'></script>
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $('#select-phum').select2(); 
        $("#datepicker4").datepicker( {dateFormat: 'yy-mm-dd'}); 

        $('#btn-clear-select').click(function(){
            $('#id').val(0);
        });
        $('.remove').click(function(){
                $(this).parent().parent().remove();
        });
        $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Clients","action"=>"selectclient")) ?>',
            type: 'POST',
            data: {
            },
           
            success: function (data) {    
               $('#select-client').html(data);
               $('#select-client').select2();
            }

        });

        $('#btn-select').click(function(){            
            
            $('#customerModal').modal('show');
        });

        $('#btn-add').click(function(){
            var clientId = $('#select-client').val();
            var test =$('#client-table tbody').find('tr.'+clientId);
            if(test.length>0)
            {
                alert('This client Id Already Added');
                return;
            }
            var datestarted =$('#datepicker4').val();
            var str ='<tr class="'+clientId+'"><td>'+clientId+'<input type="hidden" '+
                    'name="client[]" value ="'+clientId+'" /></td>'+
                    '<td><input type="hidden" name="datestarted[]"'+
                    ' value="'+datestarted+'"> '+datestarted+'</td>'+
                    '<td><input type="button" class="btn btn-primary btn-xs remove"'+
                    'value="Remove"></td>';

            $('#client-table tbody').append(str);
            $('#customerModal').modal('hide');
            $('.remove').click(function(){
                $(this).parent().parent().remove();
            });

        });
     
    });
</script>
<style>
#customerModal
{
    overflow: scroll;
}
#customer-modal-dialog
{
    width: 40%;
    margin-top:100px;
}
.iframebody{
    height: 400px;
    width: 100%;
}
</style>
