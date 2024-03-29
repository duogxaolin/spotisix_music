<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once('includes/head.php');
$login_google  = $google->createAuthUrl();
if (isset($_GET['code'])) {
    $token = $google->fetchAccessTokenWithAuthCode($_GET['code']);
    if (isset($token['error'])) {
        header('location:' . $duogxaolin->home_url() . '/admin/login?error=g');
        die();
    }
    $google->setAccessToken($token);
    $user_info = $google_service->userinfo->get();
    $name = $user_info->getName();
    $email = $user_info->getEmail();
    $picture = $user_info->getPicture();
    $id = $user_info->getId();
    $check = $duogxaolin->get_row("SELECT * FROM `admin` WHERE `email` = '" . $email . "' ");
    if ($check) {
        $token = md5(time());
        $duogxaolin->update("admin", [
            'token' => $token,
            'time'       => time()
        ], " `email` = '$email' ");
        setcookie("admin_session", "$token", $expiration, "/");
        header('location:' . $duogxaolin->home_url().'/admin');
        die();
    }else{
        header('location:' . $duogxaolin->home_url() . '/admin/login?error=b&text= Tài khoản chưa có trong hệ thống');
        die();
    }
}
?>

<body class="login-page" style="min-height: 494.802px;" cz-shortcut-listen="true">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
            <?php if (isset($_GET['error'])) {
                            if (($_GET['error']) == 'g') {
                        ?>
                <div class="p-3 mb-2 bg-danger text-white">Đăng nhập bằng google thất bại ! Vui lòng đăng nhập lại</div>
                            <?php } else if ($_GET['error'] == 'b' ){ ?>
                                <div class="p-3 mb-2 bg-danger text-white"><?=xss($_GET['text'])?></div>

                        <?php }
                        } ?>
                <p class="login-box-msg">Sign in to start your session</p>
                <div class="social-auth-links text-center mb-3">
                    <a href="<?=$login_google?>" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
            </div>

        </div>
    </div>
</body>
<?php
require_once('includes/foot.php');
?>