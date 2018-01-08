<?php $this->load->view('_blocks/header')?>


<page id="contact-pharmacy">
	<section id="contact-info" class="dots-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo fuel_var('heading',''); ?></h1>
				<p class="subtitle"><?php echo fuel_var('sub_title',''); ?></p>
			</div>
			<div class="content">
				<p>
					<?php echo fuel_var('body',''); ?>	
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

	<section id="testimonials" class="testimonials">
		<div class="container">
			<div class="testimonials-header">
				<hr class="testimonails-header-line">
				<i class="fa fa-quote-left"></i>
				<hr class="testimonails-header-line">
			</div>
			<div class="testimonials-quotes">
				<blockquote>
					<p>
						<?php echo fuel_var('pharmacy_quote',''); ?>	
					</p>
					<footer>
						<img class="testimony-avatar" src="<?php echo base_url('assets/images/'.fuel_var('pharmacy_image','')); ?>">
						<div class="testimony-name"><?php echo fuel_var('pharmacy_name',''); ?></div>
						<div class="testimony-profession">
							<?php echo fuel_var('pharmacy_title',''); ?>
						</div>
					</footer>
				</blockquote>
			</div>
		</div>
	</section>
</page>

<?php $this->load->view('_blocks/footer')?>
