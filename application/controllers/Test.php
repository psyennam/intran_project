<?php 
class Test extends ci_controller{
	function index(){
		require APPPATH.'libraries\tcpdf\tcpdf.php';
		$this->pdf=new TCPDF();
		$this->pdf->setPrintHeader(false);
		$this->pdf->setPrintFooter(false);
		$this->pdf->AddPage();

		$html = $this->abc();

		// Print text using writeHTMLCell()
		$this->pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$this->pdf->Output(time().'.pdf', 'I');
	}

	function abc(){
		$this->load->model('Client_model');
		$data['page']='admin/pages/view/client';
		$data['zonedetails']=$this->Client_model->viewzone();	
		$data['clientdetails']=$this->Client_model->view_client();
		return $this->load->view('admin/pages/view/client',$data, true);
	}


}