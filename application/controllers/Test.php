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
	function close($id){
		require APPPATH.'libraries\tcpdf\tcpdf.php';
		$this->pdf=new TCPDF();
		$this->pdf->setPrintHeader(false);
		$this->pdf->setPrintFooter(false);
		$this->pdf->AddPage();
		// $this->pdf->AddPage('L', 'A4');
		//$id=1;
		$html = $this->quotation_close($id);

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

	function quotation_close($id)
	{
		header("Content-type:application/pdf");
		// header("Content-Dispo/sition:attachment;filename='downloaded.pdf'");

		$this->load->model('Client_model');
		$data['closedetails']=$this->Client_model->view_close_quotation_by_id($id);
		$data['orgdetails']=$this->Client_model->fetch_organizationdetails();
		$data['supplierdetails']=$this->Client_model->fetch_supplierdetails($id);
		//$data['page']='admin/pages/view/pdf_genrator';
		$this->load->view('quotation_close',$data);
	}

}