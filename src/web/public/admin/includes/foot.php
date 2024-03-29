      
    </div>

    <!-- ./wrapper -->
    <link rel="stylesheet" href="/public/admin/plugins/summernote/summernote-bs4.min.css">
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="/public/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/public/admin/dist/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="/public/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="/public/admin/plugins/raphael/raphael.min.js"></script>
    <script src="/public/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="/public/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="/public/admin/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/public/admin/dist/js/pages/dashboard2.js"></script>
    <script src="/public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/public/admin/plugins/jszip/jszip.min.js"></script>
<script src="/public/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/public/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="/public/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/app/js/app.js"></script>
</body>
<style>
.dark-mode .swal2-popup .swal2-title {
    color: #3a2929;
}
</style>
</html>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>