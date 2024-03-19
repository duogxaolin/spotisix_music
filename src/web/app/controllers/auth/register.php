<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$username = check_string($_POST['username']);
$fullname = check_string($_POST['fullname']);
$password = check_string($_POST['password']);
if (empty($username)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập tên đăng nhập ! ';
    die(json_encode($return));
}
if (empty($fullname)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập họ và tên ! ';
    die(json_encode($return));
}
if (empty($password)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập mật khẩu ! ';
    die(json_encode($return));
}
if (strlen($password) < 6) {
    $return['status'] = 'error';
    $return['msg']   = 'Mật Khẩu trên 6 ký tự ! ';
    die(json_encode($return));
}
if (strlen($password) > 64) {
    $return['status'] = 'error';
    $return['msg']   = 'Mật Khẩu dưới 64 ký tự ! ';
    die(json_encode($return));
}
if (strlen($fullname) > 250) {
    $return['status'] = 'error';
    $return['msg']   = 'Tên Hiển thị dưới 250 ký tự ! ';
    die(json_encode($return));
}
if (strlen($username) < 6) {
    $return['status'] = 'error';
    $return['msg']   = 'Tên đăng nhập trên 6 ký tự ! ';
    die(json_encode($return));
}
if (strlen($email) > 250) {
    $return['status'] = 'error';
    $return['msg']   = 'Email dưới 250 ký tự ! ';
    die(json_encode($return));
}
if (check_email($username) != True) {
    $return['status'] = 'error';
    $return['msg']   = 'Email Không Hợp Lệ ! ';
    die(json_encode($return));
}
if ($duogxaolin->get_row(" SELECT * FROM `listeners` WHERE `Email` = '$username'  ")) {
    $return['status'] = 'error';
    $return['msg']   = 'Email đã tồn tại!';
    die(json_encode($return));
}
$token = md5($password . time());
$create = $duogxaolin->insert("listeners", [
    'Email' => $username,
    'ListenerName' => $fullname,
    'token' => $token,
    'Password' => $password,

]);
if ($create) {
    setcookie("session_token","$token",$expiration, "/");
    $return['status'] = 'success';
    $return['time'] = '15000';
    $return['msg']   = 'Đăng ký thành công';
    die(json_encode($return));
} else {
    $return['status'] = 'error';
    $return['msg']   = 'Có lỗi xảy ra ! ';
    die(json_encode($return));
}
