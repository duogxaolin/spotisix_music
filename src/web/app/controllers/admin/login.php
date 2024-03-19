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
    $type = 'email';
}else if(check_phone($username) == True){
    $type = 'phone';
}else{
    $type = 'username';
}
$row = $duogxaolin->get_row(" SELECT * FROM `admin` WHERE `$type` = '$username'");
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
if(checkCode($row['secret'], $password) == false){
    $return['status'] = 'error';
    $return['msg']   = $row['secret'];
    die(json_encode($return));
}
$duogxaolin->update("admin", [
    'token'  => md5($password),
    'ip'     => myip(),
    'time'       => time()
], " `$type` = '$username' ");
setcookie("admin_session",md5($password),$expiration, "/");
$return['status'] = 'success';
$return['href'] = $duogxaolin->home_url().'/admin';
$return['msg']   = 'Đăng nhập thành công ';
die(json_encode($return));
?>