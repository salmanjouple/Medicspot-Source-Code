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

/**
 * Backend Calendar
 *
 * This module contains functions that are used by the backend calendar page.
 *
 * @module BackendCalendar
 */
window.BackendCalendar=window.BackendCalendar||{};(function(exports){'use strict';function _bindEventHandlers(){var $calendarPage=$('#calendar-page');$calendarPage.on('click','#toggle-fullscreen',function(){var $target=$(this);var element=document.documentElement;var isFullScreen=(document.fullScreenElement&&document.fullScreenElement!==null)||document.mozFullScreen||document.webkitIsFullScreen;if(isFullScreen){if(document.exitFullscreen)
    document.exitFullscreen();else if(document.msExitFullscreen)
    document.msExitFullscreen();else if(document.mozCancelFullScreen)
    document.mozCancelFullScreen();else if(document.webkitExitFullscreen)
    document.webkitExitFullscreen();$target.removeClass('btn-success').addClass('btn-default')}else{if(element.requestFullscreen)
    element.requestFullscreen();else if(element.msRequestFullscreen)
    element.msRequestFullscreen();else if(element.mozRequestFullScreen)
    element.mozRequestFullScreen();else if(element.webkitRequestFullscreen)
    element.webkitRequestFullscreen();$target.removeClass('btn-default').addClass('btn-success')}})}
    exports.initialize=function(view){if(view==='table'){BackendCalendarTableView.initialize()}else{BackendCalendarDefaultView.initialize()}
        BackendCalendarGoogleSync.initialize();BackendCalendarAppointmentsModal.initialize();BackendCalendarUnavailabilitiesModal.initialize();_bindEventHandlers()}})(window.BackendCalendar)