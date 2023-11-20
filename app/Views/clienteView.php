<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Clientes</title>
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex">
            <h1>Clientes</h1>
            <?php echo anchor(base_url('clientes/create'), 'Novo Cliente', ['class' => 'btn btn-success']); ?>
        </div>
        <?php foreach ($clientes as $cliente): ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $cliente['nome'] . " " . $cliente['sobrenome'] ?>
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
                            <?php echo $cliente['dataNascimento'] ?>
                        </p>
                        <button>
                            <?php echo anchor(base_url('clientes/' . $cliente['idcliente'] . '/veiculos/'), 'Ver veículos'); ?>
                        </button>
                        <?php echo anchor(base_url('clientes/edit/' . $cliente['idcliente']), 'Editar'); ?>
                        -
                        <?php echo anchor(base_url('clientes/delete/' . $cliente['idcliente']), 'Deletar', ['onclick' => 'return confirma()']); ?>
                    </div>
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