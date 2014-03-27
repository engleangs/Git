<?php 
          
  $filename = 'rice_demos_'.Date('Y_m_d_H_i_s').'.xls';
  header("Content-type: application/octet-stream");
  header("Content-Type: application/vnd.ms-excel; charset=utf-8");
  header("Content-type: application/x-msexcel; charset=utf-8");
  header("Content-Disposition: attachment; filename=$filename");
  header("Pragma: no-cache");
  header("Expires: 0"); 

 ?>
<table border="1">
  <thead>
                        <tr>
                            <th><?php echo __('NO') ?></th>
                            <th><?php echo __('CA Name') ?></th>
                            <th><?php echo __('Branch Manager')?></th>
                            <th><?php echo __('Donor')?></th>
                            <th><?php echo __('Crop Cycle')?></th>
                            <th><?php echo __('Type of Rice')?></th>
                            <th><?php echo __('Name of Demo\'s Owner')?></th>
                            <th><?php echo __('FBA or Farmer')?></th>
                            <th><?php echo __('Gender')?></th>
                            <th><?php echo __('Village ID')?></th>
                            <th><?php echo __('Village')?></th>
                            <th><?php echo __('Commune')?></th>
                            <th><?php echo __('District')?></th>
                            <th><?php echo __('Province')?></th>
                            <th><?php echo __('Rice Variety')?></th>
                            <th><?php echo __('Type of treatment')?></th>
                            <th><?php echo __('Plot size')?></th>
                            <th><?php echo __('Date Start')?></th>
                            <th><?php echo __('Date planting')?></th>
                                                              
                        </tr>
                    </thead>
                    <tbody>  
                        <?php 
                        $count  =0 ;
                        foreach ($data as $key => $value) :
                          $count++;
                        ?>                      
                        <tr>
                            <td>
                                <?php echo $start+$key+1;?>
                            </td>
                            <td>
                              <?php 
                                  if($value['RiceDemo']['p_client_id']==null)
                                  {
                                     echo $value['RiceDemo']['ven_v_name_en'];
                                  }
                                  else
                                  {
                                    echo $value['RiceDemo']['ven_ca_vendor_name_en'];
                                  }
                                     
                              ?>
                            </td>
                            <td>
                                <?php
                                   if($value['RiceDemo']['p_client_id']==null) 
                                    echo $value['RiceDemo']['ven_v_branch_manager'];
                                  else echo $value['RiceDemo']['ven_ca_branch_manager'];
                                ?>
                            </td>
                            <td><?php echo $value['RiceDemo']['pr_project_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['plot_crop_cycle']?></td>
                            <td>
                                <?php 

                                        if($value['RiceDemo']['co_crop_season']=='wetseason')
                                        {
                                             echo 'Wet Season';
                                        }
                                        if($value['RiceDemo']['co_crop_season']=='dryseason')
                                        {
                                            echo 'Dry Season';
                                             
                                        }
                                       
                                  
                                  //echo $value['co']['crop_season']
                                ?>
                            </td>
                            <td>
                                <?php 
                                  if($value['RiceDemo']['p_vendor_code']==null){
                                    echo $value['RiceDemo']['c_client_name_en'] .'  ('.$value['RiceDemo']['c_client_id'].')';
                                  }
                                  if($value['RiceDemo']['p_client_id']==null){
                                    echo $value['RiceDemo']['v_vendor_name_en'].'  ('.$value['RiceDemo']['v_vendor_code'].')';
                                  }
                                  
                                ?>
                            </td>
                            <td>
                              <?php 
                                  if($value['RiceDemo']['p_vendor_code']==null){
                                    echo 'Farmer';
                                  }
                                  if($value['RiceDemo']['p_client_id']==null){
                                    echo 'FBA';
                                  }
                                  
                                ?>
                            </td>
                            <td>
                              <?php 
                                  if($value['RiceDemo']['p_vendor_code']==null){
                                    echo $value['RiceDemo']['c_client_gender'];
                                  }
                                  if($value['RiceDemo']['p_client_id']==null){
                                    echo $value['RiceDemo']['v_vendor_gender'];
                                  }
                                  
                                ?>
                            </td>
                            <td><?php echo $value['RiceDemo']['ph_phum_code'];?></td>
                            <td><?php echo $value['RiceDemo']['ph_phum_name_en'];?></td>
                            <td><?php echo $value['RiceDemo']['khum_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['srok_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['khet_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['co_crop_name_en']?></td>
                            <td><?php echo $value['RiceDemo']['plot_type_treatment']?></td>
                            <td><?php echo $value['RiceDemo']['plot_size_m2']?></td>
                            <td><?php echo $value['RiceDemo']['plot_datestart']?></td>
                            <td><?php echo $value['RiceDemo']['plot_dateplanting']?></td>
                                                    
                        </tr>
                        <?php endforeach; ?> 
                        <?php if($count==0): ?>
                          <tr><td colspan="20"> <center>No Record</center></td>
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