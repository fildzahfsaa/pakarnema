<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Gresik, Jawa Timur</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 812-4985-4487</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>fildfild12@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/fildzahfsaa/"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/fildzah-festy/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Sistem Pakar Aglaonema</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							By <a class="border-bottom">Fildzahfsaa</a><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        


        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/wow/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/counterup/counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <script type="text/javascript">
    $('#basis-kasus').hide();
    $('#gejala-dipilih').hide();
    $('#hasil-konsul').hide();
    $('#hide-btn').hide();

    const url = window.location.href.split('/').slice(0, 4).join('/');
    const pathname = window.location.pathname.split('/')[2];
    const link = url + '/' + pathname;

    $('.navbar-nav').find('a').each(function() {
        const href = $(this).attr('href');
        if (link == href || document.location.href == href) {
            $(this).parents().addClass("active");
            $(this).addClass("active");
            // add class as you need ul or li or a 
        }
    });

    function lihathasil() {
        $('#basis-kasus').show();
        $('#gejala-dipilih').show();
        $('#hasil-konsul').show();
        $('#show-btn').hide();
        $('#hide-btn').show();
    }

    function tutuphasil() {
        $('#basis-kasus').hide();
        $('#gejala-dipilih').hide();
        $('#hasil-konsul').hide();
        $('#show-btn').show();
        $('#hide-btn').hide();
    }
</script>
</body>

</html>