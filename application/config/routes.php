<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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

$route['default_controller'] = "welcome";

/* Do not chaange anything without admin
 * get link detail content  * 
 */
$route['news/(:any)'] = "welcome/news/$1";
$route['products/(:any)'] = "products/get_detail/$1";
$route['products/detail/(:any)'] = "products/detail/$1";
$route['abouts'] = "abouts/index";
$route['contacts'] = "contacts/index";
$route['activities'] = "activities/index";


$route['promos/(:any)'] = "welcome/promos/$1";
$route['simulator'] = "products/simulasi_kredit";
$route['ads/(:any)'] = "welcome/ads/$1";
$route['get_time_server'] = "welcome/get_time_server/";
$route['get_queue_messages'] = "admin/smscenters/get_queue_messages/";
$route['get_queue_inbox'] = "admin/smscenters/get_queue_inbox/";

//ADMIN PAGE
$route['admin/galleries/albums/add'] = "admin/galleries/add_album";
$route['admin/galleries/albums/edit/(:num)'] = "admin/galleries/edit_album/$1";
$route['admin/galleries/albums/save'] = "admin/galleries/save_albums/";
$route['admin/galleries/albums/update'] = "admin/galleries/update_albums/";

//SMS BANKING AUTO REPLAY AJAX INTERVAL
$route['replay_message_with_processed_false'] = "admin/smscenters/queue_replay_message/";


$route['leader-of-the-month'] = "welcome/leader_of_the_month";
$route['technical-support'] = "welcome/technical_support";



//PEOPLE
//$route['^(:any)'] = "peoples/show/$1";
$route['~/(:any)'] = "welcome/people/$1";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
