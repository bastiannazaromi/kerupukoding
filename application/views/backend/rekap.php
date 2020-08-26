<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
      
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0"><?= $title ; ?></h6>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="table-responsive">
            <table id="example" class="table table-bordered align-items-center" width="100%" cellspacing="0">
                <thead>
                    <tr class="table table-info">
                        <th>#</th>
                        <th>Waktu</th>
                        <th>Intensitas Cahaya</th>
                        <th>Curah Hujan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                    foreach ($rekap as $hasil) : ?>
                        <tr>
                            <th><?= $i++ ?></th>
                            <td><?= date('d F Y - H:i:s', strtotime($hasil['waktu'])) ; ?></td>
                            <td><?= $hasil['cahaya'] ; ?></td>
                            <td><?= $hasil['hujan'] ; ?></td>
                            <td>
                                <a href="<?= base_url() ?>Dashboard/hapusRekap/<?= $hasil['id']; ?>" class="badge badge-danger delete-people tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>