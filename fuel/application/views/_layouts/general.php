<?php $this->load->view('_blocks/header')?>
	

<page id="home">

</page>

<page id="pricing">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo fuel_var('heading'); ?></h1>
				<p class="subtitle">
					<?php echo fuel_var('body'); ?>
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
	
<?php $this->load->view('_blocks/footer')?>
