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
            <div class="col-lg-8">
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
                                    <h3 class="fw-semibold"><?= $duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "' AND DAY(FROM_UNIXTIME(`ListenDateTime`)) = DAY(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())") ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalPodcast"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- total Episode chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-video"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Bài hát đã nghe hôm nay</span>
                                    <h3 class="fw-semibold"><?= $duogxaolin->num_rows("SELECT DISTINCT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'  AND DAY(FROM_UNIXTIME(`ListenDateTime`)) = DAY(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW()) ") ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalEpisode"></div>
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
                                    <h3 class="fw-semibold"><?= $duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "' AND WEEK(FROM_UNIXTIME(`ListenDateTime`)) = WEEK(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())") ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalPodcast"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- total Episode chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-video"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Bài hát đã nghe tuần này</span>
                                    <h3 class="fw-semibold"><?= $duogxaolin->num_rows("SELECT DISTINCT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'  AND WEEK(FROM_UNIXTIME(`ListenDateTime`)) = WEEK(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW()) ") ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalEpisode"></div>
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
                                    <h3 class="fw-semibold"><?= $duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "' AND WEEK(FROM_UNIXTIME(`ListenDateTime`)) = WEEK(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW())") ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalPodcast"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- total Episode chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-video"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Bài hát đã nghe tháng này</span>
                                    <h3 class="fw-semibold"><?= $duogxaolin->num_rows("SELECT DISTINCT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'  AND WEEK(FROM_UNIXTIME(`ListenDateTime`)) = WEEK(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW()) ") ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalEpisode"></div>
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
                                    <h3 class="fw-semibold"><?= $duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'") ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalPodcast"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- total Episode chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-video"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Bài hát đã nghe</span>
                                    <h3 class="fw-semibold"><?= $duogxaolin->num_rows("SELECT DISTINCT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'") ?></h3>
                                </div>
                            </div>
                            <!-- chart area -->
                            <div class="chart-area">
                                <div id="totalEpisode"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="overview-card d-flex justify-content-lg-start justify-content-sm-between flex-lg-column flex-sm-row flex-column overflow-hidden rounded bcp-1-2" data-aos="fade-up">
                    <div class="d-flex align-items-center gap-xxl-6 gap-4 p-xxl-6 p-lg-4 p-sm-2 p-6">
                        <div class="icon-area alt-color">
                            <i class="ti ti-headphones"></i>
                        </div>
                        <div class="content-area">
                            <span class="d-block mb-2 tcn-700"></span>
                            <h3 class="fw-semibold tcn-700"><?= format_cash($duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ArtistID` = '" . $auth['ArtistID'] . "'")) ?> views</h3>
                        </div>
                    </div>
                    <div class="card-banner-wrapper position-relative d-none d-sm-block">
                        <div class="record-img position-absolute top-0">
                            <div class="record-img-animation d-flex">
                                <img class="w-100" src="/assets/img/record.png" alt="record">
                                <img class="w-100" src="/assets/img/record.png" alt="record">
                            </div>
                        </div>
                        <div class="card-banner">
                            <img class="w-100" src="/assets/img/mic.png" alt="banner">
                        </div>
                        <div class="record-img position-absolute record-imgposition">
                            <div class="record-img-animation-alt d-flex">
                                <img class="w-100" src="/assets/img/record.png" alt="record">
                                <img class="w-100" src="/assets/img/record.png" alt="record">
                            </div>
                        </div>
                    </div>
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