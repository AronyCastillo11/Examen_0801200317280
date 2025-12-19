<?php
// Mostrar errores solo en desarrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciar sesión
session_start();

// Definir raíz del proyecto
define("ROOT", dirname(__FILE__) . DIRECTORY_SEPARATOR);

// Autocargador de clases (PSR-4 simple)
spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $file = ROOT . "src" . DIRECTORY_SEPARATOR . $class . ".php";
    if (file_exists($file)) {
        require_once $file;
    }
});

// Controlador por defecto
$controller = "Controllers\\Cursos\\Cursos";

// Verificar si viene un controlador por GET
if (isset($_GET["page"])) {
    $controller = "Controllers\\" . str_replace("/", "\\", $_GET["page"]);
}

// Validar existencia del controlador
if (!class_exists($controller)) {
    http_response_code(404);
    echo "Controlador no encontrado";
    exit;
}

// Ejecutar controlador
$instance = new $controller();
$instance->run();
