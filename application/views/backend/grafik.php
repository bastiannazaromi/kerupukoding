<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">

        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0"><?= $title; ?></h6>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--5">
  <div class="row">

    <div class="grafik col-md-12">
      <div class="card">
        <div class="card-header">

        </div>
        <div id="grafik" style="width:100%; height:480px;"></div>
      </div>
    </div>

  </div>
</div>

<script>
  var chart;
  var total = 0;

  function tampil() {
    $.ajax({
      url: "<?php echo base_url('Dashboard/get_realtime'); ?>",
      dataType: 'json',
      success: function(result) {
        if (result.length > total) {
          total = result.length;
          var i;
          var cahaya = [];
          var waktu = [];

          for (i = 0; i < result.length; i++) {
            cahaya[i] = Number(result[i].cahaya);
            waktu[i] = result[i].waktu;
            chart.series[0].setData(cahaya);
            chart.xAxis[0].setCategories(waktu);
          }
        } else if (result.length <= total) {
          var i;
          var cahaya = [];
          var waktu = [];

          for (i = 0; i < result.length; i++) {
            cahaya[i] = Number(result[i].cahaya);
            waktu[i] = result[i].waktu;
            chart.series[0].setData(cahaya);
            chart.xAxis[0].setCategories(waktu);
          }

        }

        setTimeout(tampil, 2000);
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function() {

    chart = Highcharts.chart('grafik', {
      chart: {
        type: 'line',
        events: {
          load: tampil
        }
      },
      title: {
        text: 'Grafik Intensitas Cahaya New'
      },

      yAxis: {
        title: {
          text: 'Nilai'
        }
      },

      xAxis: {

      },

      series: [{
        name: "Intensitas Cahaya"
      }]
    });
  });
</script>