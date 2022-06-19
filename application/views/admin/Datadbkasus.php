<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Gejala</h4>
                    <form class="forms-sample" action="" method="post">
                        <div class="form-group col-md-6">
                            <?php foreach ($detail_bkasus as $bk) : ?>
                                <input type="hidden" class="form-control" id="id_bkasus" name="id_bkasus" value="<?= $bk['id_bkasus']; ?>">
                            <?php endforeach ?>
                        </div>
                        <div class="table-responsive" style="display: flex;"> 
                            <div class="form-group col-md-6">
                                <label for="nama_gejala">Nama Gejala</label>
                                <select class="form-control" id="nama_gejala" name="nama_gejala">
                                <?php foreach($gejala as $g): ?>
                                    <option value="<?php echo $g->kode_gejala; ?>"> <?php echo $g->nama_gejala; ?></option>
                                <?php endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bobot_pakar">Bobot</label>
                                <input type="text" class="form-control" id="bobot_pakar" name="bobot_pakar" placeholder="Bobot Pakar">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="../Databkasus" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Basis Kasus</h4>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Nama Gejala
                                </th>
                                <th>
                                    Bobot Pakar
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($detail_bkasus as $dbk) : ?>
                                <tr>
                                    <td><?= $dbk["nama_gejala"]; ?></td>
                                    <td><?= $dbk["bobot_pakar"]; ?></td>
                                    <td>
                                            <a data-toggle="modal" data-target="#exampleModal-<?= $dbk['id_dbkasus']; ?>" class="btn btn-inverse-danger btn-icon"><br><i class="ti-trash" aria-hidden="true"> </i></a>
                                            
                                            <!-- Modal -->
                                            
                                            <div class="modal fade" id="exampleModal-<?= $dbk['id_dbkasus']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding-right: 15px; padding-bottom: 10px; padding-top: 10px;">Batal</button>
                                                            <button type="button" class="btn btn-primary" style="padding-right: 15px; padding-bottom: 10px; padding-top: 10px;"><a href="<?= base_url(); ?>Admin/hapus_dbkasus/<?= $dbk['id_dbkasus']; ?>">Hapus</a></button>
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