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
        <h1 class="center">Alumno matricula: <?php echo $this->alumno->matricula ?></h1>
        <div class="center"><?php echo $this->message ?></div>
        <form class="newUserForm" style="padding: 50px; margin: 0 auto;" action="<?php echo constant('URL'); ?>consulta/actualizarAlumno" method="post">
            <p>
                <label for="matricula">Matrícula</label>
                <input disabled type="text" name="matricula" id="matricula" value="<?php echo $this->alumno->matricula ?>" required>
            </p>
            <p>
                <label for="Nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $this->alumno->nombre ?>" required>
            </p>
            <p>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $this->alumno->apellido ?>" required>
            </p>
            <input style="cursor: pointer;" type="submit" value="Actualizar alumno">
        </form>
    </div>
    <?php include './views/footer.php' ?>
</body>
</html>