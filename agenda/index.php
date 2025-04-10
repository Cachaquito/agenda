<?php
require 'conexion.php';
$resultado = $conexion->query("SELECT * FROM contacto");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .nuevo-contacto {
            display: block;
            width: max-content;
            margin: 0 auto 20px auto;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }

        .nuevo-contacto:hover {
            background: #0056b3;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 95%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .acciones a {
            margin: 0 5px;
            text-decoration: none;
            color: #007bff;
        }

        .acciones a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Agenda de Contactos</h1>
    <a href="agregar.php" class="nuevo-contacto">+ Nuevo contacto</a>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nombres</th><th>Ap. Paterno</th><th>Ap. Materno</th>
                <th>Género</th><th>F. Nac.</th><th>Teléfono</th><th>Email</th><th>LinkedIn</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $fila['id'] ?></td>
                    <td><?= $fila['nombres'] ?></td>
                    <td><?= $fila['apaterno'] ?></td>
                    <td><?= $fila['amaterno'] ?></td>
                    <td><?= $fila['genero'] ?></td>
                    <td><?= $fila['fecha_nacimiento'] ?></td>
                    <td><?= $fila['telefono'] ?></td>
                    <td><?= $fila['email'] ?></td>
                    <td><a href="<?= $fila['linkedin'] ?>" target="_blank">Ver</a></td>
                    <td class="acciones">
                        <a href="editar.php?id=<?= $fila['id'] ?>">Editar</a> |
                        <a href="eliminar.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este contacto?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
