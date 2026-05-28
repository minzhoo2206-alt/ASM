<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Võ Quốc Nhuận</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://inkythuatso.com/uploads/thumbnails/800/2021/12/logo-fpt-polytechnic-inkythuatso-09-13-08-21.jpg"
                    alt="Bootstrap" height="90">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Giới thiệu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="">
                            Sản phẩm
                        </a>

                    <li class="nav-item">
                        <a class="nav-link" href="">Chi tiết sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Liên hệ</a>
                    </li>
                </ul>



                <form class="d-flex" role="search">

                    <input class="form-control me-2 mb-2" type="Search" placeholder="Tìm Kiếm" aria-label="Search" />
                    <button class="btn btn-outline-success mb-2 me-2" type="submit">Tìm kiếm</button>




                </form>
                <form class="d-flex" role="search">
                    <?php if (isset($_SESSION['nguoi_dung'])): ?>
                        <span class="btn btn-outline-primary me-2 mb-2 disabled">
                            👤 <br> <?= htmlspecialchars($_SESSION['nguoi_dung']['ho_ten']) ?>
                        </span>
                        <a href="index.php?pages=dang-xuat" class="btn btn-outline-danger me-2 mb-2">
                            🚪 <br> Đăng xuất
                        </a>
                    <?php else: ?>
                        <a href="index.php?pages=dang-nhap" class="btn btn-outline-success me-2 mb-2">
                            👤 <br> Đăng nhập
                        </a>
                        <a href="index.php?pages=dang-ky" class="btn btn-outline-success me-2 mb-2">
                            📝 <br> Đăng ký
                        </a>
                    <?php endif; ?>

                    <a href="index.php?pages=gio-hang" class="btn btn-outline-success mb-2">
                        🛒 <br> Giỏ hàng
                        <?php
                        $soLuongGio = 0;
                        if (!empty($_SESSION['gio_hang'])) {
                            foreach ($_SESSION['gio_hang'] as $itemGio) {
                                $soLuongGio += (int)$itemGio['so_luong'];
                            }
                        }
                        if ($soLuongGio > 0):
                        ?>
                            <span class="badge bg-danger"><?= $soLuongGio ?></span>
                        <?php endif; ?>
                    </a>
                </form>

            </div>
        </div>
    </nav>



</body>

</html>