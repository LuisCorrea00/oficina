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
            <h1>Equipes</h1>
            <?php echo anchor(base_url('equipes/create'), 'Nova Equipe', ['class' => 'btn btn-success ms-3']); ?>
        </div>
        <div class="d-flex justify-content-center flex-wrap">
            <?php foreach ($equipes as $equipe): ?>
                <div class="card d-inline-block mb-3 me-3" style="width: 25vw;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $equipe['nomeEquipe'] ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Membros:
                        </h6>
                        <p class="card-text">
                            <?php foreach ($funcionarios as $funcionario): ?>
                                <?php if ($equipe['idEquipe'] == $funcionario['idEquipe']): ?>
                                    <?php echo $funcionario['nomeFuncionario'] ?><br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </p>
                        <div class="d-flex justify-content-between">
                            <a class="" href="<?php echo base_url('equipes/edit/' . $equipe['idEquipe']); ?>">
                                <i class="bi bi-pencil-square" style="font-size: 2rem;color:black;"></i>
                            </a>
                            <a href="<?php echo base_url('equipes/delete/' . $equipe['idEquipe']) ?>" class=""
                                onclick="return confirma()">
                                <i class="bi bi-trash" style="font-size: 2rem; color:red;"></i>
                            </a>
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