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
    <div class="container mt-4">
        <?php echo form_open('veiculos/store') ?>
        <span class="display-6 ">
            <?php echo isset($veiculo) ? 'Editar Veículo' : 'Cadastro de Veículos' ?>
        </span>
        <span class="text-danger">
            <?php echo session()->getFlashdata('erros') ?? '' ?>
        </span>
        <div class="form-group pt-3">
            <label for="placa">Placa</label>
            <input type="text" name="placa" value="<?php echo isset($veiculo['placa']) ? $veiculo['placa'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" value="<?php echo isset($veiculo['modelo']) ? $veiculo['modelo'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="cor">Cor</label>
            <input type="text" name="cor" value="<?php echo isset($veiculo['cor']) ? $veiculo['cor'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="ano">Ano</label>
            <input type="number" name="ano" value="<?php echo isset($veiculo['ano']) ? $veiculo['ano'] : '' ?>"
                class="form-control">
        </div>

        <input type="submit" value="Salvar" class="btn btn-success w-100 mt-3">
        <input type="hidden" name="idVeiculo"
            value="<?php echo isset($veiculo['idVeiculo']) ? $veiculo['idVeiculo'] : '' ?>">
        <input type="hidden" name="idCliente"
            value="<?php echo isset($idCliente) ? $idCliente : $veiculo['idCliente'] ?>">
        <?php echo form_close() ?>
</body>

</html>