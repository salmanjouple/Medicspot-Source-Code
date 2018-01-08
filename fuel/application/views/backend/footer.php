<div id="footer">
    <div id="footer-content" class="col-xs-12 col-md-6">

        <span id="select-language" class="label label-success" style="display:none;">
        	<?php echo ucfirst($this->config->item('language')); ?>
        </span>
        
        <a href="<?php echo site_url('appointments'); ?>">
            <?php echo $this->lang->line('go_to_booking_page') ?>
        </a>
    </div>

    <div id="footer-user-display-name" class="col-xs-12 col-md-6">
        <?php echo $this->lang->line('hello') . ', ' . $user_display_name; ?>!
    </div>
</div>

<script
    type="text/javascript"
    src="<?php echo $base_url; ?>/assets/js/backend.js"></script>
<script
    type="text/javascript"
    src="<?php echo $base_url; ?>/assets/js/general_functions.js"></script>
</body>
</html>
