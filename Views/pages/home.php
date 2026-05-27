<?php
include_once "data.php";
include_once "carousel.php";
?>



<h4 class="text-center">Bạn đang tìm gì hôm nay?</h4> <br>

<div class="container ">
    <div class="row">

        <?php foreach ($products as $product): ?>
            <div class="col-lg-2">

                <div class="box-img text-center">
                    <img src="<?= $product['image'] ?>" height="150" class="card-img-top w-auto " alt="<?= $product['name'] ?>">
                </div>

                <h6 class="text-center "><?= $product['name'] ?></h6>




            </div>
        <?php endforeach; ?>

    </div>
</div>