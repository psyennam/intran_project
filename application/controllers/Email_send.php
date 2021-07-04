<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_send extends CI_Controller {

	/*public function index()
	{
		$this->load->view('email_send');
	}*/
    public function verifyotp()
    {
        $this->load->view('admin/verifyotp');
        $email= $this->session->userdata('email');
        //echo $email;
        $randomid=random_string('numeric',6);
        $to =$email;  // User email pass here
        $subject = 'OTP';
        $from = 'yennam20@gmail.com';
        $emailContent=$randomid;            


    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = 'yennam20@gmail.com';    //Important
    $config['smtp_pass']    = '@vishalyennam11';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 

     

    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();

    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');   
    
    $this->session->set_userdata('randomid',$randomid);     
    redirect('Email_send/confirm');
    //$this->confirm($randomid);
    }
    public function confirm()
    {
        $this->load->view('admin/verifyotp');
        //$randomid=$this->session->flashdata('data_name');
        //echo $this->session->userdata('randomid');
        if($_POST)
        {
            $this->form_validation->set_rules('otp','OTP','required');
            if($this->form_validation->run()==FALSE)
            {
                echo validation_errors();
            }
            else
            {
                $otp=$this->input->post('otp');
                if($this->session->userdata('randomid')===$otp)
                {
                    redirect('User/forgetemployee');   
                }
                else
                {
                    echo "Otp is not valid";
                }
                
            }
        }
    }
}
?>