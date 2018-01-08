		<footer id="page-footer">
			<div class="container">
				<nav id="page-quick-access">
					<section>
						<h3>How we help you</h3>
						<ul>
							<li><a href="<?php echo base_url('how-it-works');?>">How it works</a></li>
							<li><a href="<?php echo base_url('what-we-treat');?>">What we treat</a></li>
							<li><a href="<?php echo base_url('team');?>">About us</a></li>
							<li><a href="<?php echo base_url('faq');?>">FAQ</a></li>
							<li><a href="<?php echo base_url('contact');?>">Contact Us</a></li>
						</ul>
					</section>
					<section>
						<h3>What we offer</h3>
						<ul>
							<li><a href="<?php echo base_url('our-clinics');?>">Our clinics</a></li>
							<li><a href="<?php echo base_url('pricing');?>">Pricing</a></li>
							<li><a href="<?php echo base_url('reviews');?>">Reviews</a></li>
							<li><a href="<?php echo base_url('blog');?>">Blog</a></li>
						</ul>
					</section>
					<section>
						<h3>Partners</h3>
						<ul>
							<li><a href="<?php echo base_url('contact-pharmacy');?>">For Pharmacy</a></li>
							<li><a href="<?php echo base_url('contact-business');?>">For Business</a></li>
							<li><a href="<?php echo base_url('contact-doctors');?>">For Doctors</a></li>
						</ul>
					</section>
				</nav>

				<div id="page-social">
					<a href="#top" class="page-logo" title="Medicspot">Medicspot</a>
					<nav class="nav-social">
						<a href="https://twitter.com/medicspot_uk" target="_blank" title="Twitter"><i class="zmdi fa fa-twitter"></i></a>
						<a href="https://www.facebook.com/medicspotuk/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
						<a href="https://www.linkedin.com/company/17946635/" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
					</nav>
				</div>
			</div>
			
			<div id="page-legal">
				<div class="container">
					<a href="<?php echo base_url('terms');?>" target="_blank">Terms & Conditions</a>
					<a href="<?php echo base_url('privacy');?>" target="_blank">Privacy &amp; Cookies Policy</a>
					<div>Medicspot Limited is registered in England at 93 Elizabeth Court, London, NW1 6EJ Registered No. 10089666. © 2017</div>

					<div id="mhra-fmd-placeholder" style="text-align: right;">
						<a href="https://medicine-seller-register.mhra.gov.uk/search-registry/649" target="_blank">
							<img src="<?php echo base_url('assets/images/mhra.png');?>" style="width:90px;">
						</a>
					</div>

				</div>
			</div>
		</footer>
		
	</body>
	<script language="javascript">
	$( document ).ready(function() {
		if (typeof clinic_id !== "undefined") {
			if(clinic_id!=''){
				//alert('hit');
				booking_Map();
				loadClinicData(clinic_id, '');

				booking_SelectEstablishment();
				getAppointmentTimes(clinic_id, '<?php echo date('d-m-Y', strtotime('now'));?>');	
			}else{
				if ($('.booking-map').length) {
					booking_Map();
				}
			}
		}
	});
	</script>
	<script src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
</html>
<?php
	//$date = new DateTime(date('Y-m-d H:i:s',strtotime('+11 hours')), new DateTimeZone('America/New_York'));
    //$timestamp = $date->format('U');
    //echo $timestamp;
?>

