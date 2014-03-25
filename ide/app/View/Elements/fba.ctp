 <div class="panel-body ">            
                <table id="fba-table" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
                    <thead>
                        <tr>
                            
                            <th><?php echo __('FBA')?></th>
                            <th>
                                <?php echo __('Action') ?>                                          
                            </th>
                                   
                        </tr>
                    </thead>
                    <tbody>  
                           <?php
                           if(isset($fbavendors))
                           {
                            foreach ($fbavendors as $key => $value) :?>                      
                        <tr class="<?php echo ($key%2)==0?'event':'odd';
                            echo ' '.$value['FbaVendor']['fba_code'] ?>">
                            
                            <td>
                                <?php echo $value['FbaVendor']['fba_code']?>
                                <input type="hidden" name="fba[]" value ="<?php
                                    echo $value['FbaVendor']['fba_code'] ?>" />
                            </td>
                            <td>
                                <input type="button" 
                                class="btn btn-primary btn-xs delete" 
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
                                <a id="btn-select-fba" 
                                class="btn btn-primary" href="#">
                            <?php echo __('Select') ?></a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
</div>
<!-- Modal -->
<div class="modal fade" id="FbaModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="customer-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo __('Add FBA') ?></h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('FBA') ?>
                        </label>
                        <div class="col-sm-6">
                            <select name="fba_code" id="select-fba" class="col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
                   
            </div>
            <div class="modal-footer">
                 <button type="button" id="btn-add-fba" class="btn btn-primary"><?php echo __('Add')?></button>
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
        $('#select-fba').select2(); 
       
        $('.delete').click(function(){
                $(this).parent().parent().remove();
        });
        $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"Fbas","action"=>"selectfba")) ?>',
            type: 'POST',
            data: {
            },
           
            success: function (data) {    
               $('#select-fba').html(data);
               $('#select-fba').select2();
            }

        });

        $('#btn-select-fba').click(function(){            
            
            $('#FbaModal').modal('show');
        });

        $('#btn-add-fba').click(function(){
            var FbaId = $('#select-fba').val();
            var test =$('#fba-table tbody').find('tr.'+FbaId);
            if(test.length>0)
            {
                alert('This FBA Id Already Added');
                return;
            }
           
            var str ='<tr class="'+FbaId+'"><td>'+FbaId+'<input type="hidden" name="fba[]" value ="'+FbaId+'" /></td>'+
                '<td><input type="button"' +
                ' class="btn btn-primary btn-xs delete"'+
                'value="delete"></td>';

            $('#fba-table tbody').append(str);
            $('#FbaModal').modal('hide');
            $('.delete').click(function(){
                $(this).parent().parent().remove();
            });

        });
     
    });
</script>
<style>
#FbaModal
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
