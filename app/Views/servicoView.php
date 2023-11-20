<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Serviços</title>
</head>

<body>
    <div class="container">
        <?php echo anchor(base_url('servicos/create'), 'Novo Serviço', ['class' => 'btn btn-success']); ?>
        <h1>Serviços</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($servicos as $servico): ?>
                    <tr>
                        <td>
                            <?php echo $servico['nome'] ?>
                        </td>
                        <td>
                            <?php echo $servico['descricao'] ?>
                        </td>
                        <td>
                            <?php echo $servico['valor'] ?>
                        </td>
                        <td>
                            <?php echo anchor(base_url('servicos/edit/' . $servico['idservico']), 'Editar'); ?>
                            -
                            <?php echo anchor(base_url('servicos/delete/' . $servico['idservico']), 'Deletar', ['onclick' => 'return confirma()']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>