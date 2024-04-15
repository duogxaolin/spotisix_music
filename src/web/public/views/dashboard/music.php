<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
checklogin();
$id = $auth['ArtistID'];
$row  = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '$id'");
if (!$row) {
    header('Location: /create/singer');
    die();
}
$query = "SELECT 
                    COUNT(`playcount`.`PlayCountID`) AS `counts`,
                    `songs`.`SongID` AS `SongID`,
                    `songs`.`SongName` AS `SongName`,
                    `songs`.`SongSlug` AS `SongSlug`,
                    `songs`.`Duration` AS `Duration`,
                    `songs`.`SongLogo` AS `SongLogo`
        
                FROM 
                    `songs`
                INNER JOIN 
                    `playcount` ON `songs`.`SongID` = `playcount`.`SongID`
                WHERE 
                `songs`.`SongID` = `playcount`.`SongID` AND `songs`.`ArtistID` = '$id'
                GROUP BY 
                    `songs`.`SongID`, 
                    `songs`.`SongName`, 
                    `songs`.`SongSlug`, 
                    `songs`.`Duration`,
                    `songs`.`SongLogo`
               ";
$sort = check_string($_GET['sort']);
if ($sort == 'price-asc') {
    $query .= "   ORDER BY 
    `counts` ASC";
} else if ($sort == 'price-desc') {
    $query .= "   ORDER BY 
    `counts` DESC";
} else if ($sort == 'oldest') {
    $query .= " ORDER BY `SongID` ASC";
} else {
    $query .= " ORDER BY `SongID` DESC";
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/views/auth/sidebar.php');
?>

<div class="col-xl-9">
    <div class="create-podcast-area p-lg-6 p-sm-4 p-2 rounded-3 border-full bc-500 bgc-4">
        <h4 class="fw-semibold">Bài hát đã tải lên hệ thống</h4>
        <div class="">
            <form action="" method="GET">
                <div class="row align-items-center">

                    <div class="col-sm">
                        <div class="form-group">
                            <div class="input-group"> <span class="input-group-text">Sắp Xếp</span> <select name="sort" class="form-control">
                                    <option value="">Mới tải lên</option>
                                    <option value="oldest" <?= ($sort == 'oldest' ? 'selected' : '') ?>>Tải lên đầu tiên</option>
                                    <option value="price-asc" <?= ($sort == 'price-asc' ? 'selected' : '') ?>>Nghe Ít Nhất</option>
                                    <option value="price-desc" <?= ($sort == 'price-desc' ? 'selected' : '') ?>>Nghe Nhiều Nhất</option>
                                </select> </div>
                        </div>
                    </div>
                    <div class="col-lg-3 align-self-end">
                        <div class="form-group">
                            <button class="btn btn-success w-50"> Tìm kiếm </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <span class="d-block my-lg-6 my-4 border-dashed"></span>
        <div class="form-content mb-lg-10 mb-sm-8 mb-6">
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bài Hát</th>
                        <th>Lượt Nghe</th>
                        <th>Thời gian</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;

                    foreach ($duogxaolin->get_list($query) as $row) {


                    ?>

                        <tr>
                            <td><?= $i++ ?></td>
                            <td><a href="/music/<?= $row['SongSlug'] ?>"><?= $row['SongName'] ?></a></td>
                            <td><?= format_cash($row['counts']) ?></td>
                            <td><?= $row['Duration'] ?></td>
                            <td class="text-center">


                                <a href="/dashboard/view/<?=$row['SongID']?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                    <span>Xem Chi tiết</span></a>

                                <form submit-ajax="duogxaolin" action="/api/singer/music" method="POST">
                                    <input type="hidden" name="id" value="<?=$row['SongID']?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button order="Bạn có chắc chắn muốn xoá bài :'<?= $row['SongName'] ?>'  khỏi hệ thống? Sau khi xoá sẽ không thể khôi phục" type="submit" class="btn btn-danger  btn-sm">
                                        <i class="fas fa-trash"></i>
                                        <span>Xoá</span></button>
                                </form>
                            </td>
                        </tr>

                    <?php } ?>


                    <!-- more rows -->
                </tbody>
            </table>


        </div>
    </div>
</div>
</div>
</div>
</main>


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/footer.php');
?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>