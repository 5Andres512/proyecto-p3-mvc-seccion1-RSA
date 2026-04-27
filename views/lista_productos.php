<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <?php foreach($datos as $p): ?>
        <tr>
            <td><?= $p['nombre'] ?></td>
            <td><a href="index.php?action=eliminar&id=<?= $p['id'] ?>">Eliminar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>