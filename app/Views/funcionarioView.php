<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Funcionários</title>
</head>

<body>
    <div class="container">
        <?php echo anchor(base_url('funcionarios/create'), 'Novo Funcionário', ['class'=> 'btn btn-success']); ?>
        <h1>Funcionários</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Data de nascimento</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcionarios as $funcionario): ?>
                    <tr>
                        <td>
                            <?php echo $funcionario['nome']; ?>
                        </td>
                        <td>
                            <?php echo $funcionario['sobrenome']; ?>
                        </td>
                        <td>
                            <?php echo $funcionario['dataNascimento']; ?>
                        </td>
                        <td>
                            <?php echo $funcionario['telefone']; ?>
                        </td>
                        <td>
                            <?php echo $funcionario['cpf']; ?>
                        </td>
                        <td>
                            <?php echo anchor(base_url('funcionarios/edit/' . $funcionario['idfuncionario']), 'Editar'); ?>
                            -
                            <?php echo anchor(base_url('funcionarios/delete/' . $funcionario['idfuncionario']), 'Deletar', ['onclick' => 'return confirma()']); ?>
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