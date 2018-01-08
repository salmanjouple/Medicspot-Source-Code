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
(function(){'use strict';var SystemSettings=function(){};SystemSettings.prototype.save=function(settings){var postUrl=GlobalVariables.baseUrl+'//backend_api/ajax_save_settings';var postData={csrfToken:GlobalVariables.csrfToken,settings:JSON.stringify(settings),type:BackendSettings.SETTINGS_SYSTEM,clinic_id:jQuery('#clinic_id').val()};$.post(postUrl,postData,function(response){if(!GeneralFunctions.handleAjaxExceptions(response)){return}
    Backend.displayNotification(EALang.settings_saved);$('#header-logo span').text($('#company-name').val());var workingPlan=BackendSettings.wp.get();$('.breaks tbody').empty();BackendSettings.wp.setup(workingPlan);BackendSettings.wp.timepickers(!1)},'json').fail(GeneralFunctions.ajaxFailureHandler)};SystemSettings.prototype.get=function(){var settings=[];$('#general').find('input, select').each(function(){settings.push({name:$(this).attr('data-field'),value:$(this).val()})});settings.push({name:'customer_notifications',value:$('#customer-notifications').hasClass('active')===!0?'1':'0'});settings.push({name:'require_captcha',value:$('#require-captcha').hasClass('active')===!0?'1':'0'});settings.push({name:'company_working_plan',value:JSON.stringify(BackendSettings.wp.get())});settings.push({name:'book_advance_timeout',value:$('#book-advance-timeout').val()});return settings};SystemSettings.prototype.validate=function(){$('#general .required').css('border','');try{var missingRequired=!1;$('#general .required').each(function(){if($(this).val()==''||$(this).val()==undefined){$(this).css('border','2px solid red');missingRequired=!0}});if(missingRequired){throw EALang.fields_are_required}
    if(!GeneralFunctions.validateEmail($('#company-email').val())){$('#company-email').css('border','2px solid red');throw EALang.invalid_email}
    return!0}catch(exc){Backend.displayNotification(exc);return!1}};window.SystemSettings=SystemSettings})()