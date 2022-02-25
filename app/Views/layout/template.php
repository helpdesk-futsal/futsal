<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/img/logo.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/logo.png') ?>">
    <title><?= $title; ?></title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
    <?php if (!$isSidebarHidden):?>
        <?= $this->include('layout/' . $user['role'] . '/sidebar'); ?>
    <?php endif;?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?= $this->include('layout/' . $user['role'] . '/topbar'); ?>
            <div class="container-fluid">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Futsal 2022</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
</body>
</html>


