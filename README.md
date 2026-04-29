# Proyecto CRUD MVC de Productos

Un sistema simple de gestión de productos desarrollado en PHP utilizando el patrón de diseño Modelo-Vista-Controlador (MVC). Permite realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre productos almacenados en una base de datos MySQL.

## Características

- **Interfaz web intuitiva**: Utiliza Bootstrap para un diseño responsive y moderno.
- **Operaciones CRUD completas**: Crear, listar, editar y eliminar productos.
- **Validación básica**: Sanitización de datos para seguridad.
- **Base de datos MySQL**: Almacenamiento persistente de productos.
- **Estructura MVC**: Separación clara de lógica de negocio, presentación y control.

## Requisitos

- **PHP**: Versión 7.4 o superior.
- **MySQL**: Servidor de base de datos.
- **Servidor web**: Apache (recomendado con XAMPP para desarrollo local).
- **Navegador web**: Cualquier navegador moderno.

## Instalación

1. **Clona o descarga el proyecto**:
   - Coloca los archivos en el directorio raíz de tu servidor web (ej. `htdocs` en XAMPP).

2. **Configura la base de datos**:
   - Crea una base de datos llamada `crud_mvc_rsa` en MySQL.
   - Importa el archivo `config/database.sql` para crear la tabla `productos`.

3. **Configura la conexión**:
   - Edita `config/db.php` si es necesario para ajustar credenciales de BD (por defecto: localhost, root, sin contraseña).

4. **Ejecuta el proyecto**:
   - Accede a `http://localhost/proyecto-p3-mvc-seccion1-RSA-main/index.php` en tu navegador.

## Uso

- **Listar productos**: Visita la página principal para ver todos los productos.
- **Agregar producto**: Haz clic en "Nuevo Producto" y llena el formulario.
- **Editar producto**: Haz clic en "Editar" en la fila del producto deseado.
- **Eliminar producto**: Haz clic en "Eliminar" y confirma la acción.

## Estructura del Proyecto

```
proyecto-p3-mvc-seccion1-RSA-main/
├── index.php                 # Punto de entrada y enrutador
├── config/
│   ├── db.php               # Configuración de base de datos
│   └── database.sql         # Script SQL para crear tablas
├── controllers/
│   └── ProductoController.php # Lógica de control para productos
├── models/
│   └── Producto.php         # Modelo de datos para productos
└── views/
    └── lista.php            # Vista para listar y gestionar productos
```

## Contribución

Si deseas contribuir:
1. Haz un fork del repositorio.
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -am 'Agrega nueva funcionalidad'`).
4. Push a la rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.



