 <nav id="page-leftbar" role="navigation">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="acc-menu" id="sidebar">                
        <li><!--Start menu dashboard-->
            <a href="<?php echo $this->webroot ?>">
                <i class="fa fa-home"></i>
                <span>
                    <?php echo __('Dashboard') ?>
                </span>
            </a>
        </li><!--end dashboard-->
        <li class="divider"></li>
        <li><!--start menu step 0-->
            <a href="javascript:;">
                <i class="fa  fa-location-arrow"></i>  
                <span>
                    <?php echo __('Location') ?>
                </span>
            </a>
            <ul class="acc-menu">
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-khet"></i> 
                        <span><?php echo __('Khet') ?></span> 
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),array(
                                            'controller' => 'Khets',
                                            'action' => 'add'                        
                                        ),
                                        array('escape'=>false)
                                        );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                                'controller' => 'Khets',
                                                'action' => 'listing'),
                                            array('escape'=>false)
                                            );
                            ?>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-srok"></i><span><?php echo __('Srok')  ?></span>
                    </a>
                    <ul class='acc-menu'>
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),array(
                                                    'controller' => 'Sroks',
                                                    'action' => 'add'),
                                                array('escape'=>false));
                            ?>
                        </li>
                        <li>
                            <?php 
                                echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                    $this->Html->tag('span',__('List All')),array(
                                                    'controller' => 'Sroks',
                                                    'action' => 'listing'),
                                                array('escape'=>false)
                                            );
                            ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-khum"></i> <span><?php echo __('Khum') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),array(
                                                'controller' => 'Khums',
                                                'action' => 'add'
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                                'controller' => 'Khums',
                                                'action' => 'listing'),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-phum"></i> 
                        <span><?php echo __('Phum') ?></span>
                    </a>
                    <ul class="acc-menu">
                       <li>
                            <?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                        $this->Html->tag('span',__('Add New'))                                        
                                            
                                    ,
                                    array(
                                        'controller' => 'Phums',
                                        'action' => 'add'
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>  
                        <li><?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                        $this->Html->tag('span',__('List All'))                                        
                                            
                                    ,
                                    array(
                                        'controller' => 'Phums',
                                        'action' => 'listing'
                                        
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>
                    </ul>
                </li>
            </ul>

        </li><!--end Step 0-->

        <li class="divider"></li>
                
        <li><!--Start menu step 1-->
            <a href="javascript:;">
                <i class="fa fa-group"></i><span><?php  echo __('Vendors')  ?></span>
            </a>
            <ul class="acc-menu">
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-group"></i> 
                        <span><?php echo __('Vendor') ?></span> 
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                              
                            $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                            $this->Html->tag('span',__('Add New')),array(
                                                'controller' => 'Vendors',
                                                'action' => 'add'
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                            $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                            $this->Html->tag('span',__('List All')),array(
                                                'controller' => 'Vendors',
                                                'action' => 'listing'
                                                
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>       
                    </ul>
                </li>
                <!-- <li>
                    <a href="javascript:;">
                        <i class="fa fa-cog"></i><span><?php  echo __('Commercial Agronomist')  ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                            $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                            $this->Html->tag('span',__('Add New')),array(
                                                'controller' => 'CommercialAgronomists',
                                                'action' => 'add'
                                                
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                            $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                            $this->Html->tag('span',__('List All')),array(
                                                'controller' => 'CommercialAgronomists',
                                                'action' => 'listing'
                                                
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>                    
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i><span><?php  echo __('FBA')  ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                            $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                            $this->Html->tag('span',__('Add New')),array(
                                                'controller' => 'Fbas',
                                                'action' => 'add'
                                                
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>     
                        <li>
                            <?php echo $this->Html->link(                                        
                            $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                            $this->Html->tag('span',__('List All')),array(
                                                'controller' => 'Fbas',
                                                'action' => 'listing'
                                                
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>                    
                    </ul>
                </li>         -->   
            </ul>
        </li><!--end Step 1--> 
        
        
        <li class="divider"></li>

        <li><!--start menu step 2-->
            <a href="javascript:;">
                <i class="fa fa-pagelines"></i><span><?php  echo __('Items')  ?></span>
            </a>
            <ul class="acc-menu">
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-gear"></i> <span> <?php echo __('Product Category') ?></span> 
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-plus')).$this->Html->tag('span',__('Add New')),array(
                                                'controller' => 'ProductCategorys',
                                                'action' => 'add'
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-th-list')).$this->Html->tag('span',__('List All')),
                                    array(
                                        'controller' => 'ProductCategorys',
                                        'action' => 'listing'
                                        ),
                                    array('escape'=>false)
                                );
                            ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa  fa-shopping-cart"></i> <span><?php echo __('Product') ?></span> 
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-plus')).$this->Html->tag('span',__('Add New')),
                                            array(
                                                'controller' => 'Products',
                                                'action' => 'add'
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-th-list')).$this->Html->tag('span',__('List All')),
                                            array(
                                                'controller' => 'Products',
                                                'action' => 'listing'
                                                
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>
                    </ul>
                </li>                
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-pagelines"></i> <span><?php echo __('Crop') ?></span>
                    </a>
                    <ul class="acc-menu">                       
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                    array(
                                        'controller' => 'Crops',
                                        'action' => 'add'
                                    ),array('escape'=>false));
                            ?>
                        </li>
                        <li>
                            <?php  echo $this->Html->link(                                        
                                    $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                    $this->Html->tag('span',__('List All')),
                                        array(
                                        'controller' => 'Crops',
                                        'action' => 'listing'),
                                        array('escape'=>false)
                                        );
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        
        <!--end step 2-->

        <li class="divider"></li>

        <li> 
            <a href="javascript:;">
                <i class="fa fa-group"></i><span><?php  echo __('People')  ?></span>
            </a>
            <ul class="acc-menu">      
                <li><!--Start menu step 3-->
                    <a href="javascript:;">
                        <i class="fa fa-group"></i> <span><?php echo __('Client') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                array(
                                    'controller' => 'Clients',
                                    'action' => 'add'),
                                    array('escape'=>false)
                                );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'Clients',
                                        'action' => 'listing'),
                                        array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li><!--Non CLient-->

                <li><!--Start menu step 3-->
                    <a href="javascript:;">
                        <i class="fa fa-group"></i> <span><?php echo __('Non-Client') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                array(
                                    'controller' => 'NonClients',
                                    'action' => 'add'),array('escape'=>false)
                                );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'NonClients',
                                        'action' => 'listing'),array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li><!--End Non CLient-->
            </ul>
        </li>
        <li class="divider"></li>

        <li><!--Start menu step 4-->
            <a href="javascript:;">
                <i class="fa fa-shopping-cart"></i> <span><?php echo __('Sales') ?></span>
            </a>
            <ul class="acc-menu">
                <li> 
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                        $this->Html->tag('span',__('Add New')),
                            array(
                            'controller' => 'Sales',
                            'action' => 'add'),
                                    array('escape'=>false)
                                );
                    ?>
                </li>
                <li>
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                        $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'Sales',
                                        'action' => 'listing'
                                        
                                    ),
                                    array('escape'=>false)
                                );
                    ?>
                </li>
            </ul>
        </li><!--End step 4-->

        <li class="divider"></li>
        
        <li><!--Start menu step 6-->
            <a href="javascript:;">
                <i class="fa fa-calendar"></i> <span><?php echo __('Project') ?></span>
            </a>
            <ul class="acc-menu">
                <li>
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                        $this->Html->tag('span',__('Add New')),array('controller' => 'Projects',
                                        'action' => 'add'),array('escape'=>false));
                    ?>
                </li>
                <li>
                    <?php  echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                        $this->Html->tag('span',__('List All')),
                        array('controller' => 'Projects','action' => 'listing'),array('escape'=>false));
                     ?>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-calendar"></i> <span><?php echo __('Standard Labor Cost') ?></span>
            </a>
            <ul class="acc-menu">
                <li>
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                        $this->Html->tag('span',__('Add New')),array('controller' => 'Labors',
                                        'action' => 'add'),array('escape'=>false));
                    ?>
                </li>
                <li>
                    <?php  echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                        $this->Html->tag('span',__('List All')),
                        array('controller' => 'Labors','action' => 'listing'),array('escape'=>false));
                     ?>
                </li>
            </ul>
        </li><!--End menu step 6-->     
        <li>
            <a href="javascript:;">
                <i class="fa fa-calendar"></i> <span><?php echo __('Topic') ?></span>
            </a>
            <ul class="acc-menu">
                <li>
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                        $this->Html->tag('span',__('Add New')),array('controller' => 'Topics',
                                        'action' => 'add'),array('escape'=>false));
                    ?>
                </li>
                <li>
                    <?php  echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                        $this->Html->tag('span',__('List All')),
                        array('controller' => 'Topics','action' => 'listing'),array('escape'=>false));
                     ?>
                </li>
            </ul>
        </li><!--End menu step 6-->
        <li class="divider"></li>
        
        <li><!--Start menu step 5-->
            <a href="javascript:;">
                <i class="fa fa-camera-retro"></i> <span><?php echo __('Plot') ?></span>
            </a>
            <ul class="acc-menu">
                <li>
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                        $this->Html->tag('span',__('Add New')),
                            array(
                                'controller' => 'Plots',
                                'action' => 'add'),array('escape'=>false)
                                );
                    ?>
                </li>
                <li>
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                        $this->Html->tag('span',__('List All')),
                        array('controller' => 'Plots','action' => 'listing'),array('escape'=>false));
                    ?>
                </li>
            </ul>
        </li><!--End menu step 5-->

        <li class="divider"></li>

        <li>
            <a href="javascript:;">
                <i class="fa fa-money"></i><span><?php  echo __('Expenses')  ?></span>
            </a>
            <ul class="acc-menu">
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-money"></i> <span><?php echo __('Material Expense') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),array('controller' => 'MaterialExpenses',
                                                'action' => 'add'),array('escape'=>false));
                            ?>
                        </li>
                        <li>
                            <?php  echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),
                                array('controller' => 'MaterialExpenses','action' => 'listing'),array('escape'=>false));
                             ?>
                        </li>
                    </ul>
                </li>
               

                <li>
                    <a href="javascript:;">
                        <i class="fa fa-money"></i> <span><?php echo __('Labor Expense') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),array('controller' => 'LaborExpenses',
                                                'action' => 'add'),array('escape'=>false));
                            ?>
                        </li>
                        <li>
                            <?php  echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),
                                array('controller' => 'LaborExpenses','action' => 'listing'),array('escape'=>false));
                             ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <!--end step 6-->

        <li class="divider"></li>

        <li><!--Start Harvest-->
            <a href="javascript:;">
                <i class="fa fa-download"></i> 
                <span><?php echo __('Harvests') ?></span>
            </a> 
            <ul class="acc-menu">
                <li><!--Harvest-->
                    <a href="javascript:;">
                        <i class="fa fa-group"></i> 
                        <span><?php echo __('Harvest Vegetable') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                array(
                                    'controller' => 'HarvestVegetables',
                                    'action' => 'add'),array('escape'=>false)
                                );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'HarvestVegetables',
                                        'action' => 'listing'),array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li>
                <li><!--Harvest-->
                    <a href="javascript:;">
                        <i class="fa fa-group"></i> 
                        <span><?php echo __('Harvest Rice') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                array(
                                    'controller' => 'HarvestRices',
                                    'action' => 'add'),array('escape'=>false)
                                );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'HarvestRices',
                                        'action' => 'listing'),array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li><!--End Harvest--> 

        <li class="divider"></li>

        <li><!--Start Training-->
            <a href="javascript:;">
                <i class="fa fa-desktop"></i> <span><?php echo __('Training') ?></span>
            </a> 
            <ul class="acc-menu">
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i> <span><?php echo __('Training') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                array(
                                    'controller' => 'Trainings',
                                    'action' => 'add'),array('escape'=>false)
                                );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'Trainings',
                                        'action' => 'listing'),array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-group"></i> <span><?php echo __('Participant Training') ?></span>
                    </a>
                    <ul class="acc-menu">
                        
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'ClientTrainings',
                                        'action' => 'listing'),array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-group"></i> <span><?php echo __('VegetableWeek') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                array(
                                    'controller' => 'VegetableWeeks',
                                    'action' => 'add'),array('escape'=>false)
                                );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'VegetableWeeks',
                                        'action' => 'listing'),array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-group"></i> <span><?php echo __('RiceWeek') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                array(
                                    'controller' => 'RiceWeeks',
                                    'action' => 'add'),array('escape'=>false)
                                );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'RiceWeeks',
                                        'action' => 'listing'),array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-group"></i> <span><?php echo __('Field Day') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                array(
                                    'controller' => 'FieldDays',
                                    'action' => 'add'),array('escape'=>false)
                                );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'FieldDays',
                                        'action' => 'listing'),array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i> <span><?php echo __('Meeting') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('Add New')),
                                array(
                                    'controller' => 'Meetings',
                                    'action' => 'add'),array('escape'=>false)
                                );
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link(                                        
                                $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                                $this->Html->tag('span',__('List All')),array(
                                        'controller' => 'Meetings',
                                        'action' => 'listing'),array('escape'=>false));
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li><!--Start Training-->  
        <li class="divider"></li>   

        <li><!--Start menu step 7-->
            <a href="javascript:;">
                <i class="fa fa-book"></i> <span><?php echo __('Survey') ?></span>
            </a>
            <ul class="acc-menu">  
                <li>
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                        $this->Html->tag('span',__('Add New')),array(
                            'controller' => 'Surveys',
                            'action' => 'add'),array('escape'=>false));
                        ?>
                </li>
                <li>                   
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                        $this->Html->tag('span',__('List All')),
                        array('controller' => 'Surveys','action' => 'listing'), array('escape'=>false));
                    ?>
                </li>
            </ul>
         </li><!--end menu step 7-->
        
        <li class="divider"></li>   

        <li><!--start menu Report-->
            <a href="javascript:;">
                <i class="fa  fa-pencil-square-o"></i>  
                <span>
                    <?php echo __('Report') ?>
                </span>
            </a>
            <ul class="acc-menu">
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-phum"></i> 
                        <span><?php echo __('RiceDemo') ?></span> 
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('View')),array(
                                            'controller' => 'RiceDemos',
                                            'action' => 'reportview'                        
                                        ),
                                        array('escape'=>false)
                                        );
                            ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-phum"></i><span><?php echo __('VegetableDemo')  ?></span>
                    </a>
                    <ul class='acc-menu'>
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('View')),array(
                                                    'controller' => 'VegetableDemos',
                                                    'action' => 'reportview'),
                                                array('escape'=>false));
                            ?>
                        </li>
                      
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-phum"></i> <span><?php echo __('FieldDay') ?></span>
                    </a>
                    <ul class="acc-menu">
                        <li>
                            <?php echo $this->Html->link($this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                $this->Html->tag('span',__('View')),array(
                                                'controller' => 'FieldDayDemos',
                                                'action' => 'reportview'
                                            ),
                                            array('escape'=>false)
                                        );
                            ?>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-phum"></i> 
                        <span><?php echo __('Training') ?></span>
                    </a>
                    <ul class="acc-menu">
                       <li>
                            <?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                        $this->Html->tag('span',__('View'))                                        
                                            
                                    ,
                                    array(
                                        'controller' =>'TrainingDemos',
                                        'action' => 'reportview'
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>  
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-phum"></i> 
                        <span><?php echo __('Meeting') ?></span>
                    </a>
                    <ul class="acc-menu">
                       <li>
                            <?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                        $this->Html->tag('span',__('View'))
                                    ,
                                    array(
                                        'controller' =>'MeetingDemos',
                                        'action' => 'reportview'
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>  
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-phum"></i> 
                        <span><?php echo __('FBA Register') ?></span>
                    </a>
                    <ul class="acc-menu">
                       <li>
                            <?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                        $this->Html->tag('span',__('View'))                                        
                                            
                                    ,
                                    array(
                                        'controller' => 'VendorDemos',
                                        'action' => 'reportview'
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>  
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-phum"></i> 
                        <span><?php echo __('CA Register') ?></span>
                    </a>
                    <ul class="acc-menu">
                       <li>
                            <?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                        $this->Html->tag('span',__('View'))                                        
                                            
                                    ,
                                    array(
                                        'controller' => 'CaRegisters',
                                        'action' => 'reportview'
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>  
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-phum"></i> 
                        <span><?php echo __('Rice Harvest') ?></span>
                    </a>
                    <ul class="acc-menu">
                       <li>
                            <?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                        $this->Html->tag('span',__('View'))                                        
                                            
                                    ,
                                    array(
                                        'controller' => 'RiceHarvestDemos',
                                        'action' => 'reportview'
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>  
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-phum"></i> 
                        <span><?php echo __('Vegetalbe Harvest') ?></span>
                    </a>
                    <ul class="acc-menu">
                       <li>
                            <?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                        $this->Html->tag('span',__('View'))                                        
                                            
                                    ,
                                    array(
                                        'controller' => 'VegetableHarvestDemos',
                                        'action' => 'reportview'
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>  
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-phum"></i> 
                        <span><?php echo __('Client Register') ?></span>
                    </a>
                    <ul class="acc-menu">
                       <li>
                            <?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                        $this->Html->tag('span',__('View'))                                        
                                            
                                    ,
                                    array(
                                        'controller' => 'ClientDemos',
                                        'action' => 'reportview'
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>  
                       
                    </ul>
                </li>

                <li>
                    <a href="javascript:;"><i class="fa fa-phum"></i> 
                        <span><?php echo __('Test') ?></span>
                    </a>
                    <ul class="acc-menu">
                       <li>
                            <?php 
                            echo $this->Html->link(                                        
                                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                                        $this->Html->tag('span',__('View'))                                        
                                            
                                    ,
                                    array(
                                        'controller' => 'TestDemos',
                                        'action' => 'reportview'
                                    ),
                                    array('escape'=>false)
                                );
                             ?>
                        </li>  
                       
                    </ul>
                </li>
            </ul>

        </li><!--end Step Report-->

        <li class="divider"></li> 
        <li><!--Start menu step 7-->
            <a href="javascript:;">
                <i class="fa fa-user"></i> <span><?php echo __('User') ?></span>
            </a>
            <ul class="acc-menu">  
                <li>
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-plus')).
                        $this->Html->tag('span',__('Add New')),array(
                            'controller' => 'Users',
                            'action' => 'add'),array('escape'=>false));
                        ?>
                </li>
                <li>                   
                    <?php echo $this->Html->link(                                        
                        $this->Html->tag('i','',array('class'=>'fa fa-th-list')).
                        $this->Html->tag('span',__('List All')),
                        array('controller' => 'Users','action' => 'listing'), array('escape'=>false));
                    ?>
                </li>
            </ul>
         </li><!--end menu step 7-->
    </ul>
            <!-- END SIDEBAR MENU -->
</nav>