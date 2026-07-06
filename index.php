<?php

require_once "GestorArchivos.php";
$gestor = new GestorArchivos();
$archivos = $gestor->listar();

?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de Archivos</title>
        <link rel="stylesheet" href="estilos.css">
    </head>

    <body>
        <header>
            <h1>Gestor de Archivos</h1>
            <p>Programación Orientada a Objetos con PHP</p>
        </header>

        <nav>
            <a href="index.php">Inicio</a>
        </nav>

        <section class="contenedor">

            <?php if (isset($_GET["mensaje"])) {

            $tipo = $_GET["tipo"] ?? "success";

        ?>

            <div id="mensaje" class="mensaje <?php echo $tipo; ?>">

                <?php
                    if ($tipo == "success") {
                        echo "✅ ";
                    } else {
                        echo "❌ ";
                    }

                    echo htmlspecialchars($_GET["mensaje"]);
                ?>

            </div>

            <?php } ?>

            <h2>Subir Archivo</h2>

            <form action="subir.php" method="POST" enctype="multipart/form-data">

                <label>Seleccione un archivo</label>
                <input
                    type="file"
                    name="archivo"
                    accept=".pdf,.jpg,.jpeg,.png"
                    required>

                <button type="submit">
                    Subir Archivo
                </button>

            </form>
        </section>

        <section class="contenedor">
            <h2>Archivos Subidos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Fecha</th>
                        <th>Descargar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (empty($archivos)) { ?>
                        <tr>
                            <td colspan="5">
                                No hay archivos subidos.
                            </td>
                        </tr>

                    <?php } else { ?>
                        <?php foreach ($archivos as $archivo) { ?>
                            <tr>
                                <td>
                                    <?php echo $archivo["nombre"]; ?>
                                </td>
                                <td>
                                    <?php echo $archivo["tamano"]; ?> KB
                                </td>
                                <td>
                                    <?php echo $archivo["fecha"]; ?>
                                </td>
                                <td>
                                    <a href="uploads/<?php echo urlencode($archivo["nombre"]); ?>" download>
                                        Descargar
                                    </a>
                                </td>
                                <td>
                                    <a href="eliminar.php?archivo=<?php echo urlencode($archivo["nombre"]); ?>"
                                       onclick="return confirm('¿Está seguro de que desea eliminar este archivo?');"
                                    >
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>

            </table>
        </section>

        <footer>

            <p>
                © 2026 - Jorge Xavier Romero Carrión
            </p>
        </footer>

        <script>

            setTimeout(function(){
                let mensaje = document.getElementById("mensaje");
                if(mensaje){
                    mensaje.style.transition = "opacity 0.8s";
                    mensaje.style.opacity = "0";
                    setTimeout(function(){
                        mensaje.remove();
                    },800);
                }
            },4000);
        </script>
    </body>
</html>