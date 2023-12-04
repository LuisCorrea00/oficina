<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4iEAoynu7srO8YmBUPicbfF146t0GpjEW1A&usqp=CAU"
        type="image/x-icon">
    <title>PitStop</title>
</head>

<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?>
    <div class="container mt-5">
        <?php echo form_open('equipes/store') ?>

        <div class="form-group pt-3">
            <label for="nomeEquipe">Nome da equipe:</label>
            <input type="text" name="nomeEquipe"
                value="<?php echo isset($equipe['nomeEquipe']) ? $equipe['nomeEquipe'] : '' ?>" class="form-control">
        </div>

        <input type="submit" value="Salvar" class="btn btn-success w-100 mt-3">
        <input type="hidden" name="idEquipe"
            value="<?php echo isset($equipe['idEquipe']) ? $equipe['idEquipe'] : '' ?>">

        <?php echo form_close() ?>
    </div>

</body>

</html>