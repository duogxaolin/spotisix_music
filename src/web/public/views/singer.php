<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
?>
<!-- hero section start  -->
<section class="hero-section inner-hero-section overflow-hidden texture-bg pt-120 pb-120">
    <div class="vector-line position-absolute top-50 start-50 translate-middle w-100 h-100 z-n1">
        <img class="w-100" src="/assets/img/vector-line-2.png" alt="line">
    </div>
    <div class="circle-shape shape-1 d-none d-md-block">
        <img class="w-100" src="/assets/img/shape-1.png" alt="shape">
    </div>
    <div class="circle-shape shape-2 d-none d-md-block">
        <img class="w-100" src="/assets/img/shape-2.png" alt="shape">
    </div>
    <div class="container">
        <div class="circle-shape shape-3 d-none d-md-block">
            <img class="w-100" src="/assets/img/shape-3.png" alt="shape">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="hero-content text-center">
                    <div class="img-area mb-4 mx-auto">
                        <img class="w-100" src="/assets/img/racode-track.png" alt="image">
                    </div>
                    <h1 class="display-two mb-lg-10 mb-sm-6 mb-4">Danh Sách <span class="tcp-1"> Ca Sĩ</span></h1>
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero section end  -->

<!-- host profile section start  -->
<section class="host-profile-section pt-120 pb-120 texture-bg-2">
    <div class="container">
        <div class="row g-6">
            <?php foreach ($duogxaolin->get_list("SELECT * FROM `artists` LIMIT 10") as $row) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="host-card" data-aos="fade-up">
                        <div class="host-profile position-relative pb-5">
                            <div class="img-area overflow-hidden">
                                <img class="w-100 rounded" src="<?= $row['ArtistImage'] ?>" alt="profile">
                            </div>
                            <div class="host-social-link d-flex justify-content-end align-items-end v-line mx-5">
                                <div class="social-link">
                                    <ul class="social-link-items">
                                        <li><a href="#" class="social-link-item"><i class="ti ti-brand-dribbble"></i></a></li>
                                        <li><a href="#" class="social-link-item"><i class="ti ti-brand-facebook"></i></a></li>
                                        <li><a href="#" class="social-link-item"><i class="ti ti-brand-twitter"></i></a>
                                        </li>
                                    </ul>
                                    <button class="link-expand-btn">
                                        <i class="ti ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="host-info mt-lg-5 mt-2 ms-5">
                            <a href="host-details.html" class="fs-four fw-semibold link-text mb-md-2"><?= $row['ArtistName'] ?></a>
                            <span class="fs-sm"><?= $row['Country'] ?></span>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
        <!-- pagination start -->
        <div class="row justify-content-center mt-lg-10 mt-sm-8 mt-6">
            <div class="col-6">
                <nav class="pagination d-center" aria-label="pagination">
                    <ul class="pagination-items d-center gap-3">
                        <li><a href="#"><i class="ti ti-arrow-left"></i>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#"><i class="ti ti-arrow-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- pagination end -->
    </div>
</section>
<!-- host profile section end -->

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/footer.php');
?>