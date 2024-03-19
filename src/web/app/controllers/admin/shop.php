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
$permissions = 8;
$role = $duogxaolin->get_row("SELECT * FROM `admin_role` WHERE `ranks_id` = '" . $ranks['id'] . "' AND `permissions_id` = $permissions ");
if (!$role) {
    $return['status'] = 'error';
    $return['msg']   = 'Bạn không có quyền truy cập ! ';
    die(json_encode($return));
}
$action = check_string($_POST['action']);
$id     = check_string($_POST['id']);
$row = $duogxaolin->get_row("SELECT * FROM `shop` WHERE `id` = '$id' ");

if ($action == 'cong') {
    if (!$duogxaolin->get_row("SELECT * FROM `admin_role` WHERE `ranks_id` = '" . $ranks['id'] . "' AND `permissions_id` = 9 ")) {
        $return['status'] = 'error';
        $return['msg']   = 'Bạn không có quyền truy cập ! ';
        die(json_encode($return));
    }
    $id = check_string($_POST['id']);
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if ($value <= 0) {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập số tiền hợp lệ';
        die(json_encode($return));
    }
    if ($value <= 0) {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập số tiền hợp lệ';
        die(json_encode($return));
    }
    if ($value > 100000000) {
        $return['status'] = 'error';
        $return['msg']   = 'Số tiền tối đa mỗi gd la 100tr';
        die(json_encode($return));
    }
    $request_id = generate_unique_id();
    $duogxaolin->insert("history", [
        'magd'       =>  '',
        'sotientruoc' => $row['money'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['money'] + $value,
        'thoigian' => time(),
        'noidung' => 'Hệ thống cộng số dư (' . format_cash($value) . ' đ ) : ' . $ghichu,
        'user_id' => $row['id']
    ]);
    if ($create) {
        $duogxaolin->cong("shop", "money", $value, " `id` = '$id' ");
        $duogxaolin->cong("shop", "total_money", $value, " `id` = '$id' ");
        $return['status'] = 'success';
        $return['msg']   = 'Cộng tiền thành công';
        die(json_encode($return));
    } else {
        $return['status'] = 'error';
        $return['msg']   = 'Lỗi';
        die(json_encode($return));
    }
}
if ($action == 'tru') {
    if (!$duogxaolin->get_row("SELECT * FROM `admin_role` WHERE `ranks_id` = '" . $ranks['id'] . "' AND `permissions_id` = 6 ")) {
        $return['status'] = 'error';
        $return['msg']   = 'Bạn không có quyền truy cập ! ';
        die(json_encode($return));
    }
    $id = check_string($_POST['id']);
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if ($value <= 0) {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập số tiền hợp lệ';
        die(json_encode($return));
    }
    if ($value <= 0) {
        $return['status'] = 'error';
        $return['msg']   = 'Vui lòng nhập số tiền hợp lệ';
        die(json_encode($return));
    }
    if ($value > 100000000) {
        $return['status'] = 'error';
        $return['msg']   = 'Số tiền tối đa mỗi gd la 100tr';
        die(json_encode($return));
    }
    $request_id = generate_unique_id();
    $create = $duogxaolin->insert("history", [
        'magd'       =>  '',
        'sotientruoc' => $row['money'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['money'] - $value,
        'thoigian' => time(),
        'noidung' => 'Hệ Thống Trừ Tiền (' . format_cash($value) . ' đ ) : ' . $ghichu,
        'user_id' => $row['id']
    ]);
    if ($create) {
        $duogxaolin->tru("shop", "money", $value, " `id` = '$id' ");
        $duogxaolin->tru("shop", "del_money", $value, " `id` = '$id' ");
        //$duogxaolin->tru("users", "total_money", $value, " `id` = '$id' ");
        $return['status'] = 'success';
        $return['msg']   = 'Trừ tiền thành công';
        die(json_encode($return));
    } else {
        $return['status'] = 'error';
        $return['msg']   = 'Lỗi';
        die(json_encode($return));
    }
}
if ($action == 'edit') {
    $id = check_string($_POST['id']);
    $banned = check_string($_POST['status']);
    $reason_banned = check_string($_POST['reason_banned']);

    if ($banned == '') {
        $return['status'] = 'error';
        $return['msg']   = 'Vui Lòng Chọn Giá Trị Hợp Lệ';
        die(json_encode($return));
    }
    if ($banned == '1') {
        if ($reason_banned == '') {
            $return['status'] = 'error';
            $return['msg']   = 'Vui Lòng Nhập Lý Do Banned';
            die(json_encode($return));
        }
    } else {
        $reason_banned = '';
    }
    $duogxaolin->update("shop", [
        'status' => $banned,
        'reason_banned' => $reason_banned
    ], " `id` = '$id' ");
    $return['status'] = 'success';
    $return['msg']   = 'Thay đổi thành công';
    die(json_encode($return));
}
