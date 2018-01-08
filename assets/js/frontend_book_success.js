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
$(document).ready(function(){$('#add-to-google-calendar').click(function(){gapi.client.setApiKey(GlobalVariables.googleApiKey);gapi.auth.authorize({client_id:GlobalVariables.googleClientId,scope:GlobalVariables.googleApiScope,immediate:!1},handleAuthResult)});function handleAuthResult(authResult){try{if(authResult.error){throw 'Could not authorize user.'}
    var appointmentData=GlobalVariables.appointmentData;appointmentData.start_datetime=GeneralFunctions.ISODateString(Date.parseExact(appointmentData.start_datetime,'yyyy-MM-dd HH:mm:ss'));appointmentData.end_datetime=GeneralFunctions.ISODateString(Date.parseExact(appointmentData.end_datetime,'yyyy-MM-dd HH:mm:ss'));var resource={summary:GlobalVariables.serviceData.name,location:GlobalVariables.companyName,start:{dateTime:appointmentData.start_datetime},end:{dateTime:appointmentData.end_datetime},attendees:[{email:GlobalVariables.providerData.email,displayName:GlobalVariables.providerData.first_name+' '+GlobalVariables.providerData.last_name}]};gapi.client.load('calendar','v3',function(){var request=gapi.client.calendar.events.insert({calendarId:'primary',resource:resource});request.execute(function(response){if(response.error){throw 'Could not add the event to Google Calendar.'}
        $('#success-frame').append('<br><br>'+'<div class="alert alert-success col-xs-12">'+'<h4>'+EALang.success+'</h4>'+'<p>'+EALang.appointment_added_to_google_calendar+'<br>'+'<a href="'+response.htmlLink+'" target="_blank">'+EALang.view_appointment_in_google_calendar+'</a>'+'</p>'+'</div>');$('#add-to-google-calendar').hide()})})}catch(exc){$('#success-frame').append('<div class="alert alert-danger col-xs-12">'+'<h4>'+EALang.oops_something_went_wrong+'</h4>'+'<p>'+EALang.could_not_add_to_google_calendar+'<pre>'+exc+'</pre>'+'</p>'+'</div>')}}})