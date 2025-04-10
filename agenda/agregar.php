<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombres = $_POST['nombres'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $linkedin = $_POST['linkedin'];

    $stmt = $conexion->prepare("INSERT INTO contacto (nombres, apaterno, amaterno, genero, fecha_nacimiento, telefono, email, linkedin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nombres, $apaterno, $amaterno, $genero, $fecha_nacimiento, $telefono, $email, $linkedin);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background: white;
            padding: 25px;
            width: 400px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .enlace {
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .enlace a {
            color: #007bff;
            text-decoration: none;
        }

        .enlace a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Nuevo Contacto</h1>
    <form method="post">
        <input type="text" name="nombres" placeholder="Nombres" required>
        <input type="text" name="apaterno" placeholder="Apellido Paterno" required>
        <input type="text" name="amaterno" placeholder="Apellido Materno" required>
        <select name="genero" required>
            <option value="">-- Género --</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
        <input type="date" name="fecha_nacimiento" required>
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="url" name="linkedin" placeholder="Perfil de LinkedIn">
        <button type="submit">Guardar</button>
    </form>
    <div class="enlace">
        <a href="index.php">← Volver al listado</a>
    </div>
</body>
</html>
