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

namespace App\Models;

class DatabaseException extends \Exception {

    public function logError() {
        error_log("DATABASE ERROR [" . date('Y-m-d H:i:s') . "]: " . $this->getMessage());
    }

    public function getUserMessage() {
        return "Ha ocurrido un error en la base de datos. Por favor, inténtelo de nuevo más tarde.";
    }
}