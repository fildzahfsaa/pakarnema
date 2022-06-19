<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Penyakit Baru</h4>
                    <form class="forms-sample" action="" method="post">
                        <div class="table-responsive" style="display: flex;">     
                            <!-- <input type="hidden" name="id_penyakit" value="<?= $penyakit['id_penyakit']; ?>">    -->
                            <div class="form-group col-md-6">
                                <label for="kode_penyakit">Kode Penyakit</label>
                                <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" value="<?= $penyakit['kode_penyakit']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_penyakit">Nama Penyakit</label>
                                <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" value="<?= $penyakit['nama_penyakit']; ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                                <label for="penanganan">Penanganan</label>
                                <textarea class="form-control" id="penanganan" name="penanganan" style="height: 87px;"><?= $penyakit['penanganan']; ?></textarea>
                            </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        </div>