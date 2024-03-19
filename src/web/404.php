<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
?>
<section class="error-page inner-hero-section overflow-hidden texture-bg-2">
    <div class="top-wave-shape">
        <img class="w-100" src="/assets/img/top-wave-shape-2.png" alt="wave shape">
    </div>
    <div class="circle-shape shape-1 alt d-none d-sm-block">
        <img class="w-100" src="/assets/img/shape-1.png" alt="shape">
    </div>
    <div class="circle-shape shape-2 alt d-none d-sm-block">
        <img class="w-100" src="/assets/img/shape-2.png" alt="shape">
    </div>
    <div class="circle-shape shape-3 alt d-none d-sm-block">
        <img class="w-100" src="/assets/img/shape-3.png" alt="shape">
    </div>
    <div class="container pt-120 pb-120">
        <div class="row g-6 justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="error-banner">
                    <img class="w-100" src="/assets/img/error-banner.png" alt="sign up">
                </div>
                <div class="error-text mt-lg-15 mt-sm-10 mt-6 text-center">
                    <h4 class="display-four mb-lg-6 mb-4">Oops! Page Not Found</h4>
                    <p class="mb-0">The page you are looking for does not exist. Please check the URL and try again.
                    </p>
                    <a href="/" class="bttn-1 mt-lg-10 mt-6">Go Back Home <span class=" icon d-center icon-right">
                            <i class="ti ti-arrow-narrow-right"></i>
                        </span></a>
                </div>
            </div>

        </div>
    </div>
    <div class="bottom-wave-shape">
        <img class="w-100" src="/assets/img/bottom-wave-shape-2.png" alt="wave shape">
    </div>
</section>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/footer.php');
?>