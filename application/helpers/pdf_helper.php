<?php defined('BASEPATH') OR exit('No direct script access allowed');
// class Pdf_helper extends ci_controller{
	function index(){
		require APPPATH.'libraries\tcpdf\tcpdf.php';
		$ci = &get_instance();
		$ci->pdf=new TCPDF();
		$ci->pdf->setPrintHeader(false);
		$ci->pdf->setPrintFooter(false);
		//$ci->pdf->AddPage();
		//$ci->pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
		$ci->pdf->AddPage('L', 'A4');
		//$ci->pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
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
		$data['page']='admin/pages/view/pdf_genrator';
		return $ci->load->view('admin/pages/view/client',$data, true);
	}
// }
?>

