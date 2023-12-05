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
        <?php echo form_open('clientes/store') ?>
        <span class="display-6 ">
            <?php echo isset($cliente) ? 'Editar Cliente' : 'Cadastro de Clientes' ?>
        </span>
        <span class="text-danger">
            <?php echo session()->getFlashdata('erros') ?? '' ?>
        </span>
        <div class="form-group pt-3">
            <label for="nomeCliente">Nome Completo</label>
            <input type="text" name="nomeCliente"
                value="<?php echo isset($cliente['nomeCliente']) ? $cliente['nomeCliente'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" value="<?php echo isset($cliente['cpf']) ? $cliente['cpf'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone"
                value="<?php echo isset($cliente['telefone']) ? $cliente['telefone'] : '' ?>" class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" name="dataNascimento"
                value="<?php echo isset($cliente['dataNascimento']) ? $cliente['dataNascimento'] : '' ?>"
                class="form-control">
        </div>

        <input type="submit" value="Salvar" class="btn btn-success w-100 mt-3">
        <input type="hidden" name="idCliente"
            value="<?php echo isset($cliente['idCliente']) ? $cliente['idCliente'] : '' ?>">
        <?php echo form_close() ?>
</body>

</html>