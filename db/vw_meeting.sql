SELECT 
m.meeting_id,
m.meeting_date,
m.meeting_responsible_staff,
m.meeting_subject,
CONCAT(loc.khet_name_en," , ",loc.srok_name_en," , ",loc.khum_name_en," , ", loc.phum_name_en) AS meeting_location,
IFNULL(c.client_name_en,IFNULL(v.vendor_name_en,nc.nonclient_name_en )) AS participant_name_en,
IFNULL(c.client_gender,IFNULL(v.vendor_gender,nc.nonclient_gender)) AS participant_gender,
IF(ISNULL(c.client_id),IF(ISNULL(v.vendor_code),IF(ISNULL(nc.nonclient_id),NULL,"nonclient"),"fba"),"client") AS ftype,
IFNULL(ven_loc.phum_code,c_loc.phum_code) AS phum_code,
IFNULL(ven_loc.phum_name_en,c_loc.phum_name_en) AS phum_name_en,
IFNULL(ven_loc.khum_name_en,c_loc.khum_name_en) AS khum_name_en,
IFNULL(ven_loc.srok_name_en,c_loc.srok_name_en) AS srok_name_en,
IFNULL(ven_loc.khet_name_en,c_loc.khet_name_en) AS khet_name_en,
IFNULL(ven_c.vendor_name_en,v.vendor_name_en) AS fba

FROM meetings AS m
  LEFT JOIN clientmeetings AS cm
    ON m.meeting_id = cm.meeting_id
  LEFT JOIN clients AS c
    ON c.client_id = cm.client_id
  LEFT JOIN vendors AS v
    ON v.vendor_code = cm.vendor_code
  LEFT JOIN nonclients AS nc
    ON nc.nonclient_id = cm.nonclient_id
  LEFT JOIN clientvendors AS cv ON cv.client_id=c.client_id
  LEFT JOIN vendors AS ven_c ON ven_c.vendor_code=cv.vendor_code
  LEFT JOIN vw_location AS loc ON loc.phum_code=m.phum_code
  LEFT JOIN vw_location AS ven_loc ON ven_loc.phum_code=v.phum_code
  LEFT JOIN vw_location AS c_loc ON c_loc.phum_code = c.phum_code
  LEFT JOIN vw_location AS vl ON vl.phum_code=m.phum_code
  