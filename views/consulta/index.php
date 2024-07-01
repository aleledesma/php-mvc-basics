<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>public/css/global.css">
</head>
<body>
    <?php require './views/header.php' ?>
    <div id="main">
        <h4 class="center"><?php echo $this->message ?></h4>
        <table width="100%">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->alumnos as $alumno) { ?>
                <tr class="center">
                    <td><?php echo $alumno->matricula ?></td>
                    <td><?php echo $alumno->nombre ?></td>
                    <td><?php echo $alumno->apellido ?></td>
                    <td><a href="<?php echo constant('URL') . '/consulta/verAlumno/' . $alumno->matricula ?>">Editar</a></td>
                    <td><a href="<?php echo constant('URL') . '/consulta/eliminarAlumno/' . $alumno->matricula ?>">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require './views/footer.php' ?>
</body>
</html>