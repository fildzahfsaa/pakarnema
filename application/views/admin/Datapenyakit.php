<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Penyakit Baru</h4>
                    <form class="forms-sample" action="<?= base_url('Admin/tambah_penyakit') ?>" method="post">
                        <div class="table-responsive" style="display: flex;">       
                            <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?= $admin['id_admin']; ?>"> 
                            <div class="form-group col-md-6">
                                <label for="kode_penyakit">Kode Penyakit</label>
                                <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" placeholder="Kode Penyakit">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_penyakit">Nama Penyakit</label>
                                <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                                <label for="penanganan">Penanganan</label>
                                <textarea class="form-control" id="penanganan" name="penanganan" placeholder="Penanganan" style="height: 87px;"></textarea>
                            </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Penyakit</h4>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Kode Penyakit
                                </th>
                                <th>
                                    Nama Penyakit
                                </th>
                                <th>
                                    Penanganan
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($penyakit as $pt) : ?>
                                <tr>
                                    <td><?= $pt["kode_penyakit"]; ?></td>
                                    <td><?= $pt["nama_penyakit"]; ?></td>
                                    <td><?= $pt["penanganan"]; ?></td>
                                    <td>
                                      <a href="<?= base_url(); ?>Admin/edit_penyakit/<?= $pt['kode_penyakit']; ?>" class="btn btn-inverse-info btn-icon" title="Edit Data Penyakit"><br><i class="ti-pencil" aria-hidden="true"></i></a>
                                      <!-- Button trigger modal -->


                                      <a data-toggle="modal" data-target="#exampleModal-<?= $pt['kode_penyakit']; ?>" title="Hapus Data Penyakit" class="btn btn-inverse-danger btn-icon"><br><i class="ti-trash" aria-hidden="true"> </i></a>

                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModal-<?= $pt['kode_penyakit']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                      <button type="button" class="btn btn-inverse-danger btn-fw" style="padding-right: 15px; padding-bottom: 10px; padding-top: 10px;"><a href="<?= base_url(); ?>Admin/hapus_penyakit/<?= $pt['kode_penyakit']; ?>">Hapus</a></button>
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
    