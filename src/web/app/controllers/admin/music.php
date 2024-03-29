<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$mod = $duogxaolin->get_row("SELECT * FROM `admin` WHERE `token` = '" . $_COOKIE['admin_session'] . "'");

if (!$mod) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng đăng nhập để sử dụng dịch vụ ! ';
    die(json_encode($return));
}

$action = check_string($_POST['action']);
    $name = xss($_POST['name']);
    $code = xss($_POST['singer']);
    $music = $_FILES["music"]["name"];
    $slug = $duogxaolin->to_slug($name);
    if ($name == '') {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập tên bài hát';
        die(json_encode($return));
    }
    $row  = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistSlug` = '$code'");
    if (!$row) {
        $return['status'] = 'error';
        $return['msg']   = 'Nghệ sĩ không tồn tại';
        die(json_encode($return));
    }
    if (!$music) {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng chọn file nhạc';
        die(json_encode($return));
    } else {
        $targetDir = "../../../assets/music/"; // Thư mục lưu trữ hình ảnh
        $targetFile = $targetDir . basename($music);
        $new_name = $slug.".mp3"; 
        $target_file = $targetDir . $new_name;
        $upmusic = move_uploaded_file($_FILES["music"]["tmp_name"], $target_file);
        if(!$upmusic){
            $return['status'] = 'error';
            $return['msg']   = 'Lỗi tải file nhạc';
            die(json_encode($return));
        }
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
    $create = $duogxaolin->insert("songs", [
        'SongName' => $name,
        'SongSlug' => $slug,
        'ArtistID' => $row['ArtistID'],
        'Duration' => date("d/m/Y",time()),
        'SongLogo' => $logo,
        'FilePath' =>  '/assets/music/' . $new_name
    ]);
    if ($create) {
        $return['status'] = 'success';
        $return['msg']   = 'Thêm thành công';
        die(json_encode($return));
    }else{
        $return['status'] = 'error';
        $return['msg']   = 'Lỗi hệ thống';
        die(json_encode($return));
    }