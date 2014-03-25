<table id="vendor_table" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
    <thead>
        <tr>
            <th><?php echo __('Code')?></th>
            <th><?php echo __('Vendor')?></th>
            <th><?php echo __('Action') ?></th>
        </tr>
    </thead>
    <tbody>  
        <?php if(isset($clienttrainings))
        {   
           
            foreach ($clienttrainings as $key=> $client) : 
            if($client['ClientTraining']['vendor_code'])
            {
            ?>              
            <tr class="<?php echo ($key%2)==0?'event':'odd';
            echo ' '.$client['ClientTraining']['vendor_code'] ?>">
                <td>
                    <?php echo $client['ClientTraining']['vendor_code']?>
                    <input type="hidden" name="vendor[]" value ="<?php
                    echo $client['ClientTraining']['vendor_code'] ?>" />
                </td>
                <td>
                    <?php echo @$client['Vendor']['vendor_name_en']?></td>
                <td>
                    <input type="hidden" value="<?php echo $client['ClientTraining']['clienttraining_id']?>" name="clienttraining_id" class="clienttraining_id_vendor">
                    <input type="button" class="remove_vendor btn btn-primary btn-xs remove" value="<?php echo __('Remove') ?>">
                </td>
            </tr>

            <?php }  endforeach; 
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" align="center">
                <a id="btn-select-vendor" class="btn btn-primary" href="#">
                <?php echo __('Select') ?></a>
            </td>
        </tr>
    </tfoot>
</table>

<!-- Modal -->
<div class="modal fade" id="VendorModial"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="vendor-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo __('Add Vendor') ?></h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Vendor') ?>
                        </label>
                        <div class="col-sm-6">
                            <select name="vendor_code" id="selectvendor_vendor" class="col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_add_vendor" class="btn btn-primary"><?php echo __('Add')?></button>
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
        $('#selectvendor_vendor').select2();

        $('.remove').click(function(){
                $(this).parent().parent().remove();
        });
        $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Vendors","action"=>"selectvendor")) ?>',
            type: 'POST',
            data: {
            },
           
            success: function (data) {    
               $('#selectvendor_vendor').html(data);
               $('#selectvendor_vendor').select2();
            }

        });
      
        $('#btn-select-vendor').click(function(){            
            
            $('#VendorModial').modal('show');
        });

        $('#btn_add_vendor').click(function(){
            var vendorCode = $('#selectvendor_vendor').val();
            var vendorName = $('#selectvendor_vendor option:selected').text();
            var count =0;
            var vendorValid  =$('#vendor_table tbody tr').
                        each(function(){
                            if($(this).hasClass(vendorCode))
                            {
                                count++;
                            }
                        });
            console.log(vendorValid);
            if(count>0)
            {
                alert('This Vendor ID Already Added');
                return;
            }
          
            var str ='<tr class="'+vendorCode+'"><td>'+vendorCode+'<input type="hidden" '+
                    'name="vendor[]" value ="'+vendorCode+'" /></td>'+
                    '<td><input type="hidden" name="vendorName[]"'+
                    ' value="'+vendorName+'"> '+vendorName+'</td>'+
                    '<td><input type="button" class="btn btn-primary btn-xs remove"'+
                    'value="Remove"></td>';

            $('#vendor_table tbody').append(str);
            $('#VendorModial').modal('hide');
            $('.remove').click(function(){
                $(this).parent().parent().remove();
            });

        });
        $('.remove_vendor').click(function(){
            deleteVendor();
        });
        function deleteVendor()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"ClientTrainings","action"=>"deleteVendor")) ?>',
                type: 'POST',
                data: {
                    clienttraining_id : $('.clienttraining_id_vendor').val()
                },
               
                success: function (data) {    
                    console.log(data);
                }
            }); 
        }
     
    });
</script>
<style>
#VendorModial
{
    overflow: scroll;
}
#vendor-modal-dialog
{
    width: 40%;
    margin-top:100px;
}
.iframebody{
    height: 400px;
    width: 100%;
}
</style>
