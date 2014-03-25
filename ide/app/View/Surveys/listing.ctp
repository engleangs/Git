<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Survey'), '#');
$this->Html->addCrumb(__('List All'), '/Surveys/listing');

 ?>
 <div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array());?>" method="POST" id="adminForm">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4><?php echo __('List All Survey') ?></h4>
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
                                    <a href="<?php echo $this->Html->url(array('action'=>'add')) ?>" style="color:#000;">
                                        <i class="fa fa-plus"></i>
                                    <?php echo __('Add New') ?>
                                    </a>
                                </li>                                       
                                <li>
                                    <a class="btn-delete-list" rel="<?php echo $this->Html->url(
                                        array('action'=>'deleteList')
                                                        ) ?>" style="color:#000;" href="#" >
                                        <i class="fa fa-minus-circle"></i>
                                        <?php echo __('Delete List') ?>
                                    </a>
                                </li>                                       
                                <li>
                                    <a class="btn-edit-list" rel="<?php echo $this->Html->url(
                                                            array('action'=>'edit')
                                                            ) ?>" style="color:#000;"
                                                            href="#"
                                                            >
                                                <i class="fa fa-edit"></i>
                                                <?php echo __('Edit') ?>
                                    </a>
                                </li>                                           
                                            
                            </ul>
                        </span>                             
                                
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="panel-body collapse in">
                <div class="row padding-bottom">
                    <div class="col-sm-4 pull-right">
                        <div class="input-group">
                                  <input type="text" value="<?php echo $this->Session->read('Filter.search') ?>" name="filter_search" class="form-control" placeholder="<?php echo __('Search placeholder') ?>" id="filter_search">
                                  <span class="input-group-btn">
                                      <button class="btn btn-default">
                                            <?php echo __('Search') ?>
                                      </button>
                                  </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div>
                <div class="clearfix"></div>
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-overflow table-striped table-bordered" id="example"><!--datatables-->
                        <thead>
                            <tr>
                                <th width="3%"><input type="checkbox" class="checkAll" /></th>
                                <th width="5%"><?php echo $this->Paginator->sort('survey_id',__('Code')) ?>
                                </th>
                                <th>
                                    <?php echo __('Gender') ?>
                                </th>
                                <th><?php echo $this->Paginator->sort('farmer_spend_income',__('Where will farmers spend their income?'))?>
                                </th>
                                <th><?php echo $this->Paginator->sort('proportion_produce_sold',__('What is the proportion of produce that is sold?'))?>
                                </th>
                                <th><?php echo $this->Paginator->sort('proportion_produce_consumed',__('What is the proportion of produce that is consumed?'))?>
                                </th>
                                <th><?php echo $this->Paginator->sort('estimated_amount_time_saved',__('What was the estimated amount of time saved?'))?>
                                </th>
                                <th><?php echo $this->Paginator->sort('farmers_spend_additional_times',__('How did farmers spend their additional times?'))?>
                                </th>
                                <th width="9%"><?php echo $this->Paginator->sort('survey_harvest_id',__('Harvest​ Type'))?>
                                </th >
                                <th width="9%"><?php echo $this->Paginator->sort('survey_harvest_id',__('Harvest Survey'))?>
                                </th>
                                <th width="8%"><?php echo $this->Paginator->sort('created_by',__('Created By'))?>
                                </th>
                                <th width="8%"><?php echo $this->Paginator->sort('modified_by',__('Modified By'))?>
                                </th>
                                <th width="10%">
                                    <?php echo __('Action') ?>                                          
                                </th>
                                       
                            </tr>
                        </thead>
                        <tbody>  
                            <?php foreach ($data as $key => $value) : ?> 
                            <tr class="<?php echo ($key%2)==0?'event':'odd' ?>">
                                <td>
                                <?php echo $this->MyHtml->checkBox($value['Survey']['survey_id'],$key) ?>
                                </td>
                                <td> <?php echo $value['Survey']['survey_id']?></td>
                                <td>
                                    <?php
                    if(@$value['Survey']['harvest_type']=='HarvestVegetable')
                    {
                       if(@$value['HarvestVegetable']['Plot']['client_id']==null)
                       {
                            echo $value['HarvestVegetable']['Plot']['Vendor']['vendor_gender'];
                       }
                       else
                       {
                            echo $value['HarvestVegetable']['Plot']['Client']['client_gender'];
                       }
                    }
                    if(@$value['Survey']['harvest_type']=='HarvestRice')
                    {
                      if(@$value['HarvestRice']['Plot']['client_id']==null)
                       {
                            echo $value['HarvestRice']['Plot']['Vendor']['vendor_gender'];
                       }
                       else
                       {
                            echo $value['HarvestRice']['Plot']['Client']['client_gender'];
                       }
                       
                    }
                    ?>
                                </td>
                                </td>  
                                <td>
                                <?php echo $value['Survey']['farmer_spend_income']?>
                                </td>
                                <td>
                                    <?php echo $value['Survey']['proportion_produce_sold']?>
                                </td>
                                <td>
                                    <?php echo $value['Survey']['proportion_produce_consumed']?>
                                </td>
                                <td>
                                    <?php echo $value['Survey']['estimated_amount_time_saved']?>
                                </td>
                                <td>
                                    <?php echo $value['Survey']['farmers_spend_additional_times']?>
                                </td>
                                <td>
                                    <?php echo $value['Survey']['harvest_type']?>
                                </td>
                                <td>
                                    <?php 
                                        if($value['Survey']['harvest_type']=='HarvestVegetable')
                                        {
                                             echo $value['Survey']['survey_harvest_id']
                                             .' ('.$value['HarvestVegetable']['harvestvegetable_date'].' )';
                                        }
                                        else
                                        {
                                            echo $value['Survey']['survey_harvest_id']
                                             .' ('.$value['HarvestRice']['harvestrice_date'].' )';
                                        }
                                       
                                    ?>
                                </td>
                                <td><?php echo $value['Survey']['created_by']?></td>
                                <td><?php echo $value['Survey']['modified_by']?></td>
                                <td>
                                <!--<a href="#" class="btn btn-xs btn-success">-->
                                    <?php 
                                                                            
                                        echo $this->MyHtml->editButton($value['Survey']['survey_id']);
                                    
                                    ?>
                                    &nbsp;
                                    <?php
                                    echo $this->MyHtml->deleteButton($value['Survey']['survey_id']);
                                    ?>
                                </td>
                                                                     
                            </tr>
                            <?php endforeach; ?>  
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="12">
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
    </form>
    </div>
</div>