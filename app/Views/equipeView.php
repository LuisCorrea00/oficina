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
    <div class="container">
        <?php echo anchor(base_url('equipes/create'), 'Nova Equipe', ['class' => 'btn btn-success']); ?>
        <h1>Equipes</h1>
        <?php foreach ($titles as $title): ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $title['titulo'] ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Membros:
                    </h6>
                    <p class="card-text">
                        <?php foreach ($equipes as $equipe): ?>
                            <?php if ($equipe['idequipe'] == $title['idequipe']): ?>
                                <?php echo $equipe['nome'] . ' ' . $equipe['sobrenome'] ?><br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </p>
                    <?php echo anchor(base_url('equipes/edit/' . $equipe['idequipe']), 'Editar'); ?>
                    -
                    <?php echo anchor(base_url('equipes/delete/' . $equipe['idequipe']), 'Deletar', ['onclick' => 'return confirma()']); ?>
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