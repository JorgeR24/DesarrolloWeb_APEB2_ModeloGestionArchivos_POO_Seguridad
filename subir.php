<?php

require_once "GestorArchivos.php";

$gestor = new GestorArchivos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["archivo"])) {

        $mensaje = $gestor->subir($_FILES["archivo"]);

        if ($mensaje == "Archivo subido correctamente.") {
            $tipo = "success";
        } else {
            $tipo = "error";
        }

    } else {

        $mensaje = "No se recibió ningún archivo.";
        $tipo = "error";

    }

} else {

    $mensaje = "Acceso no permitido.";
    $tipo = "error";

}

header("Location: index.php?mensaje=" . urlencode($mensaje) . "&tipo=" . urlencode($tipo));
exit;

?>