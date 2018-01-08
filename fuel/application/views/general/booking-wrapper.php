<style type="text/css">
.available-hour{
	cursor:pointer;
}
#confirm{
	cursor:pointer;	
}
#next{
	cursor:pointer;	
}
.form-padding{
	padding:1px;
	text-align: left;
}
.form-padding > input{
	margin-top:1px;
}
.alert{
    background-color: #F2DEDE;
    color: #AF504E;
    border: 1px solid #AF504E;
    padding: 10px;
}
.control-label{
	font-size: 12px;
}
</style>

<link rel="stylesheet" href="<?php echo base_url('assets/css/ladda-themeless.min.css');?>">
<script src="<?php echo base_url('assets/js/spin.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/ladda.min.js');?>"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey('pk_live_94RlB42sv700831gGwqU6k3A');
    //Stripe.setPublishableKey('pk_test_BpXNmXquLtA6ypb0rHTX9rLH');
    
</script> 
<?php //echo "hello faisal"; exit(); ?>
<div id="booking-map"></div>
<div id="booking-panel">
	<div class="booking-panel-header">
		<div class="booking-panel-title">
			Convenient Online Private GP Consultation
		</div>
		<div class="booking-panel-subtitle">
			Book Now in Under 60 Seconds 
		</div>
		<div class="booking-panel-select">
			<li class="active" id="booking_tab">Booking</li>
			<li id="details_tab">Payment</li>
			<li id="payment_tab">Confirm</li>
		</div>
	</div>

	<div class="booking-panel-table">
		<div class="booking-panel-table-header">
			Pick a date &amp; time
		</div>
		<div class="booking-panel-day-selector-wrapper">
			<ul class="booking-panel-day-selector">
				
				<li class="active" data-date="<?php echo date('d-m-Y', strtotime('now'));?>" data-my-date="<?php echo date('Y-m-d', strtotime('now'));?>">TODAY</li>
				<?php 
				$i = 1;
				while($i<6){
				$date = date('d-m-Y', strtotime('now +'.$i.' days'));
				?>
				<li class="day-appointments" data-date="<?php echo $date;?>" data-my-date="<?php echo date('Y-m-d', strtotime($date));?>"><?php echo date('D', strtotime($date));?><br><?php echo date('jS M', strtotime($date));?></li>
				<?php 
				$i++;
				}
				?>
			</ul>
		</div>
		<ul class="booking-panel-time-selector">
			
		</ul>
	</div>

	<div class="booking-form" style="display:none;">
		<div class="frame-content " style="max-height: 308px;margin-bottom: 5px;">
				<div class="row">

							<div class="alert alert-danger" id="errorMsg" style="display:none;">
							</div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="width:49%;float:left;">
                                <div class="form-group form-padding">
                                    <label for="first-name" class="control-label">First Name *</label>
                                    <input type="text" id="first-name" class="required form-control" maxlength="100" style="color:#111;" tabindex="1">
                                </div>
                                <div class="form-group form-padding">
                                    <label for="last-name" class="control-label">Last Name *</label>
                                    <input type="text" id="last-name" class="required form-control" maxlength="250" style="color:#111;" tabindex="2">
                                </div>
                                <div class="form-group form-padding">
                                    <label for="email" class="control-label">Email *</label>
                                    <input type="text" id="email" class="required form-control" maxlength="250" style="color:#111;" tabindex="3">
                                </div>
                                <div class="form-group form-padding">
                                    <label for="phone-number" class="control-label">Phone Number *</label>
                                    <input type="text" id="phone-number" class="required form-control" maxlength="60" style="color:#111;" tabindex="4">
                                </div>
                                <!--
                                <div class="form-group form-padding">
                                	<label for="phone-number" class="control-label">DOB *</label><br>
                                	<input name="user_day" id="user_day" class="required form-control" type="number" min="1" style="width:49%;color:#111;" value="" tabindex="10">
                                	<select class="required form-control" name="user_month" id="user_month" style="color:#111;width:49%;" tabindex="11">
												<option value="1">Jan</option>
												<option value="2">Feb</option>
												<option value="3">Mar</option>
												<option value="4">Apr</option>
												<option value="5">May</option>
												<option value="6">Jun</option>
												<option value="7">Jul</option>
												<option value="8">Aug</option>
												<option value="9">Sep</option>
												<option value="10">Oct</option>
												<option value="11">Nov</option>
												<option value="12">Dec</option>
									</select>
                                </div>
                                -->


                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="width:49%;float:left;">

								<div class="form-group form-padding">
                                    <label for="address" class="control-label">Card number *</label>
                                    <input type="text" placeholder="Card Number" data-stripe="number" id="card_number" name="card_number" class="form-control" maxlength="16" style="color:#111;" tabindex="5">
                                </div>
                                <div class="form-group form-padding">
                                    <label for="city" class="control-label">CVC *</label>
                                    <input type="text" placeholder="CVC Number" data-stripe="cvc" id="cvc_number" name="cvc_number" class="form-control" maxlength="3" style="color:#111;" tabindex="6">
                                </div>
                                <div class="form-group form-padding">
                                    <label for="zip-code" class="control-label">Expiry Month/Year *</label>
                                    <input type="text" placeholder="MM" data-stripe="exp-month" id="exp_month" name="exp_month" class="form-control" maxlength="2" style="color:#111;width:48%;" tabindex="7">
                                	<input type="text" placeholder="YYYY" data-stripe="exp-year" id="exp_year" name="exp_year" class="form-control" maxlength="4" style="color:#111;width:48%;" tabindex="8">
                                </div>

                                <div class="form-group form-padding">
                                    <label for="promocode" class="control-label">Promocode</label>
                                    <input type="text" id="promocode" class="form-control" maxlength="250" style="color:#111;" tabindex="9">
                                </div>
                                <!--
                                <div class="form-group form-padding">
                                    <label for="address" class="control-label">DOB (Year)</label>
                                    
                                    <input name="user_year" id="user_year" class="required form-control" type="number" value="" min="1887" style="color:#111;" tabindex="12">

                                </div>
								-->

                                <div class="form-group form-padding" style="display:none;">
                                    <label for="address" class="control-label">Address</label>
                                    <input type="text" id="address" class="form-control" maxlength="250" style="color:#111;">
                                </div>
                                <div class="form-group form-padding" style="display:none;">
                                    <label for="city" class="control-label">City</label>
                                    <input type="text" id="city" class="form-control" maxlength="120" style="color:#111;">
                                </div>
                                <div class="form-group form-padding" style="display:none;">
                                    <label for="zip-code" class="control-label">Post Code</label>
                                    <input type="text" id="zip-code" class="form-control" maxlength="120" style="color:#111;">
                                </div>

                            </div>

                            <div class="form-group form-padding" style="text-align: left;">
                            	<table>
                            	<tr>
                            		<td style="width:15px;"><input type="checkbox" value="1" name="tandc" id="tandc"></td>
                            		<td>
                            			<label class="control-label">I accept the <a href="<?php echo base_url('terms');?>">Terms and Conditions</a> (no under 5's)</label>
                            		</td>
                            	</tr>
                            	</table>
                            </div>
                            <!--
                            <em id="form-message" class="text-danger">Fields with * are required!</em>
                            -->
                </div>
        </div>
	</div>
	<div class="booking-panel-footer">
		<div class="btn" id="next" style="display:none;">
			<span class="label">Next</span>
			<i class="fa fa-long-arrow-right"></i>
		</div>

		<button class="btn btn-primary ladda-button" id="confirm" style="display:none;" data-style="expand-right">
			Confirm <i class="fa fa-long-arrow-right"></i>
		</button>

	</div>
</div>
<div id="booking-input">
	<div class="booking-details">
		<div class="booking-input">
			<div class="booking-details-row">
				<input type="text" placeholder="Search for location and book" id="postcode_search" autocomplete="off">
				<div class="details-search">
					<i class="fa fa-search"></i>
				</div>
			</div>
			<div class="booking-details-action">
				<i class="fa fa-compass"></i>
			</div>
		</div>

		<div class="booking-suggestions">
			
		</div>

		<div class="booking-detail">
			<div class="suggestion">
				<div class="booking-details-row">
					<div class="details-name"></div>
					<div class="details-address"></div>
					<div class="details-distance"></div>
				</div>
				<div class="booking-details-action">
					<i class="fa fa-chevron-circle-right"></i>
				</div>
			</div>

			<div class="booking-details-expanded">
				<div class="establishment-meta">
					<div class="establishment-meta-info">
						<i class="fa fa-map-marker" title="Location"></i>
						<span id="formatted_address"></span>
					</div>
					<div class="establishment-meta-info">
						<i class="fa fa-phone" title="Phone Number"></i>
						<a href="" id="phone_span"></a>
					</div>
					<div class="establishment-meta-info">
						<i class="fa fa-clock-o" title="Opening Times"></i>
						<span>
							<strong>Opening Times</strong><br>
							<span id="opening_hours">
							</span>
						</span>
					</div>
					<div class="establishment-meta-info">
						<i class="fa fa-envelope" title="Email Address"></i>
						<span id="email_span">
							<a href=""></a>
						</span>
					</div>

					<div class="establishment-meta-info">
						<i class="fa fa-long-arrow-right" title="More Details"></i>
						<span id="www_span">
							<a href=""></a>
						</span>

					</div>
				</div>

				<div class="establishment-content">

				</div>
			</div>

			<div class="establishment-info-photos-wrapper">
				<div class="establishment-info-photos">
					<div class="photo-wrapper">
						<div class="photo photo1"></div>
					</div>
					<div class="photo-wrapper">
						<div class="photo photo2"></div>
					</div>
					<div class="photo-wrapper">
						<div class="photo photo3"></div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<script language="javascript">
moment.locale('en-AU');
//var clinic_id = 
var date = '<?php echo date('d-m-Y', strtotime('now'));?>';
var mdate = '<?php echo date('Y-m-d', strtotime('now'));?>';
var time = '';
var service_duration = 15;
var start_date = '';
var end_date = '';
var appointment = {};
$( document ).ready(function() {

	$('body').on('click', '#postcode_search', function(){
		booking_HideEstablishment();
	});
	$('body').on('keyup', '#postcode_search', function(){
		$('#booking-map').css('left','0px');		
		if($('#postcode_search').val().length>=2){			
			$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>Clinic_search/postcode_search',
				data: {'postcode':jQuery('#postcode_search').val(), '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
				dataType:'html',
				success: function(data)
				{	
					$('.booking-suggestions').html(data);
				}
			});
		}
	});	
	
	$('body').on('click', '.available-hour', function(){

		jQuery('.available-hour').removeClass('selected');
		jQuery(this).addClass('selected');

		moment.locale('en-AU');

		time = $(this).attr('data-time');		
		var timestring1 = mdate+' '+time;		
		start_date = moment(timestring1).format('YYYY-MM-DD HH:mm');
		appointment.start_date = start_date;		
		var end_date = moment(start_date).add(service_duration, 'minutes');
		end_date = end_date.format('YYYY-MM-DD HH:mm');
		appointment.end_date = end_date;		
		jQuery('#next').show();		
	});

	$('#confirm').on('click', function(){		
		var l = Ladda.create(document.querySelector('#confirm'));
	 	l.start();
		
		$('#confirm').attr('disabled', true);
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>index.php/appointments/ajax_register_appointment',
			data: {
				'post_data[customer][last_name]':jQuery('#last-name').val(), 
				'post_data[customer][first_name]':jQuery('#first-name').val(), 
				'post_data[customer][email]':jQuery('#email').val(), 
				'post_data[customer][phone_number]':jQuery('#phone-number').val(), 
				'post_data[customer][address]':jQuery('#address').val(),
				'post_data[customer][city]':jQuery('#city').val(),
				'post_data[customer][zip_code]':jQuery('#zip-code').val(), 
				'post_data[appointment][start_datetime]': appointment.start_date+':00', 
				'post_data[appointment][end_datetime]': appointment.end_date+':00', 
				'post_data[appointment][is_unavailable]':false,
				'post_data[appointment][id_users_provider]':'any-provider', 
				'post_data[appointment][id_services]':13, 
				'post_data[appointment][clinic_id]':clinic_id, 
				'post_data[manage_mode]':false, 
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				'clinic_id':clinic_id,
				'card_number':jQuery('#card_number').val(),
				'cvc_number':jQuery('#cvc_number').val(),
				'exp_month':jQuery('#exp_month').val(),
				'exp_year':jQuery('#exp_year').val(),
				'promocode':jQuery('#promocode').val(),
				'tandc':jQuery('#tandc').is(':checked')? 1 : '',
			},
			dataType:'json',
			success: function(data)
			{	//alert(data);
				$('#confirm').addClass('hide');
				setTimeout(function(){
					l.stop();
				},10000);
				
				if(data.status==0){
					//alert('error');
					jQuery('#errorMsg').show();
					jQuery('#errorMsg').html(data.msg);
					setTimeout(function(){
						jQuery('#errorMsg').hide();
					},2000);
					$('#confirm').attr('disabled', false);
				}else{
					$('#booking_tab').removeClass('active');
					$('#details_tab').removeClass('active');
					$('#payment_tab').addClass('active');

					$('.booking-panel-time-selector').hide();
					$('.frame-content').html(data.msg);
					$('#confirm').hide();
					$('#confirm').attr('disabled', false);
				}
			}
	});
	});

	$('#booking_tab').on('click', function(){
		$('#next').hide();

		$('.booking-form').hide();
		$('.booking-table').show();
		$('.booking-panel-day-selector-wrapper').show();
		$('.booking-panel-table-header').show();

		$('.booking-panel-table').show();

		$('#confirm').hide();
		$('.booking-panel-footer').css({'margin-top':'3.2rem'});

		$('#booking_tab').addClass('active');
		$('#details_tab').removeClass('active');
	});

	$('#next').on('click', function(){
		//alert('hit');
		$('.booking-form').show();
		$('.booking-table').hide();
		$('.booking-panel-day-selector-wrapper').hide();
		$('.booking-panel-table-header').hide();

		$('.booking-panel-table').hide();
		$('#next').hide();
		$('#confirm').show();
		$('.booking-panel-footer').css({'margin-top':'0px'});

		$('#booking_tab').removeClass('active');
		$('#details_tab').addClass('active');

		//payment_tab
		//active
	})
	$('.booking-input input').click(function () {
		$('#booking-map').css('left','0px');
		$('.booking-content').addClass('show-suggestions');
		$('.booking-wrapper').addClass('w-show-suggestions');
		if($('#postcode_search').val().length < 1){
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>Clinic_search/search',
			data: $("#booking-form").serialize()+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>', // serializes the form's elements.
			dataType:'html',
			success: function(data)
			{	//alert(data);
				$('.booking-suggestions').html(data);
			}
		});
		}

	});

	$('body').on('click', '.suggestion', function(){

		clinic_id = $(this).attr('data-id');
		var distance = $(this).find('.details-distance').html();		
		loadClinicData(clinic_id, distance);
		booking_SelectEstablishment();
		getAppointmentTimes(clinic_id, '<?php echo date('d-m-Y', strtotime('now'));?>');	

		globals.lat = $(this).attr('data-lat');
		globals.lng = $(this).attr('data-lng');
		booking_Map();		
		navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };			
			var directionsService = new google.maps.DirectionsService;
        	var directionsDisplay = new google.maps.DirectionsRenderer;
			/*var map = new google.maps.Map(document.getElementById('booking-map'), {
          			zoom: 9,
          			center: {lat: parseFloat(pos.lat), lng: parseFloat(pos.lng)}
        		});*/
        	directionsDisplay.setMap(map);
			var orignLat =  parseFloat(pos.lat);
			var orignLon = parseFloat(pos.lng);
			var destLat = globals.lat;
			var destLon = globals.lng;
		    calculateAndDisplayRoute(directionsService, directionsDisplay,orignLat,orignLon,destLat,destLon);					
          });				
		//$('#booking-map').css('left','500px');
	});
	
	function calculateAndDisplayRoute(directionsService, directionsDisplay,orginLat, orginLon,destLat,destLon) {
        directionsService.route({
          origin: new google.maps.LatLng(orginLat,orginLon),
          destination: new google.maps.LatLng(destLat,destLon),		  
          travelMode: 'DRIVING'
        }, function(response, status) {			
          if (status === 'OK') {			  
            directionsDisplay.setDirections(response);
			var leg = response.routes[0].legs[0];
            makeMarker(leg.start_location, icons.start, "title", map);
            makeMarker(leg.end_location, icons.end, 'title', map);
          } else {
            window.alert('Directions request failed due to ' + status);
          }			
			function makeMarker(position, icon, title, map) {
        		new google.maps.Marker({
					position: position,
					map: map,
					icon: icon,
					title: title
        		});
    		}
			var icons = {
				start: new google.maps.MarkerImage(
				// URL
				'http://maps.google.com/mapfiles/ms/micons/blue.png',
				// (width,height)
				new google.maps.Size(44, 32),
				// The origin point (x,y)
				new google.maps.Point(0, 0),
				// The anchor point (x,y)
				new google.maps.Point(22, 32)),
				end: new google.maps.MarkerImage(
				// URL
				'http://maps.google.com/mapfiles/ms/micons/green.png',
				// (width,height)
				new google.maps.Size(44, 32),
				// The origin point (x,y)
				new google.maps.Point(0, 0),
				// The anchor point (x,y)
				new google.maps.Point(22, 32))
			};
        });
      }

	$('body').on('click', '.day-appointments', function(){

		$('.booking-panel-day-selector>.active').addClass('day-appointments');
		$('.booking-panel-day-selector>.active').removeClass('active');

		$(this).addClass('active');
		$(this).removeClass('day-appointments');

		date = $(this).attr('data-date');
		mdate = $(this).attr('data-my-date');
		getAppointmentTimes(clinic_id, date);	
	});
	
});
function loadClinicData(clinic_id, distance){
	//alert(clinic_id);
	//markerArray.clinic_id;
	//
	$('.booking-panel-day-selector>.active').addClass('day-appointments');
	$('.booking-panel-day-selector>.active').removeClass('active');

	$('.booking-panel-day-selector > li').first().addClass('active');

	map.setCenter(markerArray[clinic_id].getPosition());
	$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>Clinic_search/clinic_data',
			data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>' ,'clinic_id':clinic_id},
			dataType:'json',
			success: function(data)
			{	
				//console.log(data);
				//alert(data);
				//booking-panel-time-selector
				jQuery('.details-name').html(data.cl_clinic_name);
				jQuery('.details-address').html(data.cl_postcode);
				jQuery('.details-distance').html(distance);
				jQuery('#formatted_address').html(data.cl_formatted_address);

				jQuery('#phone_span').html(data.cl_phone_number);
				jQuery('#phone_span').attr('href', 'tel:'+ data.cl_phone_number);
				jQuery('#email_span').html('<a href="mailto:'+data.cl_email_address+'">'+data.cl_email_address+'</a>');
				jQuery('.establishment-content').html(data.cl_description);

				jQuery('#opening_hours').html(data.opening_hours);
				var url = '';
				if(data.url!=''){
					if(data.url == 'scotland/glasgow/glasgow/glasgow-centre-clinic'){
						url = 'scotland/glasgow/glasgow/glasgow-centre-clinic';
					} else if(data.url == 'england/london/hammersmith-fulham/shepherds-bush/'){
						url = 'england/london/hammersmith-fulham/shepherds-bush/shepherds-bush-clinic';
					} else if (data.url == 'england/london/hammersmith-fulham/shepherds-bush/inside-greenlight-pharmacy-at-shepherds-bush/') {
						url = 'england/london/hammersmith-fulham/shepherds-bush/shepherds-bush-clinic';
					} else if(data.url == 'england/london/kensington-chelsea/holland-park/'){
						url = 'england/london/kensington-chelsea/holland-park/holland-park-clinic';
					} else if(data.url == 'england/cambridgeshire/cambridge/cambridge-clinic/medicspot-clinic-cambridge/'){
						url = 'england/cambridgeshire/cambridge/cambridge-clinic';
					} else if(data.url == 'england/london/camden/holborn/'){
						url = 'england/london/camden/holborn/holborn-clinic';
					} else if(data.url =='england/london/kensington-chelsea/kensington/sticklands/'){
						url = 'england/london/kensington-chelsea/kensington/south-kensington-station-clinic';
					} else if(data.url == 'england/london/kensington-chelsea/chelsea/'){
						url = 'england/london/kensington-chelsea/chelsea/chelsea-clinic';
					} else if(data.url == 'england/london/kensington-chelsea/notting-hill/notting-hill-clinic/'){
						url = 'england/london/kensingtoon-chelsea/notting-hill/notting-hill-clinic';
					} else if(data.url == 'england/london/southwark/southwark-city/southwark-clinic/'){
						url = 'england/london/southwark/southwark/southwark-clinic';
					} else if(data.url == 'england/london/southwark/london-bridge/'){
						url = 'england/london/southwark/london-bridge/london-bridge-clinic';
					} else if(data.url == 'england/london/elephant-and-castle/st-georges-rd/medicspot-clinic-elephant-castle-entrance/'){
						url = 'england/london/southwark/newington/elephant-castle-clinic';
					} else if(data.url == 'england/london/harrow/harrow-on-the-hill/harrow-on-the-hill-clinic/'){
						url = 'england/london/harrow/harrow/harrow-on-the-hill-clinic';
					} else if(data.url =='england/yorkshire/sheffield/wicker/medicspot-walkin-clinic-in-wicker/'){
						url = 'england/south-yorkshire/sheffield/wicker-clinic';
					} else if(data.url == 'england/south-yorkshire/sheffield/wicker-clinic/medicspot-consultation-room-wicker/'){
						url = 'england/south-yorkshire/sheffield/wicker-clinic';
					} else if(data.url == 'england/cambridgeshire/cambridge/cambridge-clinic/medicspot-clinic-cambridge/'){
						url = 'england/cambridgeshire/cambridge/cambridge-clinic';
					} else if(data.url == 'england/london/kensington-chelsea/kensington/earls-court-chemist-2/'){
						url = 'england/london/kensington-chelsea/kensington/earls-court-clinic';
					} else if(data.url == 'england/london/kensington-chelsea/chelsea/'){
						url = 'england/london/kensington-chelsea/chelsea/chelsea-clinic';
					} else if(data.url == 'england/london/lambeth/stockwell/'){
						url = 'england/london/lambeth/stockwell/stockwell-clinic';
					} else if(data.url == 'england/london/camden/primrose-hill/'){
						url = 'england/london/camden/primrose-hill/primrose-hill-clinic';
					} else if(data.url == 'england/london/islington/islington-city/islington-clinic/'){
						url = 'england/london/islington/islington/islington-clinic';
					} else {
						url = data.url;
					}
					
					jQuery('#www_span').html('<a href="<?php echo base_url('clinics/');?>'+url+'/">More Details</a>');
				}else{
					jQuery('#www_span').html('<a href="<?php echo base_url('establishment/');?>'+data.clinic_id+'">More Details</a>');	
				}
				

				if(data.image1!=''){
					//alert(data.image1);
					jQuery('.photo1').attr('style',"background-image:url(<?php echo base_url('assets/images/');?>"+data.image1+");");
				}
				if(data.image2!=''){
					//alert(data.image1);
					jQuery('.photo2').attr('style',"background-image:url(<?php echo base_url('assets/images/');?>"+data.image2+");");
				}
				if(data.image3!=''){
					//alert(data.image1);
					jQuery('.photo3').attr('style',"background-image:url(<?php echo base_url('assets/images/');?>"+data.image3+");");
				}
			}
	});
}
function getAppointmentTimes(clinic_id, date){
	$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>index.php/appointments/ajax_get_available_hours',
			data: {'service_id':13, 'provider_id':'any-provider', 'selected_date':date, 'service_duration':service_duration, 'manage_mode':false, '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>' ,'clinic_id':clinic_id},
			dataType:'json',
			success: function(data)
			{	//alert(data);
				//booking-panel-time-selector
				$('.booking-panel-time-selector').html('');
				if(data.length==0){
					$('.booking-panel-time-selector').html('<div style="text-align:center;"><br>Closed today</div>');
				}else{
					$.each(data, function(i, item) {
					    //alert(data[i].PageName);
					    //alert(data[i]);
					    
					    var classData = '';
					    /*
					    if(i==0){
					    	classData = 'selected';
					    }else{
					    	classData = '';
					    }*/
					    var block = '<li class="available-hour '+classData+'" data-time="'+data[i]+'"><div class="time">'+data[i]+'</div><div class="price"><strong>£39</strong></div><div class="checked"><i class="fa fa-check-circle"></i></div></li>';
					    $('.booking-panel-time-selector').append(block);
					})
			}
		}
	});
}
</script>