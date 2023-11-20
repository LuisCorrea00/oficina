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
        <?php echo form_open('clientes/store') ?>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo isset($cliente['nome']) ? $cliente['nome'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome"
                value="<?php echo isset($cliente['sobrenome']) ? $cliente['sobrenome'] : '' ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" value="<?php echo isset($cliente['cpf']) ? $cliente['cpf'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone"
                value="<?php echo isset($cliente['telefone']) ? $cliente['telefone'] : '' ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" name="dataNascimento"
                value="<?php echo isset($cliente['dataNascimento']) ? $cliente['dataNascimento'] : '' ?>"
                class="form-control">
        </div>

        <input type="submit" value="Salvar" class="btn btn-primary">
        <input type="hidden" name="idcliente"
            value="<?php echo isset($cliente['idcliente']) ? $cliente['idcliente'] : '' ?>">
        <?php echo form_close() ?>
</body>

</html>