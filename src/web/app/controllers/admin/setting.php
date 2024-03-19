<?php
$mod = $duogxaolin->get_row("SELECT * FROM `admin` WHERE `token` = '" . $_COOKIE['admin_session'] . "'");

if (!$mod) {
    $return['status'] = 'error';
    $return['msg']   = 'Vui lòng đăng nhập để sử dụng dịch vụ ! ';
    die(json_encode($return));
}
$ranks = $duogxaolin->get_row("SELECT * FROM `admin_rank` WHERE `id` = '" . $mod['ranks'] . "'");
if (!$ranks) {
    $return['status'] = 'error';
    $return['msg']   = 'Không tìm thấy cấp bậc tương ứng';
    die(json_encode($return));
}
$permissions = 5;
$role = $duogxaolin->get_row("SELECT * FROM `admin_role` WHERE `ranks_id` = '" . $ranks['id'] . "' AND `permissions_id` = $permissions ");
if (!$role) {
    $return['status'] = 'error';
    $return['msg']   = 'Bạn không có quyền truy cập ! ';
    die(json_encode($return));
}


if (!$duogxaolin->get_row("SELECT * FROM `admin_role` WHERE `ranks_id` = '" . $ranks['id'] . "' AND `permissions_id` = 6 ")) {
    $return['status'] = 'error';
    $return['msg']   = 'Bạn không có quyền truy cập ! ';
    die(json_encode($return));
}
if(check_img('logo') == true)
{
$file_name = $_FILES['logo']['name'];
$tmp_name  = $_FILES['logo']['tmp_name'];
$fileSize = $_FILES['logo']['size'];
$maxFileSize = 6048000; // Giới hạn dung lượng tối đa (vd: 2MB)
    $allowed_extensions = array('jpg', 'jpeg', 'png');
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if ($fileSize > $maxFileSize) {
        $return['error'] = 1;
        $return['msg']   = 'Chỉ cho phép tải lên có dung lượng dưới 5mb !';
        die(json_encode($return));
    }
        //up ảnh lên server
        $targetDir = "../../../uploads/"; // Thư mục lưu trữ hình ảnh
        $targetFile = $targetDir . basename($file_name);
        $logo      = 'logo' . basename($file_name);
        $create = move_uploaded_file($tmp_name, $targetDir . "/" . $logo);
        $logo      = '/uploads/logo' . basename($file_name);
        $duogxaolin->update("options", array(
            'value' => $logo
        ), " `name` = 'logo' ");
}
if(check_img('logo_mobile') == true)
{
$file_name = $_FILES['logo_mobile']['name'];
$tmp_name  = $_FILES['logo_mobile']['tmp_name'];
$fileSize = $_FILES['logo_mobile']['size'];
$maxFileSize = 6048000; // Giới hạn dung lượng tối đa (vd: 2MB)
    $allowed_extensions = array('jpg', 'jpeg', 'png');
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if ($fileSize > $maxFileSize) {
        $return['error'] = 1;
        $return['msg']   = 'Chỉ cho phép tải lên có dung lượng dưới 5mb !';
        die(json_encode($return));
    }
        //up ảnh lên server
        $targetDir = "../../../uploads/"; // Thư mục lưu trữ hình ảnh
        $targetFile = $targetDir . basename($file_name);
        $logo      = 'logo_mobile' . basename($file_name);
        $create = move_uploaded_file($tmp_name, $targetDir . "/" . $logo);
        $logo      = '/uploads/logo_mobile' . basename($file_name);
        $duogxaolin->update("options", array(
            'value' => $logo
        ), " `name` = 'logo_mobile' ");
}
if(check_img('logo_footer') == true)
{
$file_name = $_FILES['logo_footer']['name'];
$tmp_name  = $_FILES['logo_footer']['tmp_name'];
$fileSize = $_FILES['logo_footer']['size'];
$maxFileSize = 6048000; // Giới hạn dung lượng tối đa (vd: 2MB)
    $allowed_extensions = array('jpg', 'jpeg', 'png');
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if ($fileSize > $maxFileSize) {
        $return['error'] = 1;
        $return['msg']   = 'Chỉ cho phép tải lên có dung lượng dưới 5mb !';
        die(json_encode($return));
    }
        //up ảnh lên server
        $targetDir = "../../../uploads/"; // Thư mục lưu trữ hình ảnh
        $targetFile = $targetDir . basename($file_name);
        $logo      = 'logo_footer' . basename($file_name);
        $create = move_uploaded_file($tmp_name, $targetDir . "/" . $logo);
        $logo      = '/uploads/logo_footer' . basename($file_name);
        $duogxaolin->update("options", array(
            'value' => $logo
        ), " `name` = 'logo_footer' ");
}
if(check_img('favicon') == true)
{
    $file_name = $_FILES['favicon']['name'];
$tmp_name  = $_FILES['favicon']['tmp_name'];
$fileSize = $_FILES['favicon']['size'];
$maxFileSize = 6048000; // Giới hạn dung lượng tối đa (vd: 2MB)
    $allowed_extensions = array('jpg', 'jpeg', 'png');
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if ($fileSize > $maxFileSize) {
        $return['error'] = 1;
        $return['msg']   = 'Chỉ cho phép tải lên có dung lượng dưới 5mb !';
        die(json_encode($return));
    }
        //up ảnh lên server
        $targetDir = "../../../uploads/"; // Thư mục lưu trữ hình ảnh
        $targetFile = $targetDir . basename($file_name);
        $logo      = 'favicon' . basename($file_name);
        $create = move_uploaded_file($tmp_name, $targetDir . "/" . $logo);
        $logo      = '/uploads/favicon' . basename($file_name);
        $duogxaolin->update("options", array(
            'value' => $logo
        ), " `name` = 'favicon' ");
}
if(check_img('image') == true)
{
    $file_name = $_FILES['image']['name'];
    $tmp_name  = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $maxFileSize = 6048000; // Giới hạn dung lượng tối đa (vd: 2MB)
        $allowed_extensions = array('jpg', 'jpeg', 'png');
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($fileSize > $maxFileSize) {
            $return['error'] = 1;
            $return['msg']   = 'Chỉ cho phép tải lên có dung lượng dưới 5mb !';
            die(json_encode($return));
        }
            //up ảnh lên server
            $targetDir = "../../../uploads/"; // Thư mục lưu trữ hình ảnh
            $targetFile = $targetDir . basename($file_name);
            $logo      = 'image' . basename($file_name);
            $create = move_uploaded_file($tmp_name, $targetDir . "/" . $logo);
            $logo      = '/uploads/image' . basename($file_name);
            $duogxaolin->update("options", array(
                'value' => $logo
            ), " `name` = 'image' ");
}
foreach ($_POST as $key => $value)
{
    if($key != 'logo' || $key != 'favicon' || $key != 'image'|| $key != 'logo_mobile'|| $key != 'logo_footer')
    {
        $duogxaolin->update("options", array(
            'value' => $value
        ), " `name` = '$key' ");
    }
    }
    $return['status'] = 'success';
$return['msg']   = 'Thay đổi thành công ';
die(json_encode($return));