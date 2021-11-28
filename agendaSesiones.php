<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda-Sesiones</title>
</head>
<body>
    <?php

    session_start(['cookie_lifetime' =>3600]);

    if (!isset($_SESSION['agenda']))
        $_SESSION['agenda'] = array();

    if(isset($_REQUEST["submit"])){
        $nombre = $_REQUEST['nombre'];
        $telefono = $_REQUEST['telefono'];
        if(!empty($nombre) && !empty($telefono)){
            $_SESSION['agenda'][$nombre] = $telefono;
        } else {
            echo "Por favor, debe rellenar todos los campos";
        }
    }

    ?>
    
    <form action="" method="get">

        <h2>NUEVO CONTACTO</h2>

        <label>Nombre: <input type="text" name="nombre"/></label>
        <label>Teléfono:  <input type="number" name="telefono"/></label>
        <input type="submit" name="submit"/>

    </form>

    <?php
        echo "<h2>AGENDA</h2>";

        $agenda = $_SESSION['agenda'];

        if (count($agenda) == 0){
            echo "<p>No hay contactos en la agenda.</p>";
        } else{
            echo "<ul>";
            foreach ($agenda as $nombre => $telefono) {
                echo "<li>" . $nombre . ': ' . $telefono . "</li>";
            }
            echo "</ul>";
        }
    ?>
</body>
</html>