<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My404 extends CI_Controller {
public function __construct() {
		parent::__construct();

		$this->load->library('session');        
        $this->load->helper(array('form', 'url'));
		
	}
	
	public function index(){
	
		echo $this->load->view('my404');
	}
}