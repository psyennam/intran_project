<?php defined('BASEPATH') OR exit('No direct script access allowed');

function org_info($org_id, $col = 'org_name'){
	$ci = &get_instance();
	return $ci->db->select($col)->where('org_code',$org_id)->get('organization')->row()->$col;
}