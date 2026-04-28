<?php
require_once 'config/db.php';
require_once 'models/Producto.php';

class ProductoController {
    private $db;
    private $producto;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->producto = new Producto($this->db);
    }

    // Mostrar todos los productos
    public function index() {
        $stmt = $this->producto->leer();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once 'views/lista.php';
    }

    // Guardar un producto nuevo
    public function guardar() {
        if ($_POST) {
            $this->producto->nombre = $_POST['nombre'];
            $this->producto->descripcion = $_POST['descripcion'];
            $this->producto->precio = $_POST['precio'];

            if ($this->producto->crear()) {
                header("Location: index.php?action=index");
                exit();
            }
        }
    }

    // Eliminar un producto
    public function borrar($id) {
        $this->producto->id = $id;
        if ($this->producto->eliminar()) {
            header("Location: index.php?action=index");
        }
    }

    // Actualizar un producto
    public function actualizar() {
        if ($_POST) {
            $this->producto->id = $_POST['id'];
            $this->producto->nombre = $_POST['nombre'];
            $this->producto->descripcion = $_POST['descripcion'];
            $this->producto->precio = $_POST['precio'];

            if ($this->producto->actualizar()) {
                header("Location: index.php?action=index");
                exit();
            }
        }
    }
}

// Lógica para manejar las rutas (esto lo dispara la Vista)
$controller = new ProductoController();
$action = $_GET['action'] ?? 'index';

if ($action == 'index') {
    $controller->index();
} elseif ($action == 'guardar') {
    $controller->guardar();
} elseif ($action == 'eliminar') {
    $controller->borrar($_GET['id']);
}
?>