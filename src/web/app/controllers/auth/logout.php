<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
if($session){
    $set =  $duogxaolin->update("user_devices", [
        'status' => 0
    ], "id = '".$session['id']."'");
    setcookie('session_token', '', time() - 3600, '/');
    session_start();
    session_destroy();
    $return['status'] = 'success';
    $return['msg']   = 'Đã đăng xuất';
    die(json_encode($return));
}else{
    setcookie('session_token', '', time() - 3600, '/');
    session_start();
    session_destroy();
    $return['status'] = 'error';
    $return['msg']   = 'Thông tin không hợp lệ';
    die(json_encode($return));
}
?>