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
 * @package: protectora_mvc\app\Services\authService.php
 *
 * @version: 1.0
 */

//crear los modelos y servicios necesarios para el registro de usuarios

namespace App\Services;

use App\Models\UsuariosModel;

class AuthService {
    
    private $usuariosModel;

    public function __construct() {
        $this->usuariosModel = new UsuariosModel();
    }

    public function registerUser($username, $email, $telefono, $password, $nombre, $apellido, $direccion, $rol, $activo) {
        // Lógica para registrar un nuevo usuario
        $this->usuariosModel->setUsername($username);
        $this->usuariosModel->setEmail($email);
        $this->usuariosModel->setTelefono($telefono);
        $this->usuariosModel->setPassword($password);
        $this->usuariosModel->setNombre($nombre);
        $this->usuariosModel->setApellido($apellido);
        $this->usuariosModel->setDireccion($direccion);
        $this->usuariosModel->setRol($rol);
        $this->usuariosModel->setActivo($activo);
        

        $this->usuariosModel->set();
    }

    
}