<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'LoginController';
$route['login/submit'] = 'LoginController/loginUser';

$route['register'] = 'RegisterController';
$route['register/submit'] = 'RegisterController/registerUser';

$route['dashboard'] = 'DashboardController';
$route['dashboard/register/submit'] = 'DashboardController/registerChild';

$route['announcement'] = 'AnnouncementController';
