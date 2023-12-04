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
    <header class="header d-flex align-items-center justify-content-center h-100 ">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4iEAoynu7srO8YmBUPicbfF146t0GpjEW1A&usqp=CAU"
            alt="Logo">
    </header>
    <div class="container mt-5">
        <h1>Faça seu login</h1>
        <?php echo form_open('login/store') ?>

        <div class="form-group pt-3">
            <label for="username">Usuário</label>
            <input type="text" name="username" class="form-control">
            <span class="text-danger">
                <?php echo session()->getFlashdata('erros')['username'] ?? '' ?>
            </span>
        </div>

        <div class="form-group pt-3">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control">
            <span class="text-danger">
                <?php echo session()->getFlashdata('erros')['senha'] ?? '' ?>
            </span>
        </div>

        <input type="submit" value="Entrar" class="btn btn-success w-100 mt-3">

    </div>
</body>

</html>
<style>
    .header {
        background-color: #000;
    }

    .header img {
        width: 15vw;
    }
</style>