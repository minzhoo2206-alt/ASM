<?php

class AuthController
{
    private $fileUsers;

    public function __construct()
    {
        $this->fileUsers = __DIR__ . "/../data/users.json";
        $thuMuc = dirname($this->fileUsers);
        if (!is_dir($thuMuc)) {
            mkdir($thuMuc, 0777, true);
        }
        if (!file_exists($this->fileUsers)) {
            file_put_contents($this->fileUsers, json_encode([]));
        }
    }

    private function docDanhSach()
    {
        $noiDung = file_get_contents($this->fileUsers);
        $ds = json_decode($noiDung, true);
        return is_array($ds) ? $ds : [];
    }

    private function ghiDanhSach($ds)
    {
        file_put_contents($this->fileUsers, json_encode($ds, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    public function dangKy()
    {
        $loi = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoTen   = trim($_POST['ho_ten'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $matKhau = $_POST['mat_khau'] ?? '';
            $nhapLai = $_POST['nhap_lai_mat_khau'] ?? '';

            if ($hoTen === '') {
                $loi[] = "Vui lòng nhập họ tên.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $loi[] = "Email không hợp lệ.";
            }
            if (strlen($matKhau) < 6) {
                $loi[] = "Mật khẩu phải có ít nhất 6 ký tự.";
            }
            if ($matKhau !== $nhapLai) {
                $loi[] = "Mật khẩu nhập lại không khớp.";
            }

            if (empty($loi)) {
                $ds = $this->docDanhSach();
                foreach ($ds as $u) {
                    if (strcasecmp($u['email'], $email) === 0) {
                        $loi[] = "Email này đã được sử dụng.";
                        break;
                    }
                }
            }

            if (empty($loi)) {
                $ds[] = [
                    'id'       => time(),
                    'ho_ten'   => $hoTen,
                    'email'    => $email,
                    'mat_khau' => password_hash($matKhau, PASSWORD_DEFAULT),
                ];
                $this->ghiDanhSach($ds);
                header("Location: index.php?pages=dang-nhap&thanh_cong=1");
                exit;
            }
        }
        require "Views/pages/dang-ky.php";
    }

    public function dangNhap()
    {
        $loi = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email   = trim($_POST['email'] ?? '');
            $matKhau = $_POST['mat_khau'] ?? '';

            if ($email === '' || $matKhau === '') {
                $loi[] = "Vui lòng nhập đầy đủ email và mật khẩu.";
            }

            if (empty($loi)) {
                $ds = $this->docDanhSach();
                $tim = null;
                foreach ($ds as $u) {
                    if (strcasecmp($u['email'], $email) === 0) {
                        $tim = $u;
                        break;
                    }
                }
                if (!$tim || !password_verify($matKhau, $tim['mat_khau'])) {
                    $loi[] = "Email hoặc mật khẩu không đúng.";
                } else {
                    $_SESSION['nguoi_dung'] = [
                        'id'     => $tim['id'],
                        'ho_ten' => $tim['ho_ten'],
                        'email'  => $tim['email'],
                    ];
                    header("Location: index.php");
                    exit;
                }
            }
        }
        require "Views/pages/dang-nhap.php";
    }

    public function dangXuat()
    {
        unset($_SESSION['nguoi_dung']);
        header("Location: index.php");
        exit;
    }
}
