<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4iEAoynu7srO8YmBUPicbfF146t0GpjEW1A&usqp=CAU"
        type="image/x-icon">
    <title>PitStop</title>
</head>

<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?>
    <div class="container mt-5">
        <?php echo form_open('ordemServico/concluirStore') ?>
        <h2 class="mb-3">
            Cliente:
            <?php echo $ordemServico['nomeCliente'] ?>
        </h2>
        <h4 class="mb-1">
            Placa do veículo:
            <?php echo $ordemServico['placa'] ?>
        </h4>
        <span class="text-danger">
            <?php echo session()->getFlashdata('erros') ?? '' ?>
        </span>
        <div class="pecasContainer">
            <span type="button" class="morePeca me-3 my-3">
                <i class="bi bi-plus-circle" style="font-size: 1.5rem;color:black;"></i>
            </span>
            <span type="button" class="lessPeca my-3">
                <i class="bi bi-dash-circle" style="font-size: 1.5rem;color:red;"></i>
            </span>
            <div class="row peca mb-2">
                <div class="form-group col-8">
                    <label for="peca">Peças</label>
                    <select name="idPeca[]" class="form-control">
                        <option value="" selected></option>
                        <?php foreach ($pecas as $peca): ?>
                            <option value="<?php echo $peca['idPeca']; ?>">
                                <?php echo $peca['nomePeca']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidadePeca[]" class="form-control">
                </div>
            </div>
        </div>

        <div class="servicosContainer">
            <span type="button" class="moreServico me-3 my-3">
                <i class="bi bi-plus-circle" style="font-size: 1.5rem;color:black;"></i>
            </span>
            <span type="button" class="lessServico my-3">
                <i class="bi bi-dash-circle" style="font-size: 1.5rem;color:red;"></i>
            </span>
            <div class="row servico mb-2">
                <div class="form-group col-8">
                    <label for="servico">Serviços</label>
                    <select name="idServico[]" class="form-control">
                        <option value="" selected></option>
                        <?php foreach ($servicos as $servico): ?>
                            <option value="<?php echo $servico['idServico']; ?>">
                                <?php echo $servico['nomeServico']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidadeServico[]" class="form-control">
                </div>
            </div>
        </div>

        <input type="submit" value="Concluir" class="btn btn-success w-100 my-3">
        <input type="hidden" name="idOrdem_servico" value="<?php echo $ordemServico['idOrdem_servico'] ?>">

        <?php echo form_close() ?>
    </div>
</body>

</html>
<script>
    const morePeca = document.querySelector('.morePeca');
    const lessPeca = document.querySelector('.lessPeca');
    const pecasContainer = document.querySelector('.pecasContainer');
    const moreServico = document.querySelector('.moreServico');
    const lessServico = document.querySelector('.lessServico');
    const servicosContainer = document.querySelector('.servicosContainer');

    morePeca.addEventListener('click', function () {
        const originalDiv = document.querySelector('.peca');
        const clonedDiv = originalDiv.cloneNode(true);
        clonedDiv.querySelector('select[name="idPeca[]"]').value = '';
        clonedDiv.querySelector('input[name="quantidadePeca[]"]').value = '';
        pecasContainer.appendChild(clonedDiv);
    });

    lessPeca.addEventListener('click', function () {
        const divs = document.querySelectorAll('.peca');
        if (divs.length > 1) {
            divs[divs.length - 1].remove();
        }
    });

    moreServico.addEventListener('click', function () {
        const originalDiv = document.querySelector('.servico');
        const clonedDiv = originalDiv.cloneNode(true);
        clonedDiv.querySelector('select[name="idServico[]"]').value = '';
        clonedDiv.querySelector('input[name="quantidadeServico[]"]').value = '';
        servicosContainer.appendChild(clonedDiv);
    });

    lessServico.addEventListener('click', function () {
        const divs = document.querySelectorAll('.servico');
        if (divs.length > 1) {
            divs[divs.length - 1].remove();
        }
    });
</script>