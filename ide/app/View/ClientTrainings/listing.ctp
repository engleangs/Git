<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Client Training'), '#');
$this->Html->addCrumb(__('List All'), '/ClientTraining/listing');

$listing_data = array();
foreach ($data as  $value) 
{
    $key  = $value['ClientTraining']['training_id'];
    if(!isset($listing_data[$key]))
    {
        $listing_data[$key] = $value['Training'];
        $listing_data[$key]['Clients'] = array();
        $listing_data[$key]['NonClients'] = array();

    }
  
    if($value['Client']['client_id'])
    {
        $value['Client']['clientTrainingId'] = 
            $value['ClientTraining']['clienttraining_id'];
        $listing_data[$key]['Clients'][] = $value['Client'];
    }
    if($value['NonClient']['nonclient_id'])
    {
         $value['NonClient']['clientTrainingId'] = 
        $value['ClientTraining']['clienttraining_id'];
        $listing_data[$key]['NonClients'][] = $value['NonClient'];
    }
    
}

?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array());?>" id="adminForm" method="POST">
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h4><?php echo __('List All Client Training') ?></h4>
                    <div class="options">
                        <span>
                           <a href="javascript:;" class="panel-collapse" ><i class="fa fa-chevron-down"></i>
                           </a>
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
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th><?php echo __('Training Code')?></th>
                            <th><?php echo __('Client Code')?>
                            </th>
                            <th>
                                <?php echo __('Non Client Code')?>
                            </th>
                                                                                    
                        </tr>
                    </thead>
                    <tbody>  
                    <?php foreach ($listing_data as $key => $value) : ?> 
                                 
                        <tr class="<?php echo ($key%2)==0?'event':'odd' ?>">
                            <td><?php echo $value['training_id'] ?></td>
                            <td> 
                                <table class="client-nonclient">
                                <?php 
                                foreach ($value['Clients'] as $client) { 
                                 
                                    ?>
                                    <tr class="td-client">
                                        <td style="border:none;"><?php  echo $client['client_id'];?> </td>
                                        <td width="100px"
                                         
                                         style="border:none;">
                                            <div class="hide-show">
                                            <?php  echo $this->MyHtml->deleteButton($client['clientTrainingId']);
                                            ?>
                                            <div>
                                         </td>
                                    </tr>
                                <?php }?>
                                </table>                           
                            </td>
                            <td>
                                <table>
                                <?php 
                                foreach ($value['NonClients'] as $nonclient) { ?>
                                    <tr class="td-client">
                                        <td  style="border:none;">
                                            <?php  echo $nonclient['nonclient_id']?> 
                                        </td>
                                        <td width="100px"  style="border:none;">
                                            <div class="hide-show">
                                            <?php  echo $this->MyHtml->deleteButton($nonclient['clientTrainingId']);
                                            ?>
                                            </div>
                                         </td>
                                    </tr>
                                <?php }?>
                                </table>  
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
</div>
<script type="text/javascript">
    $(document).ready(function(){
      $('.hide-show').hide();
        $('.td-client').mouseover(function(){
            $(this).find('td').find('.hide-show').show();
        });
         $('.td-client').mouseleave(function(){
           $(this).find('td').find('.hide-show').hide();
        });
    })
</script>
