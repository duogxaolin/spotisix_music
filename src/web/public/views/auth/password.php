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
                <form submit-ajax="duogxaolin" action="/api/auth/password" class="auth-form p-xl-8 p-4 bgc-2 rounded" method="POST">
                    <div class="form-content mb-lg-10 mb-sm-8 mb-6">
                        <h3 class="mb-4">Đổi mật khẩu!</h3>
                       
                    </div>
                    <div class="d-grid gap-lg-6 gap-4">
                        
                    <div class="input-wrapper alt-color d-grid gap-4 w-100">
                            <label for="password">Mật Khẩu Hiện Tại</label>
                            <div class="input-password d-flex align-items-center bgc-1 rounded-pill">
                                <input type="password" id="password" placeholder="Enter password" name="password">
                                <span class="show-password cursor-pointer px-3">
                                    <i class="ti ti-eye-closed"></i>
                                </span>
                            </div>
                        </div>

                        <div class="input-wrapper alt-color d-grid gap-4 w-100">
                            <label for="password">Mật Khẩu Mới</label>
                            <div class="input-password d-flex align-items-center bgc-1 rounded-pill">
                                <input type="password" id="newpassword" placeholder="Enter password" name="newpassword">
                              
                            </div>
                        </div>

                        <div class="input-wrapper alt-color d-grid gap-4 w-100">
                            <label for="password">Nhập Lại Mật Khẩu</label>
                            <div class="input-password d-flex align-items-center bgc-1 rounded-pill">
                                <input type="password" id="password" placeholder="Enter password" name="renewpassword">
                               
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-lg-10 mb-sm-8 mb-6">
                        
                    </div>
                    <button type="submit" class="bttn-1">
                     Xác Nhận
                        <span class=" icon d-center icon-right">
                            <i class="ti ti-arrow-narrow-right"></i>
                        </span>
                    </button>
                </form>
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