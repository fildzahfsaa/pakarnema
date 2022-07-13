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
                        <!-- <a href="About" class="nav-item nav-link">About</a>
                        <a href="Daftar" class="nav-item nav-link">Daftar Hama Penyakit</a> -->
                        <!-- <a href="Kontak" class="nav-item nav-link">Kontak</a> -->
                    </div>
                    <a href="Login" class="btn btn-primary py-2 px-4">Sign In</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Hasil Diagnosa</h1>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        <div class="col-xl-12 col-md-8 mb-2">
            <div class="card shadow mb-4 alert">
                <?php
                // Nilai Perhitungan Terbesar
                $max = max(array_column($final, 'hasil'));
                $key = array_search($max, array_column($final, 'hasil'));
                ?>
                <h5 class="mt-3" style="font-weight:lighter; font-size:17px; text-transform:uppercase">Hasil yang Didapat,
                    <span style="font-weight:bold" class="text-success ml-3"> Hama Penyakit <?= $final[$key]['nama_penyakit']; ?> </span>
                </h5>

                <h5 style="font-weight:lighter; font-size:17px; text-transform:uppercase">
                    Dengan Nilai Analisa Sebasar <span class="text-primary ml-3" style="font-weight:bold"><?= $final[$key]['hasil'] * 100; ?> %</span>
                </h5>
                <h5 style="font-weight:lighter; font-size:17px; text-transform:uppercase">
                <?php
                    $no = 1;
                    foreach ($hasil_penyakit as $penyakit) :
                    if ($no == 1) :
                ?>
                    Tingkat akurasi hingga <span class="text-primary ml-3" style="font-weight:bold"><?= number_format($penyakit['nilai_perhitungan'] * 100, 2) . ' %'; ?></span>
                <?php
                    $no++;
                    endif;
                endforeach;
                ?>
                </h5>
            </div>
        </div>

        <div class="col-xl-12 col-md-8 mb-2">
            <div class="card shadow mb-4 alert">
                <?php
                // Nilai Perhitungan Terbesar
                $max = max(array_column($final, 'hasil'));
                $key = array_search($max, array_column($final, 'hasil'));
                ?>
                <h5 class="mt-3" style="font-weight:lighter; font-size:17px; text-transform:uppercase">Cara Penanganan : <br><br>
                    <span style="font-weight:bold" class="text-success ml-3"> <?= $final[$key]['penanganan']; ?> </span>
                </h5>
            </div>
        </div>

        <div class="row">
        <div class="col-xl-8 col-md-8 mb-2">
            <input id="show-btn" title="Lihat Hasil Perhitungan" type="button" value="Hasil Perhitungan" class="btn btn-outline-primary" onclick="lihathasil()">

            <input id="hide-btn" title="Tutup Hasil Perhitungan" type="button" value="Tutup Perhitungan" class="btn btn-outline-primary" onclick="tutuphasil()">
        </div>


        <!-- Tabel Hasil Perhitungan Similarity -->
        <div class="col-xl-12 col-md-8 mb-2">
            <div id="hasil-konsul" class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan Similarity Value</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kasus</th>
                                    <th scope="col">Jumlah Gejala Sama</th>
                                    <th scope="col">Jumlah Gejala Kasus</th>
                                    <th scope="col">Jumlah Gejala Dipilih</th>
                                    <th scope="col">Bobot Gejala Sama</th>
                                    <th scope="col">Bobot Gejala Kasus</th>
                                    <th scope="col">Hasil</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $no = 1;
                                // Tampilkan ke tabel
                                foreach ($final as $row) { ?>
                                    <tr>
                                        <strong>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_penyakit'] ?></td>
                                            <td><?= $row['jml_cocok']; ?></td>
                                            <td><?= $row['jml_gejala']; ?></td>
                                            <td><?= $row['jml_dipilih']; ?></td>
                                            <td><?= $row['bobot_sama']; ?></td>
                                            <td><?= $row['total_bobot']; ?></td>
                                            <td><?= $row['hasil']; ?></td>
                                        </strong>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

        <!-- About Start -->
        
        <!-- About End -->