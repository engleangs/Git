<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('RiceDemo'), '#');
$this->Html->addCrumb(__('Report'), '#');
var_dump($data);
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
                            <th><?php echo __('Vendor Name') ?></th>
                            <th><?php echo __('Branch Manager')?></th>
                            <th><?php echo __('Donor')?></th>
                            <th><?php echo __('Crop Cycle')?></th>
                            <th><?php echo __('Crop Type')?></th>
                            <th><?php echo __('Name of Demo\'s Owner')?></th>
                            <th><?php echo __('FBA or Farmer')?></th>
                            <th><?php echo __('Gender')?></th>
                            <th><?php echo __('Village ID')?></th>
                            <th><?php echo __('Village')?></th>
                            <th><?php echo __('Commune')?></th>
                            <th><?php echo __('District')?></th>
                            <th><?php echo __('Province')?></th>
                            <th><?php echo __('Rice Variety')?></th>
                            <th><?php echo __('Type of treatment')?></th>
                            <th><?php echo __('Plot size')?></th>
                            <th><?php echo __('Date Start')?></th>
                            <th><?php echo __('Date planting')?></th>
                                                              
                        </tr>
                    </thead>
                    <tbody>  
                        <?php foreach ($data as $key => $value) :?>                      
                        <tr>
                            <td>
                                <?php echo $key+1;?>
                            </td>
                            <td>
                              <?php 
                                  if($value['p']['client_id']==null)
                                  {
                                     echo $value['v']['vendor_name_en'];
                                  }
                                  else
                                  {
                                    echo $value['ven_client']['vendor_name_en'];
                                  }
                                     
                              ?>
                            </td>
                            <td><?php echo $value['ven_client']['branch_manager']?></td>
                            <td><?php echo $value['pr']['project_name_en']?></td>
                            <td><?php echo $value['p']['plot_crop_cycle']?></td>
                            <td><?php echo $value['co']['crop_season']?></td>
                            <td>
                               	<?php 
                               		if($value['p']['vendor_code']==null){
                               			echo $value['c']['client_name_en'] .'  ('.$value['c']['client_id'].')';
                               		}
                               		if($value['p']['client_id']==null){
                               			echo $value['v']['vendor_name_en'].'  ('.$value['v']['vendor_code'].')';
                               		}
                               		
                               	?>
                            </td>
                            <td>
                            	<?php 
                               		if($value['p']['vendor_code']==null){
                               			echo 'Farmer';
                               		}
                               		if($value['p']['client_id']==null){
                               			echo 'FBA';
                               		}
                               		
                               	?>
                            </td>
                            <td>
                            	<?php 
                               		if($value['p']['vendor_code']==null){
                               			echo $value['c']['client_gender'];
                               		}
                               		if($value['p']['client_id']==null){
                               			echo $value['v']['vendor_gender'];
                               		}
                               		
                               	?>
                            </td>
                            <td><?php echo $value['ph']['phum_code'];?></td>
                            <td><?php echo $value['ph']['phum_name_en'];?></td>
                            <td><?php echo $value['kh']['khum_name_en']?></td>
                            <td><?php echo $value['sr']['srok_name_en']?></td>
                            <td><?php echo $value['kt']['khet_name_en']?></td>
                            <td><?php echo $value['co']['crop_name_en']?></td>
                            <td><?php echo $value['p']['plot_type_treatment']?></td>
                            <td><?php echo $value['p']['plot_size_m2']?></td>
                            <td><?php echo $value['p']['plot_datestart']?></td>
                            <td><?php echo $value['p']['plot_dateplanting']?></td>
                                                    
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