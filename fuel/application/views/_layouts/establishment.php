<?php
$CI =& get_instance();
$CI->load->helper('url');
$CI->load->database();
$url = $CI->uri->segment_array();

$url2 = array_splice($url, 1, 5);
//print_r($url2);
$built_url = '';
foreach($url2 as $b){
	$built_url.=$b.'/';
}
//echo $built_url;
$built_url = substr($built_url, 0, -1);
$built_url = rtrim($built_url,"/");
//echo $built_url;
//exit();
//$clinic_id = end($url);
//check clinic id exists
/*
$CI->load->model('ea_clinics_model');
$data = $CI->ea_clinics_model->get_by_id($clinic_id);
echo $clinic_id.'##';
print_r($data);
*/
$CI->db->select('*');
$CI->db->where('ea_clinics.url', $built_url);
$CI->db->or_where('ea_clinics.alias_url', $built_url);
$CI->db->or_where('ea_clinics.alias_url2', $built_url);
$CI->db->or_where('ea_clinics.alias_url3', $built_url);
$CI->db->or_where('ea_clinics.alias_url4', $built_url);

$CI->db->join('ea_settings', 'clinic_id=ea_clinics.id');
$data = $this->db->get('ea_clinics')->row_array();

if(sizeof($data)==0){
	show_404();
}

$clinic_id = $data['clinic_id'];

$this->load->view('_blocks/header', $data);

?>
<script language="javascript">
globals = {};
globals.lat = '<?php echo $data['cl_lat'];?>';
globals.lng = '<?php echo $data['cl_lng'];?>';

var clinic_id = '<?php echo $clinic_id;?>';

</script>
<?php
//print_r($data);
//exit();
			
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
?>


<page id="establishment">
	<section id="booking" class="text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php 
				if(!empty($data['h1_title'])){
				echo $data['h1_title'];
				} else {
				echo $data['cl_clinic_name'];
				}
					?></h1>
				<p class="subtitle">Digital Private GP Walk in Centre</p>
			</div>
			<div class="booking-wrapper w-show-panel">
				<div class="booking-content show-panel">
					<?php $this->load->view('general/booking-wrapper')?>
				</div>
			</div>
			<div style="display:none;">
				<input type="text" name="lat" id="lat" value="">
				<input type="text" name="lng" id="lng" value="">
			</div>
		</div>
	</section>

	<section id="establishment-info">
		<div class="container">
			<h1><?php echo $data['cl_clinic_name'];?></h1>
			<div class="establishment-info">
				<div class="establishment-meta">
					<div class="establishment-meta-info">
						<i class="fa fa-map-marker" title="Location"></i>
						<span><?php echo $data['cl_formatted_address'];?></span>
					</div>
					<div class="establishment-meta-info">
						<i class="fa fa-phone" title="Phone Number"></i>
						<span><?php echo $data['cl_phone_number'];?></span>
					</div>
					<div class="establishment-meta-info">
						<i class="fa fa-clock-o" title="Opening Times"></i>
						<span>
							<strong>Opening Times</strong><br>
							<?php echo $data['opening_hours'];?>
						</span>
					</div>
					<div class="establishment-meta-info">
						<i class="fa fa-envelope" title="Email Address"></i>
						<span>
							<a href="mailto:<?php echo $data['cl_email_address'];?>"><?php echo $data['cl_email_address'];?></a>
						</span>
					</div>
				</div>
				<div class="establishment-content">
					<?php echo $data['cl_description'];?>
				</div>
			</div>
			<?php //print_r($data);?>
			<div class="establishment-info-photos">
				<div class="photo-wrapper">
					<?php if($data['1_image']!=''){?>
					<div class="photo" style="background-image: url(<?php echo base_url('assets/images/'.$data['1_image']);?>)"></div>
					<?php } ?>
				</div>
				<div class="photo-wrapper">
					<?php if($data['2_image']!=''){?>
					<div class="photo" style="background-image: url(<?php echo base_url('assets/images/'.$data['2_image']);?>)"></div>
					<?php } ?>
				</div>
				<div class="photo-wrapper">
					<?php if($data['3_image']!=''){?>
					<div class="photo" style="background-image: url(<?php echo base_url('assets/images/'.$data['3_image']);?>)"></div>
					<?php } ?>
				</div>
			</div>
			
		</div>
	</section>

	<section id="logos-qa">
		<div class="container">
			<div class="logos-list">
				<img src="<?php echo base_url('assets/images/logo/logo-st.png');?>" title="Secure &amp; trusted">
				<img src="<?php echo base_url('assets/images/logo/logo-gmc.png');?>" title="General Medical Council">
				<img src="<?php echo base_url('assets/images/logo/logo-ico.png');?>" title="Information Commissioner’s Office">
				<img src="<?php echo base_url('assets/images/logo/logo-cqc.png');?>" title="CareQuality Commission">
			</div>
		</div>
	</section>

	<section id="testimonials" class="testimonials">
		<div class="container">
			<div class="testimonials-header">
				<hr class="testimonails-header-line">
				<i class="fa fa-quote-left"></i>
				<hr class="testimonails-header-line">
			</div>
			<div class="testimonials-quotes testimonials-slicky">

				<?php
					$CI =& get_instance();
					$CI->load->database();
					$CI->db->select('*');
					$CI->db->where('published','yes');
					$test = $CI->db->get('testimonials')->result_array();
				
					foreach($test as $t){
				?>
				<div>
					<blockquote>
						<p>
							“<?php echo $t['desc'];?>”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/images/').$t['avatar_image'];?>">
							<div class="testimony-name"><?php echo $t['name'];?></div>
							<!--<div class="testimony-profession">Tourist</div>-->
						</footer>
					</blockquote>
				</div>
				<?php } ?>

			</div>
		</div>
	</section>

	<section id="steps" class="steps">
		<div class="container">
			<ul class="steps-list">
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/images/icons/i-book.png');?>">
					<h3>Book online to visit a Medicspot Digital Clinic</h3>
					<p>Book online to visit one of our Pharmacy Digital Medicspot Clinics</p>
				</li>
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/images/icons/i-doctor.png');?>">
					<h3>Consult With Our Qualified Doctors</h3>
					<p>Video chat and state-of-the-art remote examination with our expert GP’s.</p>
				</li>
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/images/icons/i-prescription.png');?>">
					<h3>Pick Up Your Prescription Straightaway</h3>
					<p>Get prescribe you medication which you can pick up on your way out.</p>
				</li>
			</ul>
		</div>
	</section>

	<section id="can-treat" class="treat-section">
		<div class="container">
			<h1>What Can We Help With?</h1>
			<ul class="treat-list">
				<?php
					$CI =& get_instance();
					$CI->load->database();
					$CI->db->select('*');
					$CI->db->where('can_treat','yes');
					$CI->db->where('published','yes');
					$treats = $CI->db->get('what_we_treats')->result_array();
				
					foreach($treats as $t){
				?>
				<li>
					<h3><?php echo $t['name'];?></h3>
					<p><?php echo $t['desc'];?></p>
				</li>
				<?php } ?>
			</ul>
		</div>
	</section>

	<section id="we-can-also">
		<div class="container">
			<div class="we-can-also">
				<img src="<?php echo base_url('assets/images/icons/i-prescription.png');?>">
				<div class="we-can-also-content">
					We can also help to provide prescription requests, sick notes and specialists referrals, whilst being able to support a range of other symptoms.
				</div>
			</div>
		</div>
	</section>

	<section id="steps-additional" class="steps">
		<div class="container">
			<ul class="steps-list">
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/images/icons/i-search.png');?>">
					<h3>Select Another Branch</h3>
					<p>
						MedicSpot has a growing network of walk-in clinics across London and nationwide. You can use our location checker to find your nearest MedicSpot Clinic so you can have the ease and convenience that you deserve.
					</p>
					<a href="<?php echo base_url();?>" class="btn s-link">
						Search Now
						<i class="fa fa-long-arrow-right"></i>
					</a>
				</li>
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/images/icons/i-faq.png');?>">
					<h3>Read Our FAQ’s</h3>
					<p>
						MedicSpot is a revolutionary new service which gives you the healthcare and access to doctors that you deserve. We have prepared a range of Frequently Asked Questions to answer any questions you may have in using MedicSpot.
					</p>
					<a href="<?php echo base_url('/faq');?>" class="btn s-link">
						Browse Now
						<i class="fa fa-long-arrow-right"></i>
					</a>
				</li>
			</ul>
		</div>
	</section>
</page>

<script language="javascript">
	var place, marker;
	var markerArray = {};
	function booking_Map() {
		var zoom = 7;
		if(typeof globals.lat!=="undefined"){
			place = {
				lat: parseFloat(globals.lat),
				lng: parseFloat(globals.lng)
			};
			zoom = 16;
		}else{
			place = {
				lat: parseFloat(51.5259704),
				lng: parseFloat(-0.1660516)
			};
		}
		//alert(place.lat);
		map = new google.maps.Map(document.getElementById('booking-map'), {
			scrollwheel: false,
			zoom: zoom,
			center: place,
			draggable: true,
			gestureHandling: 'cooperative'
		});

		markerIcon = new google.maps.MarkerImage(
			'<?php echo base_url('assets/images/map-marker.png');?>',
			new google.maps.Size(32, 32),
			new google.maps.Point(0, 0),
			new google.maps.Point(16, 16),
			new google.maps.Size(32, 32)
		);
		
		// Add Markers.
		<?php
		$CI->db->select('*');
		$result = $CI->db->get('ea_clinics')->result_array();
		$i = 0;
		foreach($result as $r){
		?>
		marker<?php $i;?> = new google.maps.Marker({
			position: {
				lat: parseFloat(<?php echo $r['cl_lat'];?>),
				lng: parseFloat(<?php echo $r['cl_lng'];?>)
			},
			icon: markerIcon,
			map: map
		});
		marker<?php $i;?>.addListener('click', function() {
         	map.setCenter(marker<?php $i;?>.getPosition());
         	$('#booking_tab').trigger('click');
         	//alert(<?php echo $r['id'];?>)
         	loadClinicData(<?php echo $r['id'];?>);
		 	booking_SelectEstablishment();
		 	getAppointmentTimes(<?php echo $r['id'];?>, '<?php echo date('d-m-Y', strtotime('now'));?>');	


        });
        markerArray[<?php echo $r['id'];?>] = marker<?php $i;?>;
		<?php 
		$i++;
		} ?>
	}
</script>

<?php $this->load->view('_blocks/footer')?>
