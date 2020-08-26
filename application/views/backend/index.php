<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= $title; ?></title>
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/argon.css?v=1.2.') ?>0" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <h2 CLass="text-blue mt-5">KERUPUK CODING</h2>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Dashboard'); ?>">
                <i class="fas fa-house-damage mr-4"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Dashboard/rekap'); ?>">
                <i class="fas fa-book mr-4"></i>
                <span class="nav-link-text">Rekap</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Dashboard/grafik'); ?>">
                <i class="fas fa-chart-line mr-4"></i>
                <span class="nav-link-text">Grafik</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?= base_url('assets/uploads/' . $this->session->userdata('foto') . ''); ?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $this->session->userdata('nama');; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="<?= base_url('Dashboard/profile'); ?>" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Profile</span>
                </a>
                <a href="<?= base_url('Login/logout'); ?>" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Logout" untuk keluar dari halaman</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url('Login/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>

    <!-- Header -->
    <!-- Header -->
    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-sukses'); ?>"></div>
    <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>

    <?php $this->load->view($page); ?>

    <!-- Argon Scripts -->
    <!-- Core -->

    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="<?php echo base_url(); ?>assets/js/argon.js?v=1.2.0"></script>

    <script src="<?php echo base_url(); ?>assets/vendor/@fortawesome/fontawesome-free/js/all.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/highchart/highcharts.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/highchart/exporting.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/highchart/highcharts-3d.js') ?>"></script>

    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>
</body>

</html>