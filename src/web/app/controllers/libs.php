
<?php
$duogxaolin = new System_Core;
require_once("google_auth.php");
require_once("mailler.php");
require_once("logic.php");
require_once("msg.php");

function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/', ' ', $text));
}
function trangthai($data)
{
    if ($data == '0') {
        return ' <span class="badge bg-warning ">Đang xử lý</span> ';
    } else if ($data == '1') {
        return ' <span class="badge bg-success ">Hoạt Động</span> ';
    } else if ($data == 'xuly') {
        return ' <span class="badge bg-warning ">Đang xử lý</span> ';
    } else if ($data == 'hoantat') {
        return ' <span class="badge bg-success ">Hoàn tất</span> ';
    } else if ($data == 'thanhcong') {
        return ' <span class="badge bg-success ">Thành công</span> ';
    } else if ($data == 'huy') {
        return ' <span class="badge bg-danger ">Hủy</span> ';
    } else if ($data == 'thatbai') {
        return ' <span class="badge bg-danger ">Thất bại</span> ';
    } else {
        return ' <span class="badge bg-danger ">Hủy</span> ';
    }
}
function account($data)
{
    if ($data == '0') {
        return ' <span class="badge bg-dark ">Ẩn</span> ';
    } else if ($data == '1') {
        return ' <span class="badge bg-success ">Hiển Thị</span> ';
    } else if ($data == '2') {
        return ' <span class="badge bg-danger ">Đã Bán</span> ';
    } else if ($data == '-1') {
        return ' <span class="badge bg-warning ">Chờ Duyệt</span> ';
    } else {
        return ' <span class="badge bg-danger ">Khóa</span> ';
    }
}
function status($data)
{
    if ($data == 1) {
        $show = '
        <span class="badge bg-pill bg-success">Đã hoàn thành</span>';
    } else {
        $show = '<span class="badge bg-pill bg-warning">Trượt</span>';
    }
    return $show;
}
function withdraw($data)
{
    if ($data == 'pending') {
        $show = '<span class="badge bg-warning">Đợi duyệt</span>';
    } else if ($data == 'success') {
        $show = '<span class="badge bg-success">Hoàn tất</span>';
    } else if ($data == 'lock') {
        $show = '<span class="badge bg-danger">Thu Hồi</span>';
    } else if ($data == 99) {
        $show = '<span class="badge bg-danger">Bị Khóa</span>';
    } else if ($data == 'huy') {
        $show = '<span class="badge bg-danger">Hủy</span>';
    }
    return $show;
}
function status_service($data)
{
    if ($data == 1) {
        $show = '<span class="badge bg-pill bg-success">Hoạt động</span>';
    } else if ($data == 0) {
        $show = '<span class="badge bg-pill bg-warning">Ẩn</span>';
    } else if ($data == 2) {
        $show = '<span class="badge bg-pill bg-warning">Tài Khoản Đã Bán</span>';
    } else {
        $show = '<span class="badge bg-pill bg-danger">Khóa</span>';
    }
    return $show;
}
function banned($data)
{
    if ($data == 0) {
        $show = '
        <span class="badge bg-pill bg-success">Hoạt Động</span>';
    } else {
        $show = '<span class="badge bg-pill bg-danger">Khóa</span>';
    }
    return $show;
}
function check_level($data)
{
    if ($data == 'seller') {
        $show = '
        <span class="badge bg-pill bg-success">Người Bán</span>';
    } else {
        $show = '<span class="badge bg-pill bg-warning">Thành Viên</span>';
    }
    return $show;
}
function status_bill($data)
{
    if ($data == 0) {
        $show = '
        <span class="badge bg-pill bg-warning">Chờ thanh toán</span>';
    } else if ($data == 1) {
        $show = '<span class="badge bg-pill bg-danger">Hủy</span>';
    } else if ($data == 2) {
        $show = '<span class="badge bg-pill bg-warning">Xử lý kiếu nại</span>';
    } else if ($data == 3) {
        $show = '<span class="badge bg-pill bg-success">Đã Hoàn Tiền</span>';
    } else if ($data == 4) {
        $show = ' <span class="badge bg-pill bg-success">Đã Thanh Toán,Admin Đang Tiến Hành Kiểm Tra</span>';
    } else if ($data == 5) {
        $show = ' <span class="badge bg-pill bg-warning">Đang Xử Lý</span>';
    } else if ($data == 500) {
        $show = ' <span class="badge bg-pill bg-danger">Đơn hàng bị thu lại tiền</span>';
    } else {
        $show = '<span class="badge bg-pill bg-success">Đơn hàng hoàn tất</span>';
    }
    return $show;
}
function theloai($data)
{
    if ($data == 'send') {
        $show = '
        <span class="badge bg-pill bg-success">Nạp game/Cước</span>';
    } else if ($data == 'account') {
        $show = '<span class="badge bg-pill bg-success">Nick Game</span>';
    } else if ($data == 'random') {
        $show = '<span class="badge bg-pill bg-success">Random</span>';
    }
    return $show;
}
function status_bill2($data)
{
    if ($data == 0) {
        $show = '
        <span class="badge bg-pill bg-warning">Chờ thanh toán</span>';
    } else if ($data == 1) {
        $show = '<span class="badge bg-pill bg-danger">Hủy</span>';
    } else if ($data == 2) {
        $show = '<span class="badge bg-pill bg-warning">Xử lý kiếu nại</span>';
    } else if ($data == 3) {
        $show = '<span class="badge bg-pill bg-warning">Đã Hoàn Tiền</span>';
    } else if ($data == 4) {
        $show = ' <span class="badge bg-pill bg-warning">Đã Thanh Toán,Admin Đang Tiến Hành Kiểm Tra</span>';
    } else if ($data == 5) {
        $show = ' <span class="badge bg-pill bg-warning">Đang Xử Lý</span>';
    } else if ($data == 99) {
        $show = '<span class="badge bg-pill bg-success">Chờ cộng tiền</span>';
    } else {
        $show = '<span class="badge bg-pill bg-success">Đã thanh toán</span>';
    }
    return $show;
}
function ranks($data)
{
    if ($data == '0') {
        $show = '<span class="badge bg-success">Thành Viên</span>';
    } else if ($data == 'seller') {
        $show = '<span class="badge bg-danger">Cộng Tác Viên</span>';
    } else {
        $show = '<span class="badge bg-danger">Admin</span>';
    }
    return $show;
}
function status_users($data)
{
    if ($data == '0') {
        $show = '<span class="badge bg-success">Hoạt Động</span>';
    } else if ($data == '1') {
        $show = '<span class="badge bg-danger">Bị Khóa</span>';
    } else if ($data == 'pending') {
        $show = '<span class="badge bg-warning">Chờ Duyệt</span>';
    } else if ($data == 'canced') {
        $show = '<span class="badge bg-danger">Hủy</span>';
    } else if ($data == 'success') {
        $show = '<span class="badge bg-success">Đã Duyệt</span>';
    }
    return $show;
}
function Get_devices()
{
    $result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
    $device_manufacturer = $result->device->manufacturer ?? "";
    $device_model = $result->device->model ?? "";
    $device_identifier = $result->device->identifier ?? "";

    $data['data'] = [
        "browser"    =>   $result->browser->name ?? "N/A",
        "browser_ver" => $result->browser->version->value ?? "N/A",
        "os_name"    => $result->os->name ?? "N/A",
        "os_ver"     => $result->os->version->value ?? "N/A",
        "device_manufacturer" => $result->device->manufacturer ?? "",
        "device_model" => $result->device->model ?? "",
        "device_identifier" => $result->device->identifier ?? "",
        "device_id" => sha1($device_manufacturer . $device_model . $device_identifier . $_COOKIE["session_token"]),
    ];
    return (json_decode(json_encode($data), true));
}
function ticket($data)
{
    if ($data == 0) {
        $show = '
        <span class="badge bg-pill bg-warning">Chờ xử lý</span>';
    } else if ($data == 1) {
        $show = '<span class="badge bg-pill bg-warning">Đang xử lý</span>';
    } else if ($data == 2) {
        $show = '<span class="badge bg-pill bg-warning">Hẹn ngày xử ký</span>';
    } else if ($data == 99) {
        $show = '<span class="badge bg-pill bg-success">Đã Xử lý(Không Hoàn Tiền)</span>';
    } else {
        $show = '<span class="badge bg-pill bg-success">Đã Xử lý (Hoàn Tiền)</span>';
    }
    return $show;
}
function isint($number)
{
    if (is_numeric($number) && $number > 0 && $number < 1000000000 && $number == (int) $number) {
        return true;
    } else {
        return false;
    }
}
function check_otp($token, $t = 10, $w = '')
{
    global $duogxaolin;
    $check = $duogxaolin->get_row("SELECT * FROM `user_otp` WHERE `token` = '$token' $w");
    if ($check) {
        $tgd =  time() - $check['create_date'];
        $tgs = $t * 60;
        if ($check['status'] == '1') {
            $return['status'] = 'error';
            $return['msg']   = 'Mã đã được sử dụng';
            return json_encode($return);
        } else {

            if ($tgd > $tgs) {
                $return['status'] = 'error';
                $return['msg']   = 'Mã đã hết hạn';
                return json_encode($return);
            } else {
                $return['status'] = 'success';
                $return['time']  = $tgd;
                $return['timer'] = $tgs;
                $return['username'] = $check['username'];
                $return['email'] = $check['email'];
                $return['msg']   = 'Xác minh thành công';
                return json_encode($return);
            }
        }
    } else {
        $return['status'] = 'error';
        $return['msg']   = 'Mã không hợp lệ';
        return json_encode($return);
    }
}

function layChuCaiDau($chuoi)
{
    $tu = explode(" ", $chuoi);
    $chuCaiDau = array();
    foreach ($tu as $t) {
        if (!empty($t)) {
            $chuCaiDau[] = strtoupper(substr($t, 0, 1));
        }
    }
    $ketQua = implode("", $chuCaiDau);
    return $ketQua;
}
function splitString($string)
{
    $length = strlen($string);
    $middle = ceil($length / 2);

    if ($length <= 4) {
        return array(substr($string, 0, $middle), substr($string, $middle));
    } else {
        $parts = explode(' ', $string);
        $firstPart = implode(' ', array_slice($parts, 0, ceil(count($parts) / 2)));
        $secondPart = implode(' ', array_slice($parts, ceil(count($parts) / 2)));
        return array($firstPart, $secondPart);
    }
}
function downloadFile($fileUrl) {
    if (filter_var($fileUrl, FILTER_VALIDATE_URL) === FALSE) {
        return "URL không hợp lệ!";
    }
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($fileUrl).'"');
    readfile($fileUrl);
    exit; 
}