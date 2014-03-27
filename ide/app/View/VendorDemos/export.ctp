<?php 
          
  $filename = 'vendor_demos_'.Date('Y_m_d_H_i_s').'.xls';
  header("Content-type: application/octet-stream");
  header("Content-Type: application/vnd.ms-excel; charset=utf-8");
  header("Content-type: application/x-msexcel; charset=utf-8");
  header("Content-Disposition: attachment; filename=$filename");
  header("Pragma: no-cache");
  header("Expires: 0"); 
  $states = array(0=>'Inactive',1=>'Active');
  $start = 0;
  $subjectNumber = isset($subject_number)?$subject_number:1;
 ?>
 <table border="1">
                    <thead>
                        <tr>
                            <th><?php echo __('NO') ?></th>
                            <th><?php echo __('FBA-ID') ?></th>
                            <th><?php echo __('FBA Name')?></th>
                            <th><?php echo __('Gender')?></th>
                            <th><?php echo __('Year of birth')?></th>
                            <th><?php echo __('Village ID')?></th>
                            <th><?php echo __('Village')?></th>
                            <th><?php echo __('Commune')?></th>
                            <th><?php echo __('District')?></th>
                            <th><?php echo __('Province')?></th>
                            <th><?php echo __('Contact')?></th>
                            <th><?php echo __('Staff Supervision')?></th>
                            <th><?php echo __('Branch Manager')?></th>
                            <th><?php echo __('FBA Start Date')?></th>
                            <th><?php echo __('FBA End Date')?></th>
                            <th><?php echo __('FBA Status')?></th>
                                                                                          
                        </tr>
                    </thead>
                    <tbody>  
                        <?php 
                            $count = 0;
                            foreach ($data as $key => $value) :
                            $count++;
                                ?>                      
                        <tr>
                            <td><?php echo $start+$key+1;?></td>
                            <td><?php echo $value['VendorDemo']['vendor_code'];?></td>
                            <td><?php echo $value['VendorDemo']['vendor_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['vendor_gender']?></td>
                            <td><?php echo date('Y',strtotime($value['VendorDemo']['vendor_date_of_birth']));?></td>
                            <td><?php echo $value['VendorDemo']['phum_code']?></td>
                            <td><?php echo $value['VendorDemo']['phum_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['khum_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['srok_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['khet_name_en']?></td>
                            <td><?php echo $value['VendorDemo']['vendor_phone'].' <br> '. $value['VendorDemo']['vendor_email']  ;?>
                            <td><?php ?></td>
                            <td><?php echo $value['VendorDemo']['branch_manager']?></td>
                            <td><?php echo $value['VendorDemo']['vendor_datestarted']?></td>
                            <td><?php echo $value['VendorDemo']['vendor_date_ended']?></td>
                            <td><?php echo $states[$value['VendorDemo']['state']]?></td>
                        </tr>
                        <?php endforeach; ?>  
                        <?php if($count==0): ?>
                            <tr><td colspan="16"><center>No Record </center></td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
    <style type="text/css">
table
{
border-collapse:collapse;
}
table, td, th
{
border:1px solid black;
}

</style>
 <?php 
 exit();
  ?>