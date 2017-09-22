
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>

// Make your own here: https://eternicode.github.io/bootstrap-datepicker

var dateSelect = $("#flight-datepicker");
var dateDepart = $("#start-date");
var dateReturn = $("#end-date");
var spanDepart = $(".date-depart");
var spanReturn = $(".date-return");
var spanDateFormat = "ddd, MMMM D yyyy";

dateSelect
  .datepicker({
  autoclose: true,
  format: "dd/mm/yy",
  maxViewMode: 0,
  startDate: "now"
})
  .on("change", function() {
  var start = $.format.date(dateDepart.datepicker("getDate"), spanDateFormat);
  var end = $.format.date(dateReturn.datepicker("getDate"), spanDateFormat);
  spanDepart.text(start);
  spanReturn.text(end);
});
</script>
<style>
    #header .top.solid{
        background: #000;
        height: 100px;
    }
    
</style>


<!--====================Details=========-->

   
                    <script src="assets/js/jquery-2.1.3.min.js"></script>
                    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
                    <script src="assets/js/bootstrap.min.js"></script>
                    <script src="assets/js/jquery.actual.min.js"></script>
                    <script src="assets/js/jquery.scrollTo.min.js"></script>
                    <script src="assets/js/script.js"></script>
                    
                       <!-- Jquery Core Js -->
                       <script src="admin-cp/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="admin-cp/assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="admin-cp/assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="admin-cp/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="admin-cp/assets/plugins/node-waves/waves.js"></script>

    <!-- Light Gallery Plugin Js -->
    <script src="admin-cp/assets/plugins/light-gallery/js/lightgallery-all.js"></script>

    <!-- Custom Js -->
    <script src="admin-cp/assets/js/pages/medias/image-gallery.js"></script>
    <script src="admin-cp/assets/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="admin-cp/assets/js/demo.js"></script>

                    </body>
                    </html>
