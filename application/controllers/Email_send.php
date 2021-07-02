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
        echo $this->session->userdata('randomid');
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
	/*public function send($otp)
	{
    $to =  $this->input->post('from');  // User email pass here
    $subject = 'OTP';

    $from = 'yennam20@gmail.com';              // Pass here your mail id

    //$emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://elevenstechwebtutorials.com/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    //$emailContent .='<tr><td style="height:20px"></td></tr>';


    //$emailContent .= $this->input->post('message');  //   Post message available here


    //$emailContent .='<tr><td style="height:20px"></td></tr>';
    //$emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://elevenstechwebtutorials.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.elevenstechwebtutorials.com</a></p></td></tr></table></body></html>";
    $emailContent=$otp;            


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
    //return redirect('Email_send/verifyotp');
	 }*/
}
?>