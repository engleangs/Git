SELECT
  t.training_id,
  t.training_responsible_staff,  
  IFNULL(IFNULL(c.client_name_en,v.vendor_name_en),n.nonclient_name_en)AS participant_name,
  IFNULL(IFNULL(c.client_gender,v.vendor_gender),n.nonclient_gender) AS participant_gender,    
  rw.riceweek_id,
  vw.vegetableweek_id,
  cr.crop_code,
  cr.crop_type, 
  t.training_datestart,
  t.training_datefinish,   
  IF(ISNULL(c.client_id),IF(ISNULL(v.vendor_code),IF(ISNULL(n.nonclient_id),NULL,"nonclient"),"fba"),"client") AS ftype,
  IFNULL( rw.week_trainer, vw.week_trainer) AS week_trainer,
  IFNULL(rw.week_topic1, vw.week_topic1) AS week_topic1,
  IFNULL(rw.week_topic2, vw.week_topic2) AS week_topic2,
  IFNULL(rw.week_topic3, vw.week_topic3) AS week_topic3,
  IFNULL(rw.week_topic4, vw.week_topic4) AS week_topic4,
  IFNULL(rw.week_date, vw.week_date) AS week_date,
  CONCAT(vw_loc.khet_name_en,",",vw_loc.srok_name_en,",",vw_loc.khum_name_en,",",vw_loc.phum_name_en) AS training_location,
  IFNULL(cl_loc.phum_name_en,vn_loc.phum_name_en) AS phum_name_en,
  IFNULL(cl_loc.khum_name_en,vn_loc.khum_name_en) AS khum_name_en,
  IFNULL(cl_loc.srok_name_en,vn_loc.srok_name_en) AS srok_name_en,
  IFNULL(cl_loc.khet_name_en,vn_loc.khet_name_en) AS khet_name_en,
  IFNULL(ven_c.vendor_name_en,v.vendor_name_en) AS fba
FROM trainings AS t
  LEFT JOIN crops AS cr
    ON t.crop_code = cr.crop_code
  LEFT JOIN riceweeks AS rw
    ON (rw.training_id = t.training_id
        AND cr.crop_type = 'rice')
  LEFT JOIN vegetableweeks AS vw
    ON (vw.training_id = t.training_id
        AND cr.crop_code = 'vegetable')
  LEFT JOIN clienttrainings AS ct
    ON t.training_id = ct.training_id
  LEFT JOIN clients AS c
    ON ct.client_id = c.client_id
  LEFT JOIN nonclients AS n
    ON ct.nonclient_id = n.nonclient_id
  LEFT JOIN vendors AS v
    ON v.vendor_code = ct.vendor_code
  LEFT JOIN clientvendors AS cv
    ON cv.client_id = c.client_id
  LEFT JOIN vendors AS ven_c
    ON ven_c.vendor_code = cv.vendor_code
  LEFT JOIN vw_location AS vw_loc
    ON t.phum_code = vw_loc.phum_code
  LEFT JOIN vw_location AS cl_loc
  ON cl_loc.phum_code=c.phum_code
  LEFT JOIN vw_location AS vn_loc 
  ON vn_loc.phum_code=v.phum_code