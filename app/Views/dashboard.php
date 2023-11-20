<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Dashboard</h1>
        <?php echo anchor(base_url('funcionarios/'), 'Funcionários', ['class' => 'btn btn-primary']); ?>
        <?php echo anchor(base_url('pecas/'), 'Peças', ['class' => 'btn btn-primary']); ?>
        <?php echo anchor(base_url('clientes/'), 'Clientes', ['class' => 'btn btn-primary']); ?>
        <?php echo anchor(base_url('servicos/'), 'Serviços', ['class' => 'btn btn-primary']); ?>
        <?php echo anchor(base_url('equipes/'), 'Equipes', ['class' => 'btn btn-primary']); ?>
    </div>
</body>

</html>