<?php 
          
  $filename = 'training_demos_'.Date('Y_m_d_H_i_s').'.xls';
  header("Content-type: application/octet-stream");
  header("Content-Type: application/vnd.ms-excel; charset=utf-8");
  header("Content-type: application/x-msexcel; charset=utf-8");
  header("Content-Disposition: attachment; filename=$filename");
  header("Pragma: no-cache");
  header("Expires: 0"); 
  $start = 0;
  $subjectNumber = isset($subject_number)?$subject_number:1;
 ?>
<table border="1">
	<thead>
	    <tr>
	        <th><?php echo __('NO') ?></th>
	        <th><?php echo __('Responsible Staff') ?></th>
	        <th><?php echo __('Name of Trainer')?></th>
	        <?php for($i=1;$i<=$subjectNumber;$i++): ?>
	        <th><?php echo __('Subject').' '.$i ?> </th>
	        <?php endfor; ?>
	        <th><?php echo __('Date of Conduct training')?></th>
	        <th><?php echo __('Training/Meeting')?></th>
	        <th><?php echo __('Training Place')?></th>
	        <th><?php echo __('Participant')?></th>
	        <th><?php echo __('Farmer or Vendor')?></th>
	        <th><?php echo __('Gender')?></th>
	        <th><?php echo __('Village ID')?></th>
	        <th><?php echo __('Village')?></th>
	        <th><?php echo __('Commune')?></th>
	        <th><?php echo __('District')?></th>
	        <th><?php echo __('Province')?></th>
	        <th><?php echo __('Under FBA')?></th>
	        <th><?php echo __('Remarks')?></th>                          
	                                          
	    </tr>
    </thead>
    <tbody>  
        <?php 
            $count = 0;
            foreach ($data as $key => $value) :
                $count++;
            ?>                      
        <tr>
            <td>
                <?php echo $start+$key+1;?>
            </td>
            <td>
              <?php echo $value['TrainingDemo']['training_responsible_staff'] ?>
            </td>
            <td>
              <?php echo $value['TrainingDemo']['week_trainer'] ?>
            </td>
            <?php for ($i=1; $i <=$subjectNumber ; $i++) :?>
                <td>
                  <?php echo $value['TrainingDemo']['week_topic'.$i] ?>
                </td>
            <?php endfor; ?>
            <td>
              <?php echo $value['TrainingDemo']['training_datestart'] ?>
            </td>
            <td>

            </td>
            <td>
                <?php echo $value['TrainingDemo']['training_location'] ?>
            </td>
            <td>
                <?php echo $value['TrainingDemo']['participant_name'] ?>                                
            </td>
            
            <td>
                <?php echo $value['TrainingDemo']['ftype'] ?>
            </td>
            <td>
                <?php echo $value['TrainingDemo']['participant_gender'] ?>
            </td>
            <td>
                <?php echo $value['TrainingDemo']['phum_code'] ?>
            </td>
            <td>
                <?php echo $value['TrainingDemo']['phum_name_en'] ?>
            </td>
            <td>
                <?php echo $value['TrainingDemo']['khum_name_en'] ?>
            </td>
            <td>
                <?php echo $value['TrainingDemo']['srok_name_en'] ?>
            </td>
            <td>
                <?php echo $value['TrainingDemo']['khet_name_en'] ?>
            </td>
             <td>
                <?php echo $value['TrainingDemo']['fba'] ?>
            </td>
            <td>
            </td>
                                    
        </tr>
        <?php endforeach; ?>  
        <?php 
            if($count==0):
         ?>
            <tr>
                <td colspan ="<?php echo $subjectNumber+16 ?>"> <center>No Record</center> </td>
            </tr>
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