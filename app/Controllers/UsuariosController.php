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

namespace App\Controllers;

use App\Services\UsuariosService;

use App\Models\UsuariosModel;

class UsuariosController extends BaseController {

    public function UsuariosAction() {
        // Creamos el modelo y el servicio
        $UsuariosModel = new UsuariosModel();
        // Calculamos la edad de cada animal
    
        // Datos a enviar a la vista
        $data = ['usuarios' => $UsuariosModel->getAll()];

        // Renderizamos la vista
        $this->renderHTML(__DIR__ . '/../../views/usuariosView.php', $data);
    }
}
