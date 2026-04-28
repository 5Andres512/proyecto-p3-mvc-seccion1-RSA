<?php
// 1. Errores (Opcional, útil para desarrollo en la universidad)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Cargar la configuración y el modelo automáticamente
require_once 'config/db.php';
require_once 'models/Producto.php';
require_once 'controllers/ProductoController.php';

// 3. Inicializar el controlador
$controller = new ProductoController();

// 4. Capturar la acción de la URL
// Si no hay acción, por defecto usamos 'index' (listar)
$action = $_GET['action'] ?? 'index';

// 5. Enrutar la petición
switch ($action) {
    case 'index':
        $controller->index();
        break;
        
    case 'guardar':
        $controller->guardar();
        break;
        
    case 'eliminar':
        // Verificamos que venga un ID para eliminar
        if (isset($_GET['id'])) {
            $controller->borrar($_GET['id']);
        } else {
            $controller->index();
        }
        break;

    case 'actualizar':
        $controller->actualizar();
        break;

    default:
        $controller->index();
        break;
}

?>