<?php 
/**
* 
*/
class ProductsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 		= 'Product';
	public $uses  = array('ProductCategory','Crop','Product');

	public function add()
	{
		$data = $this->ProductCategory->find('all');
		$this->set('productcategorys',$data);
	
	}
	public function getProductUnit()
	{
			$product_code = $this->request->data['product_code'];
			$model = $this->getModel();
			
			$data = $model->findByproduct_code($product_code);

			echo json_encode($data);
			exit;
	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findByproduct_code($id);
		$this->set('data',$data);
		
		$data = $this->ProductCategory->find('all');
		$this->set('productcategorys',$data);
	
	}
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'product_code LIKE '=>'%'.$filter.'%',								
										'product_brand LIKE '=>'%'.$filter.'%',
										
																													
										)
											);
			}
	$this->paginate['conditions'] = $this->conditionFilter;

	}
	public function getExts($str)
 	{
		$strimage=strpos($str,".");
		if(!$strimage)
		  {
		     return "";
		  }
		$lengimage=strlen($str) - $strimage;
		$ext=substr($str,$strimage+1,$lengimage);
		return $ext;
 	}
	public function save($id=0)
	{		
			$image_format=array("jpg","png","gif","jpeg","PNG","JPG","GIF","JPEG","BMP");
		    
		    $name = $_FILES["file"]["name"];
		    $tmp=  $_FILES["file"]["tmp_name"];
		    $size=$_FILES["file"]["size"];
		    $ext = $this->getExts($name);
		    $userId = $this->Session->read('Auth.User.user_id');	
		    
		    if($id===0)
		    {
		    	$this->request->data['created_by'] = $userId;
		    	$this->request->data["product_photo"]="products/default.png";
		    	if($size>0)
		    	{
		    		if(in_array($ext,$image_format))	
		    		{
		    			$actual_image_name = sha1(time().rand(1,100)).".".$ext;
		    			move_uploaded_file($_FILES["file"]["tmp_name"],"products/" . $actual_image_name);
			        	$this->request->data["product_photo"]="products/".$actual_image_name;

		    		}
		    		else
		    		{
		    			$this->Session->setFlash(
									__( $_FILES["file"]["name"]. ' file type not allowed')
										,'default'
										, array('class'=>'alert alert-dismissable alert-warning '));
		    			
		    			$this->redirect(array('action' => 'listing'));
		    		}
		    	}
		    	
		    	$this->Product->create();		
				if($this->Product->save($this->request->data))
					{
					
					$this->Session->setFlash(
								__('Product has been saved')
									,'default'
									, array('class'=>'alert alert-dismissable alert-success '));
	    		 	$id  = $this->Product->getLastInsertId();
					$this->request->data['id'] = $id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);
	    		 	$this->redirect(array('action' => 'listing'));
				}

		    	
		    } 
		    else
			{		
					$this->request->data['modified_by'] = $userId;
					if($size>0)
		    		{
			    		if(in_array($ext,$image_format))	
			    		{
			    			$actual_image_name = sha1(time().rand(1,100)).".".$ext;
			    			move_uploaded_file($_FILES["file"]["tmp_name"],"products/" . $actual_image_name);
				        	$this->request->data["product_photo"]="products/".$actual_image_name;

			    		
			    		}
			    		else
			    		{
			    			$this->Session->setFlash(
										__( $_FILES["file"]["name"]. ' file type not allowed')
											,'default'
											, array('class'=>'alert alert-dismissable alert-warning '));
			    			$this->redirect(array('action' => 'add'));
			    		}
			    		$this->Product->id=$id;
			    		$photo=$this->request->data['photo'];
			    		if(file_exists($photo))
			    		{
			    			unlink($photo);
			    		}
						
						$keyName = $this->Product->primaryKey;
						$obj 	= $this->Product->find('all',array(
							'conditions'=>array($keyName=>$id)
						));
						if(!count($obj))
						{
							throw new NotFoundException();
							
						}
						$logMessage = json_encode($obj);
						$this->generateLog($logMessage,' EDIT :'.$id);
						if($this->Product->save($this->request->data))
						{
								$this->Session->setFlash(
											__('Product has been saved')
												,'default'
												, array('class'=>'alert alert-dismissable alert-success '));
				    		 	$this->redirect(array('action' => 'listing'));
						}


		    		}
		    		else
		    		{
		    			$this->Product->id=$id;
						if($this->Product->save($this->request->data))
						{
							$this->Session->setFlash(
										__('Product has been saved')
											,'default'
											, array('class'=>'alert alert-dismissable alert-success '));
			    		 	$this->redirect(array('action' => 'listing'));
						}
		    		}
					
			}
		    
	}
	
	public function checkExistingProductCode()
	{
		$product_code=$this->request->data['code'];
		$data=$this->Product->findByproduct_code($product_code);

		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated Product Code. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}
	
}
 ?>