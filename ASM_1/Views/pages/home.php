<?php
include __DIR__ . '/../../data.php';
include_once "carousel.php";
?>

<h4 class="text-center">Bạn đang tìm gì hôm nay?</h4> <br>

<div class="container">
    <div class="row g-3">

        <?php foreach ($products as $product): ?>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="box-img text-center p-2">
                        <img src="<?= $product['image'] ?>"
                            height="150"
                            class="card-img-top w-auto"
                            alt="<?= $product['name'] ?>">
                    </div>

                    <div class="card-body p-2 text-center">
                        <h6>
                            <a href="index.php?pages=chi-tiet-san-pham&id=<?= $product['id'] ?>"
                                class="text-decoration-none text-dark">
                                <?= $product['name'] ?>
                            </a>
                        </h6>
                        <p class="text-danger fw-bold mb-2">
                            <?= number_format($product['price'], 0, ',', '.') ?> đ
                        </p>
                        <a href="index.php?pages=gio-hang-them&id=<?= $product['id'] ?>"
                            class="btn btn-sm btn-outline-success w-100">
                            🛒 Thêm vào giỏ
                        </a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="row g-4 mt-4">
        <h3 class="text-center">Sản Phẩm Nổi Bật</h3> <br>

        <div class="col-md-6">
            <div class="card h-100">
                <img src="https://cdn.pnj.io/images/promo/301/thumbnail2-hoa-than-thanh-doa-hoa-ruc-ro-cung-diem-nhan-trang-suc-pnjhello-kitty-2026.jpg" class="card-img-top" alt="about">
                <div class="card-body">
                    <h5 class="card-title">Hóa Thân Thành Đóa Hoa Rực Rỡ Cùng Điểm Nhấn Trang Sức PNJ ❤️ Hello Kitty 2026</h5>
                    <p class="card-text">Nhắc đến PNJ ❤️ Hello Kitty, ta nhớ ngay đến sắc hoa tươi mới, ngọt ngào, luôn mang trong mình nguồn năng lượng tích cực không bao giờ tắt.</p>
                    <a href="#" class="btn btn-primary">Xem thêm ></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <img src="https://cdn.pnj.io/images/promo/301/thumbnail2-luu-giu-ky-niem-mua-he-2026-voi-bau-vat-lap-lanh-tu-doraemonpnj.jpg" class="card-img-top" alt="about">
                <div class="card-body">
                    <h5 class="card-title">Lưu Giữ Kỷ Niệm Mùa Hè 2026 Với “Báu Vật” Lấp Lánh Từ DORAEMON|PNJ</h5>
                    <p class="card-text">Mùa hè này, DORAEMON | PNJ mang đến các thiết kế trang sức thời thượng, sẵn sàng đồng hành cùng nàng trên mọi chặng đường khám phá mùa hè 2026.</p>
                    <a href="#" class="btn btn-primary">Xem thêm ></a>
                </div>
            </div>
        </div>
    </div>

</div>