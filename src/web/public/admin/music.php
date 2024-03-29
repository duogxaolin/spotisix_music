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


                        <form submit-ajax="duogxaolin" action="/api/admin/music" class="auth-form p-xl-8 p-4 bgc-2 rounded" method="POST">
                            <input type="hidden" name="action" value="create">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên</label>
                                    <input type="search" class="form-control" name="name" placeholder="Enter name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nghệ sĩ</label>
                                    <select class="form-control" name="singer">
                                        <option selected>Chọn nghệ sĩ</option>
                                        <?php foreach ($duogxaolin->get_list("SELECT * FROM `artists`") as $row) { ?>
                                            <option value="<?= $row['ArtistSlug'] ?>"><?= $row['ArtistName'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="img" name="attachments">
                                            <label class="custom-file-label" for="img"></label>
                                     
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Nhạc </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="music" name="music">
                                            <label class="custom-file-label" for="music"></label>
                                        </div>
                                        
                                    </div>
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
                            <h3 class="card-title">Danh sách nhạc</h3>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Nghệ sĩ</th>
                                      
                                    </tr>
                                </thead>
                                <?php foreach ($duogxaolin->get_list("SELECT * FROM `songs`") as $row) {
                                    $singer = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '" . $row['ArtistID'] . "'");
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $row['SongName'] ?></td>
                                            <td><?= $singer['ArtistName'] ?>
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