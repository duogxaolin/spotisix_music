<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
checklogin();
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/views/auth/sidebar.php');
?>

<div class="col-xl-9">
    <div class="main-content-area d-grid gap-6">
        <!-- overview balance, withdraw, total podcast and total episode chart  -->
        <div class="row g-6">
            <div class="sign-up-form" data-aos="fade-up">
               
                    <div class="form-content mb-lg-10 mb-sm-8 mb-6">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Bài Hát</th>
                                    <th>Ca Sĩ</th>
                                    <th>Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            $query = "SELECT * FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "' ";
                            foreach ($duogxaolin->get_list($query) as $row) {
                                    $singer = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '" . $row['ArtistID'] . "'");
                                    $songs  = $duogxaolin->get_row("SELECT * FROM `songs` WHERE `SongID` = '" . $row['SongID'] . "'");
                                    
                                    ?>
                                  
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><a href="/music/<?= $songs['SongSlug'] ?>"><?= $songs['SongName'] ?></a></td>
                                            <td><a href="/singer/<?= $singer['ArtistSlug'] ?>"><?= $singer['ArtistName'] ?></a></td>
                                            <td><?=date('h:i:s d-m-Y', $row['ListenDateTime'])?></td>
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