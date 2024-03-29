<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$email = check_string($_POST['email']);
if (check_email($email) != True) {
    $return['status'] = 'error';
    $return['msg']   = 'Email không đúng định dạng';
    die(json_encode($return));
}

$create = $duogxaolin->insert("registration", [
    'email' => $email,
    'create_date' => time(),
    'ip' => myip(),

]);
$subject = 'Recovery';
$content = $duogxaolin->site('recovery');

$content = str_replace("{gettime}", gettime(), $content);
$content = str_replace("{fullname}", $check['fullname'], $content);
$content = str_replace("{otp}", $otp, $content);
$content = str_replace("{email}", $email, $content);
$content = str_replace("{username}", $check['username'], $content);
$content = str_replace("{domain}", $duogxaolin->home_url(), $content);
$content =  str_replace("{token}", $token, $content);
$bcc = array(
    $email
);
$send = sendCSM($subject, $content, $bcc);
$send = json_decode($send, true);
if ($send['status'] == 'success') {
    $return['status'] = 'success';
    $return['time'] = 50000;
    $return['redirect'] = 'success';
    $return['msg']   = 'Vui lòng kiểm tra email để tiếp tục';
    die(json_encode($return));
} else {
    $return['status'] = 'error';
    $return['msg']   = $send['msg'];
    die(json_encode($return));
}
$return['status'] = 'success';
$return['time']  = 5000;
$return['msg']   = 'Đăng ký thành công! chúng tôi sẽ liên hệ cho bạn qua email ';
die(json_encode($return));
