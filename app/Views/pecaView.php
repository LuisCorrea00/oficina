<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Peças</title>
</head>

<body>
    <div class="container">
        <?php echo anchor(base_url('pecas/create'), 'Nova Peça', ['class' => 'btn btn-success']); ?>
        <h1>Peças</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pecas as $peca): ?>
                    <tr>
                        <td>
                            <?php echo $peca['nome'] ?>
                        </td>
                        <td>
                            <?php echo $peca['descricao'] ?>
                        </td>
                        <td>
                            <?php echo $peca['preco'] ?>
                        </td>
                        <td>
                            <?php echo anchor(base_url('pecas/edit/' . $peca['idpeca']), 'Editar'); ?>
                            -
                            <?php echo anchor(base_url('pecas/delete/' . $peca['idpeca']), 'Deletar', ['onclick' => 'return confirma()']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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