<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4iEAoynu7srO8YmBUPicbfF146t0GpjEW1A&usqp=CAU" type="image/x-icon"> 
    <title>PitStop</title>
</head>

<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?>
    <div class="container mt-4 mb-3">
        <div class="d-flex align-items-center mb-4">
            <h1>Ordens de Serviço</h1>
            <?php echo anchor(base_url('ordemServico/create'), 'Nova Ordem de Serviço', ['class' => 'btn btn-success ms-3']); ?>
        </div>
        <h4 class="mb-5">Abertas</h4>
        <div class="d-flex justify-content-center flex-wrap">
            <?php foreach ($ordensTodo as $ordemTodo): ?>
                <div class="card d-inline-block mb-3 me-3" style="width: 25vw;">
                    <div class="card-body">
                        <h5 class="card-title">
                            Cliente:
                            <?php echo $ordemTodo['nomeCliente'] ?>
                        </h5>
                        <p class="card-text">
                            Placa:
                            <?php echo $ordemTodo['placa'] ?>
                        </p>
                        <p class="card-text">
                            Problema:
                            <?php echo $ordemTodo['descricaoProblema'] ?>
                        </p>
                        <p class="card-text">
                            Equipe:
                            <?php echo $ordemTodo['nomeEquipe'] ?>
                        </p>
                        <p class="card-text">
                            Data e Hora:
                            <?php echo $ordemTodo['dataHora'] ?>
                        </p>
                        <div class="d-flex align-items-center">
                            <a class=" btn btn-success ms-2 w-75"
                                href="<?php echo base_url('ordemServico/concluir/' . $ordemTodo['idOrdem_servico']); ?>">
                                Concluir
                            </a>
                            <a class=" ms-auto"
                                href="<?php echo base_url('ordemServico/delete/' . $ordemTodo['idOrdem_servico']) ?>"
                                onclick="return confirma()">
                                <i class="bi bi-trash" style="font-size: 2rem; color:red;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <h4 class="mb-5">Concluídas</h4>
        <div class="d-flex justify-content-center flex-wrap">
            <?php foreach ($ordensDone as $ordemDone): ?>
                <div class="card d-inline-block mb-3 me-3" style="width: 25vw;">
                    <div class="card-body">
                        <h5 class="card-title">
                            Cliente:
                            <?php echo $ordemDone['nomeCliente'] ?>
                        </h5>
                        <p class="card-text">
                            Placa:
                            <?php echo $ordemDone['placa'] ?>
                        </p>
                        <p class="card-text">
                            Equipe:
                            <?php echo $ordemDone['nomeEquipe'] ?>
                        </p>
                        <p class="card-text">
                            Data e Hora:
                            <?php
                            $dataHora = new DateTime($ordemDone['dataHora'], new DateTimeZone('America/Sao_Paulo'));
                            echo $dataHora->format('d/m/Y H:i:s');
                            ?>
                        </p>
                        <p class="card-text">
                            Serviços:
                            <?php $nomesServico = explode(' , ', $ordemDone['nomesServico']); ?>
                            <?php foreach ($nomesServico as $servico): ?>
                                <?php echo $servico ?>
                            <?php endforeach; ?>
                        </p>
                        <p class="card-text">
                            Peças:
                            <?php $nomesPeca = explode(' , ', $ordemDone['nomesPeca']); ?>
                            <?php foreach ($nomesPeca as $peca): ?>
                                <?php echo $peca ?>
                            <?php endforeach; ?>
                        </p>
                        <p class="card-text">
                            Total serviços (R$):
                            <?php echo $ordemDone['totalServico'] ?>
                        </p>
                        <p class="card-text">
                            Total peças (R$):
                            <?php echo $ordemDone['totalPeca'] ?>
                        </p>
                        <p class="card-text">
                            <strong>
                                Total (R$):
                                <?php echo $ordemDone['total'] ?>
                            </strong>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>