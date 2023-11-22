<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //FOR USER
 $routes->get('/', 'Home::index');
$routes->get('/myhome', 'UserController::userhome');
$routes->get('/about', 'UserController::about');
$routes->get('/joblist', 'UserController::joblist');
$routes->get('/jobdetails', 'UserController::jobdetails');
$routes->get('/contact', 'UserController::contact');
// $routes->get(['post', 'get'],'/applicantlogin', 'UserController::applicantlogin');
$routes->get('/getdata', 'UserController::getdata');
$routes->post('/save', 'UserController::save');

//FOR EMPLOYER
$routes->get('/employerhome', 'EmployerController::employerhome');
$routes->get('/postvacancy', 'EmployerController::postvacancy');
$routes->get('/jobpost', 'EmployerController::jobpost');
$routes->get('/jobapplicants', 'EmployerController::jobapplicants');
$routes->post('/addjob', 'EmployerController::addjob');
$routes->match(['get', 'post'], '/emplogin', 'EmployerController::emplogin');
$routes->get('/empregister', 'EmployerController::empregister');
$routes->get('/cancel_jobpost/(:any)', 'EmployerController::jobpost_cancel/$1');
$routes->post('/registeremployer', 'EmployerController::registeremployer');
$routes->get('/employerlogin', 'EmployerController::emplogindex');
$routes->get('/jobdetails/(:num)', 'EmployerController::jobdetails/$1');


//FOR ADMIN
$routes->get('/adminhome', 'AdminController::adminhome');
$routes->get('/employerregistration', 'AdminController::registeremps');
$routes->get('/jobvacancy', 'AdminController::jobvacant');
$routes->get('/manageuser', 'AdminController::manageuser');
$routes->get('/empdetails/(:num)', 'AdminController::empdetails/$1');
$routes->get('/adminlogin', 'AdminController::adminlogin');
$routes->match(['get', 'post'], '/adlogin', 'AdminController::adlogin');
$routes->get('/employer_approved/(:num)', 'AdminController::employer_approved/$1');
$routes->get('/employer_decline/(:num)', 'AdminController::employer_decline/$1');
$routes->get('/vacancydetails/(:num)', 'AdminController::vacancydetails/$1');
$routes->get('/vacancy_approved/(:num)', 'AdminController::vacancy_approved/$1');
$routes->get('/vacancy_decline/(:num)', 'AdminController::vacancy_decline/$1');
// $routes->get('/jobdetails/(:num)', 'AdminController::jobdetails/$1');