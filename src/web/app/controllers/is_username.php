<?php
    if (isset($_COOKIE['session_token'])) {
        $token = $_COOKIE['session_token'];
        $auth = $duogxaolin->get_row(" SELECT * FROM `listeners` WHERE `token` = '$token'");
        if (!$auth) {
            setcookie("session_token", "", time() - 3600, "/");
        }
    }
function checklogin()
{
    global $duogxaolin;
    if (!isset($_COOKIE['session_token'])) {
        if ($duogxaolin->home_uri() != '/login') {
            header('location:' . $duogxaolin->home_url() . '/login');
            die();
        }
    }
}

function nonlogin()
{
    global $duogxaolin;
    if (isset($_COOKIE['session_token'])) {
            header('location:' . $duogxaolin->home_url() );
            die();
    }
}