<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'iDE Lous thmey ' ?>:
		<?php echo __($title_for_layout); ?>
	</title>
        <?php 
        

     ?>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('styles.css');
		echo $this->Html->css('ie8.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
        echo $this->Html->script('jquery-1.10.2.min.js');
        echo $this->Html->script('jqueryui-1.10.3.min.js');
        echo $this->Html->script('enquire.js');
        echo $this->Html->script('bootstrap.min.js');
        echo $this->Html->script('jquery.cookie.js');
        echo $this->Html->script('jquery.nicescroll.min.js');
        echo $this->Html->script('placeholdr.js');

        //
		
	?>
    <link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/datatables/dataTables.css' /> 
    <link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/codeprettifier/prettify.css' /> 
    <link rel='stylesheet' type='text/css' href='<?php echo $this->webroot ?>assets/plugins/form-toggle/toggles.css' /> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/codeprettifier/prettify.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/easypiechart/jquery.easypiechart.min.js'>
    </script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/sparklines/jquery.sparklines.min.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/form-toggle/toggle.min.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/fullcalendar/fullcalendar.min.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/daterangepicker.min.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/form-daterangepicker/moment.min.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/charts-flot/jquery.flot.min.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/charts-flot/jquery.flot.resize.min.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/charts-flot/jquery.flot.orderBars.min.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/pulsate/jQuery.pulsate.min.js'></script>
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/form-parsley/parsley.min.js'></script>     
    
    
    <?php echo $this->fetch('script'); ?>
    <?php  echo $this->Html->script('admin.js'); ?>
</head>
<body>
	 
    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>        

        <div class="navbar-header pull-left">
            <a class="navbar-brand" href="<?php echo $this->webroot; ?>">IDE Cambodia</a>
        </div>
        <?php 
        $user = CakeSession::read("Auth.User");
        
       
        ?>
        <ul class="nav navbar-nav pull-right toolbar">

        	<li class="dropdown">
        		<a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                    <span class="hidden-xs"><?php echo __('Welcome').' , '.$user['user_name_en'] ?></span>
                </a>
        		<ul class="dropdown-menu userinfo arrow">
        			<li >
                        
        				    <div class="">
                                <h5><?php echo $user['user_name_en'] ?></h5>
                                <small><?php echo __('Logged in as')?> <span><?php echo $user['user_permission']?></span></small>
                            </div>
                        
        			</li>
                    <li class="divider"></li>
        			<li class="userlinks">
        				<ul class="dropdown-menu">
        					<li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'editProfile',$user['user_id']))
            ?>  "> <?php echo __('Edit Profile');?><i class="pull-right fa fa-pencil"></i></a></li>
        					
        					<li class="divider"></li>
                            <li>
                                <a class="text-right" href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'logout')) ?>" style="color:#000;">
                                       
                                    <?php echo __('Sign Out') ?>
                                </a>
                               
                            </li>
                            
        					<!--<li><a href="#" class="text-right">Sign Out</a></li>-->
        				</ul>
        			</li>
        		</ul>
        	</li>      
            	
            <li>
                <?php 
                $lang = $this->Session->read('Config.language');
                $pass = $this->params['pass'];
                if(!$lang || $lang=='eng'){

                    echo $this->Html->link(                                        
                                        $this->Html->image('flag/kh.png',array(
                                                                                'alt'=>'ភាសាខ្មែរ',
                                                                                'title'=>'ភាសាខ្មែរ')
                                            )
                                    ,
                                    array_merge(array(
                                        'language' => 'khm',
                                        ),
                                        $pass
                                    ),
                                    
                                    array('escape'=>false)
                                );
                    
                }
                else{
                    echo $this->Html->link(                                        
                                        $this->Html->image('flag/en.png',array(
                                                                                'alt'=>'English',
                                                                                'title'=>'English')
                                            )
                                    ,
                                    array_merge(array(
                                        'language' => 'eng',
                                        ),
                                        $pass
                                    ),
                                    array('escape'=>false)
                                );
                }


                             ?>
               
            </li>
        	
            
		</ul>
    </header>

    <div id="page-container">
        <!-- BEGIN SIDEBAR -->
        <?php 
            echo $this->element('navbar');
         ?>       
        <div id="page-content">
            <div id='wrap'>
                <?php echo $this->Session->flash(); ?>
                <div id="bread-crumb">
                    <?php echo $this->Html->getCrumbs(' > ', __('Dashboard')); ?>   
                </div>                 
                <?php                
                    echo $this->fetch('content');
                 ?>
            </div> <!--wrap -->
        </div> <!-- page-content -->
        <!-- Footer -->
          <?php 
          
            echo $this->element('footer');
            echo $this->element('sql_dump');
         ?>
        
    </div>
	<?php 
	   
	?>

<script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/datatables/jquery.dataTables.min.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/plugins/datatables/dataTables.bootstrap.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/demo/demo-datatables.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>assets/demo/demo.js'></script> 
    <script type='text/javascript' src='<?php echo $this->webroot ?>js/jquery.nicescroll.min.js'></script> 

    <?php 
        echo $this->Html->script('application.js');      
     ?>
</body>
</html>
