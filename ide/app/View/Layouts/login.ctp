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
	<link rel="stylesheet" href="<?php echo $this->webroot ?>assets/css/styles.min.css?=113">
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
    
    <?php echo $this->fetch('script'); ?>
</head>
<body>
	 

    <div id="page-container">
        <!-- BEGIN SIDEBAR -->
            
            <div id='wrap'>
                            
                <?php                
                    echo $this->fetch('content');
                 ?>
            </div> <!--wrap -->
        
       
    </div>
	<?php 
	//echo $this->element('sql_dump'); 
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
