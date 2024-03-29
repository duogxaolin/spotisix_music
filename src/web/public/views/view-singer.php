<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$code = xss($_GET['code']);
$row  = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistSlug` = '$code'");
if (!$row) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
    die('');
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
?>
    <section class="hero-section-4 texture-bg pt-120 bgc-2">
        <div class="container pt-lg-15 pt-sm-10 pt-6">
            <div class="row g-6 align-items-lg-center">
                <div class="col-lg-6">
                    <div class="hero-content text-center text-lg-start">
                        <span class="subheading-border fw-medium mb-4 fs-xl">
                            <span class="fs-2xl">
                                <i class="ti ti-point-filled"></i>
                            </span>
                            <?=$row['BirthYear']?>
                        </span>
                        <div
                            class="d-flex flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-start gap-xxl-8 gap-lg-6">
                            <h2 class="hero-title display-two mb-4">Ca Sĩ</h2>
                            <div class="record-img">
                                <div class="one-direction-animation d-flex">
                                    <img class="w-100" src="/assets/img/record-7.png" alt="record">
                                    <img class="w-100" src="/assets/img/record-7.png" alt="record">
                                </div>
                            </div>
                        </div>
                        <h2 class="hero-title display-two mb-6">
                           <?=$row['ArtistName']?>
                        </h2>
                        <p class="fs-xl fw-normal">
                        <?=$row['ArtistNote']?>
                        </p>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <div class="hero-banner-4">
                            <img class="w-100 rounded" src=" <?=$row['ArtistImage']?>" alt="banner">
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
.hero-section-4::after {
    background: url(../img/texture-bg.png), rgb(13 226 124 / 0%);
}
</style>
<!-- host profile section start  -->
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
                    <h4 class="display-four fw-bold">Bài hát</h4>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ps-xxl-10">
                    <div class="text-center text-lg-start">
                        <p class="fw-normal mb-lg-10 mb-8">
                            <?= $artist['ArtistName'] ?> là một nghệ sĩ âm nhạc với nhiều ca khúc nổi tiếng. Hãy cùng khám phá những ca khúc mới nhất của <?= $artist['ArtistName'] ?>.
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-6">
            <div class="col-lg-6">
                <div class="d-grid gap-6">
                    <?php foreach ($duogxaolin->get_list("SELECT * FROM `songs` WHERE `ArtistID` = '".$row['ArtistID']."'  LIMIT 10 ") as $song) {
                        $singer = $row['ArtistID'];
                        $artist = $row;
                    ?>
                        <div class="episode-card small-card bgc-2 rounded d-flex flex-sm-row flex-column align-items-sm-center gaqp-sm-2 gap-8 p-xxl-6 p-lg-2 p-4" data-aos="zoom-in">
                            <div class="d-flex align-items-sm-center flex-column flex-sm-row gap-xxl-8 gap-sm-4 gap-6 w-100">
                                <div class="episode-card-img overflow-hidden rounded">
                                    <img class="w-100 h-100 rounded" src="<?= $song['SongLogo'] ?>" alt="">
                                </div>
                                <div class="card-content">
                                    <h3 class="mb-lg-6 mb-4 fw-medium"><a href="/music/<?= $song['SongSlug'] ?>" class="link-text"><?= $song['SongName'] ?></a></h3>
                                    
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
                        <?= $song['SongName'] ?>
                        </h3>
                      
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- host profile section end -->

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/footer.php');
?>