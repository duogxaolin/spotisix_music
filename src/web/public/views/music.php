<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$code = xss($_GET['code']);
$row  = $duogxaolin->get_row("SELECT * FROM `songs` WHERE `SongSlug` = '$code'");
if (!$row) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
    die('');
}

$string = $row['SongName'];
list($part1, $part2) = splitString($string);
$singer = $row['ArtistID'];
$artist = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '$singer'");
$album  = $duogxaolin->get_row("SELECT * FROM `albums` WHERE `AlbumID` = '" . $row['AlbumID'] . "'");
$counts = $duogxaolin->num_rows("SELECT * FROM `playcount` WHERE `SongID` = '".$row['SongID']."'");
//echo $counts;
$count  = format_cash($counts);
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
?>
<script type="text/javascript">
    var dataInserted = false;
    const setAudio = () => {
        const audio = new Audio('<?= $row['FilePath'] ?>'); // add audio here 
        return audio
    }
</script>
<script>
    function downloadImage(url) {
        var url = url;
        var filename = '<?= $code ?>.mp3';
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = 'blob';
        xhr.onload = function() {
            var urlCreator = window.URL || window.webkitURL;
            var imageUrl = urlCreator.createObjectURL(this.response);
            var tag = document.createElement('a');
            tag.href = imageUrl;
            tag.download = filename;
            document.body.appendChild(tag);
            tag.click();
            document.body.removeChild(tag);
            toast_msg('success', "Đã tải xuống");
        };
        xhr.send();
    }
</script>
<!-- hero section 03 start  -->
<section class="hero-section-3 texture-bg pt-120 bgc-2">
    <div class="container pt-lg-15 pt-sm-10 pt-6 pb-lg-20 pb-sm-15 pb-10">
        <div class="row">
            <!-- title area  -->
            <div class="col-12" data-aos="fade-up">
                <div class="d-between flex-wrap">
                    <h2 class="display-one text-center text-lg-start"><?= $part1 ?>
                    </h2>
                    <!--
                    <div class="img-bttn position-relative d-none d-lg-block">
                        <a href="https://www.youtube.com/watch?v=w7j_K_hE5kU" class="icon-btn d-center gap-3 popupvideo mfp-iframe position-absolute top-50 start-50 translate-middle">
                            <span class="icon fs-xl fw-bold">
                                <i class="ti ti-player-play"></i>
                            </span>
                        </a>
                        <img class="w-100" src="assets/img/img-btn.png" alt="hero image">
                    </div> -->
                </div>
                <h2 class="display-one text-lg-end text-center"><span class="tcp-4"><?= $part2 ?> </span> </h2>
            </div>
        </div>
        <div class="row justify-content-between g-6 pt-lg-8">
            <div class="col-lg-3">
                <div class="hero-banner-3">
                    <img class="w-100" src="<?= $row['SongLogo'] ?>" alt="">
                </div>
            </div>
            <div class="col-lg-7" data-aos="zoom-in">
                <p class="fs-xl mb-lg-12 mb-sm-6 mb-4 text-center text-lg-start">

                </p>

                <!-- music player 02  -->
                <div class="music-player-2 p-6 bgc-3 rounded mb-lg-10 mb-sm-6 mb-4">
                    <div class="song-info d-flex flex-wrap align-items-center gap-lg-6 gap-sm-4 gap-2 mb-lg-6 mb-4">

                        <div class="playlist-name-area d-flex align-items-center gap-2">
                            <span class="fs-xl tcp-1">
                                <i class="ti ti-versions"></i>
                            </span>
                            <a class="playlist-name" href="/album/<?= $album['AlbumSlug'] ?>">
                                <?= $album['AlbumName'] ?>
                            </a>
                        </div>
                        <div class="singer-name-area d-flex align-items-center gap-2">
                            <span class="fs-xl tcp-1">
                                <i class="ti ti-microphone"></i>
                            </span>
                            <a class="singer-name" href="/singer/<?= $artist['ArtistSlug'] ?>">
                                <?= $artist['ArtistName'] ?>
                            </a>
                        </div>
                    </div>
                    <div class="play-podcast-area mt-lg-6 mt-4">
                        <div class="audio-player d-block">

                            <div class="controls">
                                <!-- timeline  -->
                                <div class="timeline mb-2 alt-color">
                                    <div class="progress"></div>
                                </div>
                                <!-- time and volume  -->
                                <div class="time-and-volume">
                                    <!-- time  -->
                                    <div class="time">
                                        <div class="current fs-sm">0:00</div>
                                        <div class="length fs-sm"></div>
                                    </div>
                                    <!-- volume -->
                                    <div class="volume-container">
                                        <div class="volume-button">
                                            <i class="ti ti-volume"></i>
                                        </div>
                                        <div class="volume-slider">
                                            <div class="volume-percentage"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-between gap-4">
                                <div class="play-audio d-flex  align-items-center gap-4">

                                    <button class="toggle-play play fs-xl tcn-900">
                                        <i class="ti ti-player-play"></i>
                                    </button>

                                    <button onclick="downloadImage('<?= $row['FilePath'] ?>')" class="play-next fs-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                            <path d="M7 11l5 5l5 -5" />
                                            <path d="M12 4l0 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="visualizer d-none d-sm-block">
                                    <img class="w-100" src="/assets/img/record-4.png" alt="visualizer">
                                </div>
                                <div class="d-flex align-items-center gap-6">

                                    <div class="volume-and-setting d-flex align-items-center gap-4">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="listen-to-btns d-flex align-items-center justify-content-center justify-content-lg-start gap-6 flex-wrap">
                    <p class="fs-2xl fw-medium text-nowrap">Nghe trên các nền tảng :</p>
                    <ul class="d-flex align-items-center gap-sm-4 gap-2">
                        <li class="brand-icon"><a href="#">
                                <img class="w-100" src="/assets/img/spotify.png" alt="brand icon">
                            </a></li>
                        <li class="brand-icon"><a href="#">
                                <img class="w-100" src="/assets/img/icon.png" alt="brand icon">
                            </a></li>
                        <li class="brand-icon"><a href="#">
                                <img class="w-100" src="/assets/img/zing.png" alt="brand icon">
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2" data-aos="fade-down">
                <div class="d-flex flex-lg-column flex-wrap flex-sm-nowrap justify-content-center justify-content-lg-start gap-lg-10 gap-md-8 gap-6">
                    <div class="ms-lg-auto">
                        <div class="odometer-item d-center mb-2">
                            <span class="odometer base fs-two text-nowrap" data-odometer-final="<?=$count?>">00.0</span>
                            <span class="fs-two tcp-1"></span>
                        </div>
                        <p>Lượt Nghe</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero section 03 end  -->

<!-- recent episode 03 section start  -->
<section class="recent-episode-3 pt-120 pb-120 texture-bg-2">
    <div class="container">
        <div class="row g-6 justify-content-between mb-lg-15 mb-sm-10 mb-8" data-aos="flip-right">
            <div class="col-xl-6 col-lg-7">
                <div class="text-center text-lg-start">
                    <span class="subheading-border fw-medium mb-4 fs-xl">
                        <span class="fs-2xl">
                            <i class="ti ti-rocket"></i>
                        </span>
                        <?= $artist['ArtistName'] ?>
                    </span>
                    <h4 class="display-four fw-bold">Khám Phá Thêm Nhạc Của <?= $artist['ArtistName'] ?></h4>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ps-xxl-10">
                    <div class="text-center text-lg-start">
                        <p class="fw-normal mb-lg-10 mb-8">
                            <?= $artist['ArtistName'] ?> là một nghệ sĩ âm nhạc với nhiều ca khúc nổi tiếng. Hãy cùng khám phá những ca khúc mới nhất của <?= $artist['ArtistName'] ?>.
                        </p>
                        <a href="/singer/<?= $artist['ArtistSlug'] ?>" class="bttn-1 bttn-outline alt-position">
                            Xem thêm nhạc
                            <span class=" icon d-center icon-right">
                                <i class="ti ti-arrow-narrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-6">
            <div class="col-lg-6">
                <div class="d-grid gap-6">
                    <?php foreach ($duogxaolin->get_list("SELECT * FROM `songs` WHERE `ArtistID` = '$singer'  LIMIT 3 ") as $row) {
                        $singer = $row['ArtistID'];
                        $artist = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '$singer'");
                    ?>
                        <div class="episode-card small-card bgc-2 rounded d-flex flex-sm-row flex-column align-items-sm-center gaqp-sm-2 gap-8 p-xxl-6 p-lg-2 p-4" data-aos="zoom-in">
                            <div class="d-flex align-items-sm-center flex-column flex-sm-row gap-xxl-8 gap-sm-4 gap-6 w-100">
                                <div class="episode-card-img overflow-hidden rounded">
                                    <img class="w-100 h-100 rounded" src="<?= $row['SongLogo'] ?>" alt="">
                                </div>
                                <div class="card-content">
                                    <h3 class="mb-lg-6 mb-4 fw-medium"><a href="/music/<?= $row['SongSlug'] ?>" class="link-text"><?= $row['SongName'] ?></a></h3>
                                    
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
            <div class="col-lg-6">
                     
                <div class="episode-card big-card d-flex flex-column rounded-4 p-xxl-10 p-3" data-aos="zoom-in">
                    <div class="card-top d-between flex-wrap gap-xxl-6 gap-4 mb-lg-8 mb-sm-6 mb-4">
                       
                        <div class="d-flex flex-wrap align-items-center gap-sm-4 gap-2">
                            <a href="host-details.html" class="episode-host d-flex align-items-center gap-xl-2 gap-1">
                                <span class="tcn-700 fs-xl">
                                    <i class="ti ti-microphone"></i>
                                </span>
                                <span class="fs-lg fw-medium text-nowrap link-text-2">
                                <?= $artist['ArtistName'] ?>
                                </span>
                            </a>
                           
                        </div>
                    </div>
                    <div class="card-bannr position-relative">
                        <div class="card-banner mb-lg-8 mb-sm-6 mb-4">
                        <img class="w-100" src="/assets/img/record-track-2.png" alt="image">
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title fw-semibold mb-4">
                        <?= $row['SongName'] ?>
                        </h3>
                      
                        <div class="card-btns d-between flex-wrap gap-6 mt-lg-8 mt-6">
                            <a href="" class="icon-btn d-center gap-3">
                                <span class="icon fs-xl fw-bold">
                                    <i class="ti ti-player-play"></i>
                                </span>
                                <span class="text fw-semibold">
                                    Listen Now
                                </span>
                            </a>
                            <a href="episodes-details.html" class="bttn-1 bttn-outline-2">
                                Read More
                                <span class="icon d-center icon-right fs-xl fw-bold">
                                    <i class="ti ti-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- recent episode 03 section end  -->

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/footer.php');
?>