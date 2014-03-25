<table id="nonclient-table" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
    <thead>
        <tr>
            <th><?php echo __('Code')?></th>
            <th><?php echo __('Non Client')?></th>
            <th><?php echo __('Action') ?></th>
        </tr>
    </thead>
        <tbody>  
        <?php if(isset($clientfieldDays))
        {   

            foreach ($clientfieldDays as $index => $item) :
            if($item['ClientFieldDay']['nonclient_id'])
            {
            ?>              
            <tr class="<?php echo ($index%2)==0?'event':'odd';
            echo ' '.$item['ClientFieldDay']['nonclient_id'] ?>">
                <td>
                    <?php echo $item['ClientFieldDay']['nonclient_id']?>
                    <input type="hidden" name="nonclient[]" value ="<?php
                                    echo $item['ClientFieldDay']['nonclient_id'] ?>" />
                </td>
                <td>
                    <?php echo @$item['NonClient']
                            ['nonclient_name_en']?>
                </td>
                <td>
                    <input type="hidden" value="<?php echo $item['ClientFieldDay']['client_field_id']?>" name="client_field_id" class="clienttraining_id_nonclient">
                    <input type="button" 
                    class="remove-nonclient btn btn-primary btn-xs remove" value="<?php echo __('Remove') ?>">
                </td>
            </tr>
            <?php
            } endforeach; 
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" align="center">
                <a id="btn-select-nonclient" class="btn btn-primary" href="#">
                <?php echo __('Select') ?></a>
            </td>
        </tr>
    </tfoot>
</table>

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
                            <select name="nonclient_id" id="selectclient-nonclient" class="col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
                   
            </div>
            <div class="modal-footer">
                 <button type="button" id="btn-add-nonclient" class="btn btn-primary"><?php echo __('Add')?></button>
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
        $('#selectclient-nonclient').select2(); 
      
        $('.remove').click(function(){
                $(this).parent().parent().remove();
        });
        $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"NonClients","action"=>"selectnonclient")) ?>',
            type: 'POST',
            data: {
            },
           
            success: function (data) {    
               $('#selectclient-nonclient').html(data);
               $('#selectclient-nonclient').select2();
            }

        });

        $('#btn-select-nonclient').click(function(){            
            
            $('#customerModal').modal('show');
        });

        $('#btn-add-nonclient').click(function(){
            var nonclientId = $('#selectclient-nonclient').val();
            var nonclientName = $('#selectclient-nonclient option:selected').text();
            var test =$('#nonclient-table tbody').find('tr.'+nonclientId);
            if(test.length>0)
            {
                alert('This Nonclient Id Already Added');
                return;
            }
           
            var str ='<tr class="'+nonclientId+'"><td>'+nonclientId+'<input type="hidden" '+
                    'name="nonclient[]" value ="'+nonclientId+'" /></td>'+
                    '<td><input type="hidden" name="nonclientname[]"'+
                    ' value="'+nonclientName+'"> '+nonclientName+'</td>'+
                    '<td><input type="button" class="btn btn-primary btn-xs remove"'+
                    'value="Remove"></td>';

            $('#nonclient-table tbody').append(str);
            $('#customerModal').modal('hide');

            $('.remove').click(function(){
                $(this).parent().parent().remove();
            });

        });
        $('.remove-nonclient').click(function(){
            deleteNonClient();
        });
        function deleteNonClient()
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"ClientFieldDays","action"=>"deleteNonClient")) ?>',
                type: 'POST',
                data: {
                    clienttraining_id : $('.clienttraining_id_nonclient').val()
                },
               
                success: function (data) {    
                    console.log(data);
                }
            }); 
        }
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
