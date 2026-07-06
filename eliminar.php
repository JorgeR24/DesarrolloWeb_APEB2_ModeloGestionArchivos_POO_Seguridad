<?php

require_once "GestorArchivos.php";

$gestor = new GestorArchivos();

if (isset($_GET["archivo"])) {

    if ($gestor->eliminar($_GET["archivo"])) {

        $mensaje = "Archivo eliminado correctamente.";
        $tipo = "success";

    } else {

        $mensaje = "No fue posible eliminar el archivo.";
        $tipo = "error";

    }

} else {

    $mensaje = "Archivo no encontrado.";
    $tipo = "error";

}

header("Location: index.php?mensaje=" . urlencode($mensaje) . "&tipo=" . urlencode($tipo));
exit;

?>