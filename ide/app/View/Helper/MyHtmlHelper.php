<?php 
/**
* @author: Engleang SAM
* @package: App.View.Helper
*/

class MyHtmlHelper extends AppHelper
{
	 public $helpers = array('Html');
	 public function editButton($code)
	 {
	 	$st = $this->Html->link(                                      
                                $this->Html->tag('i',
                                		'',
                                			array('class'=>'fa fa-edit')).' '.__('Edit')
                                  ,
                                    array(                                        
                                        'action' => 'edit',$code
                                    ),
                                    array(
								        'escape'=>false,
								        'class'=>'btn btn-primary btn-xs'
								        )
                                	);
	 	return $st;
	 }
	 public function deleteButton($code)
	 {
	 	$st = $this->Html->link(                                      
                                $this->Html->tag('i',
                                		'',
                                			array('class'=>'fa fa-minus-circle'))
                                	.' '.__('Delete')
                                  ,
                                    array(                                        
                                        'action' => 'delete',
                                         $code
                                                                              
                                    ),
                                    array(
								        'escape'=>false,
								        'class'=>'btn btn btn-danger btn-xs btn-delete'
								        )
                                	);
        
	 	return $st;	
	 }

	public function deleteDetail($code , $defaut=0)
	{
		$st= $this->Html->link($this->Html->tag('i','',array(
								'class'=>'fa fa-minus-circle'
							)).''.__('Delete'),array(
									'action'=>'deletedetail',$code,$defaut
								),
								array(
									'escape'=>false,
									'class'=>'btn btn btn-danger btn-xs btn-delete'
									)
			);
		return $st;	
	}
	public function state($id,$state=0,$canAccess=true)

	{
		$content= array(	0=>'<span class="label label-grape">inactive</span>',
							1=>'<span class="label label-success">active</span>',
						);
		if($canAccess)
		$content = array(

					0=>	$this->Html->link(  
						$this->Html->tag('span','inactive',array('class'=>'label label-grape')),
									array('action' => 'state',$id,1),

                                    array(



                                    	'rel'=>'tooltip',

								        'data-placement'=>'left',

								        'data-original-title'=>'Toogle to Activate',								        

								        'escape'=>false

								        )

                                	),

					1=> $this->Html->link(                                        

                                        $this->Html->tag('span','active',array('class'=>'label label-success'))                                                                                

                                            

                                    ,

                                    array(

                                        

                                        'action' => 'state',

                                        $id,0

                                    ),

                                    array(

                                    	'rel'=>'tooltip',

								        'data-placement'=>'left',

								        'data-original-title'=>'Toogle to Deactivate',								        

								        'escape'=>false

								        )

                                ),

					-1=> $this->Html->link(                                        

                                        $this->Html->tag('span','pendding',array('class'=>'label label-warning'))                                                                                

                                            

                                    ,

                                    array(

                                        

                                        'action' => 'state',

                                        $id,1

                                    ),

                                    array(

                                    	'rel'=>'tooltip',

								        'data-placement'=>'left',

								        'data-original-title'=>'Toogle to Activate',								        

								        'escape'=>false

								        )

                                )

					);		

		

			return  $content[$state];

		



	}
	
	function checkAll()
	{
		return '<input type="checkbox" class="checkAll" title="Check All" />';
	}
	function checkBox($id,$i)
	{
		return '<input type="checkbox" 
					name = "cb[]"
					class="cb" id="cb'.$i.'" value="'.$id.'" />';	
					
	}
}
 ?>