<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$oldpassword = check_string($_POST['password']);
$newpassword = check_string($_POST['newpassword']);
$renewpassword = check_string($_POST['renewpassword']);
$token = $_COOKIE['session_token'];
$row = $duogxaolin->get_row(" SELECT * FROM `listeners` WHERE `token` = '$token'");
if (!$row) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng đăng nhập để sử dụng dịch vụ ! ';
    die(json_encode($return));
}
if (empty($oldpassword)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập mật khẩu cũ ! ';
    die(json_encode($return));
}
if (empty($newpassword)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập mật khẩu mới ! ';
    die(json_encode($return));
}
if (empty($renewpassword)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập lại mật khẩu mới ! ';
    die(json_encode($return));
}
if (strlen($newpassword) < 6) {
    $return['status'] = 'error';
    $return['msg']   = 'Mật Khẩu trên 6 ký tự ! ';
    die(json_encode($return));
}
if (strlen($newpassword) > 64) {
    $return['status'] = 'error';
    $return['msg']   = 'Mật Khẩu dưới 64 ký tự ! ';
    die(json_encode($return));
}
if ($newpassword != $renewpassword) {
    $return['status'] = 'error';
    $return['msg']   = 'Mật khẩu mới không khớp ! ';
    die(json_encode($return));
}

if ($oldpassword !=  $row['Password']) {
    $return['status'] = 'error';
    $return['msg']   = 'Mật khẩu đăng nhập không chính xác ! ';
    die(json_encode($return));
}
if ($newpassword == $oldpassword) {
    $return['status'] = 'error';
    $return['msg']   = 'Mật khẩu cũ không được trùng với mật khẩu mới ! ';
    die(json_encode($return));
}
$duogxaolin->update("listeners", [
    'Password'  => $newpassword,
], " `ListenerID` = '" . $row['ListenerID'] . "' ");
$return['status'] = 'success';
$return['msg']   = 'Đổi mật khẩu thành công ';
die(json_encode($return));
