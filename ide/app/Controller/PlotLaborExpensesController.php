<?php 
 	class PlotLaborExpensesController extends AppController
 	{
 		public $name="PlotLaborExpenses";
 		public $conponents = array('Session');
 		public $helpers =array('Html','Form');
 		public $context ="PlotLaborExpense";
 		public $uses =array('Labor','PlotLaborExpense','Plot','LaborExpense');

 		public function getPlotExpenseHistory()
		{
			$plot_id =$this->request->data['plot_id'];
			$st='';
			if($plot_id=='')
			{
				$st.='<div class="alert alert-dismissable alert-danger ">'.__('Farmer has no Plot').'</div>';
			}
			else
			{
				$this->PlotLaborExpense->recursive=3;
				$conditions = array(
					array('PlotLaborExpense.plot_id'=>$plot_id)
				);
			
				$data = $this->PlotLaborExpense->find('all',array(
									'conditions'=>$conditions,
									'fields'=>array('labor_code','laborexpense_id')
										));
				if(count($data))
				{
					$st.='<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
					<thead>
					<tr>
					<th>'.__('Date') .'</th>
					<th>'.__('Type').'</th>
					<th>'.__('Unit').'</th>
					<th>'.__('Cost Per Unit') .'</th>
					<th>'.__('Quantity') .'</th>
					
					<th>'.__('Total') .'</th>
					</tr></thead><tbody>';
					foreach ($data as $key => $value) {
					$st.='<tr>
						<td>'.@$value['LaborExpense']['laborexpense_date'].'</td>
						<td>'.@$value['Labor']['labor_name_en'].'</td>
						<td>'.@$value['Labor']['labor_unit'].'</td>
						<td>'.@$value['Labor']['labor_costper_unit_usd'].'</td>
						<td>'.@$value['LaborExpense']['laborexpense_quantity'].'</td>
						<td>'.@$value['LaborExpense']['laborexpense_quantity']*$value['Labor']['labor_costper_unit_usd'].'</td>
					 </tr>';		
					}
		 
					$st.='</tbody></table>';

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