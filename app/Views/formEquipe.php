<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php echo form_open('equipes/store') ?>

        <div class="form-group">
            <label for="nome">Nome da equipe:</label>
            <input type="text" name="nome" value="<?php echo isset($equipe[0]['titulo']) ? $equipe[0]['titulo'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="funcionario">Funcionário</label>
            <select name="funcionario" class="form-control">
                <?php foreach ($funcionarios as $funcionario): ?>
                    <option value="<?php echo $funcionario['idfuncionario'] ?>">
                        <?php echo $funcionario['nome'] . ' ' . $funcionario['sobrenome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

    </div>

</body>

</html>