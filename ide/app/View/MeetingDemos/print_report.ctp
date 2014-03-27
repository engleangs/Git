<?php           
  $start = 0;
  $subjectNumber = isset($subject_number)?$subject_number:1;

 ?>
<table border="1">
    <thead>
        <tr>
            <th><?php echo __('NO') ?></th>
            <th><?php echo __('Responsible Staff') ?></th>
            <th><?php echo __('Subject') ?> </th>                            
            <th><?php echo __('Date of Conduct Meeting')?></th>                            
            <th><?php echo __('Meeting Place')?></th>
            <th><?php echo __('Participant Name')?></th>
            <th><?php echo __('FBA or Farmer')?></th>
            <th><?php echo __('SEX')?></th>
            <th><?php echo __('ID-Village')?></th>
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
              <?php echo $value['MeetingDemo']['meeting_responsible_staff'] ?>
            </td>                            
            <td>
              <?php echo $value['MeetingDemo']['meeting_subject'] ?>
            </td>
            <td>
                <?php echo $value['MeetingDemo']['meeting_date'] ?>
            </td>
             <td>
                <?php echo $value['MeetingDemo']['meeting_location'] ?>
            </td>
            <td>
                <?php echo $value['MeetingDemo']['participant_name_en'] ?>                                
            </td>
            
            <td>
                <?php echo $value['MeetingDemo']['ftype'] ?>
            </td>
            <td>
                <?php echo $value['MeetingDemo']['participant_gender'] ?>
            </td>
            <td>
                <?php echo $value['MeetingDemo']['phum_code'] ?>
            </td>
            <td>
                <?php echo $value['MeetingDemo']['phum_name_en'] ?>
            </td>
            <td>
                <?php echo $value['MeetingDemo']['khum_name_en'] ?>
            </td>
            <td>
                <?php echo $value['MeetingDemo']['srok_name_en'] ?>
            </td>
            <td>
                <?php echo $value['MeetingDemo']['khet_name_en'] ?>
            </td>
             <td>
                <?php echo $value['MeetingDemo']['fba'] ?>
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
<script type="text/javascript"> 
window.onload=function(){self.print();} 
</script> 