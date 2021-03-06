<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('RiceDemo'), '#');
$this->Html->addCrumb(__('Report'), '#');
$current = $this->Paginator->current();
$page_params = $this->Paginator->params();
$limit = $page_params['limit'];
$start = ($current-1) *$limit;
$subjectNumber = isset($subject_number)?$subject_number:1;
 ?>
<div id="page-heading"></div>
<div class="container">
<form action="<?php echo $this->Html->url(array('action'=>'reportview')) ?>" method="post" id="adminForm">
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
                                                        placeholder="Filter between date of training..."
                                                        value="<?php echo @$date_range ?>"

                                                        id="daterange"
                                                >                                        
                                            <span class="input-group-addon"  
                                                    onclick="document.getElementById('adminForm').submit();"
                                                    rel='tooltip' ata-placement='left' 
                                                data-original-title='Click to filter by date training'  style="cursor:pointer;"><i class="fa fa-search"></i></span>
                            </div>
                           
                        </div><!-- /.col-lg-6 -->
                    <div class="col-sm-3 pull-right">
                        Number of Subject :
                           <select name="subject_number" class="select2" onchange="document.getElementById('adminForm').submit();">
                                <?php for($i=1;$i<5;$i++) :?>
                                    <option <?php if($i==$subjectNumber) echo ' selected = "selected"' ?>>
                                            <?php echo $i ?>
                                    </option>
                                <?php endfor; ?>
                           </select>
                    </div><!-- /.col-lg-6 -->
              </div>
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-report table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th><?php echo __('NO') ?></th>
                            <th><?php echo __('Responsible Staff') ?></th>
                            <th><?php echo __('Name of Trainer')?></th>
                            <?php for($i=1;$i<=$subjectNumber;$i++): ?>
                            <th><?php echo __('Subject').''.$i ?> </th>
                            <?php endfor; ?>
                            <th><?php echo __('Date of Conduct training')?></th>
                            <th><?php echo __('Training/Meeting')?></th>
                            <th><?php echo __('Training Place')?></th>
                            <th><?php echo __('Participant')?></th>
                            <th><?php echo __('Farmer or Vendor')?></th>
                            <th><?php echo __('Gender')?></th>
                            <th><?php echo __('Village ID')?></th>
                            <th><?php echo __('Village')?></th>
                            <th><?php echo __('Commune')?></th>
                            <th><?php echo __('District')?></th>
                            <th><?php echo __('Province')?></th>
                            <th><?php echo __('Under FBA')?></th>
                            <th><?php echo __('Remarks')?></th>                          
                                                              
                        </tr>
                    </thead>
                    <tbody>  
                        <?php 
                            $count = 0;
                            foreach ($data as $key => $value) :
                                $count++;
                            ?>                      
                        <tr>
                            <td>
                                <?php echo $start+$key+1;?>
                            </td>
                            <td>
                              <?php echo $value['TrainingDemo']['training_responsible_staff'] ?>
                            </td>
                            <td>
                              <?php echo $value['TrainingDemo']['week_trainer'] ?>
                            </td>
                            <?php for ($i=1; $i <=$subjectNumber ; $i++) :?>
                                <td>
                                  <?php echo $value['TrainingDemo']['week_topic'.$i] ?>
                                </td>
                            <?php endfor; ?>
                            <td>
                              <?php echo $value['TrainingDemo']['training_datestart'] ?>
                            </td>
                            <td>

                            </td>
                            <td>
                                <?php echo $value['TrainingDemo']['training_location'] ?>
                            </td>
                            <td>
                                <?php echo $value['TrainingDemo']['participant_name'] ?>                                
                            </td>
                            
                            <td>
                                <?php echo $value['TrainingDemo']['ftype'] ?>
                            </td>
                            <td>
                                <?php echo $value['TrainingDemo']['participant_gender'] ?>
                            </td>
                            <td>
                                <?php echo $value['TrainingDemo']['phum_code'] ?>
                            </td>
                            <td>
                                <?php echo $value['TrainingDemo']['phum_name_en'] ?>
                            </td>
                            <td>
                                <?php echo $value['TrainingDemo']['khum_name_en'] ?>
                            </td>
                            <td>
                                <?php echo $value['TrainingDemo']['srok_name_en'] ?>
                            </td>
                            <td>
                                <?php echo $value['TrainingDemo']['khet_name_en'] ?>
                            </td>
                             <td>
                                <?php echo $value['TrainingDemo']['fba'] ?>
                            </td>
                            <td>
                            </td>
                                                    
                        </tr>
                        <?php endforeach; ?>  
                        <?php 
                            if($count==0):
                         ?>
                            <tr>
                                <td colspan ="<?php echo $subjectNumber+16 ?>"> <center>No Record</center> </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                     <tfoot>
                        <tr>
                            <td colspan="<?php echo $subjectNumber+16  ?>">
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