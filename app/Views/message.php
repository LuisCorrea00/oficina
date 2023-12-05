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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>PitStop</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card text-center" style="height: 70vh;">
            <div class="card-header fs-5">
                Sucesso!
                <i class="bi bi-check-all" style="font-size: 1.5rem; color: green;"></i>
            </div>
            <div class="card-body d-flex justify-content-center align-items-center flex-wrap">
                <h5 class="card-title display-5">
                    <?= $message ?>
                </h5>
                <a href="<?= base_url($url) ?>" class="btn btn-primary btn-block mt-5 w-75">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>