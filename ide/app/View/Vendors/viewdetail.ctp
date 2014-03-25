<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Vendor'), '#');
$this->Html->addCrumb(__('List Detail'), '/Vendors/listing');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array('action'=>'save',$data[0]['v']['vendor_code']));?>" method="POST" id="adminForm">
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h4><?php echo __('Detail Vendor') ?></h4>
                    <div class="options">
                        <span>
                           <a href="javascript:;" class="panel-collapse" ><i class="fa fa-chevron-down"></i>
                           </a>
                        </span>
                        
                        <div style="clear:both;"></div>
                    </div>
            </div>
            <div class="panel-body collapse in">
                
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-striped table-bordered" id="example">
                    
                    <tbody>  
                        <?php foreach ($data as $key => $value) : ?>    
                        <tr>
                            <td width="200px">
                                <?php if($value['v']['vendor_photo']=='')
                                {?>
                                    <img src="<?php echo $this->webroot?>vendors/default.png" width="200px" height="200px"/>
                                <?php }
                                else{
                                ?>
                                <img src="<?php echo $this->webroot?><?php echo $value['v']['vendor_photo']?>" width="70px" height="70px"/>
                                <?php }?>
                            </td>
                            <td>
                                <table class="detail-info">
                                    <tr>
                                        <td colspan="2" align="center"><h4><?php echo __('Contact');?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Code') ?> :</td>
                                        <td><?php echo $value['v']['vendor_code']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Name') ?> :</td>
                                        <td><?php echo $value['v']['vendor_name_en']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Khmer Name') ?> :</td>
                                        <td><?php echo $value['v']['vendor_name_kh']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Phone') ?> :</td>
                                        <td><?php echo $value['v']['vendor_phone']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Email') ?> :</td>
                                        <td><?php echo $value['v']['vendor_email']?></td>
                                    </tr>
                                   
                                    
                                </table>
                                <td>
                                <table class="detail-info">
                                    
                                    <tr>
                                        <td colspan="2" align="center"><h4><?php echo __('Address');?></h4></td>
                                    </tr>
                                    <tr>
                            
                                        <td><?php echo __('Phum')?> :</td>
                                        <td><?php echo $value['p']['phum_name_en'] .' ( '.$value['p']['phum_code'] .' )';?></td>
                                    </tr>
                                    <tr>
                            
                                        <td><?php echo __('Khum')?> :</td>
                                        <td><?php echo $value['kh']['khum_name_en'] .' ( '.$value['kh']['khum_code'] .' )';?></td>
                                    </tr>
                                    <tr>
                            
                                        <td><?php echo __('Srok')?> :</td>
                                        <td><?php echo $value['s']['srok_name_en'] .' ( '.$value['s']['srok_code'] .' )';?></td>
                                    </tr>
                                    <tr>
                            
                                        <td><?php echo __('Khet')?> :</td>
                                        <td><?php echo $value['kt']['khet_name_en'] .' ( '.$value['kt']['khet_code'] .' )';?></td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>                  
                       
                        <?php endforeach; ?>  
                    </tbody>
                </table>
           
                
                    <?php echo $this->Html->link(                                      
                                    $this->Html->tag('i',
                                            '',
                                                array('class'=>'')).' '.__('Back')
                                      ,
                                        array( 'controller'=>'Vendors',         
                                            'action' => 'listing'
                                        ),
                                        array(
                                            'escape'=>false,
                                            'class'=>'btn-default btn'
                                            )
                                        ); 
                                    ?>   
                    <!-- <button class="btn-primary btn" title="<?php echo __('Save Title') ?>">
                    <?php echo __('Save') ?>
                    </button> -->
                       
            </div>
        </div>
    </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function()
    {
    
       
     });


</script>

