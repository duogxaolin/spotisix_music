<?php
require __DIR__ . '/vendor/autoload.php';

$connect = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'spotisix'
);

require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/helper.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/libs.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/app/controllers/is_username.php');
if (isset($_COOKIE['session_token'])) {
    $token = $_COOKIE['session_token'];
    $auth = $duogxaolin->get_row(" SELECT * FROM `listeners` WHERE `token` = '$token'");
    if (!$auth) {
        setcookie("session_token", "", time() - 3600, "/");
    }
}
?>