<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4iEAoynu7srO8YmBUPicbfF146t0GpjEW1A&usqp=CAU"
        type="image/x-icon">
    <title>PitStop</title>
</head>

<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?>
    <div class="container mt-5">
        <?php echo form_open('ordemServico/store') ?>
        <span class="text-danger">
            <?php echo session()->getFlashdata('erros') ?? '' ?>
        </span>
        <div class="form-group">
            <div class="">
                <label for="cliente">Cliente</label>
                <a class="ms-2" href="<?php echo base_url('clientes/create/'); ?>">
                    <i class="bi bi-plus-circle" style="font-size: 1rem;color:black;"></i>
                </a>
            </div>
            <select name="idCliente" class="form-control">
                <option value="" selected></option>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?php echo $cliente['idCliente']; ?>" <?php echo (isset($ordemServico['idCliente']) && $ordemServico['idCliente'] == $cliente['idCliente']) ? 'selected' : ''; ?>>
                        <?php echo $cliente['nomeCliente']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group pt-3">
            <label for="placa">Placa do veículo</label>
            <input type="text" name="placa"
                value="<?php echo isset($ordemServico['idVeiculo']) ? $ordemServico['placa'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="descricaoProblema">Descrição do problema</label>
            <input type="text" name="descricaoProblema"
                value="<?php echo isset($ordemServico['idOrdem_servico']) ? $ordemServico['descricaoProblema'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group pt-3">
            <label for="equipe">Equipe</label>
            <a class="ms-2" href="<?php echo base_url('equipes/create/'); ?>">
                <i class="bi bi-plus-circle" style="font-size: 1rem;color:black;"></i>
            </a>
            <select name="idEquipe" class="form-control">
                <option value="" selected></option>
                <?php foreach ($equipes as $equipe): ?>
                    <option value="<?php echo $equipe['idEquipe']; ?>" <?php echo (isset($ordemServico['idEquipe']) && $ordemServico['idEquipe'] == $equipe['idEquipe']) ? 'selected' : ''; ?>>
                        <?php echo $equipe['nomeEquipe']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="submit" value="Salvar" class="btn btn-success w-100 mt-3">
        <input type="hidden" name="idOrdem_servico"
            value="<?php echo isset($ordemServico['idOrdem_servico']) ? $ordemServico['idOrdem_servico'] : '' ?>">

        <?php echo form_close() ?>
    </div>
</body>

</html>