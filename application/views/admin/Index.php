<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome Admin</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card tale-bg">
        <div class="card-people mt-auto">
          <img src="<?php echo base_url(); ?>assetsU/images/dashboard/people.svg" alt="people">
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-4">Total Data Gejala</p>
              <p class="fs-30 mb-2"><?= $total_gejala; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Total Data Penyakit</p>
              <p class="fs-30 mb-2"><?= $total_penyakit; ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Total Data Konsultasi</p>
              <p class="fs-30 mb-2"><?= $total_konsultasi; ?></p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Tambah Akun Baru</p>
          <div class="row">
            <div class="col-12">
              <form class="forms-sample" action="<?= base_url('Admin/tambah_pakar') ?>" method="post">
                  <div class="form-group">
                      <label for="nama_user">Nama</label>
                      <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Nama ">
                  </div>
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                  </div>      
                  <!-- <div class="form-group">
                      <input type="hidden" class="form-control" id="level" name="level" value="Pakar">
                  </div>     -->
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <p class="card-title">Daftar Akun Terdaftar</p>
              <div class="table-responsive">
                <table id="example" class="table table-striped">
                  <thead>
                      <tr>
                      <th>
                        Nama Pakar
                      </th>
                      <th>
                        Username
                      </th>
                      <th>
                        Aksi
                      </th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($pakar as $p) : ?>
                      <tr>
                        <td><?= $p["nama_admin"]; ?></td>
                        <td><?= $p["username"]; ?></td>
                        <td>
                          <a href="<?= base_url(); ?>Admin/edit_pakar/<?= $p['id_admin']; ?>" class="btn btn-inverse-info btn-icon" title="Edit Data Akun"><br><i class="ti-pencil" aria-hidden="true"></i></a>
                          <!-- Button trigger modal -->


                          <a data-toggle="modal" data-target="#exampleModal-<?= $p['id_admin']; ?>" title="Hapus Akun" class="btn btn-inverse-danger btn-icon"><br><i class="ti-trash" aria-hidden="true"> </i></a>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal-<?= $p['id_admin']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          Yakin mau Hapus Data ?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-inverse-secondary btn-fw" data-dismiss="modal" style="padding-right: 15px; padding-bottom: 10px; padding-top: 10px;">Batal</button>
                                          <button type="button" class="btn btn-inverse-danger btn-fw" style="padding-right: 15px; padding-bottom: 10px; padding-top: 10px;"><a href="<?= base_url(); ?>Admin/hapus_pakar/<?= $p['id_admin']; ?>">Hapus</a></button>
                                      </div>
                                  </div>
                              </div>
                          </div>
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
    </div>
  </div>

<!-- content-wrapper ends -->