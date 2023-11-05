<?php
/* const MAX_FILE_SIZE=2000000;
    ini_set($upload_max_filesize, MAX_FILE_SIZE); */
    
const UPLOAD_ERRORS = array(
    0 => "No hay error, fichero subido con éxito.",
    1 => "El fichero subido excede la directiva upload_max_filesize de php.ini.",
    2 => "El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.",
    3 => "El fichero fue sólo parcialmente subido.",
    4 => "No se subió ningún fichero.",
    6 => "Falta la carpeta temporal.",
    7 => "No se pudo escribir el fichero en el disco.",
    8 => "Una extensión de PHP detuvo la subida de ficheros."
);


function obtenerMensajeErrorSubida($errorCodigo)
{
    if (array_key_exists($errorCodigo, UPLOAD_ERRORS)) {
        return UPLOAD_ERRORS[$errorCodigo];
    } else {
        return "Código de error desconocido";
    }
}


function procesarArchivos($filesArray): void {
    foreach ($filesArray['name'] as $index => $value) {
        $tmpFile = $filesArray['tmp_name'][$index];
        $fileName = $filesArray['name'][$index];
        $fileSize = $filesArray['size'][$index];
        $error = $filesArray['error'][$index];
    
        if (is_uploaded_file($tmpFile)) {
            $destination = CARPETA_IMAGENES . DIRECTORY_SEPARATOR . $fileName;

            if (move_uploaded_file($tmpFile, $destination)) {
                echo "El archivo '$fileName' se ha guardado en destino con éxito. Tamaño: " . ($fileSize/1000000) . " Mb <br>";
            } else {
                echo "Error al subir el archivo '$fileName'. " . UPLOAD_ERRORS[7] . "<br>";
                echo "Error: " . obtenerMensajeErrorSubida($_FILES['archivos']['error'][$index]) . "<br>";
            }
        } else {
            echo "Error al subir el archivo '$fileName'. " . UPLOAD_ERRORS[$error] . "<br>";
            echo "Error: " . obtenerMensajeErrorSubida($_FILES['archivos']['error'][$index]) . "<br>";
        }
    }
}
function mostrarInfoArchivos()
{
    if (isset($_FILES['archivos']) && isset($_POST['submit'])) {

        foreach ($_FILES['archivos']['name'] as $index => $value) {
            //echo "<br> function mostrarInfoArchivos. <br>";
            echo "<ol>";
            echo "Nombre: " . $_FILES['archivos']['name'][$index] . "<br>";
            echo "Tipo: " . $_FILES['archivos']['type'][$index] . "<br>";
            echo "Tamaño: " . $_FILES['archivos']['size'][$index] . " bytes<br>";
            echo "Error: " . obtenerMensajeErrorSubida($_FILES['archivos']['error'][$index]) . "<br>";
            echo "</ol>";
        }
    } else {
        echo "No se han ajuntado archivos.";
    }
}
