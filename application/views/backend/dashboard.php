<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0"><?= $title; ?></h6>
        </div>
      </div>

      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Intensitas Cahaya</h5>
                  <span class="h2 font-weight-bold mb-0" id="cahaya"></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                    <i class="fas fa-sun"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                <a href="<?= base_url('Dashboard/rekap'); ?>"><span class="text-nowrap">Detail Data</span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Curah hujan</h5>
                  <span class="h2 font-weight-bold mb-0" id="hujan"></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                    <i class="fas fa-cloud-rain"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                <a href="<?= base_url('Dashboard/rekap'); ?>"><span class="text-nowrap">Detail Data</span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Keterangan</h5>
                  <span class="h2 font-weight-bold mb-0" id="keterangan"></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="fas fa-hotdog"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                <span class="text-nowrap"></span>
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function tampil() {
    $.ajax({
      url: "<?= base_url('Dashboard/dashboard_realtime') ?>",
      dataType: 'json',
      success: function(result) {

        $('#cahaya').text(result[0]["cahaya"]);

        $('#hujan').text(result[0]["hujan"]);

        if(result[0]["cahaya"] <= 50 || result[0]["hujan"] >= 40)
        {
        	$('#keterangan').text("Atap Menutup");
        }
        else
        {
        	$('#keterangan').text("Atap Membuka");	
        }

        setTimeout(tampil, 2000);
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    tampil();
  });
</script>