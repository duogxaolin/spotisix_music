<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
?>

<!-- hero section start  -->
<section class="hero-section inner-hero-section bg-bottom texture-bg pt-120">
    <div class="vector-line position-absolute top-50 start-50 translate-middle w-100 h-100 z-n1">
        <img class="w-100" src="/assets/img/vector-line-2.png" alt="line">
    </div>
    <div class="circle-shape shape-1 d-none d-sm-block">
        <img class="w-100" src="/assets/img/shape-1.png" alt="shape">
    </div>
    <div class="circle-shape shape-2 d-none d-sm-block">
        <img class="w-100" src="/assets/img/shape-2.png" alt="shape">
    </div>
    <div class="container">
        <div class="circle-shape shape-3 d-none d-sm-block">
            <img class="w-100" src="assets/img/shape-3.png" alt="shape">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up" data-aos-duration="1000">
                <div class="hero-content text-center">
                    <div class="img-area mb-4 mx-auto">
                        <div class="record-slide-wrapper">
                            <div class="record-img-animation d-flex align-items-center">
                                <img class="w-100" src="/assets/img/racode-track.png" alt="record">
                                <img class="w-100" src="/assets/img/racode-track.png" alt="record">
                                <img class="w-100" src="/assets/img/racode-track.png" alt="record">
                            </div>
                        </div>
                    </div>
                    <h1 class="display-two mb-lg-10 mb-sm-6 mb-4">Spotisix <span class="tcp-1">Music</span></h1>

                    <ul class="d-center gap-sm-4 gap-2">
                        <li class="brand-icon"><a href="#">
                                <img class="w-100" src="/assets/img/spotify.png" alt="brand icon">
                            </a></li>
                        <li class="brand-icon"><a href="#">
                                <img class="w-100" src="/assets/img/icon.png" alt="brand icon">
                            </a></li>
                        <li class="brand-icon"><a href="#">
                                <img class="w-100" src="/assets/img/zing.png" alt="brand icon">
                            </a></li>
                        <!--     <li class="brand-icon"><a href="#">
                                    <img class="w-100" src="assets/img/podcast-icon-2.png" alt="brand icon">
                                </a></li>
                            <li class="brand-icon"><a href="#">
                                    <img class="w-100" src="assets/img/podcast-icon-3.png" alt="brand icon">
                                </a></li>
                            <li class="brand-icon"><a href="#">
                                    <img class="w-100" src="assets/img/podcast-icon-4.png" alt="brand icon">
                                </a></li>
                            <li class="brand-icon"><a href="#">
                                    <img class="w-100" src="assets/img/podcast-icon-5.png" alt="brand icon">
                                </a></li>
                                -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- search with filter -->
        <div class="search-with-filter p-sm-3 p-1 mt-lg-15 mt-sm-10 mt-6 bgc-3" data-aos="fade-down" data-aos-duration="1000">
            <form action="/search" class="d-flex align-items-sm-center align-items-baseline gap-md-6 gap-sm-3 gap-1">
                <div class="select-category-area">
                    <select name="type" class="select-category">
                        <option value="">Tất cả</option>
                        <option value="3">Theo tên bài hát</option>
                        <option value="2">Theo Nghệ sĩ</option>
                        <option value="" disabled>Lời bài hát(comming soon)</option>
                    </select>
                </div>
                <div class="input-area p-0 w-100">
                    <input type="text" class="py-1" name="keywords" placeholder="Tìm bài hát, nghệ sĩ...">
                    <button class="p-0">
                        <span class="d-none d-md-block">
                            <span class="bttn-1 text-nowrap">Search
                                <span class=" icon d-center icon-right">
                                    <i class="ti ti-arrow-narrow-right"></i>
                                </span>
                            </span>
                        </span>
                        <span class="icon-btn d-md-none">
                            <span class="icon alt-size fs-xl fw-bold">
                                <i class="ti ti-search"></i>
                            </span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- hero section end  -->

<!-- latest episodes list section start  -->
<section class="latest-episodes-section pt-120 pb-120 texture-bg-2">

</section>
<!-- latest episodes list section end  -->
<section class="blog-details-section pb-120 texture-bg-2 overflow-visible">
    <div class="container">
        <div class="row g-6">
            <div class="col-xl-9">
                <div class="blog-details-content-wrapper d-grid gap-6 p-xxl-6 p-lg-4 p-3 rounded bgc-3">
                    <h4 class="fw-semibold">Nhạc mới cập nhập</h4>
                    <span class="d-block border-dashed"></span>
                    <div class="container">

                        <div class="row g-6">
                            <?php foreach ($duogxaolin->get_list("SELECT * FROM `songs`  ORDER BY `SongID` DESC LIMIT 10") as $row) {
                                $singer = $row['ArtistID'];
                                $artist = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '$singer'");
                            ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-article-card p-3 rounded-3 bgc-2 aos-init aos-animate" data-aos="zoom-in">
                                        <div class="img-area mb-3">
                                            <img class="w-100 rounded" src="<?= $row['SongLogo'] ?>" alt="image">
                                        </div>
                                        <div class="content-area p-lg-5 p-4">
                                            <a href="/music/<?= $row['SongSlug'] ?>" class="fw-semibold mb-4 link-text char-limit" data-maxlength="30"><?= $row['SongName'] ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>

                        <!-- pagination start 
                        <div class="row justify-content-center mt-lg-10 mt-6">
                            <div class="col-6">
                                <nav class="pagination d-center aos-init aos-animate" aria-label="pagination" data-aos="fade-up">
                                    <ul class="pagination-items d-center gap-3">
                                        <li><a href="#"><i class="ti ti-arrow-left"></i>
                                            </a>
                                        </li>
                                        <li><a href="#" class="active">1</a>
                                        </li>
                                        <li><a href="#">2</a>
                                        </li>
                                        <li><a href="#">3</a>
                                        </li>
                                        <li><a href="#">...</a>
                                        </li>
                                        <li><a href="#"><i class="ti ti-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                       -->

                    </div>
                </div>


            </div>
            <div class="col-xl-3">
                <div class="blog-details-sidebar d-grid gap-lg-6 gap-4 p-xxl-6 p-4 rounded bgc-3 position-sticky sticky-top sticky-top-position">

                    <div class="related-blog-card-wrapper d-grid gap-lg-6 gap-4 p-xxl-8 p-lg-6 p-4 rounded bgc-2 aos-init aos-animate" data-aos="zoom-in">
                        <h4 class="fw-semibold">Top #10</h4>
                        <span class="d-block border-dashed"></span>
                        <div class="related-blog-card d-grid gap-lg-6 gap-4">


                            <?php foreach ($duogxaolin->get_list(
                                "SELECT 
                                COUNT(`playcount`.`PlayCountID`) AS `counts`,
                                `songs`.`SongID` AS `SongID`,
                                `songs`.`SongName` AS `SongName`,
                                `songs`.`SongSlug` AS `SongSlug`,
                                `songs`.`SongLogo` AS `SongLogo`
                            FROM 
                                `songs`
                            INNER JOIN 
                                `playcount` ON `songs`.`SongID` = `playcount`.`SongID`
                            WHERE 
                            `songs`.`SongID` = `playcount`.`SongID`
                            GROUP BY 
                                `songs`.`SongID`, 
                                `songs`.`SongName`, 
                                `songs`.`SongSlug`, 
                                `songs`.`SongLogo`
                            ORDER BY 
                                `counts` DESC LIMIT 10"
                            ) as $row) {
                              //  print_r($row);
                                $singer = $row['ArtistID'];
                                $artist = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '$singer'");
                            ?>
                                <a href="/music/<?= $row['SongSlug'] ?>" class="blog-card-item d-flex align-items-center gap-4">
                                    <div class="img-area">
                                        <img class="w-100 rounded" src="<?= $row['SongLogo'] ?>" alt="blog">
                                    </div>
                                    <div class="content-area">
                                        <h6 class="fw-normal mb-2 char-limit" data-maxlength="70"><?= $row['SongName'] ?>
                                        </h6>

                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                        <span class="d-block border-dashed"></span>
                       
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>

<!-- call to action section 03 start -->
<section class="host-profile-section-2 pt-120 pb-120 texture-bg">
    <div class="container-fluid">
        <div class="row g-6 align-items-center justify-content-between">
            <div class="col-xxl-3 col-lg-4 col-md-8 col-sm-10 offset-xxl-2 offset-lg-1 offset-md-2 offset-sm-1 ps-lg-0" data-aos="flip-left">
                <div class="text-center text-lg-start">
                    <span class="subheading-border fw-medium mb-4 fs-xl">
                        <span class="fs-2xl">
                            <i class="ti ti-rocket"></i>
                        </span>
                        Host Singer
                    </span>
                    <h4 class="display-four fw-semibold mb-6">Ca sĩ có nhiều lượt nghe nhất</h4>
                    <p class="fw-normal">
                        Thống kê danh sách ca sỹ có nhiều lượt nghe nhất trên hệ thống
                    </p>
                    <div class="swiper-btns swiper-top-btn d-lg-flex d-none align-items-center gap-4 mt-lg-10 mt-sm-6 mt-4">
                        <div class="host-swiper-prev button-prev fs-lg">
                            <i class="ti ti-chevron-left"></i>
                        </div>
                        <div class="host-swiper-next button-next fs-lg">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="swiper host-swiper-2">
                    <div class="swiper-wrapper">
                        <?php foreach ($duogxaolin->get_list(
                            "SELECT 
                            COUNT(`playcount`.`PlayCountID`) as `counts`,
                        `artists`.`ArtistID` as `ArtistID`,
                            `artists`.`ArtistName` as `ArtistName`,
                            `artists`.`Country` AS `Country`,
                            `artists`.`ArtistImage` AS `ArtistImage`
                        FROM 
                            `artists`
                        INNER JOIN 
                            `playcount` ON `artists`.`ArtistID` = `playcount`.`ArtistID`
                        WHERE 
                        `artists`.`ArtistID` = `playcount`.`ArtistID`
                        GROUP BY 
                        `artists`.`ArtistID`,
                            `artists`.`ArtistName` ,
                            `artists`.`Country` ,
                            `artists`.`ArtistImage`
                        ORDER BY 
                            `counts` DESC LIMIT 10") as $row) { ?>
                            <div class="swiper-slide">
                                <div class="host-card host-card-2 position-relative mx-auto">
                                    <div class="host-profile position-relative">
                                        <div class="img-area overflow-hidden">
                                            <div class="overlay"></div>
                                            <img class="w-100 rounded" src="<?= $row['ArtistImage'] ?>" alt="profile">
                                        </div>
                                        <div class="host-social-link position-absolute top-0 end-0 mt-xxl-5 mt-3 mx-5">
                                            <div class="social-link alt-link gap-xxl-5 gap-2">
                                                <button class="link-expand-btn">
                                                    <i class="ti ti-plus"></i>
                                                </button>
                                                <ul class="social-link-items">
                                                    <li><a href="#" class="social-link-item"><i class="ti ti-brand-dribbble"></i></a></li>
                                                    <li><a href="#" class="social-link-item"><i class="ti ti-brand-facebook"></i></a></li>
                                                    <li><a href="#" class="social-link-item"><i class="ti ti-brand-twitter"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="host-info position-absolute bottom-0 start-0 w-100 mb-lg-6 mb-4 text-center">
                                        <h4 class="fw-semibold mb-2">
                                            <a href="/singer/<?= $row['ArtistSlug'] ?>" class="link-text">
                                                <?= $row['ArtistName'] ?>
                                            </a>
                                        </h4>
                                        <span class="fs-sm"> <?= $row['Country'] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="swiper-btns swiper-bottom-btn d-flex d-lg-none align-items-center justify-content-center gap-4 mt-sm-6 mt-4">
                        <div class="host-swiper-prev button-prev fs-lg">
                            <i class="ti ti-chevron-left"></i>
                        </div>
                        <div class="host-swiper-next button-next fs-lg">
                            <i class="ti ti-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- call to action section 03 end -->

<!-- news letter section 02 start  -->

<!-- news letter section 02 end  -->
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/footer.php');
?>