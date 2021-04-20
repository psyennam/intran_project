<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index($lang = 'en')
	{
		$this->lang->load('basic', $lang);
		echo $this->lang->line('first_name');
	}
}
