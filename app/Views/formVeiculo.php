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
    <div class="container mt-4">
        <?php echo form_open('veiculos/store') ?>

        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" value="<?php echo isset($veiculo['modelo']) ? $veiculo['modelo'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" name="placa" value="<?php echo isset($veiculo['placa']) ? $veiculo['placa'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="ano">Ano</label>
            <input type="number" name="ano" value="<?php echo isset($veiculo['ano']) ? $veiculo['ano'] : '' ?>"
                class="form-control">
        </div>

        <input type="submit" value="Salvar" class="btn btn-primary">
        <input type="hidden" name="idveiculo"
            value="<?php echo isset($veiculo['idveiculo']) ? $veiculo['idveiculo'] : '' ?>">
        <input type="hidden" name="cliente_idcliente"
            value="<?php echo isset($idcliente) ? $idcliente : $veiculo['cliente_idcliente'] ?>">
        <?php echo form_close() ?>
</body>

</html>