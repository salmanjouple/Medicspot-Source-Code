<?php $this->load->view('_blocks/header')?>
	
<page id="pricing">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo fuel_var('heading',''); ?></h1>
				<p class="subtitle">
				<?php echo fuel_var('body',''); ?>
				</p>
			</div>
			<div class="content">
				<div class="pricing-list">
					<div class="pricing-package">
						<h3>Pay Monthly</h3>
						<div class="package-price">
						
							<div class="price-sum">£<?php echo fuel_var('pay_month',''); ?></div>
							<div class="price-per">per month</div>
						</div>
						<a href="/contact" class="btn">Contact Us</a>
						<?php echo fuel_var('pay_month_benefits',''); ?>
					</div>
					<div class="pricing-package">
						<h3>Single Consultation</h3>
						<div class="package-price">
							<div class="price-sum">£<?php echo fuel_var('pay_oneoff',''); ?></div>
							<div class="price-per">One off</div>
						</div>
						<a href="/" class="btn">Book Now</a>
						<?php echo fuel_var('pay_oneoff_benefits',''); ?>
					</div>
					<div class="pricing-package">
						<h3>Pay Annually</h3>
						<div class="package-price">
							<div class="price-sum">£<?php echo fuel_var('pay_annually',''); ?></div>
							<div class="price-per">per year</div>
						</div>
						<a href="/contact" class="btn">Contact Us</a>
						<?php echo fuel_var('pay_annually_benefits',''); ?>
					</div>
				</div>
				<div class="pricing-disclaimer">
					Our GP services are available on either a pay as you go or pay monthly.
				</div>
			</div>
		</div>
	</section>

	<section id="logos-qa">
		<div class="container">
			<div class="logos-list">
				<img src="assets/imageslogo/logo-st.png" title="Secure &amp; trusted">
				<img src="assets/images/logo/logo-gmc.png" title="General Medical Council">
				<img src="assets/images/logo/logo-ico.png" title="Information Commissioner’s Office">
				<img src="assets/images/logo/logo-cqc.png" title="CareQuality Commission">
			</div>
		</div>
	</section>
</page>

	
<?php $this->load->view('_blocks/footer')?>
