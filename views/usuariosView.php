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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <h1>Listado de Usuarios</h1>
    <?php
        foreach($data['usuarios'] as $usuarios){
            echo "<p>" . " Usuario: " . $usuarios['username'] ." // Nombre: " . $usuarios['nombre'] . " // email: " . $usuarios['email'] . " // Rol: " . $usuarios['rol'] ."</p>";
        }
    ?>
</body>
</html>