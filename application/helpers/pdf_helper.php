<?php defined('BASEPATH') OR exit('No direct script access allowed');

	function index(){
		require APPPATH.'libraries\tcpdf\tcpdf.php';
		$ci = &get_instance();
		$ci->pdf=new TCPDF();
		$ci->pdf->setPrintHeader(false);
		$ci->pdf->setPrintFooter(false);
		$ci->pdf->AddPage();

		$html = $ci->abc();

		// Print text using writeHTMLCell()
		$ci->pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$ci->pdf->Output(time().'.pdf', 'I');
	}

	function abc(){
		$ci = &get_instance();
		$ci->load->model('Client_model');
		$data['page']='admin/pages/view/client';
		$data['zonedetails']=$ci->Client_model->viewzone();	
		$data['clientdetails']=$ci->Client_model->view_client();
		return $ci->load->view('admin/pages/view/client',$data, true);
	}

?>

