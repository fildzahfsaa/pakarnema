<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Detail Konsultasi</h4>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Gejala yang dialami
                                </th>
                                <th>
                                    Pilihan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($gejala as $g) :
                            ?>
                                <tr>
                                    <td class="align-middle"><?= $g['nama_gejala']; ?></td>
                                    <td class="align-middle"><?= $g['nama_kondisi']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <a href="../Datakonsultasi" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>