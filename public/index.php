<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AdministrationController;
use app\controllers\AuthController;
use app\controllers\FormController;
use app\core\Application;

$app = new Application();

$app->router->get("/", [FormController::class, 'index']);
$app->router->get("/home", [FormController::class, 'index']);
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->get("/registration", [AuthController::class, 'registration']);
$app->router->get("/accessDenied", [AuthController::class, 'accessDenied']);
$app->router->get("/logout", [AuthController::class, 'logout']);
$app->router->get("/form", [FormController::class, 'index']);
$app->router->get("/chartAverage",[FormController::class,"chartAverage"]);
$app->router->get("/api/userList",[AdministrationController::class,"ApiuserList"]);
$app->router->get("/userList",[AdministrationController::class,"userList"]);
$app->router->get("/chartAge",[FormController::class,"chartAge"]);
$app->router->get("/api/getAges",[FormController::class,"getAges"]);

$app->router->post("/registrationProcess", [AuthController::class, 'registrationProcess']);
$app->router->post("/loginProcess", [AuthController::class, 'loginProcess']);
$app->router->post("/createData",[FormController::class,"createData"]);



$app->run();