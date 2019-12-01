<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginIssueController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function report_login_issue(){
        $this->load->view('front-end/LoginIssue/report_login_issue');
    }
    
    public function send_login_issue_mail(){
        
        $email_from=$this->input->post('email', true);
        $message=$this->input->post('message', true);

        $config['useragent'] = 'CodeIgniter';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.optest.therssoftware.com';
        $config['smtp_user'] = 'support@optest.therssoftware.com';
        $config['smtp_pass'] = '#D2HqRkm?4A-';
        $config['smtp_port'] = 26;
        $config['smtp_timeout'] = 5;
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['bcc_batch_mode'] = FALSE;
        $config['bcc_batch_size'] = 200;
        $this->email->initialize($config);

        $this->email->from('support@optest.therssoftware.com');
        $this->email->to('tnewbon@comcast.net');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');
        $this->email->subject('Intranet Login Issues');
        $this->email->message(' '.$message.' ');

        $this->email->send();
        
        $data= 'E-mail send successfully';
    
        echo json_encode($data);
    }
}
