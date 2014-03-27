SELECT v.*,
loc.khet_name_en,
loc.srok_name_en,
loc.khum_name_en,
loc.phum_name_en
FROM vendors AS v
  LEFT JOIN vw_location AS loc
    ON v.phum_code = loc.phum_code
  WHERE v.vendor_type="fba"