<script type="text/javascript"
        src="<?php echo $base_url; ?>/assets/js/backend_settings_system.js"></script>
<script type="text/javascript"
        src="<?php echo $base_url; ?>/assets/js/backend_settings_user.js"></script>
<script type="text/javascript"
        src="<?php echo $base_url; ?>/assets/js/backend_settings.js"></script>
<script type="text/javascript"
        src="<?php echo $base_url; ?>/assets/js/working_plan.js"></script>
<script type="text/javascript"
        src="<?php echo $base_url; ?>/assets/ext/jquery-ui/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript"
        src="<?php echo $base_url; ?>/assets/ext/jquery-jeditable/jquery.jeditable.min.js"></script>

<script type="text/javascript">
    var GlobalVariables = {
        'csrfToken'     : <?php echo json_encode($this->security->get_csrf_hash()); ?>,
        'baseUrl'       : <?php echo json_encode($base_url); ?>,
        'dateFormat'    : <?php echo json_encode($date_format); ?>,
        'userSlug'      : <?php echo json_encode($role_slug); ?>,
        'settings'      : {
            'system'    : <?php echo json_encode($system_settings); ?>,
            'user'      : <?php echo json_encode($user_settings); ?>
        },
        'user'          : {
            'id'        : <?php echo $user_id; ?>,
            'email'     : <?php echo json_encode($user_email); ?>,
            'role_slug' : <?php echo json_encode($role_slug); ?>,
            'privileges': <?php echo json_encode($privileges); ?>
        }
    };

    $(document).ready(function() {
        BackendSettings.initialize(true);
    });
</script>

<style type="text/css">
.jspContainer{
  min-height: 500px;
}
</style>
<div id="customers-page" class="container-fluid backend-page">
    <div class="row">
        <div id="filter-customers" class="filter-records column col-xs-12 col-sm-5">
        <form class="input-append">
          <input class="key" type="text" />
                <div class="btn-group">
                    <button class="filter btn btn-default btn-sm" type="submit" title="<?php echo $this->lang->line('filter'); ?>">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                    <button class="clear btn btn-default btn-sm" type="button" title="<?php echo $this->lang->line('clear'); ?>">
                        <span class="glyphicon glyphicon-repeat"></span>
                    </button>
                </div>
        </form>

            <h3><?php echo $this->lang->line('clinics'); ?></h3>
            <div class="results" style="overflow-y:scroll;height:500px;"></div>
      </div>

      <div class="record-details col-xs-12 col-sm-7">


<form class="form-horizontal" id="clinic-form">
<fieldset>

<!-- Form Name -->
<legend>Clinic Form 

<?php if ($privileges[PRIV_SYSTEM_SETTINGS]['edit'] == TRUE): ?>
                    <button type="button" class="save-clinic btn btn-primary btn-xs"
                            title="<?php echo $this->lang->line('save'); ?>">
                        <span class="glyphicon glyphicon-floppy-disk"></span>
                        <?php echo $this->lang->line('save'); ?>
                    </button>
                    <?php endif ?>
</legend>

<?php if(isset($cl_formatted_address)){ echo $cl_formatted_address; } ?>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="clinic_name">Clinic Name *</label>  
  <div class="col-md-5">
  <input id="cl_clinic_name" name="cl_clinic_name" type="text" placeholder="Clinic Name" class="required form-control input-md" required="required" value="<?php if(isset($cl_clinic_name)){ echo $cl_clinic_name; } ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address_line_1">Address Line 1 *</label>  
  <div class="col-md-5">
  <input id="cl_address_line_1" name="cl_address_line_1" type="text" placeholder="Address Line 1" class="required form-control input-md" required="required" value="<?php if(isset($cl_address_line_1)){ echo $cl_address_line_1; } ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Address_line_2">Address line 2</label>  
  <div class="col-md-5">
  <input id="cl_address_line_2" name="cl_address_line_2" type="text" placeholder="Address line 2" class="form-control input-md" value="<?php if(isset($cl_address_line_2)){ echo $cl_address_line_2; } ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="postcode">Postcode *</label>  
  <div class="col-md-5">
  <input id="cl_postcode" name="cl_postcode" type="text" placeholder="Postcode" class="form-control input-md required" required="required" value="<?php if(isset($cl_postcode)){ echo $cl_postcode; } ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone_number">Phone number *</label>  
  <div class="col-md-5">
  <input id="cl_phone_number" name="cl_phone_number" type="text" placeholder="Phone number" class="form-control input-md required" required="required" value="<?php if(isset($cl_phone_number)){ echo $cl_phone_number; } ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email_address">Email Address *</label>  
  <div class="col-md-5">
  <input id="cl_email_address" name="cl_email_address" type="text" placeholder="Email Address" class="form-control input-md required" required="required" value="<?php if(isset($cl_email_address)){ echo $cl_email_address; } ?>">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="cl_description" name="cl_description"><?php if(isset($cl_description)){ echo $cl_description; } ?></textarea>
  </div>
</div>

<input type="hidden" name="cl_clinic_id" value="<?php if(isset($cl_clinic_id)){ echo $cl_clinic_id; } ?>">
</fieldset>
</form>
        </div>

    </div>
</div>

<script language="javascript">
  function getEntries(){
    $.ajax({
      type: "POST",
      url: GlobalVariables.baseUrl+'Clinics_info/get_clinics',
      data: '<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>', // serializes the form's elements.
      dataType:'html',
      success: function(data)
      {
        jQuery('.results').html(data);
        jQuery('.results').jScrollPane();
      }
    });
  }

  jQuery( document ).ready(function() {

      getEntries();
      
      jQuery('.save-clinic').on('click', function(e){
        e.preventDefault(); 
        $.ajax({
            type: "POST",
            url: GlobalVariables.baseUrl+'Clinics_info/update',
            data: $("#clinic-form").serialize()+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>', // serializes the form's elements.
            dataType:'json',
            success: function(data)
            {
             if(data.status==1){
                jQuery('#notification').toggle('slideDown');
                jQuery('#notification').html('<div class="notification alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+data.msg+'</strong></div>');

                getEntries();

                setTimeout(function(){
                  jQuery('#notification').toggle('slideUp');
                  jQuery('#notification').html('');
                }, 2000);
             }else{
                jQuery('#notification').toggle('slideDown');
                jQuery('#notification').html('<div class="notification alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>'+data.msg+'</strong></div>');
                setTimeout(function(){
                  jQuery('#notification').toggle('slideUp');
                  jQuery('#notification').html('');
                }, 2000);
             }
           }
        });
      })
  });
</script>