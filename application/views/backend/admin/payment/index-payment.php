<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Beranda</li>
  </ol>
</nav>
<?= $this->session->flashdata('admin_message'); ?>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Pembayaran</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Paket</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>


                <tbody>
                  <?php foreach ($payment as $row) : ?>

                    <!-- SET PACKAGE NAME -->
                    <?php
                    if ($row['package'] == 4) {
                      $packages = "KOMPLIT";
                    } elseif ($row['package'] == 3) {
                      $packages = "TAHUNAN";
                    } elseif ($row['package'] == 2) {
                      $packages = "BULANAN";
                    } elseif ($row['package'] == 1) {
                      $packages = "MINGGUAN";
                    }

                    // SET STATUS
                    if ($row['role_payment'] == 1) {
                      $status = "PENDING";
                    } elseif ($row['role_payment'] == 2) {
                      $status = "BERHASIL";
                    } elseif ($row['role_payment'] == 3) {
                      $status = "DITOLAK";
                    } elseif ($row['role_payment'] == 4) {
                      $status = "PENDING COD";
                    } elseif ($row['role_payment'] == 5) {
                      $status = "COD BERHASIL";
                    } elseif ($row['role_payment'] == 6) {
                      $status = "COD DITOLAK";
                    }

                    ?>
                    <tr>
                      <td><?= $row['name'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $packages ?></td>
                      <td><?= date('Y-m-d', $row['payment_date']) ?></td>
                      <td><?= $status ?></td>
                      <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#up<?= $row['id_payment'] ?>">
                          <i class="fa fa-ellipsis-v"></i>
                        </button>
                      </td>

                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php foreach ($payment as $row) : ?>
  <?php
  if ($row['package'] == 4) {
    $packages = "KOMPLIT";
  } elseif ($row['package'] == 3) {
    $packages = "TAHUNAN";
  } elseif ($row['package'] == 2) {
    $packages = "BULANAN";
  } elseif ($row['package'] == 1) {
    $packages = "MINGGUAN";
  }

  // SET STATUS
  if ($row['role_payment'] == 1) {
    $status = "PENDING";
  } elseif ($row['role_payment'] == 2) {
    $status = "BERHASIL";
  } elseif ($row['role_payment'] == 3) {
    $status = "DITOLAK";
  } elseif ($row['role_payment'] == 4) {
    $status = "PENDING COD";
  } elseif ($row['role_payment'] == 5) {
    $status = "COD BERHASIL";
  } elseif ($row['role_payment'] == 6) {
    $status = "COD DITOLAK";
  }


  ?>
  <!-- Start Modal -->
  <div class="modal fade" id="up<?= $row['id_payment'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Status Pembayaran <?= $row['name'] ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12 ">
            <div class="row d-flex flex-column">
              <div class="col-md-5 ">
                <h6>Nama : <?= $row['name'] ?></h6>
              </div>
              <div class="col-md-5 ">
                <h6>Email : <?= $row['email'] ?></h6>
              </div>
              <div class="col-md-5 ">
                <h6>No Tlp : <?= $row['phone'] ?></h6>
              </div>
              <div class="col-md-5 ">
                <h6>Tanggal Pembelian : <?= date('Y-m-d', $row['payment_date']) ?></h6>
              </div>
              <div class="col-md-5 ">
                <h6>Paket Pembelian : <?= $packages ?></h6>
              </div>
              <div class="col-md-5 ">
                <h6>Status : <?= $status ?></h6>
              </div>
              <div class="col-md-5 ">
                <img src="<?= base_url('assets/images/proof_of_payment/' . $row['proof_of_payment']) ?>" width="100%" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <?php if ($row['role_payment'] == 1) : ?>
            <a href="<?= base_url('admin/Prosess_Data/cancel/' . $row['id_payment']) ?>" class="btn btn-danger">
              BATALKAN
            </a>
            <a href="<?= base_url('admin/Prosess_Data/done/' . $row['id_payment']) ?>" class="btn btn-success">
              KONFIRMASI
            </a>
          <?php elseif ($row['role_payment'] == 4) : ?>
            <a href="<?= base_url('admin/Prosess_Data/cancelCod/') . $row['id_payment'] ?>" class="btn btn-danger">
              BATALKAN
            </a>
            <a href="<?= base_url('admin/Prosess_Data/doneCod/') . $row['id_payment'] ?>" class="btn btn-success">
              KONFIRMASI
            </a>
          <?php else : ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->
<?php endforeach ?>