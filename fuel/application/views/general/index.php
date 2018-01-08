<page id="home">
	<section id="booking" class="text-section">
		<div class="container">
			<div class="section-header">
				<h1>Your new Convenient GP&nbsp;Service</h1>
				<p class="subtitle">Revolutionary online doctor consultation from your local pharmacy.</p>
			</div>
			<form id="booking-form">
				<div class="booking-wrapper">
					<div class="booking-content">
						<?php $this->load->view('general/booking-wrapper'); ?>
					</div>
				</div>
				<div style="display:none;">
					<input type="text" name="lat" value="57.649454">
					<input type="text" name="lng" value="-3.318485">
				</div>
			</form>
		</div>
	</section>

	<section id="logos-qa">
		<div class="container">
			<div class="logos-list">
				<img src="<?php echo base_url('assets/img/logo/logo-st.png');?>" title="Secure &amp; trusted">
				<img src="<?php echo base_url('assets/img/logo/logo-gmc.png');?>" title="General Medical Council">
				<img src="<?php echo base_url('assets/img/logo/logo-ico.png');?>" title="Information Commissioner’s Office">
				<img src="<?php echo base_url('assets/img/logo/logo-cqc.png');?>" title="CareQuality Commission">
			</div>
		</div>
	</section>

	<section id="steps" class="steps">
		<div class="container">
			<h1>Our simple steps</h1>
			<ul class="steps-list">
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/img/icons/i-book.png');?>">
					<h3>Book online to visit a Medicspot Digital Clinic</h3>
					<p>Book online to visit one of our Pharmacy Digital Medicspot Clinics</p>
				</li>
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/img/icons/i-doctor.png');?>">
					<h3>Consult With Our Qualified&nbsp;Doctors</h3>
					<p>Video chat and state-of-the-art remote examination with our expert GP’s.</p>
				</li>
				<li>
					<img class="step-icon" src="<?php echo base_url('assets/img/icons/i-prescription.png');?>">
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
				<img src="<?php echo base_url('assets/img/logo/logo-bbc.png');?>" title="BBC">
				<img src="<?php echo base_url('assets/img/logo/logo-metro.png');?>" title="Metro">
				<img src="<?php echo base_url('assets/img/logo/logo-pj.png');?>" title="The Pharmaceutical Journal">
				<img src="<?php echo base_url('assets/img/logo/logo-et.png');?>" title="Evening Times">
				<img src="<?php echo base_url('assets/img/logo/logo-pulse.png');?>" title="Pulse">
			</div>
		</div>
	</section>

	<section id="video" class="dots-background with-media">
		<div class="container">
			<div class="content">
				<p>
					Visit your nearest MedicSpot pharmacy and have a walk in consultation with one of MedicSpot’s UK registered General Practitioners<span class="hide-mobile"> within a matter of minutes</span>.
				</p>
				<a href="/what-we-treat" class="btn s-large">What we treat</a>
			</div>
			<div class="media-wrapper">
				<div class="media-content">
					<video>
						<source src="<?php echo base_url('assets/img/video-placeholder.mp4');?>" type="video/mp4">
					</video>
					<button class="video-player-play">
						<i class="fa fa-play-circle"></i>
					</button>
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
				<div>
					<blockquote>
						<p>
							“I forgot my blood pressure tablets at home in the USA and the pharmacy suggest I use MedicSpot. It was convenient, easy and affordable and saved me a lot of time and hassle”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/img/people/testimony-default.jpg');?>">
							<div class="testimony-name">Alan Leighman</div>
							<div class="testimony-profession">Tourist</div>
						</footer>
					</blockquote>
				</div>
				<div>
					<blockquote>
						<p>
							“Lorem Ipsum”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/img/avatar-placeholder.jpg');?>">
							<div class="testimony-name">Ipsum Lorem</div>
							<div class="testimony-profession">Lorem Ipsum</div>
						</footer>
					</blockquote>
				</div>
				<div>
					<blockquote>
						<p>
							“Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/img/avatar-placeholder.jpg');?>">
							<div class="testimony-name">Ipsum Lorem</div>
							<div class="testimony-profession">Lorem Ipsum</div>
						</footer>
					</blockquote>
				</div>
				<div>
					<blockquote>
						<p>
							“Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/img/avatar-placeholder.jpg');?>">
							<div class="testimony-name">Lorem Ipsum</div>
							<div class="testimony-profession">Ipsum Lorem</div>
						</footer>
					</blockquote>
				</div>
				<div>
					<blockquote>
						<p>
							“Teque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/img/avatar-placeholder.jpg');?>">
							<div class="testimony-name">Lorem Ipsum</div>
							<div class="testimony-profession">Ipsum Lorem</div>
						</footer>
					</blockquote>
				</div>
				<div>
					<blockquote>
						<p>
							“Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur”
						</p>
						<footer>
							<img class="testimony-avatar" src="<?php echo base_url('assets/img/avatar-placeholder.jpg');?>">
							<div class="testimony-name">Lorem Ipsum</div>
							<div class="testimony-profession">Ipsum Lorem</div>
						</footer>
					</blockquote>
				</div>
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