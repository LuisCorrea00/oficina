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
        <?php echo form_open('funcionarios/store') ?>

        <div class="form-group pt-3">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nomeFuncionario"
                value="<?php echo isset($funcionario['nomeFuncionario']) ? $funcionario['nomeFuncionario'] : '' ?>"
                class="form-control">
        </div>


        <div class="form-group pt-3">
            <label for="dataNascimento">Data de nascimento</label>
            <input type="date" name="dataNascimento"
                value="<?php echo isset($funcionario['dataNascimento']) ? $funcionario['dataNascimento'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone"
                value="<?php echo isset($funcionario['telefone']) ? $funcionario['telefone'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" value="<?php echo isset($funcionario['cpf']) ? $funcionario['cpf'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="equipe">Equipe</label>
            <select name="idEquipe" class="form-control">
                <option value="" selected></option>
                <?php foreach ($equipes as $equipe): ?>
                    <option value="<?php echo $equipe['idEquipe']; ?>" <?php echo (isset($funcionario['idEquipe']) && $funcionario['idEquipe'] == $equipe['idEquipe']) ? 'selected' : ''; ?>>
                        <?php echo $equipe['nomeEquipe']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="submit" value="Salvar" class="btn btn-success w-100 mt-3">
        <input type="hidden" name="idFuncionario"
            value="<?php echo isset($funcionario['idFuncionario']) ? $funcionario['idFuncionario'] : '' ?>">

        <?php echo form_close() ?>
    </div>
</body>

</html>