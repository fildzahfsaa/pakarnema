<!-- partial:partials/_footer.html -->
<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">By Fildzahfsaa<i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<!-- plugins:js -->
  <script src="<?php echo base_url(); ?>assetsU/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo base_url(); ?>assetsU/vendors/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assetsU/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>assetsU/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url(); ?>assetsU/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>assetsU/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>assetsU/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>assetsU/js/template.js"></script>
  <script src="<?php echo base_url(); ?>assetsU/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>assetsU/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="js/dashboard.js"></script> -->
  <!-- <script src="js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
</body>

</html>

<script>
$(document).ready(function() {
    $('#example').DataTable(
        
         {     

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5
       } 
        );
} );
</script>
</footer>