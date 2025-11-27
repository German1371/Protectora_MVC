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
    <title>Document</title>
</head>
<body>
    <h1>Listado de Animales</h1>
    <?php
        foreach($data['animales'] as $animal){
            echo "<p>" .
                " Nombre: " . $animal['nombre'] .
                " // Raza: " . $animal['raza'] .
                " // Edad: " . $animal['edad'] .
                "</p>";
        }
    ?>
</body>
</html>