<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		class Clinics_info extends CI_Controller {
			public function __construct() {
        		parent::__construct();
        		$this->load->model("ea_clinics_model");

        		$this->load->library('session');
        		$this->load->library('form_validation');

        		$this->api_key = $this->config->item('google_maps_api_key');

				// Set user's selected language.
		        if ($this->session->userdata('language')) {
		        	$this->config->set_item('language', $this->session->userdata('language'));
		        	$this->lang->load('translations', $this->session->userdata('language'));
		        } else {
		        	$this->lang->load('translations', $this->config->item('language')); // default
		        }
			}

			/*
			public function index(){
				$this->load->view("/welcome_message.php");
			}
			*/
			public function index(){

				$r = $this->uri->segment_array();
				$record_num = end($r);

				if(is_numeric($record_num)){
					$view = $this->ea_clinics_model->get_by_id($record_num);
				}
				
				$this->session->set_userdata('dest_url', site_url('backend/settings'));
		        if (!$this->_has_privileges(PRIV_SYSTEM_SETTINGS, FALSE)
		                && !$this->_has_privileges(PRIV_USER_SETTINGS)) return;

		        $this->load->model('settings_model');
		        $this->load->model('user_model');

		        $this->load->library('session');
		        $user_id = $this->session->userdata('user_id');

		        $view['base_url'] = $this->config->item('base_url');
		        $view['user_display_name'] = $this->user_model->get_user_display_name($user_id);
		        $view['active_menu'] = PRIV_SYSTEM_SETTINGS;
		        $view['company_name'] = $this->settings_model->get_setting('company_name');
		        $view['date_format'] = $this->settings_model->get_setting('date_format');
		        $view['role_slug'] = $this->session->userdata('role_slug');
		        $view['system_settings'] = $this->settings_model->get_settings();
		        $view['user_settings'] = $this->user_model->get_settings($user_id);
		        $this->set_user_data($view);

		        //print_r($view);

				$this->load->view('backend/header', $view);
        		$this->load->view('backend/clinics/clinic_form', $view);
        		$this->load->view('backend/footer', $view);
			}


			public function update() {

				$this->form_validation->set_rules('cl_clinic_name', 'Clinic Name', 'required');
				$this->form_validation->set_rules('cl_address_line_1', 'Address Line 1', 'required');
				$this->form_validation->set_rules('cl_postcode', 'Postcode', 'required');
				$this->form_validation->set_rules('cl_phone_number', 'Phone Number', 'required');
				$this->form_validation->set_rules('cl_email_address', 'Email Address', 'required');
				//$this->form_validation->set_rules('cl_lat', 'Lat', 'required');
				//$this->form_validation->set_rules('cl_lng', 'Lng', 'required');
				$_lat = '';
				$_lng = '';
				$formatted_address = '';
				if ($this->form_validation->run() == FALSE){
					echo json_encode(array('status'=>0,'msg'=>validation_errors()));
					exit();
				}else{
					if(($_POST['cl_address_line_1']!='')&&($_POST['cl_postcode']!='')){
						$address_string = $_POST['cl_clinic_name'].','.$_POST['cl_address_line_1'].','.$_POST['cl_postcode'].',United Kingdom';
						$other_address_string = $_POST['cl_address_line_1'].','.$_POST['cl_postcode'].',United Kingdom';


						//echo 'https://maps.googleapis.com/maps/api/geocode/json?key='.$this->api_key.'&address='.urlencode($address_string);
						$b = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key='.$this->api_key.'&address='.urlencode($address_string));
						$a = json_decode($b,TRUE);

						if($a['status']=='ZERO_RESULTS'){
							//try again but without the clinic name
							$b = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key='.$this->api_key.'&address='.urlencode($other_address_string));
							$a = json_decode($b,TRUE);

							if($a['status']=='ZERO_RESULTS'){
								$status = 0;
								echo json_encode(array('status'=>0,'msg'=>$this->lang->line('clinic_address_not_found')));
								exit();
							}else{
								if($a['results'][0]['geometry']['location']['lat']!=''){
									$_lat = $a['results'][0]['geometry']['location']['lat'];
								}
								if($a['results'][0]['geometry']['location']['lng']!=''){
									$_lng = $a['results'][0]['geometry']['location']['lng'];
								}
								$formatted_address = $a['results'][0]['formatted_address'];
							}
						}else{
							if($a['results'][0]['geometry']['location']['lat']!=''){
								$_lat = $a['results'][0]['geometry']['location']['lat'];
							}
							if($a['results'][0]['geometry']['location']['lng']!=''){
								$_lng = $a['results'][0]['geometry']['location']['lng'];
							}
							$formatted_address = $a['results'][0]['formatted_address'];
						}
					}
					if($this->input->post('cl_clinic_id')!=''){
						//update
						$cl_clinic_id = $this->input->post("cl_clinic_id");
						$cl_clinic_name = $this->input->post("cl_clinic_name");
						$cl_address_line_1 = $this->input->post("cl_address_line_1");
						$cl_address_line_2 = $this->input->post("cl_address_line_2");
						$cl_postcode = $this->input->post("cl_postcode");
						$cl_phone_number = $this->input->post("cl_phone_number");
						$cl_email_address = $this->input->post("cl_email_address");
						$cl_description = $this->input->post("cl_description");
						
					    $query_result = $this->ea_clinics_model->update($cl_clinic_id, $cl_clinic_name, $cl_address_line_1, $cl_address_line_2, $cl_postcode, $cl_phone_number, $cl_email_address, $cl_description, $_lat, $_lng, $formatted_address);
			            if($query_result)
					    {
						    echo json_encode(array('status'=>1,'msg'=>$this->lang->line('success')));
							exit();
					    }
					    echo json_encode(array('status'=>0,'msg'=>$this->lang->line('success')));
						exit();

					}else{
						//add
						$cl_clinic_name = $this->input->post("cl_clinic_name");
						$cl_address_line_1 = $this->input->post("cl_address_line_1");
						$cl_address_line_2 = $this->input->post("cl_address_line_2");
						$cl_postcode = $this->input->post("cl_postcode");
						$cl_phone_number = $this->input->post("cl_phone_number");
						$cl_email_address = $this->input->post("cl_email_address");
						$cl_description = $this->input->post("cl_description");
						
						if($this->ea_clinics_model->get_by_postcode($cl_postcode)==TRUE){
							echo json_encode(array('status'=>0,'msg'=>$this->lang->line('postcode_exists')));
							exit();
						}
					    $query_result = $this->ea_clinics_model->insert($cl_clinic_name, $cl_address_line_1, $cl_address_line_2, $cl_postcode, $cl_phone_number, $cl_email_address, $cl_description, $_lat, $_lng, $formatted_address);
			            if($query_result)
					    {
						    echo json_encode(array('status'=>1,'msg'=>$this->lang->line('success')));
							exit();
					    }

					    echo json_encode(array('status'=>0,'msg'=>$this->lang->line('success')));
						exit();
					}
				}
			}
		
		
			public function delete($cl_clinic_id)
			{
	            $query_result = $this->ea_clinics_model->delete($cl_clinic_id);
	            if($query_result)
	            {
	                redirect(base_url("Clinics"));
	            }
	            redirect(base_url("Clinics"));
			}

			public function get_by_id($cl_clinic_id) {
	            $result = $this->ea_clinics_model->get_by_id($cl_clinic_id);
			    $data["result"]= $result;
	            $this->load->view("/welcome_message.php",$data);
			}

			public function get_all(){
			    $result = $this->ea_clinics_model->get_all();
			    $data["result"]= $result;
	            $this->load->view("/welcome_message.php",$data);
			}

			public function get_clinics(){
				$data['results'] = $this->ea_clinics_model->get_all();
				$this->load->view("backend/clinics/clinic_part",$data);
			}

			//this should be moved into a model
			protected function _has_privileges($page, $redirect = TRUE) {
		        // Check if user is logged in.
		        $user_id = $this->session->userdata('user_id');
		        if ($user_id == FALSE) { // User not logged in, display the login view.
		            if ($redirect) {
		                header('Location: ' . site_url('user/login'));
		            }
		            return FALSE;
		        }

		        // Check if the user has the required privileges for viewing the selected page.
		        $role_slug = $this->session->userdata('role_slug');
		        $role_priv = $this->db->get_where('ea_roles', array('slug' => $role_slug))->row_array();
		        if ($role_priv[$page] < PRIV_VIEW) { // User does not have the permission to view the page.
		             if ($redirect) {
		                header('Location: ' . site_url('user/no_privileges'));
		            }
		            return FALSE;
		        }

		        return TRUE;
		    }

		    /**
		     * Set the user data in order to be available at the view and js code.
		     *
		     * @param array $view Contains the view data.
		     */
		    protected function set_user_data(&$view) {
		        $this->load->model('roles_model');

		        // Get privileges
		        $view['user_id'] = $this->session->userdata('user_id');
		        $view['user_email'] = $this->session->userdata('user_email');
		        $view['role_slug'] = $this->session->userdata('role_slug');
		        $view['privileges'] = $this->roles_model->get_privileges($this->session->userdata('role_slug'));
		    }
}
?>