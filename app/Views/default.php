<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Zoho x Callbox</title>

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">

    <!-- font awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/brands.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/solid.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/duotone.css') ?>">

    <!-- js -->
    <script src="<?= base_url('assets/bootstrap/css/bootstrap.bundle.js') ?>" defer></script>
</head>

<body>
    <div class="container-fluid">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>