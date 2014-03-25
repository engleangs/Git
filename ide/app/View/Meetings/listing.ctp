<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Meeting'), '#');
$this->Html->addCrumb(__('List All'), '/Meetings/listing');

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array()) ?>" id="adminForm" method="post">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4><?php echo __('List All Meeting') ?></h4>
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
                            <th width="2%"><input type="checkbox" class="checkAll" /></th>
                            <th><?php echo $this->Paginator->sort('meeting_id',__('Code')) ?>
                            </th>
                            <th><?php echo $this->Paginator->sort('meeting_date',__('Date'))?>
                            </th>
                            <th><?php echo $this->Paginator->sort('meeting_subject',__('Subject'))?>
                            </th>
                            <th><?php echo $this->Paginator->sort('meeting_responsible_staff',__('Responsible Staff'))?>
                            </th>
                            <th><?php echo __('Phum')?>
                            </th>
                            <th><?php echo __('Khum')?>
                            </th>
                            <th><?php echo __('Srok')?>
                            </th>
                            <th><?php echo __('Khet')?>
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
                            <td><?php echo $this->MyHtml->checkBox($value['Meeting']['meeting_id'],$key) ?></td>
                            <td>
                                <?php echo $value['Meeting']['meeting_id'] ?>
                            </td>
                            <td><?php echo $value['Meeting']['meeting_date']?></td>
                            <td><?php echo $value['Meeting']['meeting_subject']?></td>
                            <td><?php echo $value['Meeting']['meeting_responsible_staff']?></td>
                            <td><?php echo $value['PH']['phum_name_en'].' : '.$value['PH']['phum_code'];?></td>
                            <td><?php echo $value['Khum']['khum_name_en'].' : '.$value['Khum']['khum_code'];?></td>
                            <td><?php echo $value['Srok']['srok_name_en'].' : '.$value['Srok']['srok_code'];?></td>
                            <td><?php echo $value['Khet']['khet_name_en'].' : '.$value['Khet']['khet_code'];?></td>
                            <td><?php echo $value['Meeting']['created_by']?></td>
                            <td><?php echo $value['Meeting']['modified_by']?></td>
                            <td>

                            <!--<a href="#" class="btn btn-xs btn-success">-->
                                <?php 
                                                                        
                                    echo $this->MyHtml->editButton($value['Meeting']['meeting_id']);
                                
                                ?>
                                &nbsp;
                                <?php
                                echo $this->MyHtml->deleteButton($value['Meeting']['meeting_id']);
                                ?>
                                &nbsp;
                                
                            <a href="
                            <?php echo $this->Html->url(
                                    array('controller'=>'ClientMeetings',
                                        'action'=>'viewdetail',$value['Meeting']['meeting_id'])) ?>" 
                                    <i class="fa fa-edit"></i>
                                    <?php echo __('Detail') ?>
                            </a>
                               
                            </td>
                                                                 
                        </tr>
                        <?php endforeach; ?>  
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="15">
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