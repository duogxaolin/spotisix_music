<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$token = $_COOKIE['session_token'];
$type = xss($_GET['type']);
$code = xss($_GET['code']);
$songs = $duogxaolin->get_row(" SELECT * FROM `songs` WHERE `SongSlug` = '$code' ");
if ($songs) {

    $row = $duogxaolin->get_row(" SELECT * FROM `listeners` WHERE `token` = '$token'");
    // đã đăng nhập
    if ($row) { 
        $uuid = $token;
        $account = $row['ListenerID'];
        $time = 60;

        $count = $duogxaolin->get_row(" SELECT * FROM `playcount` WHERE `token` = '$uuid' AND  `SongID` = '".$songs['SongID']."'  ORDER BY `ListenDateTime` DESC ");
        if (!$count) {
            $duogxaolin->insert("playcount", [
                'token' => $uuid,
                'ListenerID' => $account,
                'SongID' => $songs['SongID'],
                'ListenDateTime' => time()
            ]);
        } else {
            if (time() - $count['ListenDateTime'] > $time) {
                echo time() - $count['ListenDateTime'];
                $duogxaolin->insert("playcount", [
                    'token' => $uuid,
                    'ListenerID' => $account,
                    'SongID' => $songs['SongID'],
                    'ListenDateTime' => time()
                ]);
            }
        }
        //chưa đăng nhập
    } else {
        if (isset($_COOKIE['uuid'])) {
            $uuid = $_COOKIE['uuid'];
        } else {
            $uuid = uniqid();
            setcookie('uuid', $uuid, time() + (86400 * 30), "/");
        }
        $time = 120;
        $count = $duogxaolin->get_row(" SELECT * FROM `playcount` WHERE `token` = '$uuid' AND  `SongID` = '".$songs['SongID']."' ORDER BY `ListenDateTime` DESC");
        print_r($count);
        if (!$count) {
            $duogxaolin->insert("playcount", [
                'token' => $uuid,
                'SongID' => $songs['SongID'],
                'ListenDateTime' => time()
            ]);
        } else {
            if (time() - $count['ListenDateTime'] > $time) {
                echo time() - $count['ListenDateTime'];
                $duogxaolin->insert("playcount", [
                    'token' => $uuid,
                    'SongID' => $songs['SongID'],
                    'ListenDateTime' => time()
                ]);
            }
        }
    }

} else {
    $return['status'] = 'error';
    $return['msg']   = 'Bài hát không tồn tại';
    die(json_encode($return));
}
