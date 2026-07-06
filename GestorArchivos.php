<?php

class GestorArchivos
{
    private $directorio = "uploads/";
    private $tamanoMaximo = 2 * 1024 * 1024; // 2 MB
    private $extensionesPermitidas = [
        "pdf",
        "jpg",
        "jpeg",
        "png"
    ];

    private $tiposPermitidos = [
        "application/pdf",
        "image/jpeg",
        "image/png"
    ];

    public function subir($archivo)
    {
        if ($archivo["error"] != UPLOAD_ERR_OK) {
            return "Error al subir el archivo.";
        }

        $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));
        if (preg_match('/\.php$/i', $archivo["name"])) {
            return "No se permiten archivos ejecutables.";
        }
        if (!in_array($extension, $this->extensionesPermitidas)) {
            return "Solo se permiten archivos PDF, JPG y PNG.";
        }
        $tipo = mime_content_type($archivo["tmp_name"]);
        if (!in_array($tipo, $this->tiposPermitidos)) {
            return "Tipo de archivo no permitido.";
        }

        if ($archivo["size"] > $this->tamanoMaximo) {
            return "El archivo supera el tamaño máximo permitido (2 MB).";
        }

        $nuevoNombre = uniqid("archivo_") . "." . $extension;
        if (move_uploaded_file($archivo["tmp_name"], $this->directorio . $nuevoNombre)) {
            return "Archivo subido correctamente.";
        }
        return "No fue posible guardar el archivo.";
    }

    public function listar()
    {
        $lista = [];
        if (!is_dir($this->directorio)) {
            return $lista;
        }

        $archivos = scandir($this->directorio);
        foreach ($archivos as $archivo) {

            if ($archivo == "." || $archivo == "..") {
                continue;
            }

            $ruta = $this->directorio . $archivo;

            $lista[] = [
                "nombre" => $archivo,
                "tamano" => round(filesize($ruta) / 1024, 2),
                "fecha" => date("d/m/Y H:i", filemtime($ruta))
            ];
        }

        return $lista;
    }

    public function eliminar($archivo)
    {
        $archivo = basename($archivo);
        $ruta = $this->directorio . $archivo;

        if (file_exists($ruta)) {
            unlink($ruta);
            return true;
        }
        return false;
    }
}
?>