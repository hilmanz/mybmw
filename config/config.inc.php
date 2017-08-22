<?php
@include_once "locale.inc.php";

$CONFIG['LOG_DIR'] = "../logs/";
$GLOBAL_PATH = "../";
$APP_PATH = "../com/";
$ENGINE_PATH = "../engines/";
$WEBROOT = "../public_html/";

error_reporting(E_ALL & ~E_DEPRECATED);
//set aplikasi yang digunakan
define('APPLICATION','application');
define('COORPORATE_APPS','coorporate_apps');
define('MOBILE_APPS','mobile');
define('WAP_APPS','wap_apps');
define('DASHBOARD_APPS','dashboard');

define('WIDGET_DOMAIN_WEB',APPLICATION."/widgets/");
define('WIDGET_DOMAIN_COORPORATE',COORPORATE_APPS."/widgets/");
define('WIDGET_DOMAIN_MOBILE',MOBILE_APPS."/widgets/");
define('WIDGET_DOMAIN_WAP',WAP_APPS."/widgets/"); //new
define('WIDGET_DOMAIN_DASHBOARD',DASHBOARD_APPS."/widgets/"); //new

define('HELPER_DOMAIN_WEB',APPLICATION."/helper/");
define('HELPER_DOMAIN_COORPORATE',COORPORATE_APPS."/helper/");
define('HELPER_DOMAIN_MOBILE',MOBILE_APPS."/helper/");
define('HELPER_DOMAIN_WAP',WAP_APPS."/helper/"); //new
define('HELPER_DOMAIN_DASHBOARD',DASHBOARD_APPS."/helper/"); //new

define('MODULES_DOMAIN_WEB',$APP_PATH.APPLICATION."/modules/");
define('MODULES_DOMAIN_COORPORATE',$APP_PATH.COORPORATE_APPS."/modules/");
define('MODULES_DOMAIN_MOBILE',$APP_PATH.MOBILE_APPS."/modules/");
define('MODULES_DOMAIN_WAP',$APP_PATH.WAP_APPS."/modules/"); //new
define('MODULES_DOMAIN_DASHBOARD',$APP_PATH.DASHBOARD_APPS."/modules/"); //new

define('TEMPLATE_DOMAIN_WEB',APPLICATION."/web/");
define('TEMPLATE_DOMAIN_COORPORATE',APPLICATION."/coorporate/");
define('TEMPLATE_DOMAIN_MOBILE',APPLICATION."/mobile/");
define('TEMPLATE_DOMAIN_WAP',APPLICATION."/wap/"); //new
define('TEMPLATE_DOMAIN_DASHBOARD',APPLICATION."/dashboard/"); //new

define('SCHEMA_DATA','code2book');
//set TRUE jika dalam local
$local = true;
$DEVELOPMENT_MODE = true;
$CONFIG['DEFAULT_MODULES'] = "home.php";
$CONFIG['DEFAULT_MODULES_ADMIN'] = "home.php";
$CONFIG['DEFAULT_MODULES_MOBILE'] = "home.php";
$CONFIG['VIEW_ON']  = 1;
$CONFIG['DINAMIC_MODULE']  = "home";
$CONFIG['REGISTER_PAGE']  = "register";
$CONFIG['LOCAL_DEVELOPMENT'] = false;
$CONFIG['DELAYTIME'] = 0;
//WEB APP BASE DOMAIN
// echo ("preview.kanadigital.com");
if(preg_match("/dev./i",'www.mybmw.co.id')){
	$DOMAIN = "http://{$_SERVER['HTTP_HOST']}/mybmw/";//rif
	$PUBLIC_HTML = "";
}else{

	$DOMAIN = "http://{$_SERVER['HTTP_HOST']}/mybmw/";//rif
	$PUBLIC_HTML = "public_html/";
}
$CONFIG['BASE_DOMAIN_PATH'] = "http://{$_SERVER['HTTP_HOST']}/mybmw/";//rif

$CONFIG['CLOSED_WEB'] = false;
$CONFIG['TEASER_DOMAIN'] =  "{$DOMAIN}";
$CONFIG['MAINTENANCE'] = false;
$CONFIG['BASE_DOMAIN'] = "{$DOMAIN}{$PUBLIC_HTML}";
$CONFIG['DASHBOARD_DOMAIN'] = "{$DOMAIN}dashboard_html/";
$CONFIG['COORPORATE_DOMAIN'] = "{$DOMAIN}coorporate_html/";
$CONFIG['WAP_DOMAIN'] =  "{$DOMAIN}wap_html/"; //new
$CONFIG['Postpaid_OnlineRegistration'] = "{$DOMAIN}Postpaid_OnlineRegistration/";
$CONFIG['Prepaid_Registrations'] = "{$DOMAIN}Prepaid_Registrations/";

$CONFIG['ASSETS_DOMAIN_WEB'] = $CONFIG['BASE_DOMAIN']."assets/";
$CONFIG['ASSETS_DOMAIN_COORPORATE'] = $CONFIG['COORPORATE_DOMAIN']."assets/";
$CONFIG['ASSETS_DOMAIN_WAP'] = $CONFIG['WAP_DOMAIN']."assets/"; //new
$CONFIG['ASSETS_DOMAIN_DASHBOARD'] = $CONFIG['DASHBOARD_DOMAIN']."assets/"; //new

$CONFIG['PUBLIC_ASSET'] = "public_assets/";


$CONFIG['LOCAL_PUBLIC_ASSET'] = "/home/mybmw/public_html/public_assets/";
$CONFIG['LOCAL_ASSET'] = "/home/mybmw/public_html/assets/";
$CONFIG['UPLOAD_ASSET'] = "/home/mybmw/public_html/assets/";
$CONFIG['UPLOAD_SOURCE_ASSET'] = "/home/mybmw/public_html/assets/content/phase4/news/";

if($CONFIG['LOCAL_DEVELOPMENT']) $CONFIG['LOGIN_PAGE']  = "{$DOMAIN}{$PUBLIC_HTML}login/local";
else  $CONFIG['LOGIN_PAGE']  = "{$DOMAIN}{$PUBLIC_HTML}login/local";


/*Landing Page*/
$CONFIG['LANDING_PAGE'] = "{$DOMAIN}{$PUBLIC_HTML}landing";

$CONFIG['MOBILE_SITE'] =  "{$DOMAIN}";
$CONFIG['LANDING_MOBILE_PAGE'] = "{$CONFIG['MOBILE_SITE']}landing";
$CONFIG['ASSETS_DOMAIN_MOBILE'] = $CONFIG['MOBILE_SITE']."assets/"; //new

$CONFIG['SESSION_NAME'] = "bmw_2015";

$CONFIG['ASPIRATION'] = "{$DOMAIN}{$PUBLIC_HTML}aspiration";
$CONFIG['ASPIRATION_MOBILE'] = "{$DOMAIN}{$PUBLIC_HTML}aspiration";

$CONFIG['MODERATION'] = 0;
$CONFIG['LIFETIME'] = 1*60*20;
$CONFIG['HIDDENCODELIMIT'] = 50;
$CONFIG['HIDDENCODERANGE'] = 100;
$CONFIG['20loginevent'] = false;
$CONFIG['usingelusive'] = false;
$CONFIG['BUCKETLISTTASK'] = 3;
/* allow access page on unverified */
$CONFIG['access-unverified'] = array("home");


//SOCIAL MEDIA
//testing
// $FB['appID'] = "181586055282513";
// $FB['appSecret'] = "d22971d06613820427e4e44cdfe1d67b";


// $FB['appID'] = "897249216975457";
// $FB['appSecret'] = "29d79a1e90e8504b1a95289935c7bd21";

$FB['appID'] = "675762459151638";
$FB['appSecret'] = "20e996a5074a779e96998d32805a3080";

// $FB['appID'] = "341380259214774";
// $FB['appSecret'] = "63685e1fd7db81fc51a04de0e2034ceb";

$TWITTER['CONSUMER_KEY'] = 'CeAeKQ6W2flJaiR7m5D3uQ';
$TWITTER['CONSUMER_SECRET'] = 'QS7jBlukxkXhN1bUqFAh5K3Z1pz84Z9fGjgoeJ5mxu8';
$TWITTER['LOGIN_CALLBACK'] = $CONFIG['BASE_DOMAIN'].'?loginType=twitter';

$GPLUS['client_id'] = "990314435829.apps.googleusercontent.com";
$GPLUS['client_secret'] = "c6TzeOJkdOJxtzr_TGMxv5xN";
$GPLUS['developer_key'] = "AIzaSyAWZTca5Nth3LPhlzI9dJUsG2kZUMhFB7I";
$GPLUS['redirect_url'] = "{$DOMAIN}public_html/?loginType=google";

$VIKI['application_id'] ="4fd917c27e2e3f464ebee73fea5abab9f42607887a7f5d705361c4e1dec3fdd8";
$VIKI['application_secret'] = "f59f2126673bf7b629a2867d9dc02e6dcff1e9896fa1b25be6e9ba2eb4003bdb";
$VIKI['callback'] =  "http://viki.com";

/**
 * memcache setting
 */
 $CONFIG['memcache_host'] = "127.0.0.1";
 $CONFIG['memcache_port'] = 11211;


/**
 * GPlus Bot Configuration
 */
$GPLUSBOT['target_id'] = "111091089527727420853";
$GPLUSBOT['maxResults'] = 10;
$GPLUSBOT['bot_sleep_time'] = 60;


$CONFIG['DATABASE_WEB'] = "bmw";
$CONFIG['DATABASE_ADMIN'] = "bmw";
$CONFIG['DATABASE_LOGS'] = "bmw";
$CONFIG['DATABASE_REPORTS'] = "bmw";

define('ADMIN_APPS','admin'); //new
define('WIDGET_DOMAIN_ADMIN',ADMIN_APPS."/widgets/"); //new
define('HELPER_DOMAIN_ADMIN',ADMIN_APPS."/helper/"); //new
define('MODULES_DOMAIN_ADMIN',$APP_PATH.ADMIN_APPS."/modules/"); //new
define('TEMPLATE_DOMAIN_ADMIN',APPLICATION."/admin/"); //new

$CONFIG['ADMIN_DOMAIN'] =  "{$DOMAIN}cms/"; //new
$CONFIG['ASSETS_DOMAIN_ADMIN'] = $CONFIG['ADMIN_DOMAIN']."asset/"; //new



$CONFIG['MOP_TIME_TRACK'] = "5000000";

if($local){
	$CONFIG['DATABASE'][0]['HOST'] 		= "localhost";
	$CONFIG['DATABASE'][0]['USERNAME'] 	= "root";
	$CONFIG['DATABASE'][0]['PASSWORD'] 	= "Untuk4pa";
	$CONFIG['DATABASE'][0]['DATABASE'] 	= $CONFIG['DATABASE_WEB'];

	$CONFIG['DATABASE'][1]['HOST'] 		= "10.18.69.1";
	$CONFIG['DATABASE'][1]['USERNAME'] 	= "root";
	$CONFIG['DATABASE'][1]['PASSWORD'] 	= "coppermine";
	$CONFIG['DATABASE'][1]['DATABASE'] 	= $CONFIG['DATABASE_ADMIN'];

	$CONFIG['DATABASE'][2]['HOST'] 		= "localhost";
	$CONFIG['DATABASE'][2]['USERNAME'] 	= "creasi";
	$CONFIG['DATABASE'][2]['PASSWORD'] 	= "creasimysql123";
	$CONFIG['DATABASE'][2]['DATABASE'] 	= "marlboro_inorout_logs";

	$CONFIG['DATABASE'][3]['HOST'] 		= "localhost";
	$CONFIG['DATABASE'][3]['USERNAME'] 	= "root";
	$CONFIG['DATABASE'][3]['PASSWORD'] 	= "";
	$CONFIG['DATABASE'][3]['DATABASE'] 	= "marlboro_inorout_reports";


}else{
	$CONFIG['DATABASE'][0]['HOST'] 		= "117.54.1.99";
	$CONFIG['DATABASE'][0]['USERNAME'] 	= "amild";
	$CONFIG['DATABASE'][0]['PASSWORD'] 	= "m1ldl1ght*";
	$CONFIG['DATABASE'][0]['DATABASE'] 	= $CONFIG['DATABASE_WEB'];


	$CONFIG['DATABASE'][1]['HOST'] 		= "localhost";
	$CONFIG['DATABASE'][1]['USERNAME'] 	= "root";
	$CONFIG['DATABASE'][1]['PASSWORD'] 	= "";
	$CONFIG['DATABASE'][1]['DATABASE'] 	= "marlboro_inorout_admin";

	$CONFIG['DATABASE'][2]['HOST'] 		= "localhost";
	$CONFIG['DATABASE'][2]['USERNAME'] 	= "root";
	$CONFIG['DATABASE'][2]['PASSWORD'] 	= "";
	$CONFIG['DATABASE'][2]['DATABASE'] 	= "marlboro_inorout_logs";

	$CONFIG['DATABASE'][3]['HOST'] 		= "localhost";
	$CONFIG['DATABASE'][3]['USERNAME'] 	= "root";
	$CONFIG['DATABASE'][3]['PASSWORD'] 	= "";
	$CONFIG['DATABASE'][3]['DATABASE'] 	= "marlboro_inorout_reports";



}

$CONFIG['SERVICE_URL'] = "service/";
$CONFIG['salt'] = '12345678';
/* DATETIME SET */
$timeZone = 'Asia/Jakarta';
date_default_timezone_set($timeZone);


$SMAC_SECRET = sha1("harveyspecterssuits");
$SMAC_HASH = sha1("mikerosssuits");

$CONFIG['SERVICE_KEY'] = sha1("axis2012");


/**
 * Email settings
 *//*
$CONFIG['EMAIL_FROM_DEFAULT'] = "creasier@kana.co.id";
$CONFIG['EMAIL_SMTP_HOST'] = "localhost";
$CONFIG['EMAIL_SMTP_PORT'] = 25;
$CONFIG['EMAIL_SMTP_USER'] = "";
$CONFIG['EMAIL_SMTP_PASSWORD'] = "";
$CONFIG['EMAIL_SMTP_SSL'] = 0;
$CONFIG['EMAIL_AXIS'][0] = 'cendiqkrn@gmail.com';
$CONFIG['EMAIL_AXIS'][1] = 'kia_krn@yahoo.com';*/

$CONFIG['EMAIL_FROM_DEFAULT'] = 'info@creasi.co.id';
$CONFIG['EMAIL_SMTP_HOST'] =  'smtp.mandrillapp.com';
$CONFIG['EMAIL_SMTP_PORT'] =  '587';
$CONFIG['EMAIL_SMTP_USER'] = "info@creasi.co.id";
$CONFIG['EMAIL_SMTP_PASSWORD'] = "UywqOQC65FPqxACyQCAJXQ";
$CONFIG['EMAIL_SMTP_SSL'] = 1;


/* MOP SETTING */
if($CONFIG['LOCAL_DEVELOPMENT']) $CONFIG['BASE_MOP_URL'] = "https://staging-artcademy-amild.es-dm.com/";
else $CONFIG['BASE_MOP_URL'] = "{$DOMAIN}{$PUBLIC_HTML}login/local";
$CONFIG['MOP_URL'] = "{$CONFIG['BASE_MOP_URL']}dm.mopid.webservice/centralwebservice.asmx";
$CONFIG['MOP_USER'] = "hosting\pmimopID";
$CONFIG['MOP_PWD'] = "Pm1jkd!";

?>
