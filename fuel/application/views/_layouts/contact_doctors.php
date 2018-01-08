<?php $this->load->view('_blocks/header')?>

<page id="contact-doctors">
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

	<section id="call-to-action" class="call-to-action">
		<div class="container">
			<h1>
				If you’re a GP who fits this criteria and wish to work flexibly from home; we would love to hear from you.<br> Please get in touch with us via <a href="mailto:jobs@medicspot.co.uk">jobs@medicspot.co.uk</a> and we’ll be in touch to discuss things further.
			</h1>
		</div>
	</section>
</page>

<?php $this->load->view('_blocks/footer')?>
