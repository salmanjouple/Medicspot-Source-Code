<?php $this->load->view('_blocks/header')?>


<page id="contact-business">
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

	<section id="talk-to-us" class="text-section">
		<div class="container">
			<div class="section-header">
				<h1>Talk to us today to discuss how MedicSpot can help your staff to:</h1>
			</div>
			<div>
				<ul>
					<li>
						<i class="fa fa-check"></i>
						<p>Improve Health &amp; Wellbeing</p>
					</li>
					<li>
						<i class="fa fa-check"></i>
						<p>Reduce Absenteeism &amp; Improve Productivity</p>
					</li>
					<li>
						<i class="fa fa-check"></i>
						<p>Improve Happiness</p>
					</li>
				</ul>
				<a href="<?php echo base_url('/contact');?>" class="btn s-large">Contact Us</a>
			</div>
		</div>
	</section>
</page>
<?php $this->load->view('_blocks/footer')?>
