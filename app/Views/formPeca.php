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
        <?php echo form_open('pecas/store') ?>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo isset($peca['nome']) ? $peca['nome'] : '' ?>"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao"
                value="<?php echo isset($peca['descricao']) ? $peca['descricao'] : '' ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" name="valor" value="<?php echo isset($peca['valor']) ? $peca['valor'] : '' ?>"
                class="form-control">
        </div>

        <input type="submit" value="Salvar" class="btn btn-primary">
        <input type="hidden" name="idpeca" value="<?php echo isset($peca['idpeca']) ? $peca['idpeca'] : '' ?>">

        <?php echo form_close() ?>
</body>

</html>