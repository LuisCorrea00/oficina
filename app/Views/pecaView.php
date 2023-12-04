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
    <div class="container mt-4">
        <div class="d-flex align-items-center mb-2">
            <h1>Peças</h1>
            <a href="<?php echo base_url('pecas/create'); ?>" class="btn btn-success ms-3">Nova Peça</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor (R$)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pecas as $peca): ?>
                    <tr>
                        <td class="align-middle">
                            <?php echo $peca['nomePeca'] ?>
                        </td>
                        <td class="align-middle">
                            <?php echo $peca['descricao'] ?>
                        </td>
                        <td class="align-middle">
                            <?php echo $peca['valorPeca'] ?>
                        </td>
                        <td class="align-middle">
                            <a class="" href="<?php echo base_url('pecas/edit/' . $peca['idPeca']); ?>">
                                <i class="bi bi-pencil-square" style="font-size: 1.5rem;color:black;"></i>
                            </a>
                            <a href="<?php echo base_url('pecas/delete/' . $peca['idPeca']) ?>" class=""
                                onclick="return confirma()">
                                <i class="bi bi-trash" style="font-size: 1.5rem; color:red;"></i>
                            </a>
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