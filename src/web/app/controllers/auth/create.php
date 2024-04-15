<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
$token = $_COOKIE['session_token'];
$row = $duogxaolin->get_row(" SELECT * FROM `listeners` WHERE `token` = '$token'");
if (!$row) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng đăng nhập để sử dụng dịch vụ ! ';
    die(json_encode($return));
}
if ($row['ArtistID'] != NULL) {
    $check_artist = $duogxaolin->num_rows("SELECT * FROM `artists` WHERE `ArtistID` = '" . $row['ArtistID'] . "' ");
    if ($check_artist > 0) {
        $return['status'] = 'error';
        $return['msg']   = 'Bạn đã tạo thông tin cá nhân rồi ! ';
        die(json_encode($return));
    }
}

$title = xss($_POST['title']);
$Country = xss($_POST['Country']);
$Type = xss($_POST['Type']);
$Year = xss($_POST['year']);
$Images = xss($_POST['Images']);
$editordata = ($_POST['editordata']);
if (empty($title)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập tên ! ';
    die(json_encode($return));
}
if (empty($Country)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập quốc gia ! ';
    die(json_encode($return));
}
if (empty($Type)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập thể loại ! ';
    die(json_encode($return));
}
if (empty($Year)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập năm ! ';
    die(json_encode($return));
}
$slug = $duogxaolin->to_slug($title);

$query = "SELECT * FROM `artists` WHERE `ArtistSlug` = '$slug' ";
$check_slug = $duogxaolin->num_rows($query);
if ($check_slug > 0) {
    $slug = $slug . '-' . rand(1000, 9999);
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
if (empty($editordata)) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng nhập mô tả ! ';
    die(json_encode($return));
}

$create = $duogxaolin->insert("artists", [
    'ArtistName' => $title,
    'ArtistSlug' => $slug,
    'Country' => $Country,
    'BirthYear' => $Year,
    'ArtistNote' => $editordata,
    'ArtistImage' => $logo,
    'ArtistType' => $Type
]);
if ($create) {
    $sql = "SELECT MAX(`ArtistID`) AS `last_id` FROM `artists` WHERE `ArtistSlug` = '$slug' ";
    $result = mysqli_query($duogxaolin->connect_db(), $sql);
    $row = mysqli_fetch_assoc($result);
    $inserted_id = $row['last_id'];
    $duogxaolin->update("listeners", [
        'ArtistID' => $inserted_id
    ], " `token` = '$token' ");
    $return['status'] = 'success';
    $return['msg']   = 'Thêm thành công';
    die(json_encode($return));
}
