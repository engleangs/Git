<?php 
 	class PlotMaterialExpensesController extends AppController
 	{
 		public $name="PlotMaterialExpenses";
 		public $conponents = array('Session');
 		public $helpers =array('Html','Form');
 		public $context ="PlotMaterialExpense";
 		public $uses =array('MaterialExpense','PlotMaterialExpense','Product','Plot');

 		public function getPlotMaterialExpenseHistory()
		{
			$plot_id =$this->request->data['plot_id'];
			$this->PlotMaterialExpense->recursive=2;
			$st='';
			if($plot_id=='')
			{
				$st.='<div class="alert alert-dismissable alert-danger ">'.__('Farmer has no Plot').'</div>';
			}
			else
			{	
					$data = $this->PlotMaterialExpense->find('all',array(
									'conditions'=>array('PlotMaterialExpense.plot_id'=>$plot_id),
									'fields'=>array('product_code','materialexpense_id')
										));
					
					if(count($data))
					{
						$st.='<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>'.__('Date').'</th>
							<th>'.__('Material').'</th>
							<th>'.__('Unit').'</th>
							<th>'.__('Cost Per Unit') .'</th>
							<th>'.__('Quantity') .'</th>
							<th>'.__('Total') .'</th>
						</tr></thead>';
						foreach ($data as $key => $value) {
							$st.='<tbody><tr>
							<td>'.$value['MaterialExpense']['materialexpense_date'].'</td>
							<td>'.$value['Product']['product_brand'].'</td>
							<td>'.$value['Product']['product_unit'].'</td>
							<td>'.$value['MaterialExpense']['materialexpense_quantity'].'</td>
							<td>'.$value['Product']['product_priceperunit_general_usd'].'</td>
							<td>'.$value['MaterialExpense']['materialexpense_quantity']*$value['Product']['product_priceperunit_general_usd'].'</td>
					 	</tr></tbody>';		
						}
		 
						$st.='</table';
					}
					else
					{
						$st.='<div class="alert alert-dismissable alert-danger ">'.__('Plot has no History of Expense').'</div>';
					}
			
			}
			
			echo $st;
			exit();
		}
 	}
?>