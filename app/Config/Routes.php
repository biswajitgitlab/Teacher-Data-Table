<?php

use App\Controllers\TeacherController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('my', 'Home::my_test');
//$routes->resource('items');
$routes->get('items', 'ItemController::index');
$routes->get('items/create', 'ItemController::create');
$routes->post('items', 'ItemController::store');

$routes->get('items', 'ItemController::index');
$routes->get('items/create', 'ItemController::create');
$routes->post('items', 'ItemController::store');
$routes->get('items/edit/(:num)', 'ItemController::edit/$1');
$routes->post('items/update/(:num)', 'ItemController::update/$1');
$routes->get('items/delete/(:num)', 'ItemController::delete/$1');
//$routes->post('items/delete/(:num)', 'ItemController::delete/$1');



//$routes->get('product', 'ProductController::index');
//$routes->get('product/create', 'ProductController::create');
//$routes->post('product', 'ProductController::store');
//$routes->get('product/edit/(:num)', 'ProductController::edit/$1');
//$routes->post('product/update/(:num)', 'ProductController::update/$1');
//$routes->get('product/delete/(:num)', 'ProductController::delete/$1')



// $routes->get('product', 'ProductController::index');
// $routes->post('product/create', 'ProductController::create');
// $routes->post('product', 'ProductController::store'); // This route is for handling the form submission when creating a new product
// $routes->get('product/edit/(:num)', 'ProductController::edit/$1');
// $routes->post('product/update', 'ProductController::update'); // Use POST for updating the product
// $routes->get('product/delete/(:num)', 'ProductController::delete/$1');
// $routes->get('product/load', 'ProductController::load'); // This route is for loading all products via AJAX

$routes->get('product', 'ProductController::index');

$routes->get('student', 'StudentController::index');

// Routes for CRUD operations
$routes->post('store', 'StudentController::store');
$routes->get('edit/(:num)', 'StudentController::edit/$1');
$routes->post('update', 'StudentController::update');
$routes->get('delete/(:num)', 'StudentController::delete/$1');

// $routes->post('product', 'ProductController::store'); // This route is for handling the form submission when creating a new product
// $routes->get('product/edit/(:num)', 'ProductController::edit/$1');
// $routes->post('product/update', 'ProductController::update'); // Use POST for updating the product
// $routes->get('product/delete/(:num)', 'ProductController::delete/$1');
// $routes->get('product/load', 'ProductController::load'); // This route is for loading all products via AJAX

$routes->get('teacher', 'TeacherController::index');
$routes->post('teacher/add', 'TeacherController::create');
$routes->post('teacher/pado', 'TeacherController::read');
$routes->post('teacher/pado-single', 'TeacherController::edit');
$routes->post('teacher/update', 'TeacherController::update');
$routes->post('teacher/delete', 'TeacherController::delete');
$routes->post('state', 'TeacherController::state');
$routes->post('city', 'TeacherController::city');

$routes->get('exam', 'LmsController::index');
$routes->post('add', 'LmsController::create');
$routes->post('read', 'LmsController::read');
$routes->post('lms/edit', 'LmsController::edit');
$routes->post('lms/update', 'LmsController::update');


$routes->get('practise', 'PractiseController::index');
$routes->post('add/add', 'PractiseController::create');
$routes->post('read', 'PractiseController::read');
$routes->post('delete', 'PractiseController::delete');
$routes->post('edit/edit', 'PractiseController::edit');
$routes->post('update/update', 'PractiseController::update');

?>


