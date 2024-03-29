<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once('includes/head.php');
require_once('includes/nav.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm nghệ sĩ</h3>
                        </div>


                        <form submit-ajax="duogxaolin" action="/api/admin/singer" class="auth-form p-xl-8 p-4 bgc-2 rounded" method="POST">
                            <input type="hidden" name="action" value="create">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="search" class="form-control" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Năm sinh</label>
                                    <input type="search" class="form-control" name="year" placeholder="Enter bỉthday">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quốc gia</label>
                                    <input type="search" class="form-control" name="country" placeholder="Enter country">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="attachments">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thông tin thêm</label>
                                    <textarea id="summernote" name="note" class="form-control"> </textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách nghệ sĩ</h3>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Quốc gia</th>
                                        <th>BirthYear</th>
                                    </tr>
                                </thead>
                                <?php foreach ($duogxaolin->get_list("SELECT * FROM `artists`") as $row) { ?>
                                <tbody>
                                    <tr>
                                        <td><?= $row['ArtistName'] ?></td>
                                        <td><?= $row['Country'] ?>
                                        </td>
                                        <td><?= $row['BirthYear'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
    </section>
</div>
<?php
require_once('includes/foot.php');
?>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>