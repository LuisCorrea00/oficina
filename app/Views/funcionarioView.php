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
            <h1>Funcionários</h1>
            <a href="<?php echo base_url('funcionarios/create'); ?>" class="btn btn-success ms-3">Novo Funcionário</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>Data de nascimento</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Equipe</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcionarios as $funcionario): ?>
                    <tr>
                        <td class="align-middle">
                            <?php echo $funcionario['nomeFuncionario']; ?>
                        </td>
                        <td class="align-middle">
                            <?php echo date('d/m/Y', strtotime($funcionario['dataNascimento'])); ?>
                        </td>
                        <td class="align-middle">
                            <?php echo $funcionario['telefone']; ?>
                        </td>
                        <td class="align-middle">
                            <?php echo $funcionario['cpf']; ?>
                        </td>
                        <td class="align-middle">
                            <?php foreach ($equipes as $equipe): ?>
                                <?php if ($funcionario['idEquipe'] == $equipe['idEquipe']): ?>
                                    <?php echo $equipe['nomeEquipe']; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td class="align-middle">
                            <a class=""
                                href="<?php echo base_url('funcionarios/edit/' . $funcionario['idFuncionario']); ?>">
                                <i class="bi bi-pencil-square" style="font-size: 1.5rem;color:black;"></i>
                            </a>
                            <a href="<?php echo base_url('funcionarios/delete/' . $funcionario['idFuncionario']) ?>"
                                class="" onclick="return confirma()">
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
        else {
            return true;
        }
    }
</script>