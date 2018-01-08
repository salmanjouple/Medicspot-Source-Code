<?php $this->load->view('_blocks/header')?>

<script language="javascript">
    var clinic_id = '';
</script>
<page id="home">
    <section id="booking" class="text-section">
        <div class="container">
            <div class="section-header">
                <h1>Your New Neighbourhood GP</h1>
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

    <section id="steps" class="steps">
        <div class="container">
            <h1>Our simple steps</h1>
            <ul class="steps-list">
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/i-book.png');?>">
                    <h3>Book online to visit a Medicspot Digital Clinic</h3>
                    <p>Book online to visit one of our Pharmacy Digital Medicspot Clinics</p>
                </li>
                <li>
                    <img class="step-icon" src="<?php echo base_url('assets/images/icons/i-doctor.png');?>">
                    <h3>Consult With Our Qualified&nbsp;Doctors</h3>
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

    <section id="logos-media">
        <div class="container">
            <h1>You might have seen us in?</h1>
            <div class="logos-list">
                <img src="<?php echo base_url('assets/images/logo/logo-bbc.png');?>" title="BBC">
                <img src="<?php echo base_url('assets/images/logo/logo-metro.png')?>" title="Metro">
                <img src="<?php echo base_url('assets/images/logo/logo-pj.png');?>" title="The Pharmaceutical Journal">
                <img src="<?php echo base_url('assets/images/logo/logo-et.png');?>" title="Evening Times">
                <img src="<?php echo base_url('assets/images/logo/logo-pulse.png');?>" title="Pulse">
            </div>
        </div>
    </section>

    <section id="video" class="dots-background with-media">
        <div class="container">
            <div class="content">
                <p>
                    Visit your nearest MedicSpot pharmacy and have a walk in consultation with one of MedicSpot’s UK registered General Practitioners<span class="hide-mobile"> within a matter of minutes</span>.
                </p>
                <a href="<?php echo base_url('what-we-treat');?>" class="btn s-large">What we treat</a>
            </div>
            <div class="media-wrapper">
                <div class="media-content">
                    <!--
					<video>
						<source src="<?php echo base_url('assets/images/video-placeholder.mp4');?>" type="video/mp4">
					</video>
					<button class="video-player-play">
						<i class="fa fa-play-circle"></i>
					</button>
					-->
                    <iframe id="main-homepage-video" src="https://player.vimeo.com/video/207370031" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
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

    <section id="call-to-action" class="call-to-action">
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

<script language="javascript">
    var place, marker;
    var markerArray = {};
    function booking_Map() {
        var zoom = 6;
        //console.log(globals.lat);
        //console.log(globals.lng);
        if(typeof globals.lat!=="undefined"){
            place = {
                lat: parseFloat(globals.lat),
                lng: parseFloat(globals.lng)
            };
            zoom = 15;
        }else{
            place = {
				lat: parseFloat(53.787043),
				lng: parseFloat(-1.774170)
                //lat: parseFloat(51.5259704),
                //lng: parseFloat(-0.1660516)
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
<script>
	initMap();
function initMap() {
        map = new google.maps.Map(document.getElementById('booking-map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;
		var img = '<?php echo base_url('assets/images/user-icon.png');?>';
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
			image = {
            url: img,
            size: new google.maps.Size(50, 50),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(16, 16)
            //new google.maps.Size(32, 32)
			};		
			navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
			  marker = new google.maps.Marker({
                                position: new google.maps.LatLng(pos),
                                map: map,
				  				icon: image,
                            });
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
	
	
</script>


<?php $this->load->view('_blocks/footer')?>
