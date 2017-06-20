<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "c_client";
$route['404_override'] = '';

/**
 * Server Route
 */

$route['login_server'] = "c_auth/index";
$route['proses-login'] = "c_auth/auth";
$route['login-sukses'] = "c_auth/login_success";
$route['logout'] = 'c_auth/logout';
$route['server'] = 'c_server';

$route['server-dashboard']	 	= "c_server/index";
$route['server-data_muzaki'] 	= "c_server/muzaki";
$route['server-transaksi'] 	 	= "c_server/transaksi";
$route['server-data_mustahiq'] 	= "c_server/mustahiq";
$route['aktif-aplikasi'] 	 	= "c_server/aktif_aplikasi";
$route['nonaktif-aplikasi'] 	= "c_server/nonaktif_aplikasi";
$route['server-data_muzaki'] 	= "c_server/data_muzaki";


/**
 * Client Routes
 */
 
$route['pencatatan-zakat']		= "c_client/index";
$route['simpan-zakat'] 			= "c_client/simpan_zakat";
$route['aplikasi-nonaktif'] 	= "c_client/aplikasi_nonaktif";
$route['load-transaksi'] 		= "c_client/load_zakat";
$route['muzaki'] 				= "c_client/data_muzaki";
$route['hapus-muzaki']			= "c_client/hapus_muzaki";
$route['mustahiq']				= "c_client/data_mustahiq";
$route['simpan-mustahiq'] 		= "c_client/simpan_mustahiq";
$route['hapus-mustahiq'] 	    = "c_client/hapus_mustahiq";
$route['statistik'] 			= "c_client/statistik";
$route['statistik-realtime'] 	= "c_client/realtime";
$route['load-data'] 			= "c_client/load_data";
$route['cetak-mustahiq'] 		= "c_client/cetak_mustahiq";
$route['cetak-zakat'] 			= "c_client/cetak_zakat";
/**
 * Application routes
 */


/* End of file routes.php */
/* Location: ./application/config/routes.php */