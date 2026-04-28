<?php
class Producto {
    private $conn;
    private $table_name = "productos";

    // Propiedades del objeto
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;

    // Constructor con la conexión a la BD
    public function __construct($db) {
        $this->conn = $db;
    }

    // 1. LEER todos los productos
    public function leer() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY creado_en DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // 2. CREAR un nuevo producto
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nombre=:nombre, descripcion=:descripcion, precio=:precio";
        
        $stmt = $this->conn->prepare($query);

        // Limpiar datos (Seguridad)
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precio = htmlspecialchars(strip_tags($this->precio));

        // Vincular parámetros
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":precio", $this->precio);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // 3. ACTUALIZAR un producto existente
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nombre=:nombre, descripcion=:descripcion, precio=:precio 
                  WHERE id=:id";
        
        $stmt = $this->conn->prepare($query);

        // Limpiar datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincular parámetros
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // 4. ELIMINAR un producto
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);

        // Limpiar ID
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Vincular ID
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>