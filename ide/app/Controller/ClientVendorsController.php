<?php
	class ClientVendorsController extends AppController
	{
		public $helper= array('Html','Form');
		public $components= array('Session');
		public $context 		= 'ClientVendor';
		public $uses  = array('Client','Vendor','ClientVendor');

	public function add()
	{
		$data = $this->Client->find('all', array('conditions'=>array('Client.state'=>1)));
		$this->set('clients',$data);

		$data=$this->Vendor->find('all', array('conditions'=>array('Vendor.state'=>1)));
		$this->set('vendors',$data);
		
	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findByclient_code($id);
		$this->set('data',$data);
		
		$data = $this->Client->find('all',array('conditions'=>array('Client.state'=>1)));
		$this->set('clients',$data);

		$data=$this->Vendor->find('all', array('conditions'=>array('Vendor.state'=>1)));
		$this->set('vendors',$data);
		
	}

	public function getVendorClient()
	{
		$vendor_code=@$this->request->data['vendor_code'];
		$data=$this->ClientVendor->find('all',
			array('conditions'=>array('ClientVendor.vendor_code'=>$vendor_code))
		);
		$st='';
		$ret = array('error'=>true,'msg'=>'','data'=>'');
	
		if(count(@$data))
		{
			foreach ($data as $key => $value) {
					$st.='<option value="'.$value['ClientVendor']['client_id'].'">'.$value['Client']['client_name_en'].'  ('.$value['ClientVendor']['client_id'].')</option>';
				}
			$ret['error']=false;
			$ret['data'] = $st;
		}
		else
		{
			$st.='Vendor has no Client!';
			$ret['msg'] = $st;
		}

		echo json_encode($ret);
		exit();
	}
}

?>