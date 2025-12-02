<?php

/**
 * @author: German Cosano Torres
 *
 * descripcion: 
 *
 * fecha: 25/11/2025
 *
 * @license: Proprietary 
 * 
 * @package: protectora_mvc\public\index.php
 *
 * @version: 1.0
 */ 

require_once "../app/bootstrap.php";
require_once "../vendor/autoload.php";

use App\Core\Router;
use App\Controllers\AnimalController;
use App\Controllers\UsuariosController;
use App\Controllers\AuthController;


$router = new Router();

// Ruta para /animales/ o /animales (barra final opcional)
$router->get([
    'name' => 'animales',
    'path' => '/^\/animales$/',
    'action' => [AnimalController::class, 'animalAction']
]);

$router->get([
    'name' => 'usuarios',
    'path' => '/^\/usuarios\/?$/',
    'action' => [UsuariosController::class, 'UsuariosAction']
]);

$router->get([
    'name' => 'mostrarRegistrerForm',
    'path' => '/^\/auth\/register\/?$/',
    'action' => [AuthController::class, 'showRegisterFormAction']
]);

$router->post([
    'name' => 'PrcesarRegisterForm',
    'path' => '/^\/auth\/register\/?$/',
    'action' => [AuthController::class, 'procesarRegisterFormAction']
]);




$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// elimina /dashboard/dwes/unidad6/protectora_mvc/public
$base = dirname($_SERVER['SCRIPT_NAME']);
$request = str_replace($base, '', $request);

if ($request === '') $request = '/';

// Buscamos coincidencia
$route = $router->match($request, $method); 

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName();
} else {
    echo "No route. Ruta solicitada: " . $request;
}
