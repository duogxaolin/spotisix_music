<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
if (!$auth) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng đăng nhập để sử dụng dịch vụ ! ';
    die(json_encode($return));
}
$id = $auth['ArtistID'];
if ($auth['ArtistID'] != NULL) {
    $check_artist = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '$id'");
    if (!$check_artist) {
        $return['status'] = 'error';
        $return['msg']   = 'Id Không hợp lệ ';
        die(json_encode($return));
    }
}else{
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng đăng ký trước! ';
    die(json_encode($return));

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
if (check_img('attachments') == true) {
    $file_name = $_FILES['attachments']['name'];
    $tmp_name  = $_FILES['attachments']['tmp_name'];
    $fileSize = $_FILES['attachments']['size'];
    $maxFileSize = 6048000; // Giới hạn dung lượng tối đa (vd: 2MB)
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_extensions)) {
        $logo = $check_artist['ArtistImage'];
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
        $logo = $check_artist['ArtistImage'];
    }
} else {
    $logo = $check_artist['ArtistImage'];
}
if (empty($editordata)) {
$logo = $check_artist['ArtistImage'];
}

$create = $duogxaolin->update("artists", [
    'ArtistName' => $title,
    'ArtistSlug' => $slug,
    'Country' => $Country,
    'BirthYear' => $Year,
    'ArtistNote' => $editordata,
    'ArtistImage' => $logo,
    'ArtistType' => $Type
], " `ArtistID` = '$id' ");
if ($create) {
    $return['status'] = 'success';
    $return['msg']   = 'Sửa thành công';
    die(json_encode($return));
}
