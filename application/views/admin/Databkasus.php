<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-4 grid-margin">
            <div class="card">
            <div class="card-body">
                <p class="card-title">Tambah Data Basis Kasus</p>
                <div class="row">
                <div class="col-12">
                    <form class="forms-sample" action="" method="post">
                        <div class="form-group">
                            <label for="nama_penyakit">Nama Penyakit</label>
                            <select class="form-control" id="nama_penyakit" name="nama_penyakit">
                                <?php foreach($penyakit as $p): ?>
                                    <option value="<?php echo $p->kode_penyakit; ?>"> <?php echo $p->nama_penyakit; ?></option>
                                <?php endforeach ?>
                            </select>
                            <br>
                            <label for="nama_gejala">Nama Gejala</label>
                                <select class="form-control" id="nama_gejala" name="nama_gejala">
                                    <?php foreach($gejala as $g): ?>
                                        <option value="<?php echo $g->kode_gejala; ?>"> <?php echo $g->nama_gejala; ?></option>
                                    <?php endforeach ?> 
                                </select>
                            <br>
                            <label for="bobot_pakar">Bobot</label>
                            <input type="text" class="form-control" id="bobot_pakar" name="bobot_pakar" placeholder="Bobot Pakar">
                            
                        </div>
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
                    <h4 class="card-title">Data Basis Kasus</h4>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Kode Kasus Penyakit
                                </th>
                                <th>
                                    Nama Penyakit
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($bkasus as $bk) : ?>
                                <tr>
                                    <td><?= $bk["kode_penyakit"]; ?></td>
                                    <td><?= $bk["nama_penyakit"]; ?></td>
                                    <td>
                                        <a href="<?= base_url();?>Admin/DataDbkasus/<?= $bk['id_bkasus'];?>" title="Detail Basis Kasus" class="btn btn-inverse-primary btn-fw" style="padding-top: 7px; padding-bottom: 7px; padding-right: 17px;">Detail</a>
                                        <!-- <a href="<?= base_url();?>Admin/DataDbkasus/<?= $bk['id_bkasus'];?>" title="Hapus Basis Kasus" class="btn btn-inverse-danger btn-fw" style="padding-top: 7px; padding-bottom: 7px; padding-right: 17px;">Hapus</a> -->

                                        <a data-toggle="modal" data-target="#exampleModal-<?= $bk['id_bkasus']; ?>" class="btn btn-inverse-danger btn-fw" title="Hapus Basis Kasus" style="padding-top: 7px; padding-bottom: 7px; padding-right: 17px;">Hapus</a>
                                        <!-- Modal -->
                                            
                                        <div class="modal fade" id="exampleModal-<?= $bk['id_bkasus']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-primary" style="padding-right: 15px; padding-bottom: 10px; padding-top: 10px;"><a href="<?= base_url(); ?>Admin/hapus_bkasus/<?= $bk['id_bkasus']; ?>">Hapus</a></button>
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