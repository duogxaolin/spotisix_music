<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
if (!$auth) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng đăng nhập để sử dụng dịch vụ ! ';
    die(json_encode($return));
}
$ArtistID = $auth['ArtistID'];
if ($auth['ArtistID'] != NULL) {
    $check_artist = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '$ArtistID'");
    if (!$check_artist) {
        $return['status'] = 'error';
        $return['msg']   = 'Id Không hợp lệ ';
        die(json_encode($return));
    }
} else {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng đăng ký trước! ';
    die(json_encode($return));
}
$action = xss($_POST['action']);
if ($action == 'delete') {
    $id = xss($_POST['id']);
    $check_song = $duogxaolin->get_row("SELECT * FROM `songs` WHERE `SongID` = '$id' AND `ArtistID` = '$ArtistID' ");
    if ($check_song) {
        $duogxaolin->remove("playcount", " `SongID` = '$id' AND `ArtistID` = '$ArtistID' ");
        $delete = $duogxaolin->remove("songs", " `SongID` = '$id' AND `ArtistID` = '$ArtistID' ");
        if ($delete) {
            $return['status'] = 'success';
            $return['msg']   = 'Xóa thành công';
            die(json_encode($return));
        } else {
            $return['status'] = 'error';
            $return['msg']   = "songs `SongID` = '$id' AND `ArtistID` = '$ArtistID' ";
            die(json_encode($return));
        }
    } else {
        $return['status'] = 'error';
        $return['msg']   = 'Xóa thất bại, bài hát không tồn tại hoặc bạn không có quyền sửa';
        die(json_encode($return));
    }
} else if ($action == 'edit') {
    $id = xss($_POST['id']);
    $check_song = $duogxaolin->get_row("SELECT * FROM `songs` WHERE `SongID` = '$id' AND `ArtistID` = '$ArtistID' ");
    $slug = $check_song['SongSlug'];
    if (!$check_song) {
        $return['status'] = 'success';
        $return['data']   = 'bài hát không tồn tại hoặc bạn không có quyền sửa';
        die(json_encode($return));
    }
    $title = xss($_POST['title']);
    $Duration = xss($_POST['Duration']);
    if (empty($title)) {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập tên ! ';
        die(json_encode($return));
    }
    if (empty($Duration)) {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập ngày phát hành ! ';
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
            $logo = $check_song['SongLogo'];
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
            $logo = $check_song['SongLogo'];
        }
    } else {
        $logo = $check_song['SongLogo'];
    }
    if (isset($_FILES['mp3File'])) {
        $file = $_FILES['mp3File'];
        $tmp_name  = $file['tmp_name'];
        $file_name = $file['name'];
        $allowed_extensions = array('mp3', 'MP3');
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $audio = $check_song['FilePath'];
        } else {
            $fileType = mime_content_type($file['tmp_name']);
            if ($fileType != 'audio/mpeg') {
                $audio = $check_song['FilePath'];
            }
            $targetDir = "../../../assets/music/"; // Thư mục lưu trữ hình ảnh
            $targetFile = $targetDir . basename($file_name);
            $rands = rand(0, 1000) . random(time(), 5);
            $audio      =  $slug . "_" . $rands . ".mp3";
            $create = move_uploaded_file($tmp_name, $targetDir . "/" . $audio);
            $audio      = '/assets/music/' . $slug . "_" . $rands . ".mp3";
        }
    } else {
        $audio = $check_song['FilePath'];
    }
    $create = $duogxaolin->update("songs", [
        'SongName' => $title,
        'SongSlug' => $slug,
        'Duration' => $Duration,
        'SongLogo' => $logo,
        'FilePath' => $audio
    ], " `SongID` = '$id' ");
    if ($create) {
        $return['status'] = 'success';
        $return['msg']   = 'Sửa thành công';
        die(json_encode($return));
    }
} else if ($action == 'add') {
    $title = xss($_POST['title']);
    $Duration = xss($_POST['Duration']);
    $slug = $duogxaolin->to_slug($title);
    if (empty($title)) {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập tên ! ';
        die(json_encode($return));
    }
    if (empty($Duration)) {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập ngày phát hành ! ';
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
            $return['msg']   = 'Chỉ chấp nhận jpg, jpeg, png, gif ! ';
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
            $return['msg']   = 'Chỉ chấp nhận jpg, jpeg, png, gif ! ';
            die(json_encode($return));
        }
    } else {
        $return['status'] = 'error';
        $return['msg']   = 'Chỉ chấp nhận jpg, jpeg, png, gif ! ';
        die(json_encode($return));
    }
    if (isset($_FILES['mp3File'])) {
        $file = $_FILES['mp3File'];
        $tmp_name  = $file['tmp_name'];
        $file_name = $file['name'];
        $allowed_extensions = array('mp3', 'MP3');
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $return['status'] = 'error';
            $return['msg']   = 'Chỉ chấp nhận mp3 ! ';
            die(json_encode($return));
        } else {
            $fileType = mime_content_type($file['tmp_name']);
            if ($fileType != 'audio/mpeg') {
                $return['status'] = 'error';
                $return['msg']   = 'Chỉ chấp nhận mp3 ! ';
                die(json_encode($return));
            }
            $targetDir = "../../../assets/music/"; // Thư mục lưu trữ hình ảnh
            $targetFile = $targetDir . basename($file_name);
            $rands = rand(0, 1000) . random(time(), 5);
            $audio      =  $slug . "_" . $rands . ".mp3";
            $create = move_uploaded_file($tmp_name, $targetDir . "/" . $audio);
            $audio      = '/assets/music/' . $slug . "_" . $rands . ".mp3";
        }
    } else {
        $return['status'] = 'error';
        $return['msg']   = 'Chỉ chấp nhận mp3 ! ';
        die(json_encode($return));
    }
    $create = $duogxaolin->insert("songs", [
        'SongName' => $title,
        'ArtistID' => $ArtistID,
        'SongSlug' => $slug,
        'Duration' => $Duration,
        'SongSlug' => $slug,
        'SongLogo' => $logo,
        'FilePath' => $audio
    ]);
    $sql = "SELECT MAX(`SongID`) AS `last_id` FROM `songs` WHERE `SongSlug` = '$slug' ";
    $result = mysqli_query($duogxaolin->connect_db(), $sql);
    $row = mysqli_fetch_assoc($result);
    $inserted_id = $row['last_id'];
    $duogxaolin->insert("playcount", [
        'token' => 'admin',
        'ArtistID'   =>$ArtistID,
        'SongID' => $inserted_id,
        'ListenDateTime' => time()
    ]);
    if ($create) {
        $return['status'] = 'success';
        $return['href']  = '/dashboard/music';
        $return['msg']   = 'Thêm thành công';
        die(json_encode($return));
    }
}
