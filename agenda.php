<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <?php

    if (isset($_GET['agenda']))
        $agenda = $_GET['agenda'];
    else
        $agenda = array();

    if(isset($_GET["submit"])){
        $nombre = $_GET["nombre"];
        $telefono = $_GET["telefono"];
        if(!empty($nombre) && !empty($telefono)){
            $agenda[$nombre] = $telefono;
        } else {
            echo "Por favor, debe rellenar todos los campos";
        }
    }

    ?>
    
    <form>

        <h2>NUEVO CONTACTO</h2>

        <?php

            foreach ($agenda as $nombre => $telefono) {
                echo '<input type="hidden" name="agenda[' . $nombre . ']" ';
                echo 'value="' . $telefono . '"/>';
            }

        ?>

        <label>Nombre: <input type="text" name="nombre"/></label>
        <label>Teléfono:  <input type="number" name="telefono"/></label>
        <input type="submit" name="submit"/>

    </form>

    <?php
        echo "<h2>AGENDA</h2>";

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