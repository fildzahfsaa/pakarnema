<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Gejala Baru</h4>
                    <form class="forms-sample" action="" method="post">
                        <div class="table-responsive" style="display: flex;">    
                            <!-- <input type="hidden" name="id_gejala" value="<?= $gejala['id_gejala']; ?>">     -->
                            <div class="form-group col-md-6">
                                <label for="kode_gejala">Kode Gejala</label>
                                <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" value="<?= $gejala['kode_gejala']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_gejala">Nama Gejala</label>
                                <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" value="<?= $gejala['nama_gejala']; ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>