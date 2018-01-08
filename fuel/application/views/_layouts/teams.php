<?php $this->load->view('_blocks/header')?>


<page id="team">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo fuel_var('heading'); ?></h1>
			</div>
			<div class="content">
				<p>
					<?php echo fuel_var('body'); ?>
				</p>
			</div>
		</div>
	</section>

	<section id="learn-more" class="call-to-action">
		<div class="container">
			<p>Learn more about our service</p>
			<div class="learn-more-buttons">
				<a href="<?php echo base_url('what-we-treat');?>" class="btn s-large s-inverted">What we treat</a>
				<a href="<?php echo base_url('how-it-works');?>" class="btn s-large s-inverted">How it works</a>
			</div>
	</section>

	<?php
	$CI =& get_instance();
	$CI->load->database();
	$CI->db->select('*');
	$CI->db->where('context','team');
	$cats = $CI->db->get('fuel_categories')->result_array();
	//print_r($cats);	
	foreach($cats as $c){
	?>
	<section id="founding" class="dots-background diamond-background text-section">
		<div class="container">

			<div class="section-header">
				<h1><?php echo $c['name'];?></h1>
			</div>
			<div class="content">

				<div class="people-list">
				<?php

					$CI->db->select('*');
					$CI->db->where('category_id',$c['id']);
					$teams = $CI->db->get('teams')->result_array();
					
					foreach($teams as $t){
				?>
					<div class="person">
						<div class="person-meta">
							<div class="person-photo">
								<img src="<?php echo base_url('assets/images/'.$t['avatar_image']);?>">
							</div>
							<div class="person-data">
								<div class="person-name"><?php echo $t['name'];?></div>
								<div class="person-profession"><?php echo $t['title'];?></div>
							</div>
						</div>
						<div class="person-quote">
							<p>
								<?php echo $t['bio'];?>
							</p>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

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
