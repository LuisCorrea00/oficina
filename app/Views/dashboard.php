<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4iEAoynu7srO8YmBUPicbfF146t0GpjEW1A&usqp=CAU"
        type="image/x-icon">
    <title>PitStop</title>
</head>

<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?>
    <div class="container mt-5">

        <div class="row">

            <div class="dashboardItems col-4 pb-5">
                <a href="<?php echo base_url('funcionarios/'); ?>" id="item1"
                    class="btn text-white fs-5 w-100 h-100 d-flex align-items-center justify-content-center">Funcionários</a>
            </div>

            <div class="dashboardItems col-4 pb-5">
                <a href="<?php echo base_url('pecas/'); ?>" id="item2"
                    class="btn text-white fs-5 w-100 h-100 d-flex align-items-center justify-content-center">Peças</a>
            </div>

            <div class="dashboardItems col-4 pb-5">
                <a href="<?php echo base_url('clientes/'); ?>" id="item3"
                    class="btn text-white fs-5 w-100 h-100 d-flex align-items-center justify-content-center">Clientes</a>
            </div>

            <div class="dashboardItems col-4 pb-5">
                <a href="<?php echo base_url('servicos/'); ?>" id="item4"
                    class="btn text-white fs-5 w-100 h-100 d-flex align-items-center justify-content-center">Serviços</a>
            </div>

            <div class="dashboardItems col-4 pb-5">
                <a href="<?php echo base_url('equipes/'); ?>" id="item5"
                    class="btn text-white fs-5 w-100 h-100 d-flex align-items-center justify-content-center">Equipes</a>
            </div>

            <div class="dashboardItems col-4 pb-5">
                <a href="<?php echo base_url('ordemServico/'); ?>" id="item6"
                    class="btn text-white fs-5 w-100 h-100 d-flex align-items-center justify-content-center">Ordem de
                    Serviço</a>
            </div>


        </div>

    </div>
</body>

</html>
<style>
    .dashboardItems {
        height: 30vh;
        transition: transform 0.3s;
    }

    .dashboardItems:hover {
        transform: scale(1.1);
    }

    #item1 {
        background-color: #5246A6;
    }

    #item2 {
        background-color: #D12F2F;
    }

    #item3 {
        background-color: #0D0D0D;
    }

    #item4 {
        background-color: #2F732D;
    }

    #item5 {
        background-color: #731D34;
    }

    #item6 {
        background-color: #D9831A;
    }
</style>