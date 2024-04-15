<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
checklogin();
$id = $auth['ArtistID'];
$row  = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '$id'");
if (!$row) {
    header('Location: /create/singer');
    die();
}
$songs = $duogxaolin->get_row("SELECT * FROM `songs` WHERE `ArtistID` = '" . $auth['ArtistID'] . "'  AND `SongID` = '" . $_GET['SongID'] . "'");
if (!$songs) {
    header('Location: /dashboard/music');
    die();
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/views/auth/sidebar.php');
?>

<div class="col-xl-9">
    <div class="main-content-area d-grid gap-6">
        <!-- overview balance, withdraw, total podcast and total episode chart  -->
        <div class="row g-6">
            <div class="col-lg-6">
                <div class="row g-6">


                    <div class="col-md-6">
                        <!-- total podcast chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-broadcast"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Lượt đã nghe hôm nay</span>
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ArtistID` = '" . $auth['ArtistID'] . "'  AND `SongID` = '" . $songs['SongID'] . "' AND DAY(FROM_UNIXTIME(`ListenDateTime`)) = DAY(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())")) ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalPodcast"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- total podcast chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-broadcast"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Lượt đã nghe tuần này</span>
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ArtistID` = '" . $auth['ArtistID'] . "'  AND `SongID` = '" . $songs['SongID'] . "' AND WEEK(FROM_UNIXTIME(`ListenDateTime`)) = WEEK(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())")) ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalPodcast"></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <!-- total podcast chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-broadcast"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Lượt đã nghe tháng này</span>
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ArtistID` = '" . $auth['ArtistID'] . "'  AND `SongID` = '" . $songs['SongID'] . "' AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())")) ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalPodcast"></div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <!-- total podcast chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-broadcast"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Lượt đã nghe</span>
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ArtistID` = '" . $auth['ArtistID'] . "'  AND `SongID` = '" . $songs['SongID'] . "'")) ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalPodcast"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="create-podcast-area p-lg-6 p-sm-4 p-2 rounded-3 border-full bc-500 bgc-4">
                    <h4 class="fw-semibold"><?= $songs['SongName'] ?></h4>
                    <span class="d-block my-lg-6 my-4 border-dashed"></span>
                    <form submit-ajax="duogxaolin" action="/api/singer/music" class="d-grid gap-sm-6 gap-4 d-nonge" method="POST">
                    <input type="hidden" name="id" value="<?=$songs['SongID']?>">
                                    <input type="hidden" name="action" value="edit">
                        <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-lg-6 gap-4">
                            <div class="input-wrapper d-grid gap-lg-4 gap-2 w-100">
                                <label for="title" class="fs-five fw-semibold">Tên Bài <span class="tcp-1">*</span></label>
                                <input type="text" name="title" value="<?= $songs['SongName'] ?>" placeholder="Tên/Nghệ Danh" wfd-id="id1">
                            </div>

                        </div>

                        <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-lg-6 gap-4">
                            <div class="input-wrapper d-grid gap-lg-4 gap-2 w-100">
                                <label for="title" class="fs-five fw-semibold">Ngày Phát Hành <span class="tcp-1">*</span></label>
                                <input type="text" name="Duration" value="<?= $songs['Duration'] ?>" placeholder="Tên/Nghệ Danh" wfd-id="id1">
                            </div>

                        </div>

                        <div class="podcast-img-upload d-grid gap-lg-10 gap-6">
                            <!-- picture img area  -->
                            <div class="d-grid gap-lg-4 gap-2">
                                <label class="fs-five fw-semibold">Ảnh</label>
                                <div class="upload-post-img d-flex flex-column flex-md-row align-items-md-center gap-lg-10 gap-md-6 gap-4">
                                    <div class="preview-img-area">
                                        <img class="w-100 h-100 rounded-3 previewImg" src="<?= $songs['SongLogo'] ?>" alt="preview">
                                    </div>
                                    <div class="upload-img-area">
                                        <p class="fs-sm mb-lg-3 mb-2">
                                            Đây sẽ là ảnh hiển thị với người nghe
                                        </p>
                                        <p class="fs-sm tcp-1 mb-lg-8 mb-sm-6 mb-4">
                                            Vui lòng chọn ảnh chất lượng nhất có thể
                                        </p>
                                        <button class="bttn-1 uploadPreview">
                                            <span class="fs-xl fw-bold">
                                                <i class="ti ti-circle-plus"></i>
                                            </span>
                                            <span class="fw-bold">Upload Image</span>
                                        </button>
                                        <input type="file" class="inputFile" accept="image/*" hidden="" name="attachments" wfd-id="id3">
                                        <span class="warning-msg text-danger"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="input-wrapper d-grid gap-lg-4 gap-2">
                            <div class="audio-upload-area input-file active">
                                <div class="d-grid gap-lg-4 gap-2">
                                    <label for="audio-file" class="fs-five fw-medium">File type audio and .mp3
                                        <span class="tcp-1">*</span></label>
                                    <input type="file" class="p-lg-2 p-1" id="audio-file" name="mp3File" accept="audio/*" wfd-id="id2">
                                </div>
                            </div>
                            <span class="tcp-1 fs-sm">
                               Không đổi thì không chọn nhé
                            </span>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bttn-1">
                                <span>Sửa Ngay</span>
                                <span class="icon  d-center icon-right"><i class="ti ti-arrow-right"></i></span>
                            </button>
                        </div>
                    </form>
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