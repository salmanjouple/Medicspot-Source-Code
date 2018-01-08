<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Appointments Controller
 *
 * @package Controllers
 */
class Contact_us extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->library('session');
        $this->load->helper('installation');
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->database();
		// Common helpers
		$this->load->helper('google_analytics');
		$this->load->library('email');
	}

	function index(){

		$this->form_validation->set_rules('first-name', 'First Name', 'required');
		$this->form_validation->set_rules('last-name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		//echo $this->config->item('from');
        if ($this->form_validation->run() != FALSE){
        	$email_setting  = array('mailtype'=>'html');
			$this->email->initialize($email_setting);
        	
        	$this->email->from($this->config->item('from'), 'Medicspot Contact Form');
			$this->email->to('info@medicspot.co.uk');
			$this->email->bcc('medicspotmarketing@gmail.com');
			$this->email->subject('Medicspot Contact Form');
			$html = 'First Name: '.$this->input->post('first-name').'<br>Last Name: '.$this->input->post('last-name').'<br>Email: '.$this->input->post('email').'<br>Message: '.$this->input->post('message');
			$this->email->message($html);
			$this->email->send();
			echo json_encode(array('status'=>1));
        }else{
        	echo json_encode(array('status'=>0));
        }
	}

}