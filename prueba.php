<?php

if (is_writable("uploads")) {
    echo "La carpeta uploads tiene permisos de escritura.";
} else {
    echo "La carpeta uploads NO tiene permisos de escritura.";
}

?>