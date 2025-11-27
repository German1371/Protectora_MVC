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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Usuario</title>
    <style>
        body {
            background: #f4f4f4;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding-top: 40px;
        }

        .form-container {
            background: white;
            padding: 25px;
            width: 420px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #1976D2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0d5ca8;
        }
    </style>
</head>

<body>

<div class="form-container">
    <h2>Insertar Usuario</h2>

    <form action="/auth/register" method="POST">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Teléfono</label>
        <input type="text" name="telefono">

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Nombre</label>
        <input type="text" name="nombre">

        <label>Apellido</label>
        <input type="text" name="apellido">

        <label>Dirección</label>
        <textarea name="direccion" rows="3"></textarea>

        <label>Rol</label>
        <select name="rol" required>
            <option value="administrador">Administrador</option>
            <option value="empleado" selected>Empleado</option>
            <option value="voluntario">Voluntario</option>
            <option value="usuario">Usuario</option>
        </select>

        <label>Activo</label>
        <select name="activo">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>

        <button type="submit">Guardar Usuario</button>
    </form>
</div>

</body>
</html>
