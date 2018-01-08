/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2016, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */
(function(){'use strict';var UserSettings=function(){};UserSettings.prototype.get=function(){var user={id:$('#user-id').val(),first_name:$('#first-name').val(),last_name:$('#last-name').val(),email:$('#email').val(),mobile_number:$('#mobile-number').val(),phone_number:$('#phone-number').val(),address:$('#address').val(),city:$('#city').val(),state:$('#state').val(),zip_code:$('#zip-code').val(),notes:$('#notes').val(),settings:{username:$('#username').val(),notifications:$('#user-notifications').hasClass('active'),calendar_view:$('#calendar-view').val()}};if($('#password').val()!=''){user.settings.password=$('#password').val()}
    return user};UserSettings.prototype.save=function(settings){if(!this.validate(settings)){Backend.displayNotification(EALang.user_settings_are_invalid);return}
    var postUrl=GlobalVariables.baseUrl+'//backend_api/ajax_save_settings';var postData={csrfToken:GlobalVariables.csrfToken,type:BackendSettings.SETTINGS_USER,settings:JSON.stringify(settings)};$.post(postUrl,postData,function(response){if(!GeneralFunctions.handleAjaxExceptions(response)){return}
        Backend.displayNotification(EALang.settings_saved);$('#footer-user-display-name').text('Hello, '+$('#first-name').val()+' '+$('#last-name').val()+'!')},'json').fail(GeneralFunctions.ajaxFailureHandler)};UserSettings.prototype.validate=function(){$('#user .required').css('border','');$('#user').find('#password, #retype-password').css('border','');try{var missingRequired=!1;$('#user .required').each(function(){if($(this).val()===''||$(this).val()===undefined){$(this).css('border','2px solid red');missingRequired=!0}});if(missingRequired){throw EALang.fields_are_required}
    if($('#password').val()!=$('#retype-password').val()){$('#password, #retype-password').css('border','2px solid red');throw EALang.passwords_mismatch}
    if(!GeneralFunctions.validateEmail($('#email').val())){$('#email').css('border','2px solid red');throw EALang.invalid_email}
    if($('#username').attr('already-exists')==='true'){$('#username').css('border','2px solid red');throw EALang.username_already_exists}
    return!0}catch(exc){Backend.displayNotification(exc);return!1}};window.UserSettings=UserSettings})()