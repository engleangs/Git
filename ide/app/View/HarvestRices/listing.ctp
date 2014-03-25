<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Harvest Rice'), '#');
$this->Html->addCrumb(__('List All'), '/HarvestRices/listing');

 ?>

<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array()); ?>" method="POST" id="adminForm">
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h4><?php echo __('List All HarvestRice') ?></h4>
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
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-overflow table-striped table-bordered" id="example">
                        
                        <thead>
                            <tr>
                                <th width="3%"><input type="checkbox" class="checkAll" /></th>
                                <th><?php echo $this->Paginator->sort('harvestrice_id',__('Code')) ?>

                                </th>
                                <th><?php echo $this->Paginator->sort('plot_id',__('Plot ID')) ?>
                                </th>
                                <th><?php echo $this->Paginator->sort('harvestvegetable_date',__('Date'))?>
                                </th>
                                <th><?php echo $this->Paginator->sort('harvestrice_quadrat_size_m2',__('Quadrat').' (m<sup>2</sup>)',array('escape' => false))?>
                                   
                                </th>
                                <th>
                                    <?php echo $this->Paginator->sort('harvestrice_price',__('Price').'($)',array('escape' => false))?>
                                </th>
                                <th>
                                    <?php echo $this->Paginator->sort('harvestrice_completed',__('Complete?'))?>
                                </th>
                                <th><?php echo $this->Paginator->sort('created_by',__('Created By'))?>
                                </th>
                                <th><?php echo $this->Paginator->sort('modified_by',__('Modified By'))?>
                                </th>
                                <th>
                                    <?php echo __('Action') ?>                                          
                                </th>
                                       
                            </tr>
                        </thead>
                        <tbody>  
                            <?php foreach ($data as $key => $value) :?>                         
                            <tr class="<?php echo ($key%2)==0?'event':'odd' ?>">
                                <td>
                                <?php echo $this->MyHtml->checkBox($value['HarvestRice']['harvestrice_id'],$key) ?>
                                </td>
                                <td><?php echo @$value['HarvestRice']['harvestrice_id']?>
                                    <input type="hidden" name="harvestrice_id" value="<?php $value['HarvestRice']['harvestrice_id'] ?>">
                                </td>
                                <td><?php echo @$value['HarvestRice']['plot_id'].' ('.@$value['Plot']['plot_centroid_x'].' ,'.@$value['Plot']['plot_centroid_y'].')'?>
                                </td>
                                <td><?php echo @$value['HarvestRice']['harvestrice_date']?>
                                </td>
                                <td><?php echo @$value['HarvestRice']['harvestrice_quadrat_size_m2']?>
                                </td>
                                <td><?php echo @$value['HarvestRice']['harvestrice_price']?>
                                </td>
                                <td>
                                    <?php echo @($value['HarvestRice']['harvestrice_completed']?'Yes':'No') ?>
                                </td>
                                <td><?php echo $value['HarvestRice']['created_by']?></td>
                                <td><?php echo $value['HarvestRice']['modified_by']?></td>
                                
                                <td>
                                <!--<a href="#" class="btn btn-xs btn-success">-->
                                    <?php 
                                                                            
                                        echo $this->MyHtml->editButton($value['HarvestRice']['harvestrice_id']);
                                    
                                    ?>
                                    &nbsp;
                                    <?php
                                    echo $this->MyHtml->deleteButton($value['HarvestRice']['harvestrice_id']);
                                    ?>
                                    &nbsp;
                                    <a href="
                                        <?php echo $this->Html->url(
                                        array('controller'=>'HarvestRices',
                                            'action'=>'viewdetail',$value['HarvestRice']['harvestrice_id'])) ?>" 
                                        <i class="fa fa-edit"></i>
                                        <?php echo __('Detail') ?>
                                    </a>
                                   
                                </td>
                                </td>
                                                                     
                            </tr>
                            <?php endforeach; ?>  
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">
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

