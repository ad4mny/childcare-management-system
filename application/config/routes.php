<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'LoginController';
$route['login/submit'] = 'LoginController/loginUser';
$route['logout'] = 'LoginController/logoutUser';

$route['register'] = 'RegisterController';
$route['register/submit'] = 'RegisterController/registerUser';

$route['children'] = 'ChildrenController';
$route['children/view/(:num)'] = 'ChildrenController/viewChildInfo/$1';
$route['children/submit'] = 'ChildrenController/registerChild';
$route['children/update/submit'] = 'ChildrenController/updateChild';

$route['announcement'] = 'AnnouncementController';

$route['attendence'] = 'AttendenceController';

$route['payment'] = 'PaymentController';

$route['profile'] = 'ProfileController';
$route['profile/update/submit'] = 'ProfileController/updateProfileInfo';

// Admin routes 
$route['manage/(:any)'] = 'TeacherController/index/$1';

$route['manage/parent/(:num)'] = 'TeacherController/index/dashboard/$1';
$route['manage/parent/view/(:num)'] = 'TeacherController/viewChildInfo/$1';
$route['manage/parent/remove/(:num)'] = 'TeacherController/removeChildInfo/$1';

$route['manage/attendence/submit'] = 'TeacherController/addAttendence';
$route['manage/attendence/remove/(:num)'] = 'TeacherController/removeAttendence/$1';

$route['manage/announcement/submit'] = 'TeacherController/addAnnouncement';
$route['manage/announcement/remove/(:num)'] = 'TeacherController/removeAnnouncement/$1';

$route['manage/payment/submit'] = 'TeacherController/addPayment';
$route['manage/payment/remove/(:num)'] = 'TeacherController/removePayment/$1';

$route['manage/teacher/submit'] = 'TeacherController/addTeacher';
$route['manage/teacher/view/(:num)'] = 'TeacherController/viewTeacherInfo/$1';
$route['manage/teacher/remove/(:num)'] = 'TeacherController/removeTeacher/$1';


