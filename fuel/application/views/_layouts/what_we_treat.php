<?php $this->load->view('_blocks/header')?>


<page id="what-we-treat">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo fuel_var('heading'); ?></h1>
			</div>
			<div class="content">
				<p>
					<?php echo fuel_var('body'); ?>
				</p>
				<a href="/reviews" class="btn s-large">
					<i class="fa fa-users" aria-hidden="true"></i>
					<span>Case Studies</span>
				</a>
			</div>
		</div>
	</section>

	<section id="can-treat" class="treat-section">
		<div class="container">
			<h1>What Can We Help With?</h1>
			<ul class="treat-list">
				<?php
					$CI =& get_instance();
					$CI->load->database();
					$CI->db->select('*');
					$CI->db->where('can_treat','yes');
					$CI->db->where('published','yes');
					$treats = $CI->db->get('what_we_treats')->result_array();
				
					foreach($treats as $t){
				?>
				<li>
					<h3><?php echo $t['name'];?></h3>
					<p><?php echo $t['desc'];?></p>
				</li>
				<?php } ?>
			</ul>
		</div>
	</section>

	<section id="cannot-treat" class="treat-section">
		<div class="container">
			<h1>
				<i class="fa fa-exclamation-circle" aria-hidden="true"></i> 
				What We Can’t Treat
			</h1>
			<p class="subtitle">
				MedicSpot should not be used if you feel your condition is a medical emergency.
			</p>
			<ul class="treat-list">
				<?php
					$CI =& get_instance();
					$CI->load->database();
					$CI->db->select('*');
					$CI->db->where('can_treat','no');
					$treats = $CI->db->get('what_we_treats')->result_array();
				
					foreach($treats as $t){
				?>
				<li>
					<h3><?php echo $t['name'];?></h3>
				</li>
				<?php } ?>
			</ul>
		</div>
	</section>

	<section id="call-to-action" class="call-to-action">
		<div class="container">
			<p>
				Online telemedicine consultations can never fully replace a traditional doctor consultation, but we have found that we can deal with approximately 95% of all cases with our MedicSpot station. This is more than any other UK based online consultation service.
			</p>
			<a href="<?php echo base_url('how-it-works');?>" class="btn s-large s-rounded s-inverted">How it works</a>
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
</page>	

<?php $this->load->view('_blocks/footer')?>
