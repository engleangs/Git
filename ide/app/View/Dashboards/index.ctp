<div id="page-heading">
            

            <h2><?php 
                    echo __('Dashboard')
                 ?>
            </h2>
           
</div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <a class="info-tiles tiles-toyo" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'Vendors',
                                        'action'=>'listing')
                                        ) ?>"
                            >

                                <div class="tiles-heading"><?php echo __('Vendor') ?></div>
                                <div class="tiles-body-alt">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <div class="text-center">
                                        <span class="text-top"></span>
                                        <?php echo $vendors; ?>
                                    </div>
                                  
                                </div>
                                <div class="tiles-footer"><?php echo __('go to vendor') ?></div>
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <a class="info-tiles tiles-success" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'Clients',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                <div class="tiles-heading">
                                    <?php 
                                    echo __('Client')
                                    ?>
                                </div>
                                <div class="tiles-body-alt">                                    
                                    <i class="fa fa-group"></i>
                                    <div class="text-center">
                                        <span class="text-top"></span>
                                        <?php echo $clients; ?>
                                    </div>
                                    
                                </div>
                                <div class="tiles-footer"><?php echo __('go to client') ?></div>
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <a class="info-tiles tiles-orange" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'Plots',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                <div class="tiles-heading">
                                    <?php echo __('Plot') ?>
                                </div>
                                <div class="tiles-body-alt"> 
                                    <i class="fa fa-camera-retro">
                                    </i>                                   
                                    <div class="text-center">
                                        <?php echo $plots; ?>
                                    </div>
                                    
                                </div>
                                <div class="tiles-footer"><?php echo __('go to plot')  ?>
                                    </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-6">
                            <a class="info-tiles tiles-alizarin" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'Labors',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                <div class="tiles-heading">
                                    <?php echo __('Labor') ?>
                                </div>
                                <div class="tiles-body-alt">
                                    <i class="fa fa-calendar"></i>
                                    <div class="text-center">
                                        <?php echo $labors; ?>
                                    </div>                                    
                                </div>
                                <div class="tiles-footer">
                                    <?php echo __("go to labor"); ?>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
                            <a class="info-tiles tiles-indigo" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'ProductCategorys',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                <div class="tiles-heading">
                                    <?php 
                                        echo __('Product Category');
                                     ?>
                                    
                                </div>
                                  <div class="tiles-body-alt">
                                    <i class="fa fa-gear"></i>
                                    <div class="text-center">
                                        <?php echo $ProductCategorys; ?>
                                    </div>                                    
                                </div>
                                <div class="tiles-footer">
                                    <?php 
                                    echo __('go to product category');
                                     ?>
                                 </div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
                            <a class="info-tiles tiles-primary" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'Products',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                <div class="tiles-heading">
                                    <?php echo __('Product') ?>
                                </div>
                                <div class="tiles-body-alt">
                                    <i class="fa fa-shopping-cart"></i>
                                    <div class="text-center">
                                        <?php echo $products; ?>
                                    </div>                                    
                                </div>
                                <div class="tiles-footer"><?php echo __('go to product') ?></div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
                            <a class="info-tiles tiles-green" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'Crops',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                <div class="tiles-heading">
                                    <?php echo __('Crop') ?>
                                </div>
                                <div class="tiles-body-alt">
                                    <i class="fa fa-pagelines"></i>
                                    <div class="text-center">
                                        <?php echo $crops; ?>
                                    </div>                                    
                                </div>
                                <div class="tiles-footer">
                                    <?php echo __('go to crop') ?></div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
                            <a class="info-tiles tiles-midnightblue" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'Users',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                 <div class="tiles-heading">
                                    <?php echo __('User'); ?>
                                </div>
                                <div class="tiles-body-alt">
                                    <i class="fa fa-user"></i>
                                    <div class="text-center">
                                        <?php echo $users; ?>
                                    </div>                                    
                                </div>
                                <div class="tiles-footer">
                                    <?php echo __('go to user') ?>
                                    </div>
                            </a>    
                        </div>
                        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
                            <a class="info-tiles tiles-sky" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'RiceWeeks',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                 <div class="tiles-heading">
                                    <?php echo __('RiceWeek'); ?>
                                </div>
                                <div class="tiles-body-alt">
                                    <i class="fa fa-user"></i>
                                    <div class="text-center">
                                        <?php echo $riceweeks; ?>
                                    </div>                                    
                                </div>
                                <div class="tiles-footer">
                                    <?php echo __('go to rice week') ?>
                                    </div>
                            </a>    
                        </div>
                        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
                            <a class="info-tiles tiles-purple" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'VegetableWeeks',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                 <div class="tiles-heading">
                                    <?php echo __('VegetableWeek'); ?>
                                </div>
                                <div class="tiles-body-alt">
                                    <i class="fa fa-user"></i>
                                    <div class="text-center">
                                        <?php echo $VegetableWeeks; ?>
                                    </div>                                    
                                </div>
                                <div class="tiles-footer">
                                    <?php echo __('go to vegetable week') ?>
                                    </div>
                            </a>    
                        </div>
                        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
                            <a class="info-tiles tiles-inverse" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'HarvestRices',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                 <div class="tiles-heading">
                                    <?php echo __('Harvest Rice'); ?>
                                </div>
                                <div class="tiles-body-alt">
                                    <i class="fa fa-user"></i>
                                    <div class="text-center">
                                        <?php echo $HarvestRices; ?>
                                    </div>                                    
                                </div>
                                <div class="tiles-footer">
                                    <?php echo __('go to harvest rice') ?>
                                    </div>
                            </a>    
                        </div>
                        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-3">
                            <a class="info-tiles tiles-magenta" 
                                href="<?php echo $this->Html->url(
                                        array('controller'=>'HarvestVegetables',
                                        'action'=>'listing')
                                        ) ?>"
                            >
                                 <div class="tiles-heading">
                                    <?php echo __('Harvest​ Vegetable'); ?>
                                </div>
                                <div class="tiles-body-alt">
                                    <i class="fa fa-user"></i>
                                    <div class="text-center">
                                        <?php echo $HarvestVegetables; ?>
                                    </div>                                    
                                </div>
                                <div class="tiles-footer">
                                    <?php echo __('go to harvest vegetable') ?>
                                    </div>
                            </a>    
                        </div>

                    </div>
                </div>
            </div>            
        </div> <!-- container -->