<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Message</title>
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-info">
            <?php echo $message; ?>
            <p><?php echo anchor (base_url(), 'Página Inicial') ?></p>
        </div>
    </div>
</body>

</html>