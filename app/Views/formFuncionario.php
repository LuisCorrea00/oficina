<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edição</title>
</head>

<body>
    <div class="container mt-5">
        <?php echo form_open('funcionarios/store') ?>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo isset($funcionario['nome']) ? $funcionario['nome'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" value="<?php echo isset($funcionario['sobrenome']) ? $funcionario['sobrenome'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="dataNascimento">Data de nascimento</label>
            <input type="date" name="dataNascimento" value="<?php echo isset($funcionario['dataNascimento']) ? $funcionario['dataNascimento'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" value="<?php echo isset($funcionario['telefone']) ? $funcionario['telefone'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" value="<?php echo isset($funcionario['cpf']) ? $funcionario['cpf'] : '' ?>"
                class="form-control">
        </div>

        <input type="submit" value="Salvar" class="btn btn-primary">
        <input type="hidden" name="idfuncionario" value="<?php echo isset($funcionario['idfuncionario']) ? $funcionario['idfuncionario'] : '' ?>">

        <?php echo form_close() ?>
    </div>
</body>

</html>