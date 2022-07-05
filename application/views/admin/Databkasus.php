<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
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
                                        <a href="<?= base_url();?>Admin/DataDbkasus/<?= $bk['kode_penyakit'];?>" title="Detail Basis Kasus" class="btn btn-inverse-primary btn-fw" style="padding-top: 7px; padding-bottom: 7px; padding-right: 17px;">Detail</a>
                                       
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