<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$mod = $duogxaolin->get_row("SELECT * FROM `admin` WHERE `token` = '" . $_COOKIE['admin_session'] . "'");

if (!$mod) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng đăng nhập để sử dụng dịch vụ ! ';
    die(json_encode($return));
}

$action = check_string($_POST['action']);
if ($action == 'create') {
    $name = xss($_POST['name']);
    $year = xss($_POST['year']);
    $country = xss($_POST['country']);
    $note = xss($_POST['note']);
    $logo = xss($_POST['logo']);
    $slug = $duogxaolin->to_slug($name);
    if($name == ''){
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập tên nghệ sĩ';
        die(json_encode($return));
    }
    if($year == ''){
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập năm sinh';
        die(json_encode($return));
    }
    if($country == ''){
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập quốc gia';
        die(json_encode($return));
    }
    if($note == ''){
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập thông tin thêm';
        die(json_encode($return));
    }
    
    if (check_img('attachments') == true) {
        $file_name = $_FILES['attachments']['name'];
        $tmp_name  = $_FILES['attachments']['tmp_name'];
        $fileSize = $_FILES['attachments']['size'];
        $maxFileSize = 6048000; // Giới hạn dung lượng tối đa (vd: 2MB)
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $return['status'] = 'error';
            $return['msg']   = 'Chỉ chấp nhận ảnh jpg,jpeg,png,gif';
            die(json_encode($return));
        }
        if (in_array($file_extension, $allowed_extensions)) {
            //up ảnh lên server
            $targetDir = "../../../assets/images/"; // Thư mục lưu trữ hình ảnh
            $targetFile = $targetDir . basename($file_name);
            $rands = rand(0, 1000) . random(time(), 5);
            $logo      =  $slug . "_" . $rands . ".png";
            $create = move_uploaded_file($tmp_name, $targetDir . "/" . $logo);
            $logo      = '/assets/images/' . $slug . "_" . $rands . ".png";
        } else {
            $return['status'] = 'error';
            $return['msg']   = 'Định dạng ảnh không hợp lệ! hãy kiểm tra lại và đảm bảo tải lên ít nhất một ảnh ';
            die(json_encode($return));
        }
    } else {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng chọn ảnh';
        die(json_encode($return));
    }
    $create = $duogxaolin->insert("artists", [
        'ArtistName' => $name,
        'ArtistSlug' => $slug,
        'Country' => $country,
        'BirthYear' => $year,
        'ArtistNote' => $note,
        'ArtistImage' => $logo
    ]);
    if ($create) {
        $return['status'] = 'success';
        $return['msg']   = 'Thêm thành công';
        die(json_encode($return));
    } 
}

if ($action == 'edit') {
    $id = xss($_POST['id']);
    $title = xss($_POST['title']);
    $logo = xss($_POST['logo']);
    $status = xss($_POST['status']);
    $slug = $duogxaolin->to_slug($title);
    $code = layChuCaiDau($title);
    $color = xss($_POST['color']);
    $row = $duogxaolin->get_row("SELECT * FROM `game` WHERE `id` = '$id' ");
    if (!$row) {
        $return['status'] = 'error';
        $return['msg']   = 'Tên game không tồn tại';
        die(json_encode($return));
    }
    if (check_img('attachments') == true) {
        $file_name = $_FILES['attachments']['name'];
        $tmp_name  = $_FILES['attachments']['tmp_name'];
        $fileSize = $_FILES['attachments']['size'];
        $maxFileSize = 6048000; // Giới hạn dung lượng tối đa (vd: 2MB)
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $return['status'] = 'error';
            $return['msg']   = 'Chỉ chấp nhận ảnh jpg,jpeg,png,gif';
            die(json_encode($return));
        }
        if (in_array($file_extension, $allowed_extensions)) {
            //up ảnh lên server
            $targetDir = "../../../assets/images/"; // Thư mục lưu trữ hình ảnh
            $targetFile = $targetDir . basename($file_name);
            $rands = rand(0, 1000) . random(time(), 5);
            $logo      = 'game' . $slug . "_" . $rands . ".png";
            $create = move_uploaded_file($tmp_name, $targetDir . "/" . $logo);
            $logo      = '/assets/images/game' . $slug . "_" . $rands . ".png";
        } else {
            $logo = $row['game_logo'];
        }
    } else {
        $logo = $row['game_logo'];
    }
    $create = $duogxaolin->update("game", [
        'game_name' => $title,
        'game_slug' => $slug,
        'code' => $code,
        'game_logo' => $logo,
        'game_color' => $color,
        'game_status' => $status
    ], " `id` = '$id' ");
    if ($create) {
        $return['status'] = 'success';
        $return['msg']   = 'Sửa game thành công';
        die(json_encode($return));
    } else {
        $return['status'] = 'error';
        $return['msg']   = 'Lỗi';
        die(json_encode($return));
    }
}
if ($action == 'content') {
    $code = xss($_POST['code']);
    $select = $duogxaolin->get_row("SELECT * FROM `game_code` WHERE `id` = '$code' ");
    if (!$select) {
        $return['status'] = 'error';
        $return['msg']   = 'Không tìm thấy mã loại';
        die(json_encode($return));
    }
    $name = xss($_POST['name']);
    $link = xss($_POST['link']);
    $duogxaolin->insert("game_select", [
        'code_id' => $code,
        'name' => $name,
        'link' => $link,
        'slug' => $duogxaolin->to_slug($name)
    ]);
    $return['status'] = 'success';
    $return['msg']   = 'Thêm thành công';
    die(json_encode($return));
}
if ($action == 'loai') {
    $game = xss($_POST['game']);
    $select = $duogxaolin->get_row("SELECT * FROM `game` WHERE `id` = '$game' ");
    if (!$select) {
        $return['status'] = 'error';
        $return['msg']   = 'Không tìm thấy game';
        die(json_encode($return));
    }
    $name = xss($_POST['name']);
    $slug = $duogxaolin->to_slug($_POST['slug']);
    $type = xss($_POST['type']);
    $duogxaolin->insert("game_code", [
        'game_id' => $game,
        'name' => $name,
        'type' => $type,
        'slug' => $slug
    ]);
    $return['status'] = 'success';
    $return['msg']   = 'Thêm thành công';
    die(json_encode($return));
}
