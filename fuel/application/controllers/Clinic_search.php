<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Appointments Controller
 *
 * @package Controllers
 */
class Clinic_search extends CI_Controller {

	public function __construct() {		
		parent::__construct();		
		$this->load->library('session');
        $this->load->helper('installation');
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->database();

        // Set user's selected language.
		if ($this->session->userdata('language')) {
			$this->config->set_item('language', $this->session->userdata('language'));
			$this->lang->load('translations', $this->session->userdata('language'));
		} else {
			$this->lang->load('translations', $this->config->item('language')); // default
		}
		// Common helpers
		$this->load->helper('google_analytics');
	}

	function search(){

		$this->form_validation->set_rules('lat', 'Lat', 'required|numeric');
		$this->form_validation->set_rules('lng', 'Lng', 'required|numeric');

		if ($this->form_validation->run() == FALSE){

			exit();
		}else{
			
			$sql = 'SELECT *, ST_Distance_Sphere(point(cl_lat, cl_lng), point('.$this->input->post('lat').','.$this->input->post('lng').'))/1000 as distance FROM `ea_clinics` ORDER BY distance ASC LIMIT 3';
			
			$results = $this->db->query($sql)->result_array();			
			foreach($results as $r){
			?>

			<div class="suggestion" data-id="<?php echo $r['id'];?>" data-lat="<?php echo $r['cl_lat'];?>" data-lng="<?php echo $r['cl_lng'];?>">
					<div class="booking-details-row">
						<div class="details-name"><?php echo $r['cl_clinic_name'];?></div>
						<div class="details-address"><?php echo $r['cl_formatted_address'];?></div>
						<div class="details-distance"><?php echo floor($r['distance']);?> km</div>
					</div>
					<div class="booking-details-action">
						<i class="fa fa-chevron-circle-right"></i>
					</div>
			</div>
			<?php
			}
		}
	}

	function postcode_search(){

		$this->form_validation->set_rules('postcode', 'Postcode', 'required');

		if ($this->form_validation->run() == FALSE){
			exit();
		}else{


			$address_string = urlencode(trim($this->input->post('postcode')));
			//echo 'https://maps.googleapis.com/maps/api/geocode/json?key='.$api_key.'&address='.$address_string;
			$b = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key='.$this->config->item('google_maps_api_key').'&address='.$address_string);
			//echo '#';
			//print_r($b);
			//echo '#';
			$a = json_decode($b,TRUE);
			//print_r($a);
			
			$insert['search'] = trim($this->input->post('postcode'));
			$insert['date'] = strtotime('now');
			$this->db->insert('search', $insert);
			
			if($a['status']=='ZERO_RESULTS'){
				//$status = 0;
				
				exit();
			}else{
				if($a['results'][0]['geometry']['location']['lat']!=''){
					$_lat = $a['results'][0]['geometry']['location']['lat'];
				}
				if($a['results'][0]['geometry']['location']['lng']!=''){
					$_lng = $a['results'][0]['geometry']['location']['lng'];
				}
				//$status = 1;
				
				$sql = 'SELECT *, ST_Distance_Sphere(point(cl_lat, cl_lng), point('.$_lat.','.$_lng.'))/1000 as distance FROM `ea_clinics` WHERE (ST_Distance_Sphere(point(cl_lat, cl_lng), point('.$_lat.','.$_lng.'))/1000)<100 ORDER BY distance ASC LIMIT 3';
				$results = $this->db->query($sql)->result_array();
				foreach($results as $r){
				?>

				<div class="suggestion" data-id="<?php echo $r['id'];?>" data-lat="<?php echo $r['cl_lat'];?>" data-lng="<?php echo $r['cl_lng'];?>">
						<div class="booking-details-row">
							<div class="details-name"><?php echo $r['cl_clinic_name'];?></div>
							<div class="details-address"><?php echo $r['cl_formatted_address'];?></div>
							<div class="details-distance"><?php echo floor($r['distance']);?> km</div>
						</div>
						<div class="booking-details-action">
							<i class="fa fa-chevron-circle-right"></i>
						</div>
				</div>
				<?php
				}

			}
		}

		//echo json_encode(array('status'=>$status,'lat'=>$a['results'][0]['geometry']['location']['lat'],'lng'=>$a['results'][0]['geometry']['location']['lng'],'map'=>'<img src="https://maps.googleapis.com/maps/api/staticmap?key='.$api_key.'&center='.$_lat.','.$_lng.'&zoom=15&size=300x300&maptype=roadmap&markers=color:red%7Clabel:C%7C'.$_lat.','.$_lng.'">'));
	}

	function clinic_data(){
		$this->form_validation->set_rules('clinic_id', 'Clinic ID', 'required|numeric');

		if ($this->form_validation->run() == FALSE){
			exit();
		}else{
			$this->db->select('*, 1_image as image1, 2_image as image2, 3_image as image3');
			$this->db->where('ea_clinics.id', $this->input->post('clinic_id'));
			$this->db->join('ea_settings', 'clinic_id=ea_clinics.id');
			$data = $this->db->get('ea_clinics')->row_array();
			
			$opening_hours = '';
			$opening_hours_array = json_decode(str_replace('\"','',$data['value']), JSON_UNESCAPED_SLASHES);
			$opening_hours.='<table cellpadding="10" cellspacing="10">';
			foreach($opening_hours_array as $key=>$value){
				if(empty($value['start'])){
					$opening_hours.='<tr><td>'.ucfirst($key).':</td><td> Closed</td></tr>';
				}else{
					$opening_hours.='<tr><td>'.ucfirst($key).':</td><td> '.$value['start'].' to '.$value['end']. ' </td></tr>';
				}
			}
			$opening_hours.='</table>';
			$data['opening_hours'] = $opening_hours;

			echo json_encode($data);
		}
	}
	
	public function glasgow(){
	echo 'hello';
	}
}