<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
if (isset($_GET['code'])) {
    $token = $google->fetchAccessTokenWithAuthCode($_GET['code']);
    // echo json_encode($token, true);

    if (isset($token['error'])) {
        header('location:' . $duogxaolin->home_url() . '/customer/login?error=g');
        die();
    }
    $google->setAccessToken($token);
    $user_info = $google_service->userinfo->get();
    // echo json_encode($user_info, true);
    // print_r($user_info);
    // In thông tin người dùng
    $name = $user_info->getName();
    $email = $user_info->getEmail();
    $picture = $user_info->getPicture();
    $id = $user_info->getId();
    // kiểm tra email xem có chưa
    $check = $duogxaolin->get_row("SELECT * FROM `users` WHERE `email` = '" . $email . "' ");
    if ($check) {
        if ($check['banned'] != 0) {
            header('location:' . $duogxaolin->home_url() . '/customer/login?error=b&text=' . $row['reason_banned']);
            die();
        }
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
        $browser = $result->browser->name ?? "N/A";
        $browser_ver = $result->browser->version->value ?? "N/A";
        $os_name = $result->os->name ?? "N/A";
        $os_ver = $result->os->version->value ?? "N/A";

        $device_manufacturer = $result->device->manufacturer ?? "";
        $device_model = $result->device->model ?? "";
        $device_identifier = $result->device->identifier ?? "";
        $device_id = md5($userAgent);

        $check_devices = $duogxaolin->get_row("SELECT * FROM  `user_devices` WHERE `device_id` = '$device_id' AND `user_id` = '" . $check['id'] . "'");
        if ($check_devices) {
            $token = $check_devices['token'];
            $token = preg_replace('/[^a-zA-Z0-9]/', '', $token);
            $duogxaolin->update("user_devices", [
                'update_date' => time(),
                'ip' => myip(),
                'token' => $token,
                'browser' => $browser,
                'browser_ver' => $browser_ver,
                'os_name' => $os_name,
                'os_ver' => $os_ver,
                'status' => 1,
                'verify' => 1,
                'otp'    => 1,
                'device_manufacturer' => $device_manufacturer,
                'device_model' => $device_model,
                'expiration' => $expiration,
                'device_identifier' => $device_identifier,
                'login'  => 'google'
            ], "device_id = '$device_id' AND `user_id` = '" . $check['id'] . "'");
        } else {
            $token = password_hash($check['username'] . $check['password'] . md5(md5($userAgent)), PASSWORD_DEFAULT);
            $token = preg_replace('/[^a-zA-Z0-9]/', '', $token);
            $ct =  $duogxaolin->insert("user_devices", [
                'device_id' => $device_id,
                'user_id' => $check['id'],
                'create_date' => time(),
                'update_date' => time(),
                'ip' => myip(),
                'status' => 1,
                'token' => $token,
                'password' =>  password_hash($check['password'], PASSWORD_DEFAULT),
                'browser' => $browser,
                'browser_ver' => $browser_ver,
                'os_name' => $os_name,
                'os_ver' => $os_ver,
                'device_manufacturer' => $device_manufacturer,
                'device_model' => $device_model,
                'device_identifier' => $device_identifier,
                'expiration' => $expiration,
                'verify' => 1,
                'otp'    => 1,
                'login'  => 'google'
            ]);
        }

        $duogxaolin->update("users", [
            'password'  => password_hash($check['password'], PASSWORD_DEFAULT),
            'google_id' => $google_id,
            'time'       => time()
        ], " `email` = '$email' ");
        setcookie("session_token", "$token", $expiration, "/");
        $_SESSION['username'] = $row['username'];
        header('location:' . $duogxaolin->home_url());
        die();
    } else {
        $index_at = strpos($email, "@");
        if ($index_at !== false) {
            $username = substr($email, 0, $index_at);
        }
        $check_username = $duogxaolin->get_row("SELECT * FROM `users` WHERE `username` = '" . $username . "' ");
        if ($check_username) {
            $nums_username = $duogxaolin->num_rows("SELECT * FROM `users` WHERE `username` = '" . $username . "' ");
            $nums_username = $nums_username + 1;
            $username = $username . $nums_username;
        }

        $password = random('qwertyuiopasdfghjkcvbnm1234567890', 6);

        $create = $duogxaolin->insert("users", [
            'username' => $username,
            'fullname' => $name,
            'email' => $email,
            'wallet_num' => '00' . random(time(), 8),
            'password' => password_hash(md5(md5($password)), PASSWORD_DEFAULT),
            'money' => 0,
            'level' => 0,
            'used_money' => 0,
            'total_money' => 0,
            'banned' => 0,
            'images' => $picture,
            'ip' => myip(),
            'agent_id' => myagent(),
            'time' => time(),
            'createdate' => gettime(),
            'updatetime' => gettime(),
            'google_id'  => $id
        ]);
        if (!$create) {
            die('error creating');
        }
        $subject = 'Welcome to ' . $duogxaolin->site('site_name') . ' !';

        $content = '<strong> Xin chào: {fullname} </strong>
        <ul>
            <li>Bạn vừa đăng ký tài khoản tại {domain} bằng tài khoản google</li>
            <li>Tài Khoản: {username}</li>
            <li>Mật Khẩu: {password}</li>
            <li>Thời gian: {gettime}</li>
        </ul>';

        $content = str_replace("{gettime}", gettime(), $content);
        $content = str_replace("{fullname}", $name, $content);
        $content = str_replace("{password}", $password, $content);
        $content = str_replace("{email}", $email, $content);
        $content = str_replace("{username}", $username, $content);
        $content = str_replace("{domain}", $duogxaolin->home_url(), $content);
        $bcc = array(
            $email
        );
        $send = sendCSM($subject, $content, $bcc);
        $send = json_decode($send, true);
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
        $browser = $result->browser->name ?? "N/A";
        $browser_ver = $result->browser->version->value ?? "N/A";
        $os_name = $result->os->name ?? "N/A";
        $os_ver = $result->os->version->value ?? "N/A";

        $device_manufacturer = $result->device->manufacturer ?? "";
        $device_model = $result->device->model ?? "";
        $device_identifier = $result->device->identifier ?? "";
        $device_id = md5($userAgent);
        $token = password_hash($username . $password . md5(md5($userAgent)), PASSWORD_DEFAULT);
        $token = preg_replace('/[^a-zA-Z0-9]/', '', $token);
        $sql = "SELECT MAX(`id`) AS `last_id` FROM `users` WHERE `email` = '" . $email . "'";
        $result = mysqli_query($duogxaolin->connect_db(), $sql);
        $row = mysqli_fetch_assoc($result);
        $inserted_id = $row['last_id'];
        $ct =  $duogxaolin->insert("user_devices", [
            'device_id' => $device_id,
            'user_id' => $inserted_id,
            'create_date' => time(),
            'update_date' => time(),
            'ip' => myip(),
            'status' => 1,
            'token' => $token,
            'password' =>  password_hash($password, PASSWORD_DEFAULT),
            'browser' => $browser,
            'browser_ver' => $browser_ver,
            'os_name' => $os_name,
            'os_ver' => $os_ver,
            'device_manufacturer' => $device_manufacturer,
            'device_model' => $device_model,
            'device_identifier' => $device_identifier,
            'expiration' => $expiration,
            'verify' => 1,
            'otp'    => 1,
            'login'  => 'google'
        ]);
        setcookie("session_token", "$token", $expiration, "/");
        $_SESSION['username'] = $username;
        header('location:' . $duogxaolin->home_url());
        die();
    }
}