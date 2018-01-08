<?php 
/*
|--------------------------------------------------------------------------
| MY Custom Modules
|--------------------------------------------------------------------------
|
| Specifies the module controller (key) and the name (value) for fuel
*/

$config['modules']['what_we_treats'] = array();
$config['modules']['teams'] = array();
$config['modules']['reviews'] = array();
$config['modules']['faqs'] = array();
$config['modules']['articles'] = array();
$config['modules']['testimonials'] = array();
$config['modules']['clinics'] = array();
$config['modules']['promo_codes'] = array();

$config['modules']['searches'] = array();

/*********************** EXAMPLE ***********************************

$config['modules']['quotes'] = array(
	'preview_path' => 'about/what-they-say',
);
*/
$config['modules']['clinics'] = array(
	'preview_path' => 'showcase/project/{slug}',
	'sanitize_images' => FALSE // to prevent false positives with xss_clean image sanitation
);

/*********************** /EXAMPLE ***********************************/



/*********************** OVERWRITES ************************************/

$config['module_overwrites']['categories']['hidden'] = FALSE; // change to FALSE if you want to use the generic categories module
$config['module_overwrites']['tags']['hidden'] = TRUE; // change to FALSE if you want to use the generic tags module

/*********************** /OVERWRITES ************************************/
