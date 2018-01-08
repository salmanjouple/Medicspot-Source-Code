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
window.BackendCustomers=window.BackendCustomers||{};(function(exports){'use strict';var helper={};exports.initialize=function(defaultEventHandlers){defaultEventHandlers=defaultEventHandlers||!1;helper=new CustomersHelper();helper.resetForm();helper.filter('');$('#filter-customers .results').jScrollPane();$('#customer-appointments').jScrollPane();if(defaultEventHandlers){_bindEventHandlers()}};function _bindEventHandlers(){helper.bindEventHandlers()}})(window.BackendCustomers)