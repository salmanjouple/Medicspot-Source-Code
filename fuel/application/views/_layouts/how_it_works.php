<?php $this->load->view('_blocks/header')?>


<page id="how-it-works">
	<section id="video" class="dots-background with-media">
		<div class="container">
			<div class="content">
				<h1><?php echo fuel_var('heading',''); ?></h1>
				<p>
				<?php echo fuel_var('body',''); ?>
				</p>
			</div>
			<div class="media-wrapper">
				<div class="media-content">
					<!--
					<video>
						<source src="<?php echo fuel_var('video_url',''); ?>" type="video/mp4">
					</video>
					<button class="video-player-play">
						<i class="fa fa-play-circle"></i>
					</button>
					-->
					<iframe src="https://player.vimeo.com/video/207370031" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

				</div>
			</div>
		</div>
	</section>

	<section id="steps" class="steps">
		<div class="container">
			<ul class="steps-list">
				<li>
					<img class="step-icon" src="assets/images/icons/i-book.png">
					<h3>Find your nearest MedicSpot pharmacy and book online</h3>
				</li>
				<li>
					<img class="step-icon" src="assets/images/icons/i-pharmacy.png">
					<h3>Visit the pharmacy at your pre-booked timeslot</h3>
				</li>
				<li>
					<img class="step-icon" src="assets/images/icons/i-doctor.png">
					<h3>Have an online consultation with one of our expert GPs</h3>
				</li>
				<li>
					<img class="step-icon" src="assets/images/icons/i-prescription.png">
					<h3>Collect your treatment on the&nbsp;way&nbsp;out</h3>
				</li>
			</ul>
		</div>
	</section>

	<section id="clinical-station-diagram">
		<div class="container">
			<h1>Medicspot Clinical Station</h1>
			<div class="clinical-station-diagram">
				<ul class="diagram-list">
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-blood.png)"></div>
						<div class="content">
							<h3>Blood Pressure Cuff</h3>
							<p>Allows your doctor to take<br> your blood pressure</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-stethoscope.png)"></div>
						<div class="content">
							<h3>Stethoscope</h3>
							<p>To listen to your<br> heart and lungs</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-medicam.png)"></div>
						<div class="content">
							<h3>MedicCam</h3>
							<p>To look into your<br> throat or ears</p>
						</div>
					</li>
				</ul>

				<div class="diagram-image-wrapper">
					<img src="assets/images/how-it-works/medical-station.jpg">
				</div>

				<ul class="diagram-list">
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-pulse.png)"></div>
						<div class="content">
							<h3>Pulse Oximeter</h3>
							<p>Measures your oxygen<br> levels and pulse rate</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-thermometer.png)"></div>
						<div class="content">
							<h3>Thermometer</h3>
							<p>To take your<br> temperature</p>
						</div>
					</li>
					<li>
						<div class="icon" style="background-image: url(assets/images/icons/ms-prescription.png)"></div>
						<div class="content">
							<h3>Prescription</h3>
							<p>Our doctors can prescribe<br> you medication for you to<br> collect instantly</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo fuel_var('sub_title',''); ?></h1>
			</div>
			<div class="content">
				<p>
					<?php echo fuel_var('small_body',''); ?>
				</p>
			</div>
		</div>
	</section>

	<section id="logos-qa">
		<div class="container">
			<div class="logos-list">
				<img src="assets/images/logo/logo-st.png" title="Secure &amp; trusted">
				<img src="assets/images/logo/logo-gmc.png" title="General Medical Council">
				<img src="assets/images/logo/logo-ico.png" title="Information Commissioner’s Office">
				<img src="assets/images/logo/logo-cqc.png" title="CareQuality Commission">
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
	
<?php $this->load->view('_blocks/footer')?>
