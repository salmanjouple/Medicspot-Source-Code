<?php
		
		/*
		* Some useful return methods:
		* return $query->row_array();
		* return $query->result_array();
		* echo $last_query = $this->db->last_query();
		*/
		
		class Ea_clinics_model extends CI_Model {

		public function __construct() {
			parent::__construct();
        	$this->load->database();
    	}
		var $id; var $cl_clinic_name; var $cl_address_line_1; var $cl_address_line_2; var $cl_postcode; var $cl_phone_number; var $cl_email_address; var $cl_description; var $cl_lat; var $cl_lng; var $cl_formatted_address;
		
		static $table = "ea_clinics";
	
		
		function insert($cl_clinic_name, $cl_address_line_1, $cl_address_line_2, $cl_postcode, $cl_phone_number, $cl_email_address, $cl_description, $cl_lat, $cl_lng, $cl_formatted_address) {
		$this->cl_clinic_name  = $cl_clinic_name;
			$this->cl_address_line_1  = $cl_address_line_1;
			$this->cl_address_line_2  = $cl_address_line_2;
			$this->cl_postcode  = $cl_postcode;
			$this->cl_phone_number  = $cl_phone_number;
			$this->cl_email_address  = $cl_email_address;
			$this->cl_description  = $cl_description;
			$this->cl_lat  = $cl_lat;
			$this->cl_lng  = $cl_lng;
			$this->cl_formatted_address  = $cl_formatted_address;
			
		$this->db->insert(self::$table, $this);
		return $this->db->insert_id();
		}
		
		function update($cl_clinic_id, $cl_clinic_name, $cl_address_line_1, $cl_address_line_2, $cl_postcode, $cl_phone_number, $cl_email_address, $cl_description, $cl_lat, $cl_lng, $cl_formatted_address) {
		$data = array(
		'cl_clinic_name' => $cl_clinic_name,
                    'cl_address_line_1' => $cl_address_line_1,
                    'cl_address_line_2' => $cl_address_line_2,
                    'cl_postcode' => $cl_postcode,
                    'cl_phone_number' => $cl_phone_number,
                    'cl_email_address' => $cl_email_address,
                    'cl_description' => $cl_description,
                    'cl_lat' => $cl_lat,
                    'cl_lng' => $cl_lng,
                    'cl_formatted_address' => $cl_formatted_address
                    );
		
		$this->db->where("id", $cl_clinic_id);
		return $this->db->update(self::$table, $data);
		}
		
		function delete($cl_clinic_id)
		{
	    $this->db->where("id", $cl_clinic_id);
		return $this->db->delete(self::$table);
		}

		function get_by_id($cl_clinic_id) {
        $query = $this->db->get_where(self::$table, array("id" => $cl_clinic_id));
		return $query->row_array();
		}

		function get_all(){
		return $this->db->get(self::$table)->result_array();
		}

		function get_by_postcode($cl_postcode){
			$result = $this->db->get_where(self::$table, array("cl_postcode" => $cl_postcode))->result_array();
			if(sizeof($result)>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}

		/*
		function dummy_function(){
			$result = $this->db->query("SELECT * FROM ".self::$table.";");
			return $result->result_array();
		}
		*/
		}
		?>