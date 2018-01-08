/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2016, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.2.0
 * ---------------------------------------------------------------------------- */

/**
 * Backend Calendar Google Sync
 *
 * This module implements the Google Calendar sync operations. 
 *
 * @module BackendCalendarGoogleSync
 */
window.BackendCalendarGoogleSync=window.BackendCalendarGoogleSync||{};(function(exports){'use strict';function _bindEventHandlers(){$('#enable-sync').click(function(){if($('#enable-sync').hasClass('enabled')===!1){var authUrl=GlobalVariables.baseUrl+'/google/oauth/'+$('#select-filter-item').val();var redirectUrl=GlobalVariables.baseUrl+'/google/oauth_callback';var windowHandle=window.open(authUrl,'Authorize Easy!Appointments','width=800, height=600');var authInterval=window.setInterval(function(){if(windowHandle.document!==undefined){if(windowHandle.document.URL.indexOf(redirectUrl)!==-1){windowHandle.close();window.clearInterval(authInterval);$('#enable-sync').addClass('btn-danger enabled');$('#enable-sync span:eq(1)').text(EALang.disable_sync);$('#google-sync').prop('disabled',!1);$('#select-filter-item option:selected').attr('google-sync','true');var postUrl=GlobalVariables.baseUrl+'/backend_api/ajax_get_google_calendars';var postData={csrfToken:GlobalVariables.csrfToken,provider_id:$('#select-filter-item').val()};$.post(postUrl,postData,function(response){if(!GeneralFunctions.handleAjaxExceptions(response)){return}
    $('#google-calendar').empty();$.each(response,function(){var option='<option value="'+this.id+'">'+this.summary+'</option>';$('#google-calendar').append(option)});$('#select-google-calendar').modal('show')},'json').fail(GeneralFunctions.ajaxFailureHandler)}}},100)}else{$.each(GlobalVariables.availableProviders,function(index,provider){if(provider.id==$('#select-filter-item').val()){provider.settings.google_sync='0';provider.settings.google_token=null;_disableProviderSync(provider.id);$('#enable-sync').removeClass('btn-danger enabled');$('#enable-sync span:eq(1)').text(EALang.enable_sync);$('#google-sync').prop('disabled',!0);$('#select-filter-item option:selected').attr('google-sync','false');return!1}})}});$('#select-calendar').click(function(){var postUrl=GlobalVariables.baseUrl+'/backend_api/ajax_select_google_calendar';var postData={csrfToken:GlobalVariables.csrfToken,provider_id:$('#select-filter-item').val(),calendar_id:$('#google-calendar').val()};$.post(postUrl,postData,function(response){if(!GeneralFunctions.handleAjaxExceptions(response)){return}
    Backend.displayNotification(EALang.google_calendar_selected);$('#select-google-calendar').modal('hide')},'json').fail(GeneralFunctions.ajaxFailureHandler)});$('#close-calendar').click(function(){$('#select-google-calendar').modal('hide')});$('#google-sync').click(function(){var url=GlobalVariables.baseUrl+'/google/sync/'+$('#select-filter-item').val();$.ajax({url:url,type:'GET',dataType:'json'}).done(function(response){if(response.exceptions){response.exceptions=GeneralFunctions.parseExceptions(response.exceptions);GeneralFunctions.displayMessageBox(GeneralFunctions.EXCEPTIONS_TITLE,GeneralFunctions.EXCEPTIONS_MESSAGE);$('#message_box').append(GeneralFunctions.exceptionsToHtml(response.exceptions));return}
    if(response.warnings){response.warnings=GeneralFunctions.parseExceptions(response.warnings);GeneralFunctions.displayMessageBox(GeneralFunctions.WARNINGS_TITLE,GeneralFunctions.WARNINGS_MESSAGE);$('#message_box').append(GeneralFunctions.exceptionsToHtml(response.warnings))}
    Backend.displayNotification(EALang.google_sync_completed);$('#reload-appointments').trigger('click')}).fail(function(jqXHR,textStatus,errorThrown){Backend.displayNotification(EALang.google_sync_failed)})})}
    function _disableProviderSync(providerId){var postUrl=GlobalVariables.baseUrl+'/backend_api/ajax_disable_provider_sync';var postData={csrfToken:GlobalVariables.csrfToken,provider_id:providerId};$.post(postUrl,postData,function(response){if(response.exceptions){response.exceptions=GeneralFunctions.parseExceptions(response.exceptions);GeneralFunctions.displayMessageBox(GeneralFunctions.EXCEPTIONS_TITLE,GeneralFunctions.EXCEPTIONS_MESSAGE);$('#message_box').append(GeneralFunctions.exceptionsToHtml(response.exceptions))}},'json').fail(GeneralFunctions.ajaxFailureHandler)}
    exports.initialize=function(){_bindEventHandlers()}})(window.BackendCalendarGoogleSync)