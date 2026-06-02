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
</div>
