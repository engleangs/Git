 <div class="panel-body ">            
                <table id="ca-table" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
                    <thead>
                        <tr>
                            
                            <th><?php echo __('CA')?></th>
                            <th>
                                <?php echo __('Action') ?>                                          
                            </th>
                                   
                        </tr>
                    </thead>
                    <tbody>  
                           <?php
                           if(isset($cavendors))
                           {
                            foreach ($cavendors as $key => $value) :?>                      
                        <tr class="<?php echo ($key%2)==0?'event':'odd';
                            echo ' '.$value['CaVendor']['ca_code'] ?>">
                            
                            <td>
                                <?php echo $value['CaVendor']['ca_code']?>
                                <input type="hidden" name="Ca[]" value ="<?php
                                    echo $value['CaVendor']['ca_code'] ?>" />
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
                                <a id="btn-select-ca" 
                                class="btn btn-primary" href="#">
                            <?php echo __('Select') ?></a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
</div>
<!-- Modal -->
<div class="modal fade" id="caModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="customer-modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo __('Add CA') ?></h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <?php echo __('CA') ?>
                        </label>
                        <div class="col-sm-6">
                            <select name="ca_code" id="select-ca" class="col-sm-12">
                            
                            </select>
                        </div>
                    </div> 
                   
            </div>
            <div class="modal-footer">
                 <button type="button" id="btn-add-ca" class="btn btn-primary"><?php echo __('Add')?></button>
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
        $('#select-ca').select2(); 
       
        $('.delete').click(function(){
                $(this).parent().parent().remove();
        });
        $.ajax({
            url:'<?php echo $this->Html->url(array("controller"=>"CommercialAgronomists","action"=>"selectca")) ?>',
            type: 'POST',
            data: {
            },
           
            success: function (data) {    
               $('#select-ca').html(data);
               $('#select-ca').select2();
            }

        });

        $('#btn-select-ca').click(function(){            
            
            $('#caModal').modal('show');
        });

        $('#btn-add-ca').click(function(){
            var CaId = $('#select-ca').val();
            var test =$('#ca-table tbody').find('tr.'+CaId);
            if(test.length>0)
            {
                alert('This CA Id Already Added');
                return;
            }
           
            var str ='<tr class="'+CaId+'"><td>'+CaId+'<input type="hidden" name="Ca[]" value ="'+CaId+'" /></td>'+
                '<td><input type="button"' +
                ' class="btn btn-primary btn-xs delete"'+
                'value="delete"></td>';

            $('#ca-table tbody').append(str);
            $('#caModal').modal('hide');
            $('.delete').click(function(){
                $(this).parent().parent().remove();
            });

        });
     
    });
</script>
<style>
#caModal
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
