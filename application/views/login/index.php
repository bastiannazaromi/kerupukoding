<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= $title ; ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url() ; ?>assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url() ; ?>assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ; ?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url() ; ?>assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary pb-5">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5 mt-3">
              <h1 class="text-white">Kerupuk Coding</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>

    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Halaman Login</small>
              </div>
              <form role="form" method="post" action="" onsubmit="ajax_login(); return false">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" id="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" id="password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?= base_url() ; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ; ?>assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url() ; ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url() ; ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?= base_url() ; ?>assets/js/argon.js?v=1.2.0"></script>

  <script src="<?= base_url() ; ?>assets/js/sweetalert2.js"></script>
  <script src="<?= base_url() ; ?>assets/js/script.js"></script>
</body>

</html>

<script>

  function ajax_login(){
    let email = $("#email").val();
    let password = $("#password").val();
    $.ajax({
        url: "<?= base_url('Login/login') ; ?>",
        type: "POST",
        data: {
          email: email,
          password: password
        },
        success:function(result){
            if (result == 'Valid')
            {
              
              Swal.fire({
                title: 'Success',
                text: 'Login Sukses',
                icon: 'success'
              }).then((result) => {
                if (result.value) {
                  setTimeout(function ()
                  {
                    document.location.href = "<?= base_url('Dashboard') ; ?>";
                  }, 500)
                }
              });
            }
            else
            {
              Swal.fire({
                title: 'Sorry !!',
                text: result,
                icon: 'warning'
              });

              $('#email').val("");
              $('#password').val("");
            }
        }
    });
  }
  
</script>