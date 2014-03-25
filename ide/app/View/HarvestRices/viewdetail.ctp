<?php 
$this->Html->addCrumb(__('Location'), '#');
$this->Html->addCrumb(__('Harvest Rice'), '#');
$this->Html->addCrumb(__('List Detail'), '/HarvestRices/listing');
 ?>
<div id="page-heading"></div>
<div class="container">
    <div class="row">
        <form action="<?php echo $this->Html->url(array('action'=>'save',$data['HarvestRice']['harvestrice_id']));?>" method="POST" id="adminForm">
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h4><?php echo __('Detail HarvestRice') ?></h4>
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
                <div class="form-group" style="text-align:center;">
                    <label class="col-sm-1 control-label" style="padding-top:10px;">
                        <?php echo __('Plot ID')?>
                    </label>
                    <div class="col-sm-2">
                        <input type="text" id="plot_id" readonly="readonly" value=<?php echo $data['HarvestRice']['plot_id'] ?> name="plot_id" class="form-control select-plot"/>
                        <input type="hidden" id="harvestrice_id" value=<?php echo $data['HarvestRice']['harvestrice_id'] ?> name="harvestrice_id" class="form-control"/>
                        <input type="hidden" id="quadrat" value="<?php echo $data['HarvestRice']['harvestrice_quadrat_size_m2'] ?>" name="harvestrice_quadrat_size_m2" class="form-control" placeholder ="<?php echo __('Quadrat placeholder')?>"/>
                        <input type="hidden" name="harvestrice_price" value="<?php echo $data['HarvestRice']['harvestrice_price'] ?>" id="price" class="form-control" placeholder ="<?php echo __('Price placeholder')?>">
                        <input type="hidden" name="harvestrice_completed" value="<?php echo $data['HarvestRice']['harvestrice_completed'] ?>" id="complete" class="form-control">

                    </div>
                </div>
                <div style="padding:10px 0px 10px 0px;"></div>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th></th>
                            <th><?php echo __('Weight (kg)') ?></th>
                            <th><?php echo __('Moisture (%)')?></th>
                            <th><?php echo __('Yield (@ 14% (kg/ha))')?></th>
                            <th><?php echo __('Return ($)')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo __('Q1') ?></td>
                            <td>
                                <input type="text" id="q1_weight" value="<?php echo $data['HarvestRice']['harvestrice_q1_weight_kg'] ?>" name="harvestrice_q1_weight_kg" class="form-control"                           placeholder="<?php echo __('Weight q1 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="q1_moisture" value="<?php echo $data['HarvestRice']['harvestrice_q1_moisture_%'] ?>" name="harvestrice_q1_moisture_%" class="form-control"                           placeholder="<?php echo __('Moisture q1 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="yield_q1" name="yield_q1" class="form-control"
                                readonly="readonly">
                            </td>
                            <td><?php ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Q2') ?></td>
                            <td>
                                <input type="text" id="q2_weight" value="<?php echo $data['HarvestRice']['harvestrice_q2_weight_kg'] ?>" name="harvestrice_q2_weight_kg" class="form-control"                           placeholder="<?php echo __('Weight q2 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="q2_moisture" value="<?php echo $data['HarvestRice']['harvestrice_q2_moisture_%'] ?>" name="harvestrice_q2_moisture_%" class="form-control"                           placeholder="<?php echo __('Moisture q2 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="yield_q2" name="yield_q2" class="form-control"
                                readonly="readonly">
                            </td>
                            <td><?php ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Q3') ?></td>
                            <td>
                                <input type="text" id="q3_weight" value="<?php echo $data['HarvestRice']['harvestrice_q3_weight_kg'] ?>" name="harvestrice_q3_weight_kg" class="form-control"                           placeholder="<?php echo __('Weight q3 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="q3_moisture" value="<?php echo $data['HarvestRice']['harvestrice_q3_moisture_%'] ?>" name="harvestrice_q3_moisture_%" class="form-control"                           placeholder="<?php echo __('Moisture q3 placeholder') ?>">
                            </td>
                            <td>
                                <input type="text" id="yield_q3" name="yield_q3" class="form-control"
                                readonly="readonly">
                            </td>
                            <td><?php ?></td>
                        </tr>
                        <tr>
                            <td><?php echo __('Average')?></td>
                            <td colspan="4">
                                <input type="text" id="average" name="average" class="form-control"
                                readonly="readonly">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
                <div class="form-group">
                    <div class="col-sm-4">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Revenue')?>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" id="revenue" readonly="readonly"value=0 name="revenue" class="form-control" placeholder ="<?php echo __('Revenue placeholder')?>"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="col-sm-3 control-label">
                            <?php echo __('Costs')?>
                        </label>
                        <div class="col-sm-8" >
                            <input type="text" id="costtotal" readonly="readonly" name="costs" class="form-control" />        
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="col-sm-4 control-label">
                            <?php echo __('Gross Margin (No Labor)')?>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" readonly="readonly" id="gross_margin" name="gross_margin" class="form-control"/>
                        </div>
                    </div>
                </div>
                <?php echo $this->Html->link(                                      
                                    $this->Html->tag('i',
                                            '',
                                                array('class'=>'')).' '.__('Back')
                                      ,
                                        array( 'controller'=>'HarvestRices',         
                                            'action' => 'listing'
                                        ),
                                        array(
                                            'escape'=>false,
                                            'class'=>'btn-default btn'
                                            )
                                        ); 
                                    ?>   
                    <button class="btn-primary btn" title="<?php echo __('Save Title') ?>">
                    <?php echo __('Save') ?>
                    </button>
                       
            </div>
        </div>
    </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function()
    {
    
        totalCost();
        calculateYield_q1_moisture();
        calculateYield_q2_moisture();
        calculateYield_q3_moisture();
    
        calculateAverage();
        calculateRevenue();

        function totalCost()
        {
            $.ajax({
                    url:'<?php echo $this->Html->url(array("controller"=>"Plots","action"=>"totalCostExpense")) ?>',
                    type :'POST',
                    data :{
                        plot_id: $('#plot_id').val(),
                    },
                    success:function(data)
                    {
                        $('#costtotal').val(data);                     
                       
                    }
            });
        }
        function calculateRevenue()
        {
            var price =$('#price').val()==''?0:
                    parseFloat($('#price').val());
            var average=$('#average').val()==''?0:
                parseFloat($('#average').val());
            var total = 0;
            
            total=parseFloat(average) * parseFloat(price);
            $('#total').val(total.toFixed(2));

            var revenue=0;
            revenue=parseFloat($('#total').val());
            $('#revenue').val(total.toFixed(2));

            var gross_margin=0;
            gross_margin=$('#revenue').val() - $('#costtotal').val();
            $('#gross_margin').val(gross_margin.toFixed(2)); 
        }  

        function calculateAverage()
        {
            var yield_q1=$('#yield_q1').val()==''?0:parseFloat($('#yield_q1').val());
            var yield_q2=$('#yield_q2').val()==''?0:parseFloat($('#yield_q2').val());
            var yield_q3=$('#yield_q3').val()==''?0:parseFloat($('#yield_q3').val());
            var TotalYield=0;
            TotalYield=(parseFloat(yield_q1)+parseFloat(yield_q2)+parseFloat(yield_q3))/3;
            $('#average').val(TotalYield.toFixed(2));
        } 
        function caculateYields(weight,moisture,quadrat)
        {
            var yield = 0;
            yield=((parseInt(weight)* 100 - parseInt(moisture)) / 86)*10000/quadrat;
            return yield;   
        } 

        function calculateYield_q1_moisture()
        {
            var weight =$('#q1_weight').val()==''?0:parseInt($('#q1_weight').val());
            var moisture=$('#q1_moisture').val()==''?0:parseInt($('#q1_moisture').val());
            var quadrat =parseInt($('#quadrat').val());
            var total=caculateYields(weight,moisture,quadrat);
            console.log(quadrat);
            $('#yield_q1').val(total.toFixed(2));    
        }
        function calculateYield_q2_moisture()
        {
            var weight =$('#q2_weight').val()==''?0:parseInt($('#q2_weight').val());
            var moisture=$('#q2_moisture').val()==''?0:parseInt($('#q2_moisture').val());
            var quadrat =parseInt($('#quadrat').val());
            var total=caculateYields(weight,moisture,quadrat);
            $('#yield_q2').val(total.toFixed(2));
        }
        function calculateYield_q3_moisture(){
            var weight =$('#q3_weight').val()==''?0:parseInt($('#q3_weight').val());
            var moisture=$('#q3_moisture').val()==''?0:parseInt($('#q3_moisture').val());
            var quadrat =parseInt($('#quadrat').val());
            var total=caculateYields(weight,moisture,quadrat);
            $('#yield_q3').val(total.toFixed(2));
        }
        $('#price').on('keyup',function(){
            calculateRevenue();
        });
        $('#total').on('keyup',function(){
           
            var total =$('#total').val()==''?0:parseFloat($('#total').val());
            $('#revenue').val(total.toFixed(2));

            var gross_margin=0;
            gross_margin=$('#revenue').val() - $('#costtotal').val();
            $('#gross_margin').val(gross_margin.toFixed(2)); 
        });
        /*---------End keyup-------------------*/  

        /*---------Keyup to change value in q and mosture-----------*/
        $('#q1_weight').on('keyup', function(){
            calculateYield_q1_moisture();
            calculateAverage();  
            calculateRevenue();  
        });
        $('#q1_moisture').on('keyup', function(){
            calculateYield_q1_moisture();  
            calculateAverage(); 
            calculateRevenue();            
        });
        $('#q2_weight').on('keyup', function(){
            calculateYield_q2_moisture();
            calculateAverage(); 
            calculateRevenue();    
           
        });
        $('#q2_moisture').on('keyup', function(){
            calculateYield_q2_moisture();
            calculateAverage();
            calculateRevenue();     
         
        });
        $('#q3_weight').on('keyup', function(){
            calculateYield_q3_moisture();
            calculateAverage();
            calculateRevenue();     
        });
        $('#q3_moisture').on('keyup', function(){
            calculateYield_q3_moisture();
            calculateAverage();
            calculateRevenue();     
        });

     });


</script>

