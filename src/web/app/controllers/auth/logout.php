<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
    setcookie('session_token', '', time() - 3600, '/');
    session_start();
    session_destroy();
    $return['status'] = 'success';
    $return['msg']   = 'Đã đăng xuất';
    die(json_encode($return));
?>