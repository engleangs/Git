<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Client Register'), '#');
$this->Html->addCrumb(__('Report'), '#');
/*var_dump($data);*/
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
    	<div class="panel panel-primary">
           	<div class="panel-heading">
       			<div class="options">
                        <span>
                            <a href="javascript:;" class="panel-collapse" ><i class="fa fa-chevron-down"></i>
                            </a>
                        </span>
                        <span  class="dropdown" >
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" style="color:#fff;">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu arrow" style="color:#000;">
                                <li><a class="btn-edit-list" rel="<?php echo $this->Html->url(array('action'=>'print')) ?>" style="color:#000;" href="#">

                                    <i class="fa fa-print"></i>&nbsp;&nbsp;<?php echo __('Print') ?>
                                    </a>
                                </li>                                           
                                            
                            </ul>
                        </span>                              
                       
                 </div>
            </div>
            <div class="panel-body collapse in">
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-report table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th><?php echo __('NO') ?></th>
                            <th><?php echo __('Date of Register') ?></th>
                            <th><?php echo __('Client ID')?></th>
                            <th><?php echo __('Client Name')?></th>
                            <th><?php echo __('Name in Khmer')?></th>
                            <th><?php echo __('Gender')?></th>
                            <th><?php echo __('Village ID')?></th>
                            <th><?php echo __('Village')?></th>
                            <th><?php echo __('Commune')?></th>
                            <th><?php echo __('District')?></th>
                            <th><?php echo __('Province')?></th>
                            <th><?php echo __('FBA Name')?></th>
                            <th><?php echo __('FBA ID')?></th>
                            <th><?php echo __('Seeds- in Riel')?></th>
                            <th><?php echo __('Fertilizer/FDP ')?></th>
                            <th><?php echo __('Plastic mulch')?></th>
                            <th><?php echo __('Trellis nets')?></th>
                            <th><?php echo __('Drum Seeder')?></th>
                            <th><?php echo __('Other')?></th>
                            <th><?php echo __('Total in Riels')?></th>
                                                                                          
                        </tr>
                    </thead>
                    <tbody>  
                        <?php foreach ($data as $key => $value) :?>                      
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <td><?php echo $value['v']['vendor_code'];?></td>
                            <td><?php echo $value['v']['vendor_name_en']?></td>
                            <td><?php echo $value['v']['vendor_gender']?></td>
                            <td><?php echo date('Y',strtotime($value['v']['vendor_date_of_birth']));?></td>
                            <td><?php echo $value['p']['phum_code']?></td>
                            <td><?php echo $value['p']['phum_name_en']?></td>
                            <td><?php echo $value['k']['khum_name_en']?></td>
                            <td><?php echo $value['s']['srok_name_en']?></td>
                            <td><?php echo $value['kh']['khet_name_en']?></td>
                            <td><?php echo $value['v']['vendor_phone'].' <br> '. $value['v']['vendor_email']  ;?>
                            <td><?php ?></td>
                            <td><?php echo $value['v']['branch_manager']?></td>
                            <td><?php echo $value['v']['vendor_datestarted']?></td>
                            <td><?php echo $value['v']['vendor_date_ended']?></td>
                            <td><?php echo $value['v']['vendor_status']?></td>
                        </tr>
                        <?php endforeach; ?>  
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <td colspan="14">
                                <ul class="pagination">
                                <!-- Shows the page numbers -->
                                <!-- Shows the next and previous links -->
                                <!--<?php echo $this->Paginator->prev('« Previous', array('tag' => 'li'), null, 
                                        array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')
                                                    ); ?>
                                         <?php echo $this->Paginator->numbers(
                                            array('separator' => '',
                                                    'currentTag' => 'a',
                                                     'currentClass' => 'active',
                                                     'tag' => 'li',
                                                     'first' => 1
                                                )
                                ); ?>
                                <?php echo $this->Paginator->next('Next »',  array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
                                        <!-- prints X of Y, where X is current page and Y is number of pages -->
                                    <!--<li>
                                        &nbsp;&nbsp;&nbsp;&nbsp; Page : <?php echo $this->Paginator->counter(); ?> Pages
                                    </li>                                        
                                </ul>
                                <span></span>
                            </td>
                        </tr>
                    </tfoot>             -->    
                </table>
            </div>
        </div>
      	</div>
    </div>
</div>