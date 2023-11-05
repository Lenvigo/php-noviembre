<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1 {
            font-family: Verdana, sans-serif;
            color: slategray;
            text-align: center;
        }

        h3 {
            font-family: Verdana, sans-serif;
            color: grey;
            text-align: center;
        }
    </style>
    <title>Tarea 03.1 (UD3)</title>
    <h1> Tarea 03.1 (UD3) </h1>
    <h3> Elena González </h3>
</head>

<body>
    <style>
        body {
            background-color: lightgray;
        }

        form {
            font-family: ui-rounded;
            margin: auto;
            background: SlateGray;
            color: white;
            font-size: 17px;
            padding: 50px;
            width: 350px;
            border: solid 10px lightslategrey;
            border-radius: 15px;
            -webkit-border-radius: 45px;
            -moz-border-radius: 45px;
        }
    </style>
    <form action="#" method="post" enctype="multipart/form-data">
        Adjunta tu archivo (formato jpg):<br><br>
        <input type="file" name="archivos[]"  multiple accept=".jpg"><br><br>
        <input type="submit" value="Enviar" name="submit">
    </form>
    <?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . "Archivos.php";
    //require_once __DIR__ . DIRECTORY_SEPARATOR ."sinlimite.php";
    const CARPETA_IMAGENES = __DIR__ . DIRECTORY_SEPARATOR . "archivos_guardados";
    if (isset($_FILES['archivos'])) {
        echo "<h3>Datos de los ficheros</h3>";
        echo "<br>";
        echo mostrarInfoArchivos($_FILES["archivos"]);
        echo "<br>";
        procesarArchivos($_FILES['archivos']);
    }
    ?>
</body>

</html>