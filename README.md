# DesarrolloWeb_APEB2_ModeloGestionArchivos_POO_Seguridad
# Gestor de Archivos en PHP

## Descripción del sistema

Este proyecto consiste en un gestor de archivos desarrollado en PHP utilizando Programación Orientada a Objetos (POO). El sistema permite a los usuarios subir archivos al servidor, visualizar un listado de los archivos almacenados, descargarlos y eliminarlos de forma segura.

El proyecto fue desarrollado como parte de la asignatura de Desarrollo Web y aplica buenas prácticas de programación y medidas de seguridad para el manejo de archivos.

---

## Funcionalidades

- Subida de archivos mediante un formulario web.
- Acepta únicamente archivos PDF, JPG y PNG.
- Validación del tamaño máximo permitido (2 MB).
- Almacenamiento de los archivos en la carpeta `uploads`.
- Listado de archivos con:
  - Nombre
  - Tamaño
  - Fecha de subida
- Descarga de archivos.
- Eliminación segura de archivos.
- Mensajes de confirmación y error para las operaciones realizadas.

---

## Requisitos

- PHP 8 o superior
- Servidor Apache (XAMPP recomendado)
- Navegador web

---

## Instalación

1. Copiar la carpeta del proyecto dentro de:

```
xampp/htdocs/
```

2. Iniciar Apache desde XAMPP.

3. Abrir el navegador y acceder a:

```
http://localhost/Gestion_Archivos_POO/
```

---

## Instrucciones de uso

1. Abrir la página principal del sistema.
2. Seleccionar un archivo PDF, JPG o PNG.
3. Hacer clic en **Subir Archivo**.
4. El sistema mostrará un mensaje indicando si la operación fue exitosa o si ocurrió algún error.
5. Los archivos subidos aparecerán automáticamente en el listado.
6. Desde el listado es posible:
   - Descargar un archivo.
   - Eliminar un archivo mediante el botón **Eliminar**.

---

## Clase utilizada

El proyecto implementa la clase **GestorArchivos**, desarrollada siguiendo el paradigma de Programación Orientada a Objetos (POO).

Esta clase encapsula toda la lógica relacionada con la gestión de archivos mediante los siguientes métodos:

- **subir($archivo):** valida y almacena los archivos en el servidor.
- **listar():** obtiene el listado de archivos almacenados.
- **eliminar($nombre):** elimina un archivo de forma segura.

El uso de una clase permite mantener el código organizado, reutilizable y fácil de mantener.

---

## Medidas de seguridad aplicadas

El sistema implementa diversas medidas de seguridad para proteger la aplicación y los archivos almacenados:

- Validación de la extensión del archivo (solo PDF, JPG y PNG).
- Validación del tipo MIME del archivo.
- Límite máximo de tamaño de 2 MB.
- Renombrado automático de los archivos mediante `uniqid()` para evitar conflictos de nombres.
- Protección contra ataques **Path Traversal** utilizando `basename()` al eliminar archivos.
- Configuración mediante un archivo `.htaccess` en la carpeta `uploads` para impedir la ejecución de archivos PHP u otros archivos ejecutables.

---

## Estructura del proyecto

```
Gestion_Archivos_POO/
│
├── index.php
├── subir.php
├── eliminar.php
├── GestorArchivos.php
├── estilos.css
├── README.md
├── uploads/
│   └── .htaccess
```

---

## Autor

**Jorge Xavier Romero Carrión**

Universidad Técnica Particular de Loja (UTPL)

Ingeniería en Tecnologías de la Información
