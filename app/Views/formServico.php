<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4iEAoynu7srO8YmBUPicbfF146t0GpjEW1A&usqp=CAU" type="image/x-icon"> 
    <title>PitStop</title>
</head>

<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?>
    <div class="container mt-5">
        <?php echo form_open('servicos/store') ?>

        <div class="form-group pt-3">
            <label for="nomeServico">Nome</label>
            <input type="text" name="nomeServico"
                value="<?php echo isset($servico['nomeServico']) ? $servico['nomeServico'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao"
                value="<?php echo isset($servico['descricao']) ? $servico['descricao'] : '' ?>" class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="valorServico">Valor (R$)</label>
            <input type="number" name="valorServico"
                value="<?php echo isset($servico['valorServico']) ? $servico['valorServico'] : '' ?>"
                class="form-control">
        </div>

        <input type="submit" value="Salvar" class="btn btn-success w-100 mt-3">
        <input type="hidden" name="idServico"
            value="<?php echo isset($servico['idServico']) ? $servico['idServico'] : '' ?>">
        <?php echo form_close() ?>
</body>

</html>