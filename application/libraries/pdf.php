<?php
	require APPPATH.'libraries\tcpdf\tcpdf.php';
	Class Pdf {
		private $pdf;
		function file(){
			$this->pdf = new TCPDF();
		}
	}