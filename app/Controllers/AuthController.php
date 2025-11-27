<?php

/**
 * @author: German Cosano Torres
 *
 * descripcion: 
 *
 * fecha: 24/11/2025
 *
 * @license: Proprietary 
 * 
 * @package: usuarios_mvc\protectora_mvc\app\Controllers\auth.php
 *
 * @version: 1.0
 */

namespace App\Controllers;

use App\Services\AuthService;
use App\Services\UsuariosService;
use App\Models\UsuariosModel;


class AuthController extends BaseController {

    public function showRegisterFormAction(){
        
        $this->renderHTML('../views/auth/authView.php', ['error' => $_GET['error'] ?? null]);
    }
    public function procesarRegisterFormAction(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        echo "Procesando formulario de registro...";
        // Procesar el formulario de registro
        $username = $_POST['username'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $rol = $_POST['rol'];
        $activo = $_POST['activo'];

        // Crear una instancia del modelo y servicio
        $usuariosModel = new UsuariosModel();
        $usuariosService = new AuthService($usuariosModel);

        // Insertar el nuevo usuario
        $usuariosService->registerUser($username, $email, $telefono, $password, $nombre, $apellido, $direccion, $rol, $activo);

        // Redirigir o mostrar un mensaje de éxito
        header('Location: /usuarios');
        exit();
        }else{
            // Manejar el caso en que no es una solicitud POST
            echo "Método no permitido.";
            exit();
        }
    }
}