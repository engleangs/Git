<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Client'), '#');
$this->Html->addCrumb(__('List Detail'), '/Clients/listing');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array('action'=>'save',$data[0]['c']['client_id']));?>" method="POST" id="adminForm">
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h4><?php echo __('Detail Client') ?></h4>
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
                            
                            <td>
                                <table class="detail-info" >
                                    <tr>
                                        <td colspan="2" align="center"><h4><?php echo __('Contact');?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Code') ?> :</td>
                                        <td><?php echo $value['c']['client_id']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Name') ?> :</td>
                                        <td><?php echo $value['c']['client_name_en']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Khmer Name') ?> :</td>
                                        <td><?php echo $value['c']['client_name_kh']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Gender') ?> :</td>
                                        <td><?php echo $value['c']['client_gender']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Phone') ?> :</td>
                                        <td><?php echo $value['c']['client_phone']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Date of birth') ?> :</td>
                                        <td><?php echo $value['c']['client_date_of_birth']?></td>
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
                                        array( 'controller'=>'Clients',         
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
    </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function()
    {
    
       
     });


</script>

