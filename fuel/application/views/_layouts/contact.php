<?php $this->load->view('_blocks/header')?>
<style type="text/css">
input, select, textarea {
	padding-left: 4.8rem;
}
</style>

<page id="contact">
	<section id="contact-info" class="dots-background with-media">
		<div class="container">
			<div class="content">
				<h1><?php echo fuel_var('heading',''); ?></h1>
				<p>
					<?php echo fuel_var('body',''); ?>
				</p>
			</div>
			<div class="media-wrapper">
				<div class="media-content" style="padding-top: 75%;">
					<div id="contact-map">
						
					</div>
				</div>
			</div>
			<!--<img border="0" src="//maps.googleapis.com/maps/api/staticmap?center=51.5259704,-0.1660516&zoom=14&size=400x400">-->
		</div>
	</section>

	<section id="contact-form">
		<div class="container">
			<h1>Contact Us</h1>
			<form id="contact">
				<div class="input-row">
					<div class="input-box">
						<i class="fa fa-user"></i>
						<input type="text" name="first-name" id="first-name" placeholder="First Name" required>
					</div>
					<div class="input-box">
						<i class="fa fa-user"></i>
						<input type="text" name="last-name" id="last-name" placeholder="Last Name" required>
					</div>
				</div>
				<div class="input-row">
					<div class="input-box">
						<i class="fa fa-envelope"></i>
						<input type="email" name="email" id="email" placeholder="Email" required>
					</div>
				</div>
				<div class="input-row">
					<div class="input-box">
						<i class="fa fa-pencil"></i>
						<textarea name="message" id="message" placeholder="Message" required></textarea>
					</div>
				</div>
				<div class="input-row input-buttons-row">
					<button type="submit" class="btn s-large">Send</button>
				</div>
			</form>
		</div>
	</section>

	<section id="raise-complaint" class="call-to-action">
		<div class="container">
			<p>Unhappy With Our Service? You Can Raise A Complaint Online.</p>
			<a href="<?php echo base_url('complaints');?>" class="btn s-large s-rounded s-inverted">Raise a Complaint</a>
		</div>
	</section>
</page>

<script language="javascript">
$( document ).ready(function() {
	$(window).load(function(){
		contact_Map();
	});
	$("#contact").submit(function(e) { 
	//alert('hit');
			e.preventDefault();
			var url = "<?php echo base_url('contact_us');?>"; 
			//alert($(this).serialize());
			
			$(this).find('button').text('Thanks!');
			$.ajax({
				   type: "POST",
				   url: url,
				   data: {'first-name':jQuery('#first-name').val(), 'last-name':jQuery('#last-name').val(), 'email':jQuery('#email').val(), 'message':jQuery('#message').val()}, // serializes the form's elements.
				   dataType:'json',
				   success: function(data)
				   {
					   if(data.status==1){
							$('#successMessageLogin').html(data.msg);
							$('#successMessageLogin').show();
							window.scrollTo(0, 0);
							$(this).find('input, textarea').val('');
					   }else{
						   //alert(data.msg);
						   $('#warningMessageLogin').html(data.msg);
						   $('#warningMessageLogin').show();
						   setTimeout(function(){$('#warningMessage').fadeOut();}, 2000);
						   l.stop();
                           window.scrollTo(0, 0);
					   }
				   }
			});
	});
});
</script>

</script>
	
<?php $this->load->view('_blocks/footer')?>
