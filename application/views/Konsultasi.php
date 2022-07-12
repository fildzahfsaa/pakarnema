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
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Konsultasi</h5>
                        <h1 class="text-white mb-4">Masukkan Nama Anda</h1>
                        <form method="POST" action="<?= base_url('Konsultasi/tambah_user/' . $get_no_user) ?>">
                            <input type="hidden" name="id_user" value="<?php echo $get_no_user; ?>">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                                        <label for="nama">Nama</label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Lanjut</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->