
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
