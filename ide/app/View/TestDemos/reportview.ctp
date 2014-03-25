<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('VegetableDemo'), '#');
$this->Html->addCrumb(__('Report'), '#');
$current = $this->Paginator->current();
$page_params = $this->Paginator->params();
$limit = $page_params['limit'];
$start = ($current-1) *$limit;
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
                            <th><?php echo __('CA Name') ?></th>
                            <th><?php echo __('Branch Manager')?></th>
                            <th><?php echo __('Donor')?></th>
                            <th><?php echo __('Crop Cycle')?></th>
                            <th><?php echo __('Type of treatment')?></th>
                            <th><?php echo __('Name of Demo\'s Owner')?></th>
                            <th><?php echo __('FBA or Farmer')?></th>
                            <th><?php echo __('Gender')?></th>
                            <th><?php echo __('Village ID')?></th>
                            <th><?php echo __('Village')?></th>
                            <th><?php echo __('Commune')?></th>
                            <th><?php echo __('District')?></th>
                            <th><?php echo __('Province')?></th>
                            <th><?php echo __('Vegetable Variety')?></th>
                            <th><?php echo __('Plot size')?></th>
                            <th><?php echo __('Date Start')?></th>
                            <th><?php echo __('Date planting')?></th>
                                                              
                        </tr>
                    </thead>
                    <tbody>  
                        <?php foreach ($data as $key => $value) : ?>                      
                        <tr>
                            <td>
                                <?php echo $start+$key+1;?>
                            </td>
                            <td>
                              <?php 
                                  if($value['vw_vegetabledemos']['p_client_id']==null)
                                  {
                                     echo $value['vw_vegetabledemos']['v_vendor_name_en'];
                                  }
                                  else
                                  {
                                    echo $value['vw_vegetabledemos']['ven_client_vendor_name_en'];
                                  }
                                     
                              ?>
                            </td>
                            <td><?php echo $value['vw_vegetabledemos']['ven_client_branch_manager']?></td>
                            <td><?php echo $value['vw_vegetabledemos']['pr_project_name_en']?></td>
                            <td><?php echo $value['vw_vegetabledemos']['plot_crop_cycle']?></td>
                            <td><?php echo $value['vw_vegetabledemos']['plot_type_treatment']?></td>
                            <td>
                                <?php 
                                  if($value['vw_vegetabledemos']['p_vendor_code']==null){
                                    echo $value['vw_vegetabledemos']['c_client_name_en'] .'  ('.$value['vw_vegetabledemos']['c_client_id'].')';
                                  }
                                  if($value['vw_vegetabledemos']['p_client_id']==null){
                                    echo $value['vw_vegetabledemos']['v_vendor_name_en'].'  ('.$value['vw_vegetabledemos']['v_vendor_code'].')';
                                  }
                                  
                                ?>
                            </td>
                            <td>
                              <?php 
                                  if($value['vw_vegetabledemos']['p_vendor_code']==null){
                                    echo 'Farmer';
                                  }
                                  if($value['vw_vegetabledemos']['p_client_id']==null){
                                    echo 'FBA';
                                  }
                                  
                                ?>
                            </td>
                            <td>
                              <?php 
                                  if($value['vw_vegetabledemos']['p_vendor_code']==null){
                                    echo $value['vw_vegetabledemos']['c_client_gender'];
                                  }
                                  if($value['vw_vegetabledemos']['p_client_id']==null){
                                    echo $value['vw_vegetabledemos']['v_vendor_gender'];
                                  }
                                  
                                ?>
                            </td>
                            <td><?php echo $value['vw_vegetabledemos']['ph_phum_code'];?></td>
                            <td><?php echo $value['vw_vegetabledemos']['ph_phum_name_en'];?></td>
                            <td><?php echo $value['vw_vegetabledemos']['khum_name_en']?></td>
                            <td><?php echo $value['vw_vegetabledemos']['srok_name_en']?></td>
                            <td><?php echo $value['vw_vegetabledemos']['khet_name_en']?></td>
                            <td><?php echo $value['vw_vegetabledemos']['co_crop_name_en']?></td>
                            
                            <td><?php echo $value['vw_vegetabledemos']['plot_size_m2']?></td>
                            <td><?php echo $value['vw_vegetabledemos']['plot_datestart']?></td>
                            <td><?php echo $value['vw_vegetabledemos']['plot_dateplanting']?></td>
                                                    
                        </tr>
                        <?php endforeach; ?>  
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="18">
                                <ul class="pagination">
                                <!-- Shows the page numbers -->
                                <!-- Shows the next and previous links -->
                                <?php echo $this->Paginator->prev('« Previous', array('tag' => 'li'), null, 
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
                                    <li>
                                        &nbsp;&nbsp;&nbsp;&nbsp; Page : <?php echo $this->Paginator->counter(); ?> Pages
                                    </li>                                        
                                </ul>
                                <span></span>
                            </td>
                        </tr>
                    </tfoot>                
                </table>
            </div>
        </div>
        </div>
    </div>
</div>