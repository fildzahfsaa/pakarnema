

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="./" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-leaf"></i> Pakarnema</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="./" class="nav-item nav-link">Home</a>
                        <a href="About" class="nav-item nav-link">About</a>
                        <a href="Daftar" class="nav-item nav-link">Daftar Hama Penyakit</a>
                        <!-- <a href="Kontak" class="nav-item nav-link">Kontak</a> -->
                    </div>
                    <a href="Login" class="btn btn-primary py-2 px-4">Sign In</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Mulai Diagnosa</h1>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                <h1 class="mb-5" style="margin-bottom: 2rem !important;">Mulai Konsultasi</h1>
                <form method="POST" action="<?php echo base_url('Konsultasi/proses_cbr'); ?>">
                    <div class="col-md-12 col-md-offset-2"> 
                        <div class="col-md-12">
                            <label for="nama">Isikan Nama Anda</label>
                            <div class="form">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                            </div>
                        </div>
                        &nbsp
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    Gejala
                                </th>
                                <th>
                                    Pilih Kondisi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = "1";
                                foreach ($data_gejala as $data) {
                            ?>
                            <tr>
                                <td><input type="checkbox" id="gejala[]" name="gejala[]" value="<?php echo $data['kode_gejala'] ?>"><?php echo $data['nama_gejala'] ?></td>
                                <td><select name="kondisi[]" id="">
                                    <option value="0">Pilih Kondisi</option>
                                    <?php foreach ($kondisi as $row_kondisi) : ?>
                                        <option value="<?= $data['kode_gejala'] . '_' . $row_kondisi['id_kondisi']; ?>"><?= $row_kondisi['nama_kondisi']; ?></option>
                                    <?php endforeach; ?>
                                </select></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 mb-5">
                            <button type="submit" class="btn btn-primary btn-md float-right">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- About End -->

        