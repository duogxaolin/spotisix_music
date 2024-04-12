<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
?>

<section class="sign-up auth-container inner-hero-section overflow-hidden texture-bg-2">
        <div class="top-wave-shape">
            <img class="w-100" src="assets/img/top-wave-shape-2.png" alt="wave shape">
        </div>
        <div class="circle-shape shape-1 alt d-none d-md-block">
            <img class="w-100" src="/assets/img/shape-1.png" alt="shape">
        </div>
        <div class="circle-shape shape-2 alt d-none d-md-block">
            <img class="w-100" src="/assets/img/shape-2.png" alt="shape">
        </div>
        <div class="circle-shape shape-3 alt d-none d-md-block">
            <img class="w-100" src="/assets/img/shape-3.png" alt="shape">
        </div>
        <div class="container pt-120 pb-120">
            <div class="row g-6 justify-content-between">
                <div class="col-lg-6">
                    <div class="sign-up-form" data-aos="fade-up">
                    <form submit-ajax="duogxaolin" action="/api/auth/register" class="auth-form p-xl-8 p-4 bgc-2 rounded" method="POST">
                            <div class="form-content mb-lg-10 mb-sm-8 mb-6">
                                <h3 class="mb-4">Let’s Get Started!</h3>
                                <p>Please Enter your Email Address to Start your Online Application</p>
                            </div>
                            <div class="d-grid gap-lg-6 gap-4">
                            <div class="input-wrapper alt-color d-grid gap-4 w-100">
                                    <label for="email">Fullname</label>
                                    <input type="email" id="email" name="fullname" placeholder="Fullname">
                                </div>
                                <div class="input-wrapper alt-color d-grid gap-4 w-100">
                                    <label for="email">Enter Your Email ID</label>
                                    <input type="email" id="email" name="username" placeholder="Your email ID here">
                                </div>
                                <div class="input-wrapper alt-color d-grid gap-4 w-100">
                                    <label for="password">Enter Your Password</label>
                                    <div class="input-password d-flex align-items-center bgc-1 rounded-pill">
                                        <input type="password" id="password" placeholder="Enter password" name="password">
                                        <span class="show-password cursor-pointer px-3">
                                            <i class="ti ti-eye-closed"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <p class="my-lg-8 my-sm-6 my-4">
                                By clicking signing up, you agree to our <a href="#" class="tcp-1">Terms and
                                    Conditions</a>, <a href="#" class="tcp-1"> Privacy Policy </a>, E-sign &amp;
                                Communication Authorization
                            </p>
                            <button type="submit" class="bttn-1">
                                Sign Up
                                <span class=" icon d-center icon-right">
                                    <i class="ti ti-arrow-narrow-right"></i>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-xxl-5 col-lg-6">
                    <div class="auth-banner" data-aos="fade-down">
                        <img class="w-100" src="/assets/img/sign-up-img.png" alt="sign up">
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