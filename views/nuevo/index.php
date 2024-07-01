<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar alumno</title>
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>public/css/global.css">
</head>
<body>
    <?php include './views/header.php' ?>
    <div id="main">
        <h1 class="center">Crear nuevo alumno</h1>
        <div class="center"><?php echo $this->message ?></div>
        <form class="newUserForm" style="padding: 50px; margin: 0 auto;" action="<?php echo constant('URL'); ?>nuevo/nuevoUsuario" method="post">
            <p>
                <label for="matricula">Matrícula</label>
                <input type="text" name="matricula" id="matricula" required>
            </p>
            <p>
                <label for="Nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
            </p>
            <p>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" required>
            </p>
            <input style="cursor: pointer;" type="submit" value="Crear nuevo alumno">
        </form>
    </div>
    <?php include './views/footer.php' ?>
</body>
</html>