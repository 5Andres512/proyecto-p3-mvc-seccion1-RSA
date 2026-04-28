<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD MVC RSA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Lista de Productos</h2>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalProducto">Nuevo Producto</button>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($productos)): ?>
                        <?php foreach($productos as $p): ?>
                        <tr>
                            <td><?= $p['id'] ?></td>
                            <td><?= $p['nombre'] ?></td>
                            <td>$<?= number_format($p['precio'], 2) ?></td>
                            <td><?= $p['descripcion'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $p['id'] ?>">Editar</button>
                                
                                <a href="index.php?action=eliminar&id=<?= $p['id'] ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No hay productos registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalProducto" tabindex="-1">
    <div class="modal-dialog">
        <form action="index.php?action=guardar" method="POST" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
            </div>
        </form>
    </div>
</div>

<?php if(!empty($productos)): ?>
    <?php foreach($productos as $p): ?>
    <div class="modal fade" id="modalEditar<?= $p['id'] ?>" tabindex="-1">
        <div class="modal-dialog">
            <form action="index.php?action=actualizar" method="POST" class="modal-content">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Editar Producto #<?= $p['id'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?= $p['nombre'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="<?= $p['precio'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3"><?= $p['descripcion'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Actualizar Cambios</button>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>