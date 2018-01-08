<div class="jspContainer" style="width: 320px; height: 154px;">
	<div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 320px;">
		<?php foreach($results as $r){?>
		<div class="entry" data-id="<?php echo $r['id'];?>">
			<strong><a href="<?php echo base_url();?>Clinics_info/index/<?php echo $r['id'];?>"><?php echo $r['cl_formatted_address'];?></a></strong>
		</div>
		<hr>
		<?php } ?>
	</div>
</div>