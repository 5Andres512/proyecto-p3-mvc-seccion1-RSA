<?php

require_once 'models/Producto.php';

$accion = $_GET['action'] ?? 'listar';

if ($accion == 'listar') {
    $modelo = new Producto($db);
    $datos = $modelo->listar();
    require_once 'views/lista_productos.php'; // Carga la vista
}

?>