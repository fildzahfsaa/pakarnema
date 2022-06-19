
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo base_url(); ?>assetsU/images/logo.png" alt="logo">
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="<?php echo site_url() ?>Login/proses_login" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="uname" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="pwd" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</a>
                </div>
                <br>
                <div class="mb-2">
                  <a type="button" class="btn btn-block btn-facebook auth-form-btn" href="Beranda">
                    Kembali
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->