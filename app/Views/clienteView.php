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

    <div class="container mt-4 mb-3">
        <div class="d-flex align-items-center mb-4">
            <h1>Clientes</h1>
            <?php echo anchor(base_url('clientes/create'), 'Novo Cliente', ['class' => 'btn btn-success ms-3']); ?>
        </div>
        <div class="d-flex justify-content-center flex-wrap">
            <?php foreach ($clientes as $cliente): ?>
                <div class="card d-inline-block mb-3 me-3" style="width: 25vw;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $cliente['nomeCliente'] ?>
                        </h5>
                        <div class="card-text">
                            <p>
                                Telefone:
                                <?php echo $cliente['telefone'] ?>
                            </p>
                            <p>
                                CPF:
                                <?php echo $cliente['cpf'] ?>
                            </p>
                            <p>
                                Data de Nascimento:
                                <?php echo date('d/m/Y', strtotime($cliente['dataNascimento'])) ?>
                            </p>

                            <div class="d-flex flex-column">
                                <?php echo anchor(base_url('clientes/' . $cliente['idCliente'] . '/veiculos/'), 'Ver veículos', ['class' => 'btn btn-primary']); ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a class="" href="<?php echo base_url('clientes/edit/' . $cliente['idCliente']); ?>">
                                    <i class="bi bi-pencil-square" style="font-size: 2rem;color:black;"></i>
                                </a>
                                <a href="<?php echo base_url('clientes/delete/' . $cliente['idCliente']) ?>" class=""
                                    onclick="return confirma()">
                                    <i class="bi bi-trash" style="font-size: 2rem; color:red;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</body>

</html>
<script>
    function confirma() {
        if (!confirm("Deseja realmente excluir?")) {
            return false;
        }
    }
</script>