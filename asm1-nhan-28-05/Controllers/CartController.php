<?php

class CartController
{
    public function __construct()
    {
        if (!isset($_SESSION['gio_hang'])) {
            $_SESSION['gio_hang'] = [];
        }
    }

    private function timSanPham($id)
    {
        include "data.php";
        foreach ($products as $sp) {
            if ((int)$sp['id'] === (int)$id) {
                return $sp;
            }
        }
        return null;
    }

    public function them()
    {
        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            $sp = $this->timSanPham($id);
            if ($sp) {
                $key = (string)$sp['id'];
                if (isset($_SESSION['gio_hang'][$key])) {
                    $_SESSION['gio_hang'][$key]['so_luong'] += 1;
                } else {
                    $_SESSION['gio_hang'][$key] = [
                        'id'       => $sp['id'],
                        'name'     => $sp['name'],
                        'price'    => $sp['price'],
                        'image'    => $sp['image'],
                        'so_luong' => 1,
                    ];
                }
            }
        }
        header("Location: index.php?pages=gio-hang");
        exit;
    }

    public function capNhat()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $danhSach = $_POST['so_luong'] ?? [];
            foreach ($danhSach as $id => $sl) {
                $sl = (int)$sl;
                $key = (string)$id;
                if ($sl <= 0) {
                    unset($_SESSION['gio_hang'][$key]);
                } elseif (isset($_SESSION['gio_hang'][$key])) {
                    $_SESSION['gio_hang'][$key]['so_luong'] = $sl;
                }
            }
        }
        header("Location: index.php?pages=gio-hang");
        exit;
    }

    public function xoa()
    {
        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            unset($_SESSION['gio_hang'][(string)$id]);
        }
        header("Location: index.php?pages=gio-hang");
        exit;
    }

    public function xoaTatCa()
    {
        $_SESSION['gio_hang'] = [];
        header("Location: index.php?pages=gio-hang");
        exit;
    }

    public function hienThi()
    {
        $gioHang = $_SESSION['gio_hang'] ?? [];
        $tongTien = 0;
        foreach ($gioHang as $item) {
            $tongTien += $item['price'] * $item['so_luong'];
        }
        require "Views/pages/gio-hang.php";
    }
}
