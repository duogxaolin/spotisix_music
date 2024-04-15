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
            <div class="col-lg-12">
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
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "' AND DAY(FROM_UNIXTIME(`ListenDateTime`)) = DAY(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
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
                        <!-- total Episode chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-video"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Bài hát đã nghe hôm nay</span>
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT DISTINCT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'  AND DAY(FROM_UNIXTIME(`ListenDateTime`)) = DAY(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW()) ")) ?></h3>
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
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "' AND WEEK(FROM_UNIXTIME(`ListenDateTime`)) = WEEK(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
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
                        <!-- total Episode chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-video"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Bài hát đã nghe tuần này</span>
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT DISTINCT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'  AND WEEK(FROM_UNIXTIME(`ListenDateTime`)) = WEEK(NOW()) AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW()) ")) ?></h3>
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
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "' AND MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
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
                        <!-- total Episode chart  -->
                        <div class="overview-card d-grid gap-lg-6 gap-4 p-xxl-6 p-sm-4 p-2 rounded-3 border-full bgc-2" data-aos="fade-up">
                            <div class="d-flex align-items-center gap-xxl-6 gap-4">
                                <div class="icon-area">
                                    <i class="ti ti-video"></i>
                                </div>
                                <div class="content-area">
                                    <span class="d-block mb-2">Bài hát đã nghe tháng này</span>
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT DISTINCT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'  AND  MONTH(FROM_UNIXTIME(`ListenDateTime`)) = MONTH(NOW()) 
                         AND YEAR(FROM_UNIXTIME(`ListenDateTime`)) = YEAR(NOW()) ")) ?></h3>
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
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'")) ?></h3>
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
                                    <h3 class="fw-semibold"><?= format_cash($duogxaolin->num_rows("SELECT DISTINCT `SongID` FROM `playcount` WHERE `ListenerID` = '" . $auth['ListenerID'] . "'")) ?></h3>
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
           
        </div>

    </div>
</div>
</div>
</div>
</main>


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/footer.php');
?>