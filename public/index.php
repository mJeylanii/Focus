<?php
/*
 * After installing Composer we get the autoload feature and to use it we need to require the autoload.php file
 * found in the composer create folder 'vendor'
 * in composer.json we configure the app namespace to be the current folder it is found at.
 * To further explain the current project is the app namespace, and all the classes created within this project
 * will be included in the autoload file.
 *
 * We won't have to require the classes but only specify it's namespace.
 * */
require_once __DIR__ . '/../vendor/autoload.php';
/*This one time require helps us eliminate the need to require the file every time a new class is created*/

/*
 * In this section we specify that we are going to use these classes in this file.
 * */
use \app\controllers\AdminController;
use \app\core\Application;
use \app\controllers\SiteController;
use  \app\controllers\AuthController;
/**************************************/
$app = new Application(dirname(__DIR__));//Create an instance of the Application class.


/*
 * $app->router->get('/', [SiteController::class, 'home']);
   $app: Is an object of the Application class
   The $app object has access to the public variable router
   and the router variable has access to the get method.

   This can be taken as an example for "Inheritance" in Object-Oriented Programming.
*/

//Site Controller here
/*
 * The get method takes a path and method as a parameter.
 * ctrl+click on get() for more info*/

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/home', [SiteController::class, 'home']);
$app->router->get('/services', [SiteController::class, 'services']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/checkout', [SiteController::class, 'checkout']);
$app->router->post('/checkout', [SiteController::class, 'checkout']);
$app->router->get('/profile', [SiteController::class, 'profile']);
$app->router->get('/profile/{id:\d+}/{username}', [SiteController::class, 'login']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
//Site controllers

//Authorization controller
$app->router->get('/admin', [AuthController::class, 'admin']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'handleRegister']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'handleLogin']);
$app->router->get('/orders', [AdminController::class, 'admin']);
//Authorization controller

/*
 * At the end of the index Script we execute the run method found in Application class
 *
 * */
$app->run();//Enter the run method for more details
/*
 * */
/*
 * Composer is to make the core folder Installable.
 * It also autoloads classes for us; so we don't have to require the files every time.
 * */

