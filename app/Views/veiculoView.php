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
        <div class="d-flex">
            <h1>Veículos</h1>
            <?php echo anchor(base_url('veiculos/create/'. $idcliente), 'Novo Veículo', ['class' => 'btn btn-success']); ?>
        </div>
        <?php foreach ($veiculos as $veiculo): ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $veiculo['modelo'] ?>
                    </h5>
                    <div class="card-text">
                        <p>
                            Placa:
                            <?php echo $veiculo['placa'] ?>
                        </p>
                        <p>
                            Ano:
                            <?php echo $veiculo['ano'] ?>
                        </p>
                        <?php echo anchor(base_url('veiculos/edit/' . $veiculo['idveiculo']), 'Editar'); ?>
                        -
                        <?php echo anchor(base_url('veiculos/delete/' . $veiculo['idveiculo']), 'Deletar', ['onclick' => 'return confirma()']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
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