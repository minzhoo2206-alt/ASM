<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

require_once "Controllers/HomeController.php";
require_once "Controllers/AuthController.php";
require_once "Controllers/CartController.php";

require "Views/layouts/header.php";

if (isset($_GET['pages']) && !empty($_GET['pages'])) {
    switch ($_GET['pages']) {
        case "home":
            $controller = new HomeController();
            $controller->renderGiaoDien();
            break;

        case "chi-tiet-san-pham":
            $controller = new SingleProductController();
            $controller->renderGiaoDien();
            break;

        case "dang-ky":
            $auth = new AuthController();
            $auth->dangKy();
            break;

        case "dang-nhap":
            $auth = new AuthController();
            $auth->dangNhap();
            break;

        case "dang-xuat":
            $auth = new AuthController();
            $auth->dangXuat();
            break;

        case "gio-hang":
            $cart = new CartController();
            $cart->hienThi();
            break;

        case "gio-hang-them":
            $cart = new CartController();
            $cart->them();
            break;

        case "gio-hang-cap-nhat":
            $cart = new CartController();
            $cart->capNhat();
            break;

        case "gio-hang-xoa":
            $cart = new CartController();
            $cart->xoa();
            break;

        case "gio-hang-xoa-tat-ca":
            $cart = new CartController();
            $cart->xoaTatCa();
            break;

        default:
            echo "404";
            break;
    }
} else {
    $controller = new HomeController();
    $controller->renderGiaoDien();
}

require "Views/layouts/footer.php";
