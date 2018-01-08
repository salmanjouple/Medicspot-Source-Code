<?php $this->load->view('_blocks/header')?>
<script type="text/javascript">
if ($(window).width() < 767) {
					$.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ", function (data, textStatus, jqxhr) {						
					});
				} else {
					$.getScript("http://maps.googleapis.com/maps/api/js?key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ", function (data, textStatus, jqxhr) {						
					});
				}  
</script>
<script language="javascript">
var clinic_id = '';
</script>
<page id="home">
	<section id="booking" class="text-section">
		<div class="container">
			<div class="section-header">
				<h1>Find your Nearest MedicSpot Clinic and Book Instantly</h1>
				<p class="subtitle">Revolutionary online doctor consultation from your local pharmacy.</p>
			</div>
			<form id="booking-form">
				<div class="booking-wrapper">
					<div class="booking-content">
						<?php $this->load->view('general/booking-wrapper')?>
					</div>
				</div>
				<div style="display:none;">
					<input type="text" name="lat" id="lat" value="">
					<input type="text" name="lng" id="lng" value="">
				</div>
			</form>
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
	<?php 
	$CI =& get_instance();
	$CI->load->database();
	$CI->db->select('*');
	$CI->db->order_by('cl_clinic_name');
	$result = $CI->db->get('ea_clinics')->result_array();
	
	?>
	<div class="column">
		<div class="inner">
			<h1>Our Growing Network Of Clinics</h1>
			<?php foreach($result as $r){ ?>
			<div class="our-clinic-section">
				<a href="<?php echo base_url('clinics/'.$r['url']) ?>" class="anchor"><?php echo $r['cl_clinic_name'] ?></a>
			</div>
			<?php } ?>
		</div>
	</div>
	<section id="call-to-action" class="call-to-action" style="width:100%;float:left;">
		<div class="container">
			<h1>Ready to make an appointment?</h1>
			<p>Revolutionary online doctor consultation from your local pharmacy.</p>
			<a href="#booking" class="btn s-large s-rounded s-inverted">Book now</a>
			<div class="call-to-action-features">
				<span>No more waiting</span>
				<hr class="dot">
				<span>Only the best UK doctors</span>
			</div>
		</div>
	</section>
	
</page>
<!--
<script language="javascript">

$( document ).ready(function() {
	var place, marker;

	if(typeof globals.lat!=="undefined"){
		place = {
			lat: parseFloat(globals.lat),
			lng: parseFloat(globals.lng)
		};
	}else{
		place = {
			lat: parseFloat(51.5259704),
			lng: parseFloat(-0.1660516)
		};
	}
	//alert(place.lat);
	map = new google.maps.Map(document.getElementById('booking-map'), {
		scrollwheel: false,
		zoom: 7,
		center: place,
		disableDefaultUI: true,
		draggable: false
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
	

	foreach($result as $r){
	?>
	marker = new google.maps.Marker({
		position: {
			lat: parseFloat(<?php echo $r['cl_lat'];?>),
			lng: parseFloat(<?php echo $r['cl_lng'];?>)
		},
		icon: markerIcon,
		map: map
	});
	<?php } ?>
});
</script>
-->

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