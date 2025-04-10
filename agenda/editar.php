<?php
require 'conexion.php';

// Si viene el ID por GET, cargamos los datos actuales
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexion->prepare("SELECT * FROM contacto WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $contacto = $resultado->fetch_assoc();
    $stmt->close();
}

// Si se envió el formulario por POST, actualizamos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $linkedin = $_POST['linkedin'];

    $stmt = $conexion->prepare("UPDATE contacto SET nombres=?, apaterno=?, amaterno=?, genero=?, fecha_nacimiento=?, telefono=?, email=?, linkedin=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $nombres, $apaterno, $amaterno, $genero, $fecha_nacimiento, $telefono, $email, $linkedin, $id);
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
    <title>Editar Contacto</title>
</head>
<body>
    <h1>Editar Contacto</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $contacto['id'] ?>">
        <input type="text" name="nombres" value="<?= $contacto['nombres'] ?>" required><br>
        <input type="text" name="apaterno" value="<?= $contacto['apaterno'] ?>" required><br>
        <input type="text" name="amaterno" value="<?= $contacto['amaterno'] ?>" required><br>
        <select name="genero" required>
            <option value="">-- Género --</option>
            <option value="M" <?= $contacto['genero'] == 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $contacto['genero'] == 'F' ? 'selected' : '' ?>>Femenino</option>
        </select><br>
        <input type="date" name="fecha_nacimiento" value="<?= $contacto['fecha_nacimiento'] ?>" required><br>
        <input type="text" name="telefono" value="<?= $contacto['telefono'] ?>" required><br>
        <input type="email" name="email" value="<?= $contacto['email'] ?>" required><br>
        <input type="url" name="linkedin" value="<?= $contacto['linkedin'] ?>"><br>
        <button type="submit">Actualizar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
