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

window.BackendServices=window.BackendServices||{};(function(exports){'use strict';var helper;var servicesHelper=new ServicesHelper();var categoriesHelper=new CategoriesHelper();exports.initialize=function(bindEventHandlers){bindEventHandlers=bindEventHandlers||!0;$.each(GlobalVariables.categories,function(index,category){var option=new Option(category.name,category.id);$('#service-category').append(option)});$('#service-category').append(new Option('- '+EALang.no_category+' -',null)).val('null');$('#service-duration, #service-attendants-number').spinner({min:1,disabled:!0});helper=servicesHelper;helper.resetForm();helper.filter('');$('#filter-services .results').jScrollPane();$('#filter-categories .results').jScrollPane();if(bindEventHandlers){_bindEventHandlers()}};function _bindEventHandlers(){$('.tab').click(function(){$(this).parent().find('.active').removeClass('active');$(this).addClass('active');$('.tab-content').hide();if($(this).hasClass('services-tab')){$('#services').show();helper=servicesHelper}else if($(this).hasClass('categories-tab')){$('#categories').show();helper=categoriesHelper}
    helper.resetForm();helper.filter('');$('.filter-key').val('');Backend.placeFooterToBottom()});servicesHelper.bindEventHandlers();categoriesHelper.bindEventHandlers()}
    exports.updateAvailableCategories=function(){var postUrl=GlobalVariables.baseUrl+'//backend_api/ajax_filter_service_categories';var postData={csrfToken:GlobalVariables.csrfToken,key:''};$.post(postUrl,postData,function(response){if(!GeneralFunctions.handleAjaxExceptions(response)){return}
        GlobalVariables.categories=response;var $select=$('#service-category');$select.empty();$.each(response,function(index,category){var option=new Option(category.name,category.id);$select.append(option)});$select.append(new Option('- '+EALang.no_category+' -',null)).val('null')},'json').fail(GeneralFunctions.ajaxFailureHandler)}})(window.BackendServices)