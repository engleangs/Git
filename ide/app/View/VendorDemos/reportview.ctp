<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Fba Register'), '#');
$this->Html->addCrumb(__('Report'), '#');
$current = $this->Paginator->current();
$page_params = $this->Paginator->params();
$limit = $page_params['limit'];
$start = ($current-1) *$limit;
$states = array(0=>'Inactive',1=>'Active');
 ?>
<div id="page-heading"></div>
<div class="container">
    <form action="<?php echo $this->Html->url( array('action'=>'reportview') ) ?>" method="post" id="adminForm">
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
                            <th><?php echo __('FBA-ID') ?></th>
                            <th><?php echo __('FBA Name')?></th>
                            <th><?php echo __('Gender')?></th>
                            <th><?php echo __('Year of birth')?></th>
                            <th><?php echo __('Village ID')?></th>
                            <th><?php echo __('Village')?></th>
                            <th><?php echo __('Commune')?></th>
                            <th><?php echo __('District')?></th>
                            <th><?php echo __('Province')?></th>
                            <th><?php echo __('Contact')?></th>
                            <th><?php echo __('Staff Supervision')?></th>
                            <th><?php echo __('Branch Manager')?></th>
                            <th><?php echo __('FBA Start Date')?></th>
                            <th><?php echo __('FBA End Date')?></th>
                            <th><?php echo __('FBA Status')?></th>
                                                                                          
                        </tr>
                    </thead>
                    <tbody>  
                        <?php 
                            $count = 0;
                            foreach ($data as $key => $value) :
                            $count++;
                                ?>                      
                        <tr>
                            <td><?php echo $start+$key+1;?></td>
                            <td><?php echo $value['VendorDemo']['vendor_code'];?></td>
                            <td><?php echo $value['VendorDemo']['vendor_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['vendor_gender']?></td>
                            <td><?php echo date('Y',strtotime($value['VendorDemo']['vendor_date_of_birth']));?></td>
                            <td><?php echo $value['VendorDemo']['phum_code']?></td>
                            <td><?php echo $value['VendorDemo']['phum_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['khum_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['srok_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['khet_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['vendor_phone'].' <br> '. $value['VendorDemo']['vendor_email']  ;?>
                            <td><?php ?></td>
                            <td><?php echo $value['VendorDemo']['branch_manager']?></td>
                            <td><?php echo $value['VendorDemo']['vendor_datestarted']?></td>
                            <td><?php echo $value['VendorDemo']['vendor_date_ended']?></td>
                            <td><?php echo $states[$value['VendorDemo']['state']]?></td>
                        </tr>
                        <?php endforeach; ?>  
                        <?php if($count==0): ?>
                            <tr><td colspan="16"><center>No Record </center></td></tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="16">
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
</form>
</div>

<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
  $('document').ready(function() 
  {
    $('.select2').select2();
    $('#daterange').daterangepicker({
        /*format:'YYYY-MM-DD'*/
    });
  });
</script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css">