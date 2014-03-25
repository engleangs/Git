<?php 
class PlotsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 		= 'Plot';
	public $uses  = array('Client','Crop','Plot','Materialexpense','LaborExpense','PlotLaborExpense',
		'PlotMaterialExpense','Project','Vendor','ProductCategory','Product');

	public function add()
	{
		$data = $this->Client->find('all', array('conditions'=>array('Client.state'=>1)));
		$this->set('clients',$data);

		$data=$this->Project->find('all');
		$this->set('projects',$data);

		$data=$this->Vendor->find('all',array('conditions'=>array('Vendor.state'=>1,'Vendor.vendor_type'=>'fba')));
		$this->set('vendors',$data);

		$data=$this->ProductCategory->find('all');
		
 		$productcategory= array();
 		foreach ($data as $key => $value) 
 		{
 				
 				$key = $value['ProductCategory']['productcategory_code'];
 				$productcategory[$key]=$value['ProductCategory'];
 		}
 	
 		$data = $this->Product->find('all');
 		$product=array();
 		foreach ($data as $key => $value) {

 				$key = $value['Product']['product_code'];
 				$product[$key]=$value['Product']['productcategory_code'];
 				
 	    }

 	    $data=$this->Crop->find('all');
 	    $ProCateProCrop=array();
 	    foreach ($data as $key => $value) {
 	    	$key=$value['Crop']['product_code'];

 	    	if(isset($product[$key]))
 	    	{
 	    		$categoryCode = $product[$key];
 	    		if(!isset($ProCateProCrop[$categoryCode]) && 
 	    			isset($productcategory[$categoryCode]))
 	    		{
 	    			$ProCateProCrop[$categoryCode] = $productcategory[$categoryCode];
 	    			$ProCateProCrop[$categoryCode]['Crop'] = array();
 	    		}
 	    		if(isset($ProCateProCrop[$categoryCode]))
 	    		{
 	    			$ProCateProCrop[$categoryCode]['Crop'][] = $value['Crop'];
 	    		}
 	    	}
 	    }
 	  	$this->set('productcategoriesCrop',$ProCateProCrop);
		
	}
	public function save($id=0)
	{
		$userId = $this->Session->read('Auth.User.user_id');	
		$fba_check=@$this->request->data['fba_check'];
		if($id===0)
		{
			$this->request->data['created_by'] = $userId;
			if($fba_check!=null)
			{
				unset($this->request->data['client_id']);
			}
			else
			{
				unset($this->request->data['vendor_code']);
			}
			$this->Plot->create();			
			if($this->Plot->save($this->request->data))
			{
				$this->Session->setFlash(__( $this->context.' has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
				$id  = $this->Plot->getLastInsertId();
				$this->request->data['id'] = $id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);
				
				return $this->redirect(array('action' =>'listing'));
			}

			$this->Session->setFlash(__('Unable to add '.$this->context),
									'default',
									array('class'=>'alert alert-dismissable alert-danger '));

		}
		else
		{
			$this->request->data['modified_by'] = $userId;
			if($this->request->is(array('post','put')))
			{
				$this->Plot->id = $id;
				$keyName = $this->Plot->primaryKey;
				$obj 	= $this->Plot->find('all',array(
					'conditions'=>array('Plot.'.$keyName=>$id)
				));
				if(!count($obj))
				{
					throw new NotFoundException();
					
				}
				$logMessage = json_encode($obj);
				$this->generateLog($logMessage,' EDIT :'.$id);
				if($this->Plot->save($this->request->data))
				{
					$this->Session->setFlash(__('Plot has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
					return $this->redirect(array('action' =>'listing'));
				}
			}
			$this->Session->setFlash(__('Unable to save Plot'),
										'default',
										array('class'=>'alert alert-dismissable alert-danger '));
			
		}
		if($id==0)return $this->redirect(array('action'=>'add'));
		return $this->redirect(array('action'=>'edit',$id));
	
	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findByplot_id($id);
		$this->set('data',$data);
		
		$data=$this->ProductCategory->find('all');
		
 		$productcategory= array();
 		foreach ($data as $key => $value) 
 		{
 				
 				$key = $value['ProductCategory']['productcategory_code'];
 				$productcategory[$key]=$value['ProductCategory'];
 		}
 	
 		$data = $this->Product->find('all');
 		$product=array();
 		foreach ($data as $key => $value) {

 				$key = $value['Product']['product_code'];
 				$product[$key]=$value['Product']['productcategory_code'];
 				
 	    }

 	    $data=$this->Crop->find('all');
 	    $ProCateProCrop=array();
 	    foreach ($data as $key => $value) {
 	    	$key=$value['Crop']['product_code'];

 	    	if(isset($product[$key]))
 	    	{
 	    		$categoryCode = $product[$key];
 	    		if(!isset($ProCateProCrop[$categoryCode]) && 
 	    			isset($productcategory[$categoryCode]))
 	    		{
 	    			$ProCateProCrop[$categoryCode] = $productcategory[$categoryCode];
 	    			$ProCateProCrop[$categoryCode]['Crop'] = array();
 	    		}
 	    		if(isset($ProCateProCrop[$categoryCode]))
 	    		{
 	    			$ProCateProCrop[$categoryCode]['Crop'][] = $value['Crop'];
 	    		}
 	    	}
 	    }
 	  	$this->set('productcategoriesCrop',$ProCateProCrop);

		$data=$this->Project->find('all');
		$this->set('projects',$data);

		$data=$this->Vendor->find('all',array('conditions'=>array('Vendor.state'=>1,'Vendor.vendor_type'=>'fba')));
		$this->set('vendors',$data);
		
	}
	/*get Plot code of Client at Material and Labor expense*/
	public function getPlotCode()
	{
			$client_id = $this->request->data['client_id'];
			$model = $this->getModel();
			$model->recursive = 0;
			$data = $model->find('all',array(
									'conditions'=>array('Plot.client_id'=>$client_id),
									'fields'=>array('plot_id','crop_code','plot_centroid_x','plot_centroid_y'),
									'group'=>'Plot.plot_id'
										));
			$st='';

			if(count($data))
			{
				
				foreach ($data as $key => $value) {
					$st.='<option value='.$value['Plot']['plot_id'].'>'.$value['Plot']['plot_id'].'  ('.$value['Plot']['plot_centroid_x'].' , '.$value['Plot']['plot_centroid_y'].')'.'</option>';
				}
			}
			
			echo $st;
			exit;

			
	}
	/*Get Plot for Vegetable Harvest not yet complet by ajax request from HarvestVegetable form belong to CLient*/
	public function getPlotHavestVegetable()
	{
			$client_id = $this->request->data['client_id'];
			$model = $this->getModel();
			$model->recursive = 0;
			$sql = 'SELECT plot_id FROM harvestvegetables  where harvestvegetable_completed=1';
			$plot_havest = $model->query($sql);
			$plot_id  = array();
			foreach ($plot_havest as $key => $value) 
			{
				$plot_id[] = $value['harvestvegetables']['plot_id'];		

			}

			$sql  = "
				SELECT p.* FROM plots as p LEFT JOIN crops as c ON p.crop_code = c.crop_code 					
				WHERE c.crop_type= 'vegetable' AND p.client_id='$client_id'  ";
						
				if(count($plot_id))
				{
					$sql.=" AND p.plot_id NOT IN (".implode(",", $plot_id).")";
				}
				$sql.= " group by p.plot_id ";		
				$data = $model->query($sql);
				$st='';

				if(count($data))
				{
					
					foreach ($data as $key => $value) {
						$st.='<option value='.$value['p']['plot_id'].'>'.$value['p']['plot_id'].'  ('.$value['p']['plot_centroid_x'].' , '.$value['p']['plot_centroid_y'].')'.'</option>';
					}
				}
					
			echo $st;
			exit;

			
	}
	/*Get Plot for Vegetable Harvest not yet complet by ajax request from HarvestVegetable form belong to Vendor*/
	public function getPlotByVendorVegetable()
	{
			$vendor_code = $this->request->data['vendor_code'];

			$model = $this->getModel();
			$model->recursive = 0;
			$sql = 'SELECT plot_id FROM harvestvegetables  where harvestvegetable_completed=1';
			$plot_havest = $model->query($sql);
			$plot_id  = array();
			foreach ($plot_havest as $key => $value) 
			{
				$plot_id[] = $value['harvestvegetables']['plot_id'];		

			}

			$sql  = "
				SELECT p.* FROM plots as p LEFT JOIN crops as c ON p.crop_code = c.crop_code 					
				WHERE c.crop_type= 'vegetable' AND p.vendor_code='$vendor_code'  ";
						
				if(count($plot_id))
				{
					$sql.=" AND p.plot_id NOT IN (".implode(",", $plot_id).")";
				}
				$sql.= " group by p.plot_id ";		
				$data = $model->query($sql);
				$st='';

				if(count($data))
				{
					
					foreach ($data as $key => $value) {
						$st.='<option value='.$value['p']['plot_id'].'>'.$value['p']['plot_id'].'  ('.$value['p']['plot_centroid_x'].' , '.$value['p']['plot_centroid_y'].')'.'</option>';
					}
				}
					
			echo $st;
			exit;
	}
	/*Get Plot for Vegetable Harvest not yet complet by ajax request from HarvestRice form belong to Vendor*/
	public function getPlotByVendorRice()
	{
			$vendor_code = $this->request->data['vendor_code'];

			$model = $this->getModel();
			$model->recursive = 0;
			$sql = 'SELECT plot_id FROM harvestrices  where harvestrice_completed=1';
			$plot_havest = $model->query($sql);
			$plot_id  = array();
			foreach ($plot_havest as $key => $value) 
			{
				$plot_id[] = $value['harvestrices']['plot_id'];		

			}

			$sql  = "
				SELECT p.* FROM plots as p LEFT JOIN crops as c ON p.crop_code = c.crop_code 					
				WHERE c.crop_type= 'rice' AND p.vendor_code='$vendor_code'  ";
						
				if(count($plot_id))
				{
					$sql.=" AND p.plot_id NOT IN (".implode(",", $plot_id).")";
				}
				$sql.= " group by p.plot_id ";		
				$data = $model->query($sql);
				$st='';

				if(count($data))
				{
					
					foreach ($data as $key => $value) {
						$st.='<option value='.$value['p']['plot_id'].'>'.$value['p']['plot_id'].'  ('.$value['p']['plot_centroid_x'].' , '.$value['p']['plot_centroid_y'].')'.'</option>';
					}
				}
					
			echo $st;
			exit;
	}
	public function getPlotHarvestRice()
	{
		$client_id = $this->request->data['client_id'];
		$model = $this->getModel();
		$model->recursive = 0;
		$sql = 'SELECT plot_id FROM harvestrices  where harvestrice_completed=1';
		$plot_havest = $model->query($sql);
		$plot_id  = array();
		foreach ($plot_havest as $key => $value) 
		{
			$plot_id[] = $value['harvestrices']['plot_id'];		

		}
		$sql  = "
				SELECT p.* FROM plots as p LEFT JOIN crops as c ON p.crop_code = c.crop_code 					
				WHERE c.crop_type= 'rice' AND p.client_id='$client_id'  ";
						
		if(count($plot_id))
		{
			$sql.=" AND p.plot_id NOT IN (".implode(",", $plot_id).")";
		}

		$sql.= " group by p.plot_id ";		
		$data = $model->query($sql);
		$st='';
		$ret = array('error'=>true,'msg'=>'','data'=>'');

		if(count($data))
		{
			foreach ($data as $key => $value) {
				$st.='<option value='.$value['p']['plot_id'].'>'.$value['p']['plot_id'].'  ('.$value['p']['plot_centroid_x'].' , '.$value['p']['plot_centroid_y'].')'.'</option>';
			}
			$ret['error']=false;
			$ret['data'] = $st;
		}
		else
		{
			$st.='Farmer has no Plot for Rice';
			$ret['msg'] = $st;
		}
		
		echo json_encode($ret);
		exit;
	}
	/*total of Labor Expense*/
	public function totalLaborExpense($plot_id)
	{
			$totalLabor=0;
			$this->PlotLaborExpense->recursive=3;
			$dataLabor=$this->PlotLaborExpense->find('all',array(
				'conditions'=>array('PlotLaborExpense.plot_id'=>$plot_id),
				'fields'=>array('laborexpense_id')
			));

			if(count(@$dataLabor))
			{
				foreach ($dataLabor as $key => $value) {
				$totalLabor=$totalLabor+((int)$value['LaborExpense']['laborexpense_quantity']*(double)$value['LaborExpense']['laborexpense_price_usd']);
				}
			}
			
			
			return $totalLabor;
		
	}

	/*total of Material Expense*/
	public function totalMaterialExpense($plot_id)
	{
			$totalMaterial=0;
			$this->PlotMaterialExpense->recursive=3;
			$dataMaterial=$this->PlotMaterialExpense->find('all',array(
					'conditions'=>array('PlotMaterialExpense.plot_id'=>$plot_id),
					'fields'=>array('materialexpense_id')
				));
			if(count(@$dataMaterial))
			{
				foreach ($dataMaterial as $key => $value) {
				$totalMaterial=$totalMaterial+((int)$value['MaterialExpense']['materialexpense_quantity']*(double)$value['MaterialExpense']['materialexpense_price_usd']);
				}
			}
			return $totalMaterial;
		
	}
	/*Sum total of Materialexpense and labor expense by plot is for Harvest Vegetable*/
	public function totalCostExpense()
	{
		$plot_id=@$this->request->data['plot_id'];
		
		$st='';
		$totalLabor=0;
		$totalMaterial=0;
		$total=0;
		if($plot_id=='')
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Plot not Found').'</div>';
		}
		else
		{
			$totalLabor=$this->totalLaborExpense($plot_id);
			$totalMaterial=$this->totalMaterialExpense($plot_id);		
			$total=$totalLabor + $totalMaterial;
			
			echo $total;
			
		}
		
		exit();
	}
	public function totalCostNoLabor()
	{
		$plot_id=@$this->request->data['plot_id'];
		
		$st='';
		$totalMaterial=0;
		$total=0;
		if($plot_id=='')
		{
			$st.='<div class="alert alert-dismissable alert-danger">Plot not Found</div>';
		}
		else
		{
			$totalMaterial=$this->totalMaterialExpense($plot_id);		
			$total=$this->totalMaterialExpense($plot_id);
			echo $total;
			
		}
		
		exit();
	}
	/*--------Plot belong to Client---------*/
	public function checkClientPlot()
	{
		$client_id=@$this->request->data['client_id'];
		$data=$this->Plot->find('all',array(
					'conditions'=>array(
						'Plot.client_id'=>$client_id
						)
					)
		);
		$st='';
		if(count($data))
		{
			$st.='<table cellpadding="0" cellspacing="0" border="0" class="table table-striped ">
	            <tr>
	                <td>'.__('Name').' :  '.$data[0]['Client']['client_name_en'].'</td>
	                <td>'.__('Code').' :  '.$client_id.'</td>
	            </tr>
	            <tr>
	            	<table id="data-training" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>'.__('Plot ID') .'</th>
						<th>'.__('Plant Date').'</th>
						<th>'.__('Complete?') .'</th>
						
					</tr></thead><tbody>';

					foreach ($data as $key => $value) {
						$st.='<tr>
								<td>'.@$value['Plot']['plot_id'].'</td>
								<td>'.@$value['Plot']['plot_dateplanting'].'</td>';
							if($value['Crop']['crop_type']=='vegetable')
							{
						$st.='<td>'.(@$value['HarvestVegetable']['harvestvegetable_completed']?'Yes':'No').'</td>';
							}
							else
							{
						$st.='<td>'.(@$value['HarvestRice']['harvestrice_completed']?'Yes':'No').'</td>';
							}
									
								
						$st.='</tr>';		
					}
					$st.='</tbody></table></tr></table>';
		}
		else
		{
					$st.='<div class="alert alert-dismissable alert-danger ">'.__('Client has no Plot').'</div>';
		}	
		
		echo $st;
		exit();	
	}
		
	/*--------Plot belong to Vendor---------*/
	public function checkVendorPlot()
	{
		$vendor_code=@$this->request->data['vendor_code'];
		$data=$this->Plot->find('all',array(
					'conditions'=>array(
						'Plot.vendor_code'=>$vendor_code
						)
					)
		);

		$st='';
		if(count($data))
		{
			$st.='<table cellpadding="0" cellspacing="0" border="0" class="table table-striped ">
	            <tr>
	                <td>'.__('Name').' :  '.$data[0]['Vendor']['vendor_name_en'].'</td>
	                <td>'.__('Code').' :  '.$vendor_code.'</td>
	            </tr>
	            <tr>
	            	<table id="data-training" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>'.__('Plot ID') .'</th>
						<th>'.__('Plant Date').'</th>
						<th>'.__('Complete?') .'</th>
						
					</tr></thead><tbody>';

					foreach ($data as $key => $value) {
						$st.='<tr>
								<td>'.@$value['Plot']['plot_id'].'</td>
								<td>'.@$value['Plot']['plot_dateplanting'].'</td>';
							if($value['Crop']['crop_type']=='vegetable')
							{
						$st.='<td>'.(@$value['HarvestVegetable']['harvestvegetable_completed']?'Yes':'No').'</td>';
							}
							else
							{
						$st.='<td>'.(@$value['HarvestRice']['harvestrice_completed']?'Yes':'No').'</td>';
							}
									
								
						$st.='</tr>';		
					}
					$st.='</tbody></table></tr></table>';
		}
		else
		{
					$st.='<div class="alert alert-dismissable alert-danger ">'.__('Vendor has no Plot').'</div>';
		}	
		
		echo $st;
		exit();	
	}
	/*Get plot that belong to Vendor Expense Form*/
	public function getPlotbelongToVendor()
	{
			$vendor_code =@$this->request->data['vendor_code'];

			$model = $this->getModel();
			$model->recursive = 0;
			$data = $model->find('all',array(
									'conditions'=>array('Plot.vendor_code'=>$vendor_code),
									'fields'=>array('plot_id','crop_code','plot_centroid_x','plot_centroid_y'),
									'group'=>'Plot.plot_id'
										));
			$ret = array('error'=>true,'msg'=>'','data'=>'');
			$st='';
			if(count(@$data))
			{
				
				foreach ($data as $key => $value) {
					$st.='<option value="'.$value['Plot']['plot_id'].'">'.$value['Plot']['plot_id'].' ('. $value['Plot']['plot_centroid_x'].' : '.$value['Plot']['plot_centroid_y'].')</option>';
				}
				$ret['error']=false;
				$ret['data'] = $st;
			}
			else
			{
				$st.=__('FBA has no plot!');
				$ret['msg'] = $st;
			}

			echo json_encode($ret);
			exit;

	}
}
 ?>