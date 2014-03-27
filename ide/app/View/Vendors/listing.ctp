<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Vendor'), '#');
$this->Html->addCrumb(__('List All'), '/Vendors/listing');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array()) ?>" id="adminForm" method="post">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4><?php echo __('List All Vendor') ?></h4>
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
                    <div class="col-sm-3 pull-right">
                        <div class="input-group">
                                  <input type="text" value="<?php echo $this->Session->read('Filter.search') ?>" name="filter_search" class="form-control" placeholder="<?php echo __('Search placeholder') ?>" id="filter_search">
                                  <span class="input-group-btn">
                                      <button class="btn btn-default">
                                            <?php echo __('Search') ?>
                                      </button>
                                  </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-3 pull-left">
                        
                            <select name="select_vendor" id="select_vendor" style="margin-left:0px; width:130px;">
                                <option value="">ALL</option>
                                <option <?php if($this->Session->read('Select.Vendor')=='fba') echo 'selected="selected"'; ?> value="fba">FBA</option>
                                <option <?php if($this->Session->read('Select.Vendor')=='ca') echo 'selected="selected"'; ?> value="ca">CA</option>
                            </select>
                       
                    </div><!-- /.col-lg-6 -->
                </div>
                <div class="clearfix"></div>
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-overflow table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th width="2%"><input type="checkbox" class="checkAll" /></th>
                            <th><?php echo $this->Paginator->sort('vendor_code',__('Code')) ?></th>
                            <th><?php echo $this->Paginator->sort('vendor_name_en',__('Name English'))?></th>
                                                        
                            <th><?php echo $this->Paginator->sort('branch_manager',__('Branch Manager'))?>
                            </th>
                            <th><?php echo $this->Paginator->sort('vendor_datestarted',__('Date Started'))?>
                            </th>
                            <th><?php echo $this->Paginator->sort('vendor_date_ended',__('Date Ended'))?>
                            </th>
                            <th><?php echo $this->Paginator->sort('vendor_type',__('Position'))?>
                            </th>
                            <th><?php echo __('Created By')?>
                            </th>
                            <th><?php echo __('Modified By')?>
                            </th>
                            <th><?php echo __('Status')?>
                            </th>
                            <th>
                                <?php echo __('Action') ?>                                          
                            </th>
                                   
                        </tr>
                    </thead>
                    <tbody>  
                        <?php foreach ($data as $key => $value) :?>                      
                        <tr class="<?php echo ($key%2)==0?'event':'odd' ?>">
                            <td><?php echo $this->MyHtml->checkBox($value['Vendor']['vendor_code'],$key) ?></td>
                            <td><?php echo $value['Vendor']['vendor_code']?></td>
                            <td><?php echo $value['Vendor']['vendor_name_en']?></td>
                            <td><?php echo $value['Vendor']['branch_manager']?></td>
                            <td><?php echo $value['Vendor']['vendor_datestarted'] ?></td>
                            <td><?php echo $value['Vendor']['vendor_date_ended']?></td> 
                            <td>
                                <?php 
                                    if($value['Vendor']['vendor_type']=='fba')
                                    {
                                        echo 'FBA';
                                    }
                                    if($value['Vendor']['vendor_type']=='ca')
                                    {
                                        echo 'CA';
                                    }
                                ?>
                            </td>
                            <td><?php echo $value['Vendor']['created_by']?></td>
                            <td><?php echo $value['Vendor']['modified_by']?></td>
                            <td>
                                        <?php 
                                        echo $this->MyHtml->state(
                                            $value['Vendor']['vendor_code'],
                                            $value['Vendor']['state']


                                        )  ?>
                                    </td>
                           
                            <td>
                            <!--<a href="#" class="btn btn-xs btn-success">-->
                                <?php 
                                                                        
                                    echo $this->MyHtml->editButton($value['Vendor']['vendor_code']);
                                
                                ?>
                                &nbsp;
                                <?php
                                echo $this->MyHtml->deleteButton($value['Vendor']['vendor_code']);
                                ?>
                                 &nbsp;
                                
                                <a href="
                                <?php echo $this->Html->url(
                                        array('controller'=>'Vendors',
                                            'action'=>'viewdetail',$value['Vendor']['vendor_code'])) ?>" 
                                        <i class="fa fa-edit"></i>
                                        <?php echo __('Profile') ?>
                                </a>
                               
                            </td>
                                                                 
                        </tr>
                        <?php endforeach; ?>  
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="17">
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
<link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-select2/select2.css' /> 
<script type='text/javascript' src='<?php echo $this->webroot; ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function(){
       
        $('#select_vendor').select2();
        $('#select_vendor').on('change',function(){
            $('#adminForm').submit();

        });
    });
</script>
