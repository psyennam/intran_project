<?php 
class Test extends ci_controller{
	function index($id){
		require APPPATH.'libraries\tcpdf\tcpdf.php';
		$this->pdf=new TCPDF();
		$this->pdf->setPrintHeader(false);
		$this->pdf->setPrintFooter(false);
		$this->pdf->AddPage();
		// $this->pdf->AddPage('L', 'A4');
		//$id=1;
		$html = $this->abc($id);

		// Print text using writeHTMLCell()
		$this->pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$this->pdf->Output(time().'.pdf', 'I');
	}
	function exp($id){
		require APPPATH.'libraries\tcpdf\tcpdf.php';
		$this->pdf=new TCPDF();
		$this->pdf->setPrintHeader(false);
		$this->pdf->setPrintFooter(false);
		$this->pdf->AddPage();
		// $this->pdf->AddPage('L', 'A4');
		//$id=1;
		$html = $this->expense($id);

		// Print text using writeHTMLCell()
		$this->pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$this->pdf->Output(time().'.pdf', 'I');
	}
	function abc($id)
	{
		$this->load->model('Client_model');
		// $data['page']='admin/pages/view/client';
		$data['quotationdetails']=$this->Client_model->viewquotationbyid($id);
		// $data['clientdetails']=$this->Client_model->view_client();
				//$data['page']='admin/pages/view/pdf_genrator';
		return $this->load->view('pdf_genrator',$data,true);
	}
	function expense($id)
	{
		$this->load->model('Client_model');
		$data['expensedetails']=$this->Client_model->viewexpensebyid($id);
		//$data['page']='admin/pages/view/pdf_genrator';
		return $this->load->view('expense_genrator',$data,true);
	}

}