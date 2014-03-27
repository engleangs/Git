<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('RiceDemo'), '#');
$this->Html->addCrumb(__('Report'), '#');
$current = $this->Paginator->current();
$page_params = $this->Paginator->params();
$limit = $page_params['limit'];
$start = ($current-1) *$limit;
?>
<div id="page-heading"></div>
<form id="adminForm" action="<?php 
                              echo $this->Html->url(array('action'=>'reportview')) 
                            ?>"
                            method="POST">

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
                                <li>
                                    <a  target="_blank" style="color:#000;" href="<?php 
                                          echo $this->Html->url(array('action'=>'printReport'))
                                                                   ?>">

                                    <i class="fa fa-print"></i>&nbsp;&nbsp;<?php echo __('Print') ?>
                                    </a>
                                </li>     
                                 <li>
                                    <a  rel="<?php  ?>" style="color:#000;" href="<?php 
                                          echo $this->Html->url(       
                                                           array('action'=>'export')
                                            )
                                          ?>">

                                    <i class="fa  fa-share-square"></i>&nbsp;&nbsp;<?php echo __('Export As Excel') ?>
                                    </a>
                                </li>                                           
                                            
                            </ul>
                        </span>                              
                       
                 </div>
            </div>
            <div class="panel-body collapse in">
              <div class="row padding-bottom">
                <div class="col-sm-3 pull-left">
                        <div class="input-group">
                                        <input 
                                                type="text" class="form-control" 
                                                    name="date-range" 
                                                    placeholder="Filter between date start..."
                                                    value="<?php echo @$date_range ?>"

                                                    id="daterange"
                                            >                                        
                                        <span class="input-group-addon"  
                                                onclick="document.getElementById('adminForm').submit();"
                                                rel='tooltip' ata-placement='left' 
                                            data-original-title='Click to filter by date start'  style="cursor:pointer;"><i class="fa fa-search"></i></span>
                        </div>
                       
                    </div><!-- /.col-lg-6 -->
              </div>
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-report table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th><?php echo __('NO') ?></th>
                            <th><?php echo __('CA Name') ?></th>
                            <th><?php echo __('Branch Manager')?></th>
                            <th><?php echo __('Donor')?></th>
                            <th><?php echo __('Crop Cycle')?></th>
                            <th><?php echo __('Type of Rice')?></th>
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
                        <?php 
                        $count  =0 ;
                        foreach ($data as $key => $value) :
                          $count++;
                        ?>                      
                        <tr>
                            <td>
                                <?php echo $start+$key+1;?>
                            </td>
                            <td>
                              <?php 
                                  if($value['RiceDemo']['p_client_id']==null)
                                  {
                                     echo $value['RiceDemo']['ven_v_name_en'];
                                  }
                                  else
                                  {
                                    echo $value['RiceDemo']['ven_ca_vendor_name_en'];
                                  }
                                     
                              ?>
                            </td>
                            <td>
                                <?php
                                   if($value['RiceDemo']['p_client_id']==null) 
                                    echo $value['RiceDemo']['ven_v_branch_manager'];
                                  else echo $value['RiceDemo']['ven_ca_branch_manager'];
                                ?>
                            </td>
                            <td><?php echo $value['RiceDemo']['pr_project_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['plot_crop_cycle']?></td>
                            <td>
                                <?php 

                                        if($value['RiceDemo']['co_crop_season']=='wetseason')
                                        {
                                             echo 'Wet Season';
                                        }
                                        if($value['RiceDemo']['co_crop_season']=='dryseason')
                                        {
                                            echo 'Dry Season';
                                             
                                        }
                                       
                                  
                                  //echo $value['co']['crop_season']
                                ?>
                            </td>
                            <td>
                                <?php 
                                  if($value['RiceDemo']['p_vendor_code']==null){
                                    echo $value['RiceDemo']['c_client_name_en'] .'  ('.$value['RiceDemo']['c_client_id'].')';
                                  }
                                  if($value['RiceDemo']['p_client_id']==null){
                                    echo $value['RiceDemo']['v_vendor_name_en'].'  ('.$value['RiceDemo']['v_vendor_code'].')';
                                  }
                                  
                                ?>
                            </td>
                            <td>
                              <?php 
                                  if($value['RiceDemo']['p_vendor_code']==null){
                                    echo 'Farmer';
                                  }
                                  if($value['RiceDemo']['p_client_id']==null){
                                    echo 'FBA';
                                  }
                                  
                                ?>
                            </td>
                            <td>
                              <?php 
                                  if($value['RiceDemo']['p_vendor_code']==null){
                                    echo $value['RiceDemo']['c_client_gender'];
                                  }
                                  if($value['RiceDemo']['p_client_id']==null){
                                    echo $value['RiceDemo']['v_vendor_gender'];
                                  }
                                  
                                ?>
                            </td>
                            <td><?php echo $value['RiceDemo']['ph_phum_code'];?></td>
                            <td><?php echo $value['RiceDemo']['ph_phum_name_en'];?></td>
                            <td><?php echo $value['RiceDemo']['khum_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['srok_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['khet_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['co_crop_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['plot_type_treatment']?></td>
                            <td><?php echo $value['RiceDemo']['plot_size_m2']?></td>
                            <td><?php echo $value['RiceDemo']['plot_datestart']?></td>
                            <td><?php echo $value['RiceDemo']['plot_dateplanting']?></td>
                                                    
                        </tr>
                        <?php endforeach; ?> 
                        <?php if($count==0): ?>
                          <tr><td colspan="20"> <center>No Record</center></td>
                        <?php endif; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="19">
                                <ul class="pagination">
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
</form>
<div>
  
</div>
<script type="text/javascript">
  $('document').ready(function() 
  {
    $('#daterange').daterangepicker({
        /*format:'YYYY-MM-DD'*/
    });
  });
</script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css">