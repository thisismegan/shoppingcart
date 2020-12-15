<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title><?= isset($title) ? $title : 'CISHOP'; ?>| E-Commerce</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/app.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/fontawesome/css/all.min.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

    <!-- Custom styles for this template -->
</head>

<body>
    <!-- navbar -->
    <?php $this->view('layouts/_navbar'); ?>
    <!-- endnavbar -->

    <!-- content -->

    <?php $this->load->view($page); ?>

    <!-- endcontent -->
    <script src="<?= base_url(); ?>assets/libs/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/app.js"></script>
</body>

</html>