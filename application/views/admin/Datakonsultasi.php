<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Konsultasi</h4>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Nama Penyakit
                                </th>
                                <th>
                                    Kemiripan
                                </th>
                                <th>
                                    Kepastian
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($konsultasi as $k) : ?>
                                <tr>
                                    <td><?= $k["nama"]; ?></td>
                                    <td><?= $k["nama_penyakit"]; ?></td>
                                    <td><?= $k["kemiripan"]; ?></td>
                                    <td><?= $k["kepastian"]; ?></td>
                                    <td>
                                    <a href="<?= base_url();?>Admin/DataDkonsultasi/<?= $k['id_konsultasi'];?>" title="Detail Konsultasi" class="btn btn-inverse-primary btn-fw" style="padding-top: 7px; padding-bottom: 7px; padding-right: 17px;">Detail</a>
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