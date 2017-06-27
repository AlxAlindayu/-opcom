<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Set the controller time zone [Enalds]
|--------------------------------------------------------------------------
*/
define('TIME_ZONE', 'Asia/Manila');

/*
|--------------------------------------------------------------------------
| Filter Types [Enalds]
|--------------------------------------------------------------------------
*/
define('FILTER_STR', '/^[a-z,A-Z, ]+$/'); // Use for names
define('FILTER_INT', '/^[0-9]+$/');
define('FILTER_INT_DEC', '/^[0-9,.]+$/');
define('FILTER_STR_INT', '/^[a-z,A-Z,0-9,]+$/');
define('FILTER_STR_INT_SPA', '/^[a-z,A-Z,0-9, ]+$/');
define('FILTER_USERNAME', '/^[a-z,A-Z,0-9,_, ]+$/');
define('FILTER_EMAIL', '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_-]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/');

/*
|--------------------------------------------------------------------------
| Email Settings [Enalds]
|--------------------------------------------------------------------------
*/
define('EMAIL_FROM','no-reply@creation-eyed.com');
define('EMAIL_FROM_NAME','Creation Eyed Mailer');
define('EMAIL_SUBJECT','Creation Eyed');

/*
|--------------------------------------------------------------------------
| CSS Layout [Enalds]
|
| Available Layouts
|	- 960
|	- 960_sticky_footer
|	- full
|	- full_sticky_footer
|	- advertise
|	- advertise_sticky_footer
|--------------------------------------------------------------------------
*/
define('CSS_LAYOUT','960_sticky_footer');

/*
|--------------------------------------------------------------------------
| Mobile [Enalds]
|--------------------------------------------------------------------------
*/
define('MOBILE', FALSE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */