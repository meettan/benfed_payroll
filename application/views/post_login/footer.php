</div>
<footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"><strong>Copyright © 2020 </strong><a href="https://synergicsoftek.in/" target="_blank">Synergic Softek Solutions PVT. LTD. </a>. All rights reserved.</span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <i class="mdi mdi-heart-outline text-danger"></i></span> -->
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
 
  <script src="<?=base_url()?>assets/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?=base_url()?>assets/js/Chart.min.js"></script>
  <script src="<?=base_url()?>assets/js/progressbar.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=base_url()?>assets/js/jquery.dataTables.js"></script>
  <script src="<?=base_url()?>assets/js/dataTables.bootstrap4.js"></script>
  <script src="<?=base_url()?>assets/js/off-canvas.js"></script>
  <script src="<?=base_url()?>assets/js/hoverable-collapse.js"></script>
  <script src="<?=base_url()?>assets/js/template.js"></script>
  <script src="<?=base_url()?>assets/js/settings.js"></script>
  <script src="<?=base_url()?>assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?=base_url()?>assets/js/dashboard.js"></script>
  <script src="<?=base_url()?>assets/js/data-table.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
   <script src="<?=base_url()?>assets/js/select2.min.js"></script>
  <script>
  $("#emp_code").select2( {
    placeholder: ""
    } );
  </script>
   <script>
  $("#emp_cd").select2( {
    placeholder: "Select Employee"
    } );
  </script>

  <script>
    $(document).ready(function(){
    $("#btnExport").click(function() {
        let table = document.getElementsByTagName("table");
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
           name: `export.xlsx`, // fileName you could use any name
           sheet: {
              name: 'Sheet 1' // sheetName
           }
        });
    });
});
    </script>
  <!-- End custom js for this page-->
</body>
</html>