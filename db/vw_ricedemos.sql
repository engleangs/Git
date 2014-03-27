DELIMITER $$

USE `ide`$$

DROP VIEW IF EXISTS `vw_ricedemos`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ricedemos` AS (
SELECT 
p.client_id AS p_client_id,
p.plot_centroid_x AS plot_centroid_x,
p.plot_crop_cycle AS plot_crop_cycle,
p.plot_dateplanting AS plot_dateplanting,
p.plot_datestart AS plot_datestart,
p.plot_type_treatment AS plot_type_treatment,
p.plot_size_m2 AS plot_size_m2,
p.vendor_code AS p_vendor_code,
pr.project_name_en AS pr_project_name_en,
cv.vendor_code AS cv_vendor_code,
v.vendor_name_en AS v_vendor_name_en,
v.vendor_code AS v_vendor_code,
v.vendor_gender AS v_vendor_gender,
v.branch_manager AS v_branch_manager,
v.phum_code AS v_phum_code,
c.client_id AS c_client_id,
c.client_name_en AS c_client_name_en,
c.client_gender AS c_client_gender,
c.phum_code AS c_phum_code,
co.crop_code AS co_crop_code,
co.crop_name_en AS co_crop_name_en,
co.crop_season AS co_crop_season,
co.crop_type AS co_crop_type,
co.product_code AS co_product_code,
ph.phum_code AS ph_phum_code,
ph.phum_name_en AS ph_phum_name_en,
ph.khum_code AS ph_khum_code,
kh.srok_code AS kh_srok_code,
kh.khum_code AS kh_khum_code,
kh.khum_name_en AS khum_name_en,
sr.srok_code AS sr_srok_code,
sr.srok_name_en AS srok_name_en,
sr.khet_code AS sr_khet_code,
kt.khet_code AS kt_khet_code,
kt.khet_name_en AS khet_name_en,
ven_client.vendor_code AS ven_client_vendor_code,
ven_client.vendor_name_en AS ven_client_vendor_name_en,
ven_client.vendor_gender AS ven_client_vendor_gender,
ven_client.branch_manager AS ven_client_branch_manager ,
ven_ca.vendor_code  AS ven_ca_vendor_code,
ven_ca.vendor_name_en AS ven_ca_vendor_name_en,
ven_ca.vendor_gender AS ven_ca_vendor_gender,
ven_ca.branch_manager AS ven_ca_branch_manager,
ven_v.vendor_name_en AS ven_v_name_en,
ven_v.vendor_gender AS ven_v_gender,
ven_v.branch_manager AS ven_v_branch_manager
FROM 	plots AS  p 
LEFT JOIN vendors AS  v ON	p.vendor_code = v.vendor_code	
LEFT JOIN clients AS  c ON	 p.client_id = c.client_id											
LEFT JOIN clientvendors AS  cv ON	cv.client_id = c.client_id								
LEFT JOIN vendors AS  ven_client ON	ven_client.vendor_code = cv.vendor_code 
LEFT JOIN fbas AS fba ON fba.fba_code = ven_client.vendor_code 
LEFT JOIN vendors AS ven_ca ON ven_ca.vendor_code=fba.ca_code
LEFT JOIN fbas AS fbav ON fbav.fba_code = v.vendor_code
LEFT JOIN vendors AS ven_v ON ven_v.vendor_code=fbav.ca_code
LEFT JOIN crops AS  co ON	p.crop_code = co.crop_code  
LEFT JOIN projects AS  pr ON pr.project_id = p.project_id
INNER JOIN phums AS  ph ON	(ph.phum_code = c.phum_code	 OR v.phum_code = ph.phum_code)
INNER JOIN khums AS  kh ON	ph.khum_code = kh.khum_code	 
INNER JOIN sroks AS  sr ON	sr.srok_code = kh.srok_code
INNER JOIN khets AS  kt ON	kt.khet_code = sr.khet_code
WHERE 	(co.crop_type = 'rice')	

)$$

DELIMITER ;