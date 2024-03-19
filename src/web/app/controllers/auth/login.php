<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$username = check_string($_POST['username']);
$password = check_string($_POST['password']);
if(empty($username))
{
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập tên đăng nhập ! ';
    die(json_encode($return));
}
if(check_email($username) == True){
    $type = 'Email';
}
$row = $duogxaolin->get_row(" SELECT * FROM `listeners` WHERE `$type` = '$username'");
if(!$row)
{
    $return['status'] = 'error';
    $return['msg']   = 'Tên đăng nhập không tồn tại ';
    die(json_encode($return));
}
if(empty($password))
{
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập mật khẩu ! ';
    die(json_encode($return));
}
if ($password != $row['Password']) {
    $return['status'] = 'error';
    $return['msg']   = 'Tài Khoản hoặc Mật khẩu đăng nhập không chính xác ! ';
    die(json_encode($return));
}
$token = md5($row['username'] . time());
$duogxaolin->update("listeners", [
    'token'       => $token
], " `$type` = '$username' ");
setcookie("session_token","$token",$expiration, "/");
$return['status'] = 'success';
$return['href'] = $duogxaolin->home_url();
$return['msg']   = 'Đăng nhập thành công ';
die(json_encode($return));
?>