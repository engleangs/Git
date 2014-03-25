<table id="client-table-client" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
    <thead>
        <tr>
            <th><?php echo __('Code')?></th>
            <th><?php echo __('Client')?></th>
            <th><?php echo __('Action') ?></th>
        </tr>
    </thead>
    <tbody>  
        <?php if(isset($clienttrainings))
        {   
            
            foreach ($clienttrainings as $key=> $client) : 
            if($client['ClientMeeting']['client_id'])
            {
            ?>              
            <tr class="<?php echo ($key%2)==0?'event':'odd';
            echo ' '.$client['ClientMeeting']['client_id'] ?>">
                <td>
                    <?php echo $client['ClientMeeting']['client_id']?>
                    <input type="hidden" name="client[]" value ="<?php
                    echo $client['ClientMeeting']['client_id'] ?>" />
                </td>
                <td>
                    <?php echo @$client['Client']['client_name_en']?>
                </td>
                <td>
                    <input type="hidden" value="<?php echo $client['ClientMeeting']['clientmeeting_id']?>" name="clientmeeting_id">
                    <input type="button" class="remove-client btn btn-primary btn-xs remove" value="<?php echo __('Remove') ?>">
                </td>
            </tr>

            <?php }  endforeach; 
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" align="center">
                <a id="btn-select-client" class="btn btn-primary" href="#">
                <?php echo __('Select') ?></a>
            </td>
        </tr>
    </tfoot>
</table>

<!-- Modal -->
<div class="modal fade" id="ClientModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="client-modal-dialog">
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
                            <select name="client_id" id="selectclient-client" class="col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-add-client" class="btn btn-primary"><?php echo __('Add')?></button>
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
        $('#selectclient-client').select2();

        $('.remove').click(function(){
                $(this).parent().parent().remove();
        });
        $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Clients","action"=>"selectclient")) ?>',
            type: 'POST',
            data: {
            },
           
            success: function (data) {    
               $('#selectclient-client').html(data);
               $('#selectclient-client').select2();
            }

        });
      
        $('#btn-select-client').click(function(){            
            
            $('#ClientModal').modal('show');
        });

        $('#btn-add-client').click(function(){
            var clientId = $('#selectclient-client').val();
            var clientName = $('#selectclient-client option:selected').text();
            var count =0;
            var clientvalid  =$('#client-table-client tbody tr').
                        each(function(){
                            if($(this).hasClass(clientId))
                            {
                                count++;
                            }
                        });
            console.log(clientvalid);
            if(count>0)
            {
                alert('This client ID Already Added');
                return;
            }
          
            var str ='<tr class="'+clientId+'"><td>'+clientId+'<input type="hidden" '+
                    'name="client[]" value ="'+clientId+'" /></td>'+
                    '<td><input type="hidden" name="clientname[]"'+
                    ' value="'+clientName+'"> '+clientName+'</td>'+
                    '<td><input type="button" class="btn btn-primary btn-xs remove"'+
                    'value="Remove"></td>';

            $('#client-table-client tbody').append(str);
            $('#ClientModal').modal('hide');
            $('.remove').click(function(){
                $(this).parent().parent().remove();
            });

        });
        $('.remove-client').click(function(){
            var id = $(this).prev().val();
            deleteClient(id);
        });
        function deleteClient(id)
        {
            $.ajax({
                url:'<?php echo $this->Html->url(array("controller"=>"ClientMeetings","action"=>"deleteClient")) ?>',
                type: 'POST',
                data: {
                    clientmeeting_id : id
                },
               
                success: function (data) {    
                    console.log(data);
                }
            }); 
        }
     
    });
</script>
<style>
#ClientModal
{
    overflow: scroll;
}
#client-modal-dialog
{
    width: 40%;
    margin-top:100px;
}
.iframebody{
    height: 400px;
    width: 100%;
}
</style>
