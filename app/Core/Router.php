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
 * @package: protectora_mvc\app\Controllers\UsuariosController.php
 *
 * @version: 1.0
 */

namespace App\Core;

class Router {
    private $routes = array();

    public function match(string $request, string $method) {
        foreach ($this->routes as $route) {
            // comprobamos método HTTP si está definido en la ruta
            if (isset($route['method']) && strtoupper($route['method']) !== strtoupper($method)) {
                continue;
            }

            $matches = array();
            if (preg_match($route['path'], $request, $matches)) {
                array_shift($matches); // eliminamos coincidencia completa
                $route['params'] = $matches; // guardamos los parámetros capturados
                return $route;
            }
        }

        return null;
    }

    public function get($route) {
        $this->routes[] = [
            'method' => 'GET',
            'path' => $route['path'],
            'action' => $route['action'],
            'name' => $route['name']
        ];
    }

    public function post($route) {
        $this->routes[] = [
            'method' => 'POST',
            'path' => $route['path'],
            'action' => $route['action'],
            'name' => $route['name']
        ];
    }
}