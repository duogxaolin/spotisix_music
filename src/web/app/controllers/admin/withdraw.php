<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
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
$id     = check_string($_POST['id']);
$status = check_string($_POST['status']);
$row  = $duogxaolin->get_row("SELECT * FROM `withdraw` WHERE `id` = '$id' ");
$rows = $duogxaolin->get_row("SELECT * FROM `shop` WHERE `user_id` = '" . $row['user_id'] . "'");

if (!$row) {
    $return['status'] = 'error';
    $return['msg']   = 'Lệnh k hợp lệ';
    die(json_encode($return));
}
if ($row['status'] == 'huy') {
    $return['status'] = 'error';
    $return['msg']   = 'Đơn hàng đã hoàn tiền, k thể sửa';
    die(json_encode($return));
}
$thucnhan = $row['amount'] - $row['fees'];
if ($status == 'huy') {
    $duogxaolin->cong("shop", "money", $thucnhan, " `id` = '" . $rows['id'] . "' ");
    $create = $duogxaolin->insert("history_seller", [
        'sotientruoc' => $rows['money'],
        'sotienthaydoi' => $thucnhan,
        'sotiensau' => $rows['money'] + $thucnhan,
        'thoigian' => gettime(),
        'noidung' => 'Hủy đơn nạp tiền (' . format_cash($thucnhan) . ' đ ) : ' . $ghichu,
        'seller_id' => $rows['id']
    ]);
}
$duogxaolin->update("withdraw", [
    'status' => $status,
], " `id` = '$id' ");
$return['status'] = 'success';
$return['msg']   = 'Thay đổi thành công';
die(json_encode($return));
