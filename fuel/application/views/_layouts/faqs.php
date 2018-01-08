<?php $this->load->view('_blocks/header')?>


<page id="faq">
	<section id="intro" class="dots-background diamond-background text-section">
		<div class="container">
			<div class="section-header">
				<h1><?php echo fuel_var('heading'); ?></h1>
			</div>
			<div class="content">
				<dl class="faq-list">
					<?php
					$CI =& get_instance();
					$CI->load->database();
					$CI->db->select('*');
					$CI->db->where('published','yes');
					$faqs = $CI->db->get('faqs')->result_array();
				
					foreach($faqs as $f){
					?>
					<dt><?php echo $f['question'];?></dt>
					<dd>
						<?php echo $f['answer'];?>
					</dd>
					<?php } ?>
				</dl>
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
</page>

<?php $this->load->view('_blocks/footer')?>
