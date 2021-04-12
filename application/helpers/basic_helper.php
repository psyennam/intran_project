<?php defined('BASEPATH') OR exit('No direct script access allowed');

function org_info($org_id, $col = 'org_name'){
	$ci = &get_instance();
	return $ci->db->select($col)->where('org_code',$org_id)->get('organization')->row()->$col;
}

function get_title($code){
	$ci = &get_instance();
	$res = $ci->db->select('city')->where_in('city_code', explode(',', $code))->get('city')->result_array();
	$s = array_reduce($res, 'array_merge_recursive', array());
	return (is_array($s['city']))?implode(', ', $s['city']):$s['city'];
}

function __date_format($date, $type = false){
	switch ($type) {
		case 'ddmmyyyy':
			return date('d-m-Y', strtotime($date));
			break;
		
		default:
			return date('Y-m-d', strtotime($date));
			break;
	}
}

function is_status($sts){
	return ($sts == 0)?"Active":"In-active";
}

function json_response($data, $status){
	echo json_encode(['status'=>  $status, 'data' => $data]);
}