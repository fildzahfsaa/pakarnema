<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Gejala Baru</h4>
                    <form class="forms-sample" action="<?= base_url('Admin/tambah_gejala') ?>" method="post">
                        <div class="table-responsive" style="display: flex;">        
                            <div class="form-group col-md-6">
                                <label for="kode_gejala">Kode Gejala</label>
                                <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" placeholder="Kode Gejala">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_gejala">Nama Gejala</label>
                                <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" placeholder="Nama Gejala">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Gejala</h4>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Kode Gejala
                                </th>
                                <th>
                                    Nama Gejala
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($gejala as $ga) : ?>
                                <tr>
                                    <td><?= $ga["kode_gejala"]; ?></td>
                                    <td><?= $ga["nama_gejala"]; ?></td>
                                    <td>
                                      <a href="<?= base_url(); ?>Admin/edit_gejala/<?= $ga['kode_gejala']; ?>" class="btn btn-inverse-info btn-icon" title="Edit Data Gejala"><br><i class="ti-pencil" aria-hidden="true"></i></a>
                                      <!-- Button trigger modal -->


                                      <a data-toggle="modal" data-target="#exampleModal-<?= $ga['kode_gejala']; ?>" title="Hapus Data Gejala" class="btn btn-inverse-danger btn-icon"><br><i class="ti-trash" aria-hidden="true"> </i></a>

                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModal-<?= $ga['kode_gejala']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                      <button type="button" class="btn btn-inverse-danger btn-fw" style="padding-right: 15px; padding-bottom: 10px; padding-top: 10px;"><a href="<?= base_url(); ?>Admin/hapus_gejala/<?= $ga['kode_gejala']; ?>">Hapus</a></button>
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